<?php
// viewRepair.php

// Include database connection
include 'config.php'; // Adjust this path according to your setup

// Check if an ID was passed
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
        .custom-modal-width {
            max-width: 800px; /* Set your desired width here */
        }

        .custom-modal-width1 {
            max-width: 400px; /* Set your desired width here */
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
       <?php include('header.php'); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       <?php include('sidebar.php'); ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Tables</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <form id="repairForm" class="form-horizontal">
                    <div class="card-body">
                        <!-- Client and Receipt Info -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="client_name" class="control-label col-form-label">Client Name</label>
                                <select class="form-control select2" id="client_name" name="client_id" required style="width: 100%;" disabled>
                                    <!-- Options loaded via AJAX -->
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="code" class="control-label col-form-label">Receipt No.</label>
                                <input type="text" class="form-control" id="code" name="paid_amount" readonly>
                            </div>
                        </div>

                        <!-- Services and Goods Sections -->
                        <div class="form-group row">
                            <!-- Services Section -->
                            <div class="col-sm-6">
                                <h5>Services</h5>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="service_name" placeholder="Service" disabled>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="service_cost" placeholder="Cost" disabled>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary" id="add_service" disabled>+</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="servicesTable" class="table">
    <thead>
        <tr>
            <th>Service</th>
            <th>Cost</th>
            <th class=text-right>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Dynamic rows added here by JS -->
    </tbody>
    <tfoot>
        <tr>
            <td colspan="1" class="text-right"><strong>Total Service Cost:</strong></td>
            <td class="totalServiceCost">$0.00</td>
        </tr>
    </tfoot>
</table>
                                </div>
                            </div>

                            <!-- Goods Section -->
                            <div class="col-sm-6">
                                <h5>Goods</h5>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="goods_name" placeholder="Goods" disabled>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="goods_cost" placeholder="Cost" disabled>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary" id="add_goods" disabled>+</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                   <table id="goodsTable" class="table">
    <thead>
        <tr>
            <th>Material</th>
            <th>Cost</th>
            <th  class=text-right>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Dynamic rows added here by JS -->
    </tbody>
    <tfoot>
        <tr>
            <td colspan="1" class="text-right"><strong>Total Goods Cost:</strong></td>
            <td class="totalGoodsCost">$0.00</td>
        </tr>
    </tfoot>
</table>
                                </div>
                            </div>
                        </div>




<div>
    <h4>Grand Total: <span id="grandTotal">$0.00</span></h4>
</div>



                        <!-- Remarks Section -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="remarks" class="control-label col-form-label">Remarks</label>
                                <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks" disabled>
                            </div>
                        </div>

                        <!-- Payment Status and Amount -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="payment_status" class="control-label col-form-label">Payment Status</label>
                                <select class="form-control" id="payment_status" name="payment_status" disabled>
                                    <option value="0">Unpaid</option>
                                    <option value="1">Paid</option>
                                    <option value="2">Partial</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="paid_amount" class="control-label col-form-label">Paid Amount</label>
                                <input type="text" class="form-control" id="paid_amount" name="paid_amount" placeholder="Enter Paid Amount" disabled>
                            </div>
                        </div>

                        <!-- Status Dropdown -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="status" class="control-label col-form-label">Status</label>
                                <select class="form-control" id="status" name="status" disabled>
                                    <option value="0">Pending</option>
                                    <option value="1">Checking</option>
                                    <option value="2">Pending Approval</option>
                                    <option value="3">In Progress</option>
                                    <option value="4">Done</option>
                                    <option value="5">Delivered</option>
                                    <option value="6">Cancelled</option>
                                </select>
                            </div>
                        </div>

                        <!-- Back Button -->
                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Back</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!-- </div>
</div> -->



 
            <?php include('footer.php');?>
            
        </div>
    </div>


<script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $.ajax({
        url: 'fetch_repair_details.php',
        type: 'POST',
        data: { id: <?php echo $id; ?> },
        dataType: 'json',
        success: function(response) {
            if (response.error) {
                alert(response.error);
            } else {
                $('#code').val(response.code);
                $('#remarks').val(response.remarks);
                $('#total_amount').val(response.total_amount);
                $('#paid_amount').val(response.paid_amount);
                $('#status').val(response.status);
                $('#payment_status').val(response.payment_status);
                $('#date_created').val(response.date_created);
                $('#date_updated').val(response.date_updated);

                if (response.client_id && response.client_name) {
                    const clientOption = new Option(response.client_name, response.client_id, true, true);
                    $('#client_name').append(clientOption).trigger('change');
                }

                // Populate services table and calculate total service cost
                let totalServiceCost = 0;
                $('#servicesTable tbody').empty();
                if (response.services && response.services.length > 0) {
                    response.services.forEach(function(service) {
                        $('#servicesTable tbody').append(
                            '<tr><td>' + service.service + '</td><td>' + service.cost.toFixed(2) + '</td>' +
                            '<td class=text-right><button class="btn btn-danger btn-sm" disabled>X</button></td></tr>'
                        );
                        totalServiceCost += parseFloat(service.cost);
                    });
                } else {
                    $('#servicesTable tbody').append('<tr><td colspan="3">No services available.</td></tr>');
                }
                $('#servicesTable tfoot .totalServiceCost').text('' + totalServiceCost.toFixed(2));

                // Populate goods table and calculate total goods cost
                let totalGoodsCost = 0;
                $('#goodsTable tbody').empty();
                if (response.goods && response.goods.length > 0) {
                    response.goods.forEach(function(good) {
                        $('#goodsTable tbody').append(
                            '<tr><td>' + good.material + '</td><td>' + good.cost.toFixed(2) + '</td>' +
                            '<td class=text-right><button class="btn btn-danger btn-sm" disabled>X</button></td></tr>'
                        );
                        totalGoodsCost += parseFloat(good.cost);
                    });
                } else {
                    $('#goodsTable tbody').append('<tr><td colspan="3">No goods available.</td></tr>');
                }
                $('#goodsTable tfoot .totalGoodsCost').text('' + totalGoodsCost.toFixed(2));

                // Calculate and display grand total
                let grandTotal = totalServiceCost + totalGoodsCost;
                $('#grandTotal').text('' + grandTotal.toFixed(2));
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('An error occurred while fetching repair details.');
        }
    });
});

// Initialize Select2 for client name
$('#client_name').select2({
    placeholder: "Select Client",
    allowClear: true,
    ajax: {
        url: 'get_client_names_dropdown.php',
        type: 'GET',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term // search term
            };
        },
        processResults: function (data) {
            return {
                results: data.map(item => ({
                    id: item.id,
                    text: item.text
                }))
            };
        },
        cache: true
    }
});
</script>



</body>
</html>
