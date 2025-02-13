<?php
include 'config.php'; // Your database connection file

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT firstname, lastname, contact, email, address FROM client_list WHERE id = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($first_name, $last_name, $phone_number, $email, $address);

        if ($stmt->fetch()) {
            $clientData = array(
                'firstname' => $first_name,
                'lastname' => $last_name,
                'contact' => $phone_number,
                'email' => $email,
                'address' => $address
            );
            header('Content-Type: application/json');
            echo json_encode($clientData);
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'No data found.'));
        }
        $stmt->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $phone_number = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Update query
    $query = "UPDATE client_list SET firstname = ?, lastname = ?, contact = ?, email = ?, address = ? WHERE id = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('sssssi', $first_name, $last_name, $phone_number, $email, $address, $id);
        if ($stmt->execute()) {
            header('Content-Type: application/json');
            echo json_encode(array('success' => 'Client details updated successfully.'));
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('error' => 'Failed to update details.'));
        }
        $stmt->close();
    }
}

$conn->close();
?>
