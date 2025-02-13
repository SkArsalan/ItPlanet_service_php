<?php
include('config.php');

// Get the search term from the AJAX request
$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

// Adjust SQL query to filter results based on the search term
$sql = "SELECT id, CONCAT(firstname, ' ', lastname) AS full_name 
        FROM client_list 
        WHERE delete_flag = 0 
        AND (firstname LIKE ? OR lastname LIKE ?)
        ORDER BY id DESC";

// Prepare and bind parameters to the SQL query
$stmt = $conn->prepare($sql);
$searchTerm = "%$searchTerm%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Fetch results and format them for Select2
$clients = [];
while ($row = $result->fetch_assoc()) {
    $clients[] = [
        'id' => $row['id'],
        'text' => $row['full_name']
    ];
}

echo json_encode($clients);
$stmt->close();
$conn->close();
