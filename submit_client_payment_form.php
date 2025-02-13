<?php
include('config.php');

try {
    // Fetch form data
    $client_id = $_POST['client_id'];
    $remarks = $_POST['remarks'];
    $total_amount = $_POST['total_amount'];
    $paid_amount = $_POST['paid_amount'];
    $payment_status = $_POST['payment_status'];
    $status = $_POST['status'];
    $whatsapp = $_POST['whatsapp_notification'];

    // Get the current date
    $currentDate = date('Ymd');

    // Fetch the next serial number from the database
    $result = $conn->query("SELECT MAX(CAST(SUBSTRING(code, -4) AS UNSIGNED)) AS max_serial FROM repair_list WHERE code LIKE 'planet-$currentDate-%'");
    $row = $result->fetch_assoc();
    $nextSerialNo = isset($row['max_serial']) ? $row['max_serial'] + 1 : 1;

    // Generate the bill code
    $billCode = 'planet-' . $currentDate . '-' . str_pad($nextSerialNo, 4, '0', STR_PAD_LEFT);

    // Prepare and bind for `repair_list`
    $stmt = $conn->prepare("INSERT INTO repair_list (code, client_id, remarks, total_amount, paid_amount, payment_status, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisddii", $billCode, $client_id, $remarks, $total_amount, $paid_amount, $payment_status, $status);

    // Execute the statement
    if ($stmt->execute()) {
        $repair_id = $stmt->insert_id; // Get the inserted repair_id

        // Insert custom services
        if (isset($_POST['services']) && is_array($_POST['services'])) {
            foreach ($_POST['services'] as $service) {
                list($service_name, $service_cost) = explode("|", $service);
                $service_stmt = $conn->prepare("INSERT INTO custom_repair_services (repair_id, service, cost) VALUES (?, ?, ?)");
                $service_stmt->bind_param("isd", $repair_id, $service_name, $service_cost);
                $service_stmt->execute();
                $service_stmt->close();
            }
        }

        // Insert materials
        if (isset($_POST['goods']) && is_array($_POST['goods'])) {
            foreach ($_POST['goods'] as $material) {
                list($material_name, $material_cost) = explode("|", $material);
                $material_stmt = $conn->prepare("INSERT INTO repair_materials (repair_id, material, cost) VALUES (?, ?, ?)");
                $material_stmt->bind_param("isd", $repair_id, $material_name, $material_cost);
                $material_stmt->execute();
                $material_stmt->close();
            }
        }

        // Check if WhatsApp notification is requested
        if ($whatsapp === 'yes') {
            // Fetch client's contact number
            $clientResult = $conn->query("SELECT contact FROM client_list WHERE id = $client_id");
            $clientRow = $clientResult->fetch_assoc();
            $clientContact = $clientRow['contact'];

            // Prepare the message based on status
            switch ($status) {
                case 0: // Pending
                    $message = "Your device has been received and is currently pending repair. We will keep you updated!";
                    break;
                case 1: // Checking
                    $message = "We are currently checking your device. Thank you for your patience!";
                    break;
                case 2: // Pending Approval
                    $message = "Your device is ready for assessment. We will contact you shortly for approval!";
                    break;
                case 3: // In Progress
                    $message = "The repair of your device is in progress. We will notify you once it’s completed!";
                    break;
                case 4: // Done
                    $message = "Great news! Your device has been repaired and is ready for pickup!";
                    break;
                case 5: // Delivered
                    $message = "Your device has been delivered. We hope you enjoy using it!";
                    break;
                case 6: // Cancelled
                    $message = "We're sorry, but the repair for your device has been cancelled. Please contact us for further details.";
                    break;
                default:
                    $message = "Thank you for choosing our services!";
                    break;
            }



            // Prepare the WhatsApp API request
            $apiKey = "Z5INE5T0lb2nJZobSFA8PRQhUD12Na";
            $sender = "918421145259"; // Your WhatsApp number
            $whatsappUrl = "https://wamsg.jannatinfotech.in/send-message";
            $postData = [
                'api_key' => $apiKey,
                'sender' => $sender,
                'number' => '91' . $clientRow['contact'],
                'message' => $message
            ];

            // Send WhatsApp message
            $ch = curl_init($whatsappUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
            $response = curl_exec($ch);
            curl_close($ch);
        }

        // Redirect to repairs.php after successful insertion
        header("Location: repairs.php");
        exit(); // Make sure to call exit after header to stop script execution
    } else {
        throw new Exception("Error inserting into repair_list: " . $stmt->error);
    }
} catch (mysqli_sql_exception $e) {
    echo "SQL Error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
