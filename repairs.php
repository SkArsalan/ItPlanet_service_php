

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
                        <?php
if (isset($_GET['success'])) {
    if ($_GET['success'] == "1") {
        echo "<div class='alert alert-success'>Operation completed successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>" . htmlspecialchars($_GET['message']) . "</div>";
    }
}
?>
                        <div class="card-body d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Repairs</h5>

<button class="btn btn-info" id="repair-form" type="button" onclick="window.location.href='addRepair.php'">+ Add Repair</button>





    </div>
                                <div class="table-responsive">
                                <?php


// session_start();

if (isset($_SESSION['error_message'])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
    unset($_SESSION['error_message']); // Clear the message after displaying it
}

if (isset($_SESSION['success_message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
    unset($_SESSION['success_message']); // Clear the message after displaying it
}
?>



                                    <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>receipt no</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Status</th>
                                            <th>Actions</th> <!-- New Column for Actions -->
                                        </tr>
                                    </thead>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
 <?php include('footer.php');?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
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
    $('#zero_config').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "fetch_repairs_data.php",
            "type": "POST",
            "data": function(d) {
                // Retrieve the "status" parameter from the URL (if any)
                var params = new URLSearchParams(window.location.search);
                d.status = params.get('status') || 'all'; // default to 'all' if not set
            }
        },
        "order": [[0, "desc"]],
        "columns": [
            { "data": 0 },  // id
            { "data": 1 },  // date_created
            { "data": 2 },  // code
            { "data": 3 },  // firstname
            { "data": 4 },  // lastname
            { "data": 5 },  // status
            { "data": null, // action buttons column
              "orderable": false,
              "render": function(data, type, row) {
                  // Adjust the buttons as needed for your application
                  return `<div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                  Actions
                              </button>
                              <div class="dropdown-menu">
                                  <button class="dropdown-item" onclick="redirectWithPost('viewRepair.php', ${row[0]})">View</button>
                                  <button class="dropdown-item" onclick="redirectWithPost('editRepair.php', ${row[0]})">Edit</button>
                                  <button class="dropdown-item" onclick="redirectWithPost('deleteRepair.php', ${row[0]})">Delete</button>
                              </div>
                          </div>`;
              }
            }
        ]
    });
  });
</script>

<script>
function redirectWithPost(url, id) {
    // Create a form element
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = url;

    // Add the hidden input field with the id value
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'id';
    input.value = id;
    form.appendChild(input);

    // Append form to the body and submit it
    document.body.appendChild(form);
    form.submit();
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

</body>
</html>