

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

<style>
        .custom-modal-width {
            max-width: 800px; /* Set your desired width here */
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
                        <h5 class="card-title">Clients List</h5>
<!-- Ration Form Button -->
<!-- Button to trigger client modal -->
<button class="btn btn-info" id="client-form" type="button" data-toggle="modal" data-target="#clientModal">+ Add Client</button>

<!-- Client Information Modal -->
<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-width" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clientModalLabel">Client Information Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form starts here -->
                <form id="clientForm" class="form-horizontal" method="POST" action="submit_client_form.php">
                    <div class="card-body">
                        <h4 class="card-title">Client Details</h4>

                        <!-- Row with two inputs: First Name and Last Name -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="first_name" class="control-label col-form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="firstname" placeholder="Enter First Name" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="last_name" class="control-label col-form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="lastname" placeholder="Enter Last Name" required>
                            </div>
                        </div>

                        <!-- Row with two inputs: Phone Number and Email Address -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="phone_number" class="control-label col-form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="contact" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="email" class="control-label col-form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required>
                            </div>
                        </div>

                        <!-- Row with a single input: Address -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="address" class="control-label col-form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" placeholder="Enter Address" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Form ends here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="clientForm">Submit</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-width" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Client Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <h4 class="card-title">Client Details</h4>

                    <!-- Row with two inputs: First Name and Last Name -->
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="view_first_name" class="control-label col-form-label">First Name</label>
                            <input type="text" class="form-control" id="view_first_name" placeholder="First Name" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="view_last_name" class="control-label col-form-label">Last Name</label>
                            <input type="text" class="form-control" id="view_last_name" placeholder="Last Name" readonly>
                        </div>
                    </div>

                    <!-- Row with two inputs: Phone Number and Email Address -->
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="view_phone_number" class="control-label col-form-label">Phone Number</label>
                            <input type="text" class="form-control" id="view_phone_number" placeholder="Phone Number" readonly>
                        </div>
                        <div class="col-sm-6">
                            <label for="view_email" class="control-label col-form-label">Email Address</label>
                            <input type="text" class="form-control" id="view_email" placeholder="Email Address" readonly>
                        </div>
                    </div>

                    <!-- Single input for Address -->
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="view_address" class="control-label col-form-label">Address</label>
                            <textarea class="form-control" id="view_address" placeholder="Address" rows="3" readonly></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-width" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Client Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <h4 class="card-title">Edit Client Details</h4>
                    <div id="editMessage" class="alert" style="display: none;"></div> <!-- Message display area -->
                    <form id="editForm">
                        <input type="hidden" id="edit_id" />
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="edit_first_name">First Name</label>
                                <input type="text" class="form-control" id="edit_first_name" placeholder="First Name" required />
                            </div>
                            <div class="col-sm-6">
                                <label for="edit_last_name">Last Name</label>
                                <input type="text" class="form-control" id="edit_last_name" placeholder="Last Name" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="edit_phone_number">Phone Number</label>
                                <input type="text" class="form-control" id="edit_phone_number" placeholder="Phone Number" required />
                            </div>
                            <div class="col-sm-6">
                                <label for="edit_email">Email Address</label>
                                <input type="email" class="form-control" id="edit_email" placeholder="Email Address" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="edit_address">Address</label>
                                <textarea class="form-control" id="edit_address" placeholder="Address" rows="3" required></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitEditForm()">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this item?</p>
                <input type="hidden" id="delete_id" /> <!-- Hidden field to store the ID of the item to be deleted -->
                <div id="deleteMessage" style="display: none;"></div> <!-- Message display area -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
            </div>
        </div>
    </div>
</div>



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
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Contact</th>
                                            <th>Email</th>
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
   
    <script>
  $(document).ready(function() {
    $('#zero_config').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "fetch_clients_data.php",
            "type": "POST"
        },
        "order": [[0, "desc"]],
        "columnDefs": [
            {
                "targets": -1, // Target the last column (Action column)
                "data": null,  // No data from the server for this column
                "render": function(data, type, row) {
                    return `
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="actionMenu">
                           <button class="dropdown-item" type="button" data-toggle="modal" data-target="#viewModal" onclick="loadViewData(${row[0]})">View</button>
    
    <!-- Edit Button with Modal -->
    <button class="dropdown-item" type="button" data-toggle="modal" data-target="#editModal" onclick="loadEditData(${row[0]})">Edit</button>
    
    <!-- Delete Button with Modal -->
    <button class="dropdown-item" type="button" data-toggle="modal" data-target="#deleteModal" onclick="prepareDelete(${row[0]})">Delete</button>
</div>

<!-- Modals -->
                            </div>
                        </div>`;
                }
            }
        ]
    });
});



function loadViewData(id) {
    $.ajax({
        url: 'view_clients_data.php',
        type: 'GET',
        data: { id: id },
        success: function(data) {
            console.log('Server Response:', data); // Log the response
            try {
                // Check if the response contains an error
                if (data.error) {
                    console.error(data.error);
                    alert(data.error); // Alert the error to the user
                    return; // Exit if there's an error
                }
                // Populate the modal fields with the fetched data
                document.getElementById('view_first_name').value = data.firstname; // Adjusted key
                document.getElementById('view_last_name').value = data.lastname;   // Adjusted key
                document.getElementById('view_phone_number').value = data.contact; // Adjusted key
                document.getElementById('view_email').value = data.email; // Adjusted key
                document.getElementById('view_address').value = data.address; // Adjusted key
            } catch (e) {
                console.error('Parsing error:', e);
                alert('Failed to parse data. Please try again.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });
}



function loadEditData(id) {
    $.ajax({
        url: 'edit_client_data.php',
        type: 'GET',
        data: { id: id },
        success: function(data) {
            try {
                if (data.error) {
                    showMessage('error', data.error);
                    return;
                }
                const clientData = data;
                document.getElementById('edit_first_name').value = clientData.firstname;
                document.getElementById('edit_last_name').value = clientData.lastname;
                document.getElementById('edit_phone_number').value = clientData.contact;
                document.getElementById('edit_email').value = clientData.email;
                document.getElementById('edit_address').value = clientData.address;
                document.getElementById('edit_id').value = id;
                $('#editMessage').hide(); // Hide message when loading new data
            } catch (e) {
                showMessage('error', 'Failed to parse data. Please try again.');
            }
        },
        error: function(xhr, status, error) {
            showMessage('error', 'Failed to fetch client data.');
        }
    });
}

function submitEditForm() {
    const id = document.getElementById('edit_id').value;
    const first_name = document.getElementById('edit_first_name').value;
    const last_name = document.getElementById('edit_last_name').value;
    const phone_number = document.getElementById('edit_phone_number').value;
    const email = document.getElementById('edit_email').value;
    const address = document.getElementById('edit_address').value;

    $.ajax({
        url: 'edit_client_data.php',
        type: 'POST',
        data: {
            id: id,
            firstname: first_name,
            lastname: last_name,
            contact: phone_number,
            email: email,
            address: address
        },
        success: function(data) {
            try {
                const response = typeof data === 'string' ? JSON.parse(data) : data;
                if (response.success) {
                    showMessage('success', response.success);
                    setTimeout(() => {
                        $('#editModal').modal('hide');
                        location.reload();
                    }, 1500);
                } else {
                    showMessage('error', response.error);
                }
            } catch (e) {
                showMessage('error', 'Failed to parse response. Please try again.');
            }
        },
        error: function(xhr, status, error) {
            showMessage('error', 'An error occurred while updating the data.');
        }
    });
}

function showMessage(type, message) {
    const messageDiv = $('#editMessage');
    messageDiv.removeClass('alert-success alert-danger').hide(); // Clear previous classes
    if (type === 'success') {
        messageDiv.addClass('alert alert-success').text(message).show(); // Show success message
    } else if (type === 'error') {
        messageDiv.addClass('alert alert-danger').text(message).show(); // Show error message
    }
}



function prepareDelete(id) {
    // Set the ID of the item to be deleted in the hidden input field
    $('#delete_id').val(id);

    // Show the delete modal
    $('#deleteModal').modal('show');
}

function confirmDelete() {
    const id = $('#delete_id').val(); // Get the ID from the hidden input
    deleteRecord(id); // Call the delete function with the ID
}

function deleteRecord(id) {
    $.ajax({
        url: 'delete_client_data.php',
        type: 'POST',
        data: { id: id },
        success: function(data) {
            console.log('Server Response:', data);
            const messageDiv = $('#deleteMessage');
            messageDiv.show(); // Show the message area
            try {
                const response = JSON.parse(data);
                if (response.success) {
                    messageDiv.removeClass('text-danger').addClass('text-success').text(response.success);
                    // Optionally, you could close the modal after a brief delay and refresh the page
                    setTimeout(() => {
                        $('#deleteModal').modal('hide');
                        location.reload(); // Refresh the page after a short delay
                    }, 1500); // Adjust the delay as needed
                } else {
                    messageDiv.removeClass('text-success').addClass('text-danger').text(response.error);
                }
            } catch (e) {
                console.error('Parsing error:', e);
                messageDiv.removeClass('text-success').addClass('text-danger').text('Failed to parse response. Please try again.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error deleting data:', error);
            $('#deleteMessage').show().removeClass('text-success').addClass('text-danger').text('An error occurred while deleting. Please try again.');
        }
    });
}


</script>

</body>
</html>