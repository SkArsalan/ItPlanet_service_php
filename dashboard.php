<?php
session_start();

// Check if session variables are set
if (!isset($_SESSION['user_id']) || !isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    // Redirect to index.php if session variables are not set
    header("Location: index.php");
    exit(); // Make sure no further code is executed after redirection
}
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/fav.svg">
    <title>Dashboard | IT Planet</title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="https://cdn.materialdesignicons.com/6.2.95/css/materialdesignicons.min.css" rel="stylesheet">


<style>
/* Slim Card Style */
.slim-card .box {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    padding: 10px;           /* Small padding for compactness */
    border-radius: 5px;      /* Soft rounded corners */
    min-height: 80px;
    position: relative;
}

.icon-container {
    font-size: 1.5rem;       /* Icon size */
    margin-right: 10px;      /* Space between icon and content */
}

.content-container h6 {
    font-size: 0.9rem;       /* Smaller text size for titles */
    margin: 0;
    color: white;
}

.count-container {
    position: absolute;
    bottom: 5px;
    right: 10px;
    font-size: 0.8rem;       /* Smaller text size for count */
    color: white;
}

.bg-light-green {
    background-color: #4caf50; /* Green shade */
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
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
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
            </div>

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
               <!-- HTML -->
               <?php
// Database connection
include('config.php');

// Function to get count based on status
function getRepairCount($status) {
    global $conn;
    $sql = "SELECT COUNT(*) AS count FROM repair_list WHERE status = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $status);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['count'];
}

// Counts for each repair status
$pendingCount = getRepairCount(0);
$pendingApprovalCount = getRepairCount(1);
$inProgressCount = getRepairCount(2);
$checkingCount = getRepairCount(3);
$doneCount = getRepairCount(4);
$deliveredCount = getRepairCount(6);
$cancelledCount = getRepairCount(5);

// Close connection
$conn->close();
?>

<div class="row">
    <!-- Repair List -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
        <a href="repairs.php?status=all" class="card card-hover slim-card">
            <div class="box bg-primary d-flex align-items-center">
                <div class="icon-container">
                    <i class="mdi mdi-wrench text-white"></i>
                </div>
                <div class="content-container flex-grow-1">
                    <h6 class="text-white mb-1">Repair List</h6>
                </div>
                <div class="count-container">
                    <span class="text-white"><?php echo $pendingCount + $pendingApprovalCount + $inProgressCount + $checkingCount + $doneCount + $deliveredCount + $cancelledCount; ?></span>
                </div>
            </div>
        </a>
    </div>

    <!-- Pending Repairs -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
        <a href="repairs.php?status=pending" class="card card-hover slim-card">
            <div class="box bg-secondary d-flex align-items-center">
                <div class="icon-container">
                    <i class="mdi mdi-clock-outline text-white"></i>
                </div>
                <div class="content-container flex-grow-1">
                    <h6 class="text-white mb-1">Pending Repairs</h6>
                </div>
                <div class="count-container">
                    <span class="text-white"><?php echo $pendingCount; ?></span>
                </div>
            </div>
        </a>
    </div>

    <!-- Checking Repairs -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
        <a href="repairs.php?status=checking" class="card card-hover slim-card">
            <div class="box bg-warning d-flex align-items-center">
                <div class="icon-container">
                    <i class="mdi mdi-magnify text-white"></i>
                </div>
                <div class="content-container flex-grow-1">
                    <h6 class="text-white mb-1">Checking Repairs</h6>
                </div>
                <div class="count-container">
                    <span class="text-white"><?php echo $checkingCount; ?></span>
                </div>
            </div>
        </a>
    </div>

    <!-- Pending Approval -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
        <a href="repairs.php?status=pending_approval" class="card card-hover slim-card">
            <div class="box bg-info d-flex align-items-center">
                <div class="icon-container">
                    <i class="mdi mdi-alert-circle-outline text-white"></i>
                </div>
                <div class="content-container flex-grow-1">
                    <h6 class="text-white mb-1">Pending Approval</h6>
                </div>
                <div class="count-container">
                    <span class="text-white"><?php echo $pendingApprovalCount; ?></span>
                </div>
            </div>
        </a>
    </div>

    <!-- In-Progress Repairs -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
        <a href="repairs.php?status=in_progress" class="card card-hover slim-card">
            <div class="box bg-cyan d-flex align-items-center">
                <div class="icon-container">
                    <i class="mdi mdi-progress-wrench text-white"></i>
                </div>
                <div class="content-container flex-grow-1">
                    <h6 class="text-white mb-1">In-Progress Repairs</h6>
                </div>
                <div class="count-container">
                    <span class="text-white"><?php echo $inProgressCount; ?></span>
                </div>
            </div>
        </a>
    </div>

    <!-- Done Repairs -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
        <a href="repairs.php?status=done" class="card card-hover slim-card">
            <div class="box bg-success d-flex align-items-center">
                <div class="icon-container">
                    <i class="mdi mdi-check-circle text-white"></i>
                </div>
                <div class="content-container flex-grow-1">
                    <h6 class="text-white mb-1">Done Repairs</h6>
                </div>
                <div class="count-container">
                    <span class="text-white"><?php echo $doneCount; ?></span>
                </div>
            </div>
        </a>
    </div>

    <!-- Delivered -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
        <a href="repairs.php?status=delivered" class="card card-hover slim-card">
            <div class="box bg-success d-flex align-items-center">
                <div class="icon-container">
                    <i class="mdi mdi-truck-delivery text-white"></i>
                </div>
                <div class="content-container flex-grow-1">
                    <h6 class="text-white mb-1">Delivered</h6>
                </div>
                <div class="count-container">
                    <span class="text-white"><?php echo $deliveredCount; ?></span>
                </div>
            </div>
        </a>
    </div>

    <!-- Cancelled Repairs -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-2">
        <a href="repairs.php?status=cancelled" class="card card-hover slim-card">
            <div class="box bg-danger d-flex align-items-center">
                <div class="icon-container">
                    <i class="mdi mdi-close-circle text-white"></i>
                </div>
                <div class="content-container flex-grow-1">
                    <h6 class="text-white mb-1">Cancelled Repairs</h6>
                </div>
                <div class="count-container">
                    <span class="text-white"><?php echo $cancelledCount; ?></span>
                </div>
            </div>
        </a>
    </div>
</div>


                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Site Analysis</h4>
                                        <h5 class="card-subtitle">Overview of Latest Month</h5>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <!-- column -->
                                    <!-- <div class="col-lg-9">
                                        <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-line-chart"></div>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-user m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">2540</h5>
                                                   <small class="font-light">Total Users</small>
                                                </div>
                                            </div>
                                             <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-plus m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">120</h5>
                                                   <small class="font-light">New Users</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">656</h5>
                                                   <small class="font-light">Total Shop</small>
                                                </div>
                                            </div>
                                             <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-tag m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">9540</h5>
                                                   <small class="font-light">Total Orders</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-table m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">100</h5>
                                                   <small class="font-light">Pending Orders</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                   <i class="fa fa-globe m-b-5 font-16"></i>
                                                   <h5 class="m-b-0 m-t-5">8540</h5>
                                                   <small class="font-light">Online Orders</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- column -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           <?php include('footer.php'); ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>

</body>

</html>