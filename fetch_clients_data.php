<?php
// Start the session
// session_start();

// Include the config file for PDO connection
include('configpdo.php');

// Import the SSP class file
require('ssp.class.php');

// Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     // If not logged in, redirect to the login page
//     header("Location: index.php");
//     exit();
// }

// Table and primary key
$table = 'client_list';
$primaryKey = 'id'; // Assuming there is an 'id' as primary key, adjust if different

// Columns to display in the DataTable
$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'date_created', 'dt' => 1),
    array('db' => 'firstname', 'dt' => 2),
    array('db' => 'lastname', 'dt' => 3),
    array('db' => 'contact', 'dt' => 4),
    array('db' => 'email', 'dt' => 5),
);

// Add a where clause to filter by created_by session user_id
// $where = "created_by = " . intval($_SESSION['user_id']); // Assuming created_by is an integer

// Fetch data using SSP class with the complex method
echo json_encode(
    SSP::simple($_POST, $pdo, $table, $primaryKey, $columns)
);

?>
