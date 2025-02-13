<?php
include 'config.php'; // Include your database connection file

// Check if the request method is POST and the ID is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']); // Sanitize the input to prevent SQL injection

    // Prepare the DELETE SQL query
    $deleteQuery = "DELETE FROM client_list WHERE id = ?";

    if ($stmt = $conn->prepare($deleteQuery)) {
        // Bind the parameter and execute the statement
        $stmt->bind_param('i', $id);
        
        if ($stmt->execute()) {
            // Check if any rows were affected (i.e., the delete was successful)
            if ($stmt->affected_rows > 0) {
                echo json_encode(array('success' => 'Data deleted successfully.'));
            } else {
                echo json_encode(array('error' => 'No record found with that ID.'));
            }
        } else {
            echo json_encode(array('error' => 'Failed to execute delete query.'));
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo json_encode(array('error' => 'Failed to prepare delete statement.'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request.'));
}

// Close the database connection
$conn->close();
?>
