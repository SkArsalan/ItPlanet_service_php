<?php

// Database connection
$servername = "http://193.203.184.233";
$username = "u217687379_rsms_db"; // Change as needed
$password = "Mafsu@123"; // Change as needed
$dbname = "u217687379_rsms_db"; // Change as needed

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>