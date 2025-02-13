<?php
// Database connection
include('config.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and assign form inputs to variables
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    
    // Prepare and execute the insert query
    $sql = "INSERT INTO client_list (firstname, lastname, contact, email, address) 
            VALUES ('$firstname', '$lastname', '$contact', '$email', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "New client added successfully";
        // Optionally redirect back to form or client list
        header("Location: clients.php"); // Replace with your desired page
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
