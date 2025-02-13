<?php
// Database connection using PDO
$servername = "localhost";
$username = "u217687379_rsms_db"; // Your username
$password = "Mafsu@123"; // Your password
$dbname = "u217687379_rsms_db"; // Your database name

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
