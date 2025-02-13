<?php
session_start(); // Start the session

include('config.php');
// Get the input values from the form
$user_input = mysqli_real_escape_string($conn, $_POST['username']); // Can be email or username
$password_input = $_POST['password']; // Get password without escaping, for verification
 
// Check if the user exists with either username or email
$sql = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user_input, $user_input);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // User exists, now fetch the user data
    $row = $result->fetch_assoc();
    
    // Verify the hashed password
    if (md5($password_input) === $row['password']) {

        // Successful login
        // Set session variables
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        
        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Login failed due to incorrect password
        header("Location: index.php?error=2");
        exit();
    }
} else {
    // Login failed, user not found
    header("Location: index.php?error=1");
    exit();
}

$stmt->close();
$conn->close();
?>
