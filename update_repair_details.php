<?php

// Include database configuration file
include 'config.php'; 

// Get values from POST data
$repair_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$client_id = isset($_POST['client_id']) ? intval($_POST['client_id']) : 0;
$remarks = isset($_POST['remarks']) ? $_POST['remarks'] : '';
$total_amount = isset($_POST['grandTotal']) ? floatval($_POST['grandTotal']) : 0;
$paid_amount = isset($_POST['paid_amount']) ? floatval($_POST['paid_amount']) : 0;
$payment_status = isset($_POST['payment_status']) ? intval($_POST['payment_status']) : 0;
$status = isset($_POST['status']) ? intval($_POST['status']) : 0;
$whatsapp = isset($_POST['whatsapp_notification']) ? $_POST['whatsapp_notification'] : 'no';

// Initialize success flag for redirection
$success = true;
$errorMessage = "";

// Proceed only if repair ID is valid
if ($repair_id > 0) {
    // Delete existing services and materials related to repair_id
    $deleteServicesQuery = "DELETE FROM custom_repair_services WHERE repair_id = ?";
    $stmt1 = $conn->prepare($deleteServicesQuery);
    $stmt1->bind_param("i", $repair_id);
    if (!$stmt1->execute()) {
        $success = false;
        $errorMessage .= "Failed to delete services. ";
    }
    $stmt1->close();

    $deleteMaterialsQuery = "DELETE FROM repair_materials WHERE repair_id = ?";
    $stmt2 = $conn->prepare($deleteMaterialsQuery);
    $stmt2->bind_param("i", $repair_id);
    if (!$stmt2->execute()) {
        $success = false;
        $errorMessage .= "Failed to delete materials. ";
    }
    $stmt2->close();

    // Insert new services
    if (isset($_POST['service']) && isset($_POST['service_cost'])) {
        $services = $_POST['service'];
        $serviceCosts = $_POST['service_cost'];
        
        $insertServiceQuery = "INSERT INTO custom_repair_services (repair_id, service, cost) VALUES (?, ?, ?)";
        $stmt3 = $conn->prepare($insertServiceQuery);
        
        foreach ($services as $index => $service) {
            $cost = isset($serviceCosts[$index]) ? floatval($serviceCosts[$index]) : 0;
            if (!empty($service) && $cost >= 0) {
                $stmt3->bind_param("isd", $repair_id, $service, $cost);
                if (!$stmt3->execute()) {
                    $success = false;
                    $errorMessage .= "Failed to insert service: $service. ";
                }
            }
        }
        
        $stmt3->close();
    }

    // Insert new materials
    if (isset($_POST['material']) && isset($_POST['material_cost'])) {
        $materials = $_POST['material'];
        $materialCosts = $_POST['material_cost'];
        
        $insertMaterialQuery = "INSERT INTO repair_materials (repair_id, material, cost) VALUES (?, ?, ?)";
        $stmt4 = $conn->prepare($insertMaterialQuery);
        
        foreach ($materials as $index => $material) {
            $cost = isset($materialCosts[$index]) ? floatval($materialCosts[$index]) : 0;
            if (!empty($material) && $cost >= 0) {
                $stmt4->bind_param("isd", $repair_id, $material, $cost);
                if (!$stmt4->execute()) {
                    $success = false;
                    $errorMessage .= "Failed to insert material: $material. ";
                }
            }
        }
        
        $stmt4->close();
    }

    // Update the repair_list table
    $updateRepairListQuery = "
        UPDATE repair_list 
        SET client_id = ?, remarks = ?, total_amount = ?, paid_amount = ?, payment_status = ?, status = ?
        WHERE id = ?
    ";
    $stmt = $conn->prepare($updateRepairListQuery);
    $stmt->bind_param("isddiii", $client_id, $remarks, $total_amount, $paid_amount, $payment_status, $status, $repair_id);
    
    if (!$stmt->execute()) {
        $success = false;
        $errorMessage .= "Failed to update repair list. ";
    }
    $stmt->close();

    // WhatsApp notification
    if ($whatsapp === 'yes' && $client_id > 0) {
        $clientResult = $conn->query("SELECT contact FROM client_list WHERE id = $client_id");
        if ($clientResult && $clientResult->num_rows > 0) {
            $clientRow = $clientResult->fetch_assoc();
            $clientContact = $clientRow['contact'];
            
            // Prepare the message based on status
            $messages = [
                "Your device has been received and is currently pending repair. We will keep you updated!",
                "We are currently checking your device. Thank you for your patience!",
                "Your device is ready for assessment. We will contact you shortly for approval!",
                "The repair of your device is in progress. We will notify you once it’s completed!",
                "Great news! Your device has been repaired and is ready for pickup!",
                "Your device has been delivered. We hope you enjoy using it!",
                "We're sorry, but the repair for your device has been cancelled. Please contact us for further details."
            ];

            $message = $messages[$status] ?? "Thank you for choosing our services!";

            // Send WhatsApp message
            $postData = [
                'api_key' => "Z5INE5T0lb2nJZobSFA8PRQhUD12Na",
                'sender' => "918421145259",
                'number' => '91' . $clientContact,
                'message' => $message
            ];

            $ch = curl_init("https://wamsg.jannatinfotech.in/send-message");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
            $response = curl_exec($ch);
            curl_close($ch);

            if ($response !== "success") {
                $success = false;
                $errorMessage .= "Failed to send WhatsApp notification. ";
            }
        } else {
            $success = false;
            $errorMessage .= "Client contact not found. ";
        }
    }
} else {
    $success = false;
    $errorMessage .= "Invalid repair ID. ";
}

// Redirect to editRepair.php with success or error message
header("Location: repairs.php?success=" . ($success ? "1" : "0") . "&message=" . urlencode($errorMessage));
exit;

?>
