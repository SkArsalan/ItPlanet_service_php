<?php
include 'config.php'; // Your database connection file

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize the input
    $query = "SELECT firstname, lastname, contact, email, address FROM client_list WHERE id = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($firstname, $lastname, $contact, $email, $address);

        if ($stmt->fetch()) {
            // Create an associative array to hold the data
            $clientData = array(
                'firstname' => $firstname,
                'lastname' => $lastname,
                'contact' => $contact,
                'email' => $email,
                'address' => $address
            );
            // Set the content type to application/json
            header('Content-Type: application/json');
            // Return the data as a JSON object
            echo json_encode($clientData);
        } else {
            // Return an error if no data found
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'No data found.'));
        }
        $stmt->close();
    }
    $conn->close();
} else {
    // Handle cases where 'id' is not set
    header('Content-Type: application/json');
    echo json_encode(array('error' => 'Invalid request.'));
}
?>
