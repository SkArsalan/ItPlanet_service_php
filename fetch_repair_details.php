<?php
// fetch_repair_details.php

// Include database connection
include 'config.php'; // Adjust this path according to your setup

// Get the repair ID from the POST request
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id) {
    // Prepare and execute the query to fetch main repair details from repair_list, including client_id
    $stmt = $conn->prepare("SELECT * FROM repair_list WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the main repair details
        $repair = $result->fetch_assoc();

        // Fetch the client name from client_list based on client_id
        $client_stmt = $conn->prepare("SELECT CONCAT(firstname, ' ', COALESCE(middlename, ''), ' ', lastname) AS client_name FROM client_list WHERE id = ?");
        $client_stmt->bind_param("i", $repair['client_id']);
        $client_stmt->execute();
        $client_result = $client_stmt->get_result();
        
        if ($client_result->num_rows > 0) {
            $client = $client_result->fetch_assoc();
            $repair['client_name'] = trim($client['client_name']); // Add client name to the repair data
        } else {
            $repair['client_name'] = "Unknown Client"; // Default if client is not found
        }

        // Fetch associated services from custom_repair_services
        $service_stmt = $conn->prepare("SELECT service, cost FROM custom_repair_services WHERE repair_id = ?");
        $service_stmt->bind_param("i", $id);
        $service_stmt->execute();
        $service_result = $service_stmt->get_result();

        $services = [];
        while ($row = $service_result->fetch_assoc()) {
            $services[] = $row; // Add each service to the services array
        }
        $repair['services'] = $services; // Add services to the main repair data

        // Fetch associated materials (goods) from repair_materials
        $goods_stmt = $conn->prepare("SELECT material, cost FROM repair_materials WHERE repair_id = ?");
        $goods_stmt->bind_param("i", $id);
        $goods_stmt->execute();
        $goods_result = $goods_stmt->get_result();

        $goods = [];
        while ($row = $goods_result->fetch_assoc()) {
            $goods[] = $row; // Add each material to the goods array
        }
        $repair['goods'] = $goods; // Add goods to the main repair data

        // Output all repair details, services, goods, and client name as JSON
        echo json_encode($repair);

        // Close statements
        $client_stmt->close();
        $service_stmt->close();
        $goods_stmt->close();
    } else {
        echo json_encode(["error" => "Repair not found."]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid ID."]);
}

$conn->close();
?>
