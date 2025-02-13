<?php

include 'config.php'; 

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/extra-libs/multicheck/multicheck.css">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<style>
        .receipt-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 5mm;
            width: 100%;
        }

        .receipt {
            border: 1px solid #000;
            padding: 5mm;
            box-sizing: border-box;
            height: 100%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            margin: 2mm;
            width: 100%;
        }

        h5 {
            font-size: 14pt;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
        }

        th,
        td {
            padding: 5px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Set a fixed width for the Fee column */
        th:nth-child(2),
        td:nth-child(2) {
            width: 200px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.min.js"></script>
</head>

<body>
    <div id="main-wrapper">
        <?php include('header.php'); ?>
        <?php include('sidebar.php'); ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <!-- Set full-width for the card -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                if (isset($_POST['id'])) {
                                    $repairId = $_POST['id'];
                                    $qry = $conn->prepare("SELECT r.*, CONCAT(c.lastname, ', ', c.firstname, ' ', c.middlename) AS client 
                                                            FROM `repair_list` r 
                                                            INNER JOIN client_list c ON r.client_id = c.id 
                                                            WHERE r.id = ?");
                                    $qry->bind_param("i", $repairId);
                                    $qry->execute();
                                    $result = $qry->get_result();

                                    if ($result->num_rows > 0) {
                                        $res = $result->fetch_assoc();
                                        foreach ($res as $key => $value) {
                                            if (!is_numeric($key)) {
                                                $$key = $value;
                                            }
                                        }
                                    } else {
                                        echo "<script>alert('Unknown Repair ID'); location.replace('./?page=repairs');</script>";
                                    }
                                } else {
                                    echo "<script>alert('Repair ID is required'); location.replace('./?page=repairs');</script>";
                                }
                                ?>
                                <div class="receipt-grid" id="receipt">
                                    <?php for ($i = 0; $i < 2; $i++): ?>
                                        <div class="receipt">
                                            <h5 class="card-title text-primary">Repair Receipt</h5>
                                            <table>
                                                <tr>
                                                    <th>Code</th>
                                                    <td><?= htmlspecialchars($code) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Client Name</th>
                                                    <td><?= ucwords(htmlspecialchars($client)) ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Payment Status</th>
                                                    <td><?= ($payment_status == 1) ? 'Paid' : (($payment_status == 0) ? 'Unpaid' : 'Partial') ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td><?= ['Pending', 'Checking', 'Pending Approval', 'In-Progress',  'Done', 'Delivered', 'Cancelled'][$status] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Remarks</th>
                                                    <td><?= nl2br(htmlspecialchars($remarks)) ?></td>
                                                </tr>
                                            </table>

                                           

                                            <h6>Custom Services</h6>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Service</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $custom_services = $conn->query("SELECT * FROM `custom_repair_services` WHERE repair_id = '{$repairId}'");
                                                    while ($row = $custom_services->fetch_assoc()): ?>
                                                        <tr>
                                                            <td><?= htmlspecialchars($row['service']) ?></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>

                                            <h6>Materials</h6>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Material Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $materials = $conn->query("SELECT * FROM `repair_materials` WHERE repair_id = '{$repairId}'");
                                                    while ($row = $materials->fetch_assoc()): ?>
                                                        <tr>
                                                            <td><?= htmlspecialchars($row['material']) ?></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endfor; ?>
                                </div>

                                <div class="text-center mt-4">
                                    <button class="btn btn-primary" onclick="printJS({ printable: 'receipt', type: 'html', targetStyles: ['*'] })">Print Receipt</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>


<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="assets/extra-libs/sparkline/sparkline.js"></script>
<script src="dist/js/waves.js"></script>
<script src="dist/js/sidebarmenu.js"></script>
<script src="dist/js/custom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


</body>
</html>
