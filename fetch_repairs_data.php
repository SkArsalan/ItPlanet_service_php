<?php
// Include the PDO configuration file (make sure this file sets up your $pdo object)
include('configpdo.php');

// Retrieve DataTables parameters
$draw        = isset($_POST['draw'])   ? intval($_POST['draw']) : 0;
$start       = isset($_POST['start'])  ? intval($_POST['start']) : 0;
$length      = isset($_POST['length']) ? intval($_POST['length']) : 10;
$searchValue = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';

// Determine the "status" filter from either POST (DataTables sends it) or GET (from the URL)
if (isset($_POST['status'])) {
    $statusParam = $_POST['status'];
} elseif (isset($_GET['status'])) {
    $statusParam = $_GET['status'];
} else {
    $statusParam = 'all';
}

// Map the human-readable status strings to the numeric values used in your database
$statusMap = [
    'pending'          => 0,
    'pending_approval' => 1,
    'in_progress'      => 2,
    'checking'         => 3,
    'done'             => 4,
    'cancelled'        => 5,
    'delivered'        => 6
];

// Prepare the filtering part of the SQL
$filterSQL = "";
$params = [];

// If the status is not "all" and is valid, add a filter clause
if (strtolower($statusParam) !== 'all' && isset($statusMap[strtolower($statusParam)])) {
    $filterSQL .= " WHERE repair_list.status = :status ";
    $params[':status'] = $statusMap[strtolower($statusParam)];
}

// If there is a search value, add a search clause (appending with AND if needed)
if (!empty($searchValue)) {
    if ($filterSQL === "") {
        $filterSQL .= " WHERE ";
    } else {
        $filterSQL .= " AND ";
    }
    $filterSQL .= " (repair_list.code LIKE :search 
                      OR client_list.firstname LIKE :search 
                      OR client_list.lastname LIKE :search) ";
    $params[':search'] = "%$searchValue%";
}

// Build the main query (we use a LEFT JOIN to get client names)
$sql = "SELECT repair_list.id, repair_list.date_created, repair_list.code, 
               client_list.firstname, client_list.lastname, repair_list.status 
        FROM repair_list 
        LEFT JOIN client_list ON repair_list.client_id = client_list.id 
        $filterSQL";

// First, get total records count (without LIMIT)
$stmtTotal = $pdo->prepare($sql);
foreach ($params as $key => $value) {
    // Bind the :status parameter as integer, others normally
    if ($key === ':status') {
        $stmtTotal->bindValue($key, $value, PDO::PARAM_INT);
    } else {
        $stmtTotal->bindValue($key, $value);
    }
}
$stmtTotal->execute();
$totalRecords = $stmtTotal->rowCount();

// Now add ordering and pagination – for simplicity we order by id descending
$sql .= " ORDER BY repair_list.id DESC LIMIT :start, :length";

$stmt = $pdo->prepare($sql);

// Bind the filter parameters again
foreach ($params as $key => $value) {
    if ($key === ':status') {
        $stmt->bindValue($key, $value, PDO::PARAM_INT);
    } else {
        $stmt->bindValue($key, $value);
    }
}
$stmt->bindValue(':start', $start, PDO::PARAM_INT);
$stmt->bindValue(':length', $length, PDO::PARAM_INT);

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Map numeric status codes to human-readable labels
$statusLabels = [
    0 => 'Pending',
    1 => 'Pending Approval',
    2 => 'In Progress',
    3 => 'Checking',
    4 => 'Done',
    5 => 'Cancelled',
    6 => 'Delivered'
];

// Prepare data in the format DataTables expects
$outputData = [];
foreach ($data as $row) {
    // Replace the numeric status with its label if available
    $row['status'] = isset($statusLabels[$row['status']]) ? $statusLabels[$row['status']] : $row['status'];
    // Convert associative array to an indexed array (DataTables can work with both formats,
    // but often the indexed array is preferred when using "columns.data" as integers)
    $outputData[] = array_values($row);
}

$response = [
    "draw"            => $draw,
    "recordsTotal"    => $totalRecords,
    "recordsFiltered" => $totalRecords,
    "data"            => $outputData
];

echo json_encode($response);
?>
