

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






<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="clientModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-width1" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clientModalLabel">Client Information Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form starts here -->
                <form id="clientForm" class="form-horizontal" method="POST" action="submit_client_form1.php">
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






                        
                    <form id="clientPaymentForm" class="form-horizontal" method="POST" action="submit_client_payment_form.php">
                        <div class="card-body">
                           
                                 <!-- Dropdown with search input: Client Name -->
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="client_name" class="control-label col-form-label">Client Name</label>
                                        <select class="form-control select2" id="client_name" name="client_id" required style="width: 100%;">
                                            <!-- Options will be loaded via AJAX -->
                                        </select>
                                    </div>
                                    <div class="col-sm-6 d-flex align-items-end">
                                    <button class="btn btn-info" id="client-form" type="button" data-toggle="modal" data-target="#clientModal">+ Add Client</button>
                                    </div>
                                </div>




                            <div class="form-group row">
                            <!-- Services Section -->
                     <!-- Services Section -->
<div class="col-sm-6">
    <h5>Services</h5>
    <div class="form-group row">
        <div class="col-sm-6">
            <input type="text" class="form-control" id="service_name" placeholder="Service">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="service_cost" placeholder="Cost">
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" id="add_service">+</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="services_table">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Cost</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th id="services_total">0.00</th>
                    <th></th>
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
            <input type="text" class="form-control" id="goods_name" placeholder="Goods">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="goods_cost" placeholder="Cost">
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary" id="add_goods">+</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="goods_table">
            <thead>
                <tr>
                    <th>Goods</th>
                    <th>Cost</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <th id="goods_total">0.00</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


                                </div>

                                <input type="hidden" id="total_amount" name="total_amount" value="0.00">

                                <!-- Total Summary Table -->
                                <div class="table-responsive mt-3">
                                    <h5>Summary of Totals</h5>
                                            <table class="table table-bordered" id="summary_table">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Total Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Services Total</td>
                                                <td id="services_total_summary">0.00</td>
                                            </tr>
                                            <tr>
                                                <td>Goods Total</td>
                                                <td id="goods_total_summary">0.00</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Combined Total</strong></td>
                                                <td id="combined_total"><strong>0.00</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>









                                <script>
    // Function to calculate total cost for a table and update summary
    function calculateTotal(tableId, totalDisplayId) {
        let total = 0;
        document.querySelectorAll(`#${tableId} tbody tr`).forEach(row => {
            const cost = parseFloat(row.querySelector('td:nth-child(2)').textContent);
            if (!isNaN(cost)) total += cost;
        });
        document.getElementById(totalDisplayId).textContent = total.toFixed(2);
        updateCombinedTotal(); // Update combined total whenever a new entry is added
    }

    // Function to update the combined total
 // Function to update the combined total
function updateCombinedTotal() {
    const servicesTotal = parseFloat(document.getElementById('services_total').textContent) || 0;
    const goodsTotal = parseFloat(document.getElementById('goods_total').textContent) || 0;
    const combinedTotal = servicesTotal + goodsTotal;
    
    document.getElementById('combined_total').textContent = combinedTotal.toFixed(2);
    document.getElementById('services_total_summary').textContent = servicesTotal.toFixed(2);
    document.getElementById('goods_total_summary').textContent = goodsTotal.toFixed(2);
    
    // Update the hidden input field with the combined total
    document.getElementById('total_amount').value = combinedTotal.toFixed(2);
}


    // Add Service
    document.getElementById('add_service').addEventListener('click', function() {
        const serviceName = document.getElementById('service_name').value;
        const serviceCost = parseFloat(document.getElementById('service_cost').value);

        if (serviceName && !isNaN(serviceCost)) {
            const row = `<tr>
                <td>${serviceName}</td>
                <td>${serviceCost.toFixed(2)}</td>
                <td>
                    <input type="hidden" name="services[]" value="${serviceName}|${serviceCost.toFixed(2)}">
                    <button type="button" class="btn btn-danger btn-sm remove-service">X</button>
                </td>
            </tr>`;
            document.querySelector('#services_table tbody').insertAdjacentHTML('beforeend', row);
            calculateTotal('services_table', 'services_total');

            // Clear input fields after adding
            document.getElementById('service_name').value = '';
            document.getElementById('service_cost').value = '';
        }
    });

    // Add Goods
    document.getElementById('add_goods').addEventListener('click', function() {
        const goodsName = document.getElementById('goods_name').value;
        const goodsCost = parseFloat(document.getElementById('goods_cost').value);

        if (goodsName && !isNaN(goodsCost)) {
            const row = `<tr>
                <td>${goodsName}</td>
                <td>${goodsCost.toFixed(2)}</td>
                <td>
                    <input type="hidden" name="goods[]" value="${goodsName}|${goodsCost.toFixed(2)}">
                    <button type="button" class="btn btn-danger btn-sm remove-goods">X</button>
                </td>
            </tr>`;
            document.querySelector('#goods_table tbody').insertAdjacentHTML('beforeend', row);
            calculateTotal('goods_table', 'goods_total');

            // Clear input fields after adding
            document.getElementById('goods_name').value = '';
            document.getElementById('goods_cost').value = '';
        }
    });

    // Remove Service
    document.getElementById('services_table').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-service')) {
            e.target.closest('tr').remove();
            calculateTotal('services_table', 'services_total');
        }
    });

    // Remove Goods
    document.getElementById('goods_table').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-goods')) {
            e.target.closest('tr').remove();
            calculateTotal('goods_table', 'goods_total');
        }
    });
</script>









                        <!-- Remarks input textbox -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="remarks" class="control-label col-form-label">Remarks</label>
                                <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks" required>
                            </div>
                        </div>

                        <!-- Row with two inputs: Payment Status and Paid Amount -->
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="payment_status" class="control-label col-form-label">Payment Status</label>
                                <select class="form-control" id="payment_status" name="payment_status" required>
                                    <option value="0">Unpaid</option>
                                    <option value="1">Paid</option>
                                    <option value="2">Partial</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="paid_amount" class="control-label col-form-label">Paid Amount</label>
                                <input type="text" class="form-control" id="paid_amount" name="paid_amount" placeholder="Enter Paid Amount" readonly required>
                            </div>
                        </div>


                            <script>
                                document.getElementById('payment_status').addEventListener('change', function() {
                                    const paymentStatus = this.value;
                                    const paidAmountField = document.getElementById('paid_amount');
                                    const combinedTotal = parseFloat(document.getElementById('combined_total').textContent) || 0;

                                    if (paymentStatus === "0") { // Unpaid
                                        paidAmountField.value = "0.00";
                                        paidAmountField.readOnly = true;
                                    } else if (paymentStatus === "1") { // Paid
                                        paidAmountField.value = combinedTotal.toFixed(2);
                                        paidAmountField.readOnly = true;
                                    } else if (paymentStatus === "2") { // Partial
                                        paidAmountField.value = "";
                                        paidAmountField.readOnly = false;
                                    }
                                });

                                // Initial trigger to set Paid Amount on page load if necessary
                                document.getElementById('payment_status').dispatchEvent(new Event('change'));
                            </script>

                        <!-- Status Dropdown -->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="status" class="control-label col-form-label">Status</label>
                                <select class="form-control" id="status" name="status" required>
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

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="control-label col-form-label">Would you like to send a WhatsApp notification?</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="whatsapp_notification" id="whatsapp_yes" value="yes">
                                    <label class="form-check-label" for="whatsapp_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="whatsapp_notification" id="whatsapp_no" value="no" checked>
                                    <label class="form-check-label" for="whatsapp_no">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>


                    </div>
                </form>
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
         <button class="dropdown-item" type="button" data-toggle="modal" data-target="#updateModal" onclick="loadUpdateData(${row[0]})">Update status</button>
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
        url: 'view_aadharfree_data.php',
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
                const rationData = data; // Use data directly since it's already an object
                // Populate the modal fields with the fetched data
                document.getElementById('view_name').value = rationData.name;
                document.getElementById('view_hhid_no').value = rationData.hhid_ration_no;
                document.getElementById('view_aadhar_no').value = rationData.aadhar_no;
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
        url: 'edit_aadharfree_data.php',
        type: 'GET',
        data: { id: id },
        success: function(data) {
            console.log('Server Response:', data); // Log the response
            try {
                // Check if the response contains an error
                if (data.error) {
                    console.error(data.error);
                    showMessage('error', data.error); // Show error message in the modal
                    return; // Exit if there's an error
                }
                const rationData = data; // Use data directly since it's already an object
                // Populate the modal fields with the fetched data
                document.getElementById('edit_name').value = rationData.name;
                document.getElementById('edit_hhid_no').value = rationData.hhid_ration_no;
                document.getElementById('edit_aadhar_no').value = rationData.aadhar_no;
                document.getElementById('edit_id').value = id; // Hidden field for id
                $('#editMessage').hide(); // Hide message area when loading new data
            } catch (e) {
                console.error('Parsing error:', e);
                showMessage('error', 'Failed to parse data. Please try again.'); // Show parsing error
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });
}

// Function to handle form submission for editing
function submitEditForm() {
    const id = document.getElementById('edit_id').value;
    const name = document.getElementById('edit_name').value;
    const hhid_ration_no = document.getElementById('edit_hhid_no').value;
    const aadhar_no = document.getElementById('edit_aadhar_no').value;

    $.ajax({
        url: 'edit_aadharfree_data.php',
        type: 'POST',
        data: {
            id: id,
            name: name,
            hhid_ration_no: hhid_ration_no,
            aadhar_no: aadhar_no
        },
        success: function(data) {
            console.log('Server Response:', data); // Log the response
            try {
                // Ensure the response is in JSON format
                const response = typeof data === 'string' ? JSON.parse(data) : data;

                if (response.success) {
                    showMessage('success', response.success); // Show success message
                    setTimeout(() => {
                        $('#editModal').modal('hide'); // Close modal after 1500ms
                        location.reload(); // Refresh the data on the page
                    }, 1500); // 1500 milliseconds delay
                } else {
                    console.error(response.error);
                    showMessage('error', response.error); // Show error message
                }
            } catch (e) {
                console.error('Parsing error:', e);
                showMessage('error', 'Failed to parse response. Please try again.'); // Show parsing error
            }
        },
        error: function(xhr, status, error) {
            console.error('Error updating data:', error);
            showMessage('error', 'An error occurred while updating the data.'); // Show error message
        }
    });
}



// Function to show messages in the modal
function showMessage(type, message) {
    const messageDiv = $('#editMessage');
    messageDiv.removeClass('text-success text-danger').show(); // Clear previous classes
    if (type === 'success') {
        messageDiv.addClass('text-success').text(message);
    } else if (type === 'error') {
        messageDiv.addClass('text-danger').text(message);
    }
}









// Function to load data for HHID
function loadUpdateData(id) {
    $.ajax({
        url: 'update_aadhar_free_data.php',
        type: 'GET',
        data: { id: id },
        success: function(data) {
            console.log('Server Response:', data); // Log the response
            try {
                // Check if the response contains an error
                if (data.error) {
                    console.error(data.error);
                    showMessage('error', data.error); // Show error message in the modal
                    return; // Exit if there's an error
                }
                const rationData = data; // Use data directly since it's already an object
                // Populate the modal field with the fetched HHID data
                document.getElementById('update_hhid_ration_id').value = rationData.hhid;
                document.getElementById('update_id').value = id; // Hidden field for id

                // Set the selected status in the dropdown
                const statusDropdown = document.getElementById('statusDropdown');
                statusDropdown.value = rationData.status; // Set the selected status

                // Disable input if status is rejected
                if (rationData.status == '2') {
                    document.getElementById('update_hhid_ration_id').disabled = true;
                } else {
                    document.getElementById('update_hhid_ration_id').disabled = false;
                }

                $('#updateMessage').hide(); // Hide message area when loading new data
            } catch (e) {
                console.error('Parsing error:', e);
                showMessage('error', 'Failed to parse data. Please try again.'); // Show parsing error
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });
}

// Function to handle form submission for updating HHID
function submitUpdateForm() {
    const formData = new FormData();

    formData.append('id', document.getElementById('update_id').value);
    formData.append('hhid', document.getElementById('update_hhid_ration_id').value);
    formData.append('status', document.getElementById('statusDropdown').value); // Get status value

    $.ajax({
        url: 'update_aadhar_free_data.php',
        type: 'POST',
        data: formData,
        contentType: false, // Necessary for formData
        processData: false, // Necessary for formData
        success: function(data) {
            console.log('Server Response:', data);
            try {
                const response = typeof data === 'string' ? JSON.parse(data) : data;

                if (response.success) {
                    showMessage('success', response.success);
                    setTimeout(() => {
                        $('#updateModal').modal('hide');
                        location.reload();
                    }, 1500);
                } else {
                    console.error(response.error);
                    showMessage('error', response.error);
                }
            } catch (e) {
                console.error('Parsing error:', e);
                showMessage('error', 'Failed to parse response. Please try again.');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error updating data:', error);
            showMessage('error', 'An error occurred while updating the data.');
        }
    });
}

// Function to show messages in the modal
function showMessage(type, message) {
    const messageDiv = $('#updateMessage');
    messageDiv.removeClass('text-success text-danger').show(); // Clear previous classes
    if (type === 'success') {
        messageDiv.addClass('text-success').text(message);
    } else if (type === 'error') {
        messageDiv.addClass('text-danger').text(message);
    }
}



// Function to handle status change
function statusChange() {
    const statusDropdown = document.getElementById('statusDropdown');
    const hhidInput = document.getElementById('update_hhid_ration_id');

    if (statusDropdown.value === '2') {
        hhidInput.disabled = true; // Disable HHID input if rejected
        hhidInput.value = ''; // Clear the input
    } else {
        hhidInput.disabled = false; // Enable HHID input if approved
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
        url: 'delete_aadharfree_data.php',
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

<script>
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