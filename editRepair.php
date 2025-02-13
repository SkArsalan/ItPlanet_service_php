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

</head>

<body>
  
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
  
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
                            <form id="repairForm" class="form-horizontal" action="update_repair_details.php" method="POST">
                                <div class="card-body">
                                    <!-- Client and Receipt Info -->
                                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="client_name" class="control-label col-form-label">Client Name</label>
                                            <select class="form-control select2" id="client_name" name="client_id" required style="width: 100%;">
                                                <!-- Options loaded via AJAX -->
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="code" class="control-label col-form-label">Receipt No.</label>
                                            <input type="text" class="form-control" id="code" name="code" readonly>
                                        </div>
                                    </div>

                                    <!-- Services Section -->
                                    <div class="row">
    <!-- Services Section -->
    <div class="col-md-6">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="mb-0">Services</h4>
        <button type="button" class="btn btn-success" onclick="addServiceRow()">+</button>
    </div>
    <table class="table" id="servicesTable">
        <thead>
            <tr>
                <th>Service</th>
                <th>Cost</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Services will be loaded here -->
        </tbody>
        <tfoot>
            <tr>
                <td class="text-right"><strong>Total:</strong></td>
                <td class="totalCost">$0.00</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>



    <!-- Goods Section -->
    <div class="col-md-6">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="mb-0">Goods</h4>
        <button type="button" class="btn btn-success" onclick="addGoodsRow()">+</button>
    </div>
    <table class="table" id="goodsTable">
        <thead>
            <tr>
                <th>Material</th>
                <th>Cost</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Goods will be loaded here -->
        </tbody>
        <tfoot>
            <tr>
                <td class="text-right"><strong>Total:</strong></td>
                <td class="totalCost">$0.00</td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>

</div>



<div>
    <h4>Grand Total: <span id="grandTotalDisplay">$0.00</span></h4>
    <input type="hidden" id="grandTotalInput" name="grandTotal" value="0.00">
</div>




                                    <!-- Remarks Section -->
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="remarks" class="control-label col-form-label">Remarks</label>
                                            <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
                                        </div>
                                    </div>

                                    <!-- Payment Status and Amount -->
                                    <div class="form-group row">
    <div class="col-sm-6">
        <label for="payment_status" class="control-label col-form-label">Payment Status</label>
        <select class="form-control" id="payment_status" name="payment_status" onchange="updatePaidAmount()" readonly>
            <option value="0">Unpaid</option>
            <option value="1">Paid</option>
            <option value="2">Partial</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label for="paid_amount" class="control-label col-form-label">Paid Amount</label>
        <input type="text" class="form-control" id="paid_amount" name="paid_amount" placeholder="Enter Paid Amount">
    </div>
</div>

                                    <!-- Status Dropdown -->
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="status" class="control-label col-form-label">Status</label>
                                            <select class="form-control" id="status" name="status">
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



                                    <!-- Save Button -->
                                    <div class="form-group row">
                                        <div class="col-12 text-center">
                                            <button type="button" class="btn btn-primary" onclick="updateEditedData()">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</div>

<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="assets/extra-libs/sparkline/sparkline.js"></script>
<script src="dist/js/waves.js"></script>
<script src="dist/js/sidebarmenu.js"></script>
<script src="dist/js/custom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    loadEditData();
    initializeSelect2();

    $('#paid_amount').on('input', updatePaymentStatus);

    // Attach the event listener to cost inputs in both tables to update the payment status in real-time
    $('#servicesTable, #goodsTable').on('input', 'input[name$="_cost[]"]', function() {
        updateGrandTotal(); // Update grand total on any change in cost
        updatePaymentStatus(); // Up
});
});




function updatePaymentStatus() {
    // Get the current grand total dynamically
    const grandTotal = parseFloat($('#grandTotalInput').val()) || 0;
    let paidAmount = parseFloat($('#paid_amount').val()) || 0;  // Treat empty as 0

    // Ensure the paid amount does not exceed the grand total
    if (paidAmount > grandTotal) {
        paidAmount = grandTotal;
        $('#paid_amount').val(paidAmount.toFixed(2));  // Set input value to grand total
    }

    // Update payment status based on the paid amount
    if (paidAmount === grandTotal) {
        $('#payment_status').val("1");  // Paid
    } else if (paidAmount === 0) {
        $('#payment_status').val("0");  // Unpaid
    } else if (paidAmount > 0 && paidAmount < grandTotal) {
        $('#payment_status').val("2");  // Partial
    }
}






function loadEditData() {
    $.ajax({
        url: 'fetch_repair_details.php',
        type: 'POST',
        data: { id: <?php echo $id; ?> },
        dataType: 'json',
        success: function(response) {
            if (response.error) {
                alert(response.error);
            } else {
                $('#id').val(response.id);
                $('#code').val(response.code);
                $('#remarks').val(response.remarks);
                $('#paid_amount').val(response.paid_amount);
                $('#status').val(response.status);
                $('#payment_status').val(response.payment_status);

                if (response.client_id && response.client_name) {
                    const clientOption = new Option(response.client_name, response.client_id, true, true);
                    $('#client_name').append(clientOption).trigger('change');
                }

                populateTable('#servicesTable', response.services, 'service');
                populateTable('#goodsTable', response.goods, 'material');
                updateGrandTotal();
                updatePaidAmount();  // Call to ensure the Paid Amount field is updated correctly based on payment status
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
            alert('An error occurred while fetching repair details.');
        }
    });
}


function updateEditedData() {
    document.getElementById('repairForm').submit(); // Submit the form directly
}



function initializeSelect2() {
    $('#client_name').select2({
        placeholder: "Select Client",
        allowClear: true,
        ajax: {
            url: 'get_client_names_dropdown.php',
            type: 'GET',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return { q: params.term };
            },
            processResults: function (data) {
                return {
                    results: data.map(item => ({ id: item.id, text: item.text }))
                };
            },
            cache: true
        }
    });
}

function addServiceRow() {
    const newRow = $(`
        <tr>
            <td><input type="text" name="service[]" class="form-control" placeholder="Service"></td>
            <td><input type="number" name="service_cost[]" class="form-control" placeholder="Cost" step="0.01" oninput="updateGrandTotal()"></td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="removeItem(this)">X</button></td>
        </tr>
    `);
    $('#servicesTable tbody').append(newRow);
    updateGrandTotal();
}

function addGoodsRow() {
    const newRow = $(`
        <tr>
            <td><input type="text" name="material[]" class="form-control" placeholder="Material"></td>
            <td><input type="number" name="material_cost[]" class="form-control" placeholder="Cost" step="0.01" oninput="updateGrandTotal()"></td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="removeItem(this)">X</button></td>
        </tr>
    `);
    $('#goodsTable tbody').append(newRow);
    updateGrandTotal();
}


function populateTable(tableSelector, items, itemType) {
    const tableBody = $(tableSelector + ' tbody');
    tableBody.empty();
    let totalCost = 0;

    if (items && items.length > 0) {
        items.forEach(item => {
            const itemName = item.name || item.service || item.material; // Adjust according to your actual data
            const itemCost = item.cost || item.service_cost || item.material_cost; // Adjust according to your actual data
            
            const row = $(`
                <tr>
                    <td><input type="text" name="${itemType}[]" class="form-control" value="${itemName || ''}"></td>
                    <td><input type="number" name="${itemType}_cost[]" class="form-control" value="${itemCost || 0}" step="0.01" oninput="updateGrandTotal()"></td>
                    <td><button type="button" class="btn btn-danger btn-sm" onclick="removeItem(this)">X</button></td>
                </tr>
            `);
            tableBody.append(row);
            totalCost += parseFloat(itemCost) || 0;
        });
    } else {
        tableBody.append(`<tr><td colspan="3" class="text-center">No ${itemType}s added yet.</td></tr>`);
    }

    $(tableSelector + ' .totalCost').text(`$${totalCost.toFixed(2)}`);
    updateGrandTotal();
}


function removeItem(button) {
    $(button).closest('tr').remove(); // Remove the row
    updateGrandTotal(); // Update the grand total
    updatePaymentStatus(); // Update the payment status after the row is removed
}

function updateGrandTotal() {
    const totalServiceCost = calculateTotal('#servicesTable');
    const totalGoodsCost = calculateTotal('#goodsTable');
    const grandTotal = totalServiceCost + totalGoodsCost;

    $('#servicesTable .totalCost').text(`$${totalServiceCost.toFixed(2)}`);
    $('#goodsTable .totalCost').text(`$${totalGoodsCost.toFixed(2)}`);
    $('#grandTotalDisplay').text(`Grand Total: $${grandTotal.toFixed(2)}`);
    $('#grandTotalInput').val(grandTotal.toFixed(2));
}

// Helper function to calculate the total for a given table
function calculateTotal(tableSelector) {
    return $(tableSelector + ' tbody input[name$="_cost[]"]').toArray().reduce((sum, input) => {
        return sum + (parseFloat(input.value) || 0);
    }, 0);
}

</script>

</body>
</html>
