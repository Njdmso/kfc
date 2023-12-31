<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        .container {
            margin-top: 80px;
        }

        .container-fluid {
            padding-left: 0;
            padding-right: 0;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
        }

        .logoutlink {
            color: white;
            margin-left: -500px;
        }

        .sidebar {
            position: fixed;
            top: 56px;
            /* Height of the top navbar */
            left: 0;
            height: 100%;
            width: 200px;
            background-color: #E4002B;
            color: #fff;
            padding-top: 20px;
            padding-top: 50px;
        }

        .sidebar-link {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
        }

        .content {
            flex-grow: 1;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .sidebar .nav-item a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
        }

        .nav-item:hover {
            background-color: #343A40;
        }

        .sub-nav {
            display: none;
        }

        .nav-item:hover .sub-nav {
            display: block;
        }

        .sub-nav li a {
            display: flex;
            align-items: center;
            color: #000;
            transition: background-color 0.3s ease;
            padding: 5px;
            font-size: 14px;
            text-decoration: none;
        }

        .sub-nav a:hover {
            background-color: black;
        }

        .sub-nav li a i {
            margin-right: 10px;
        }
    </style>

</head>

<body>


    <div class="content">
        <nav class="navbar navbar-dark bg-dark">
            <img src="https://www.kfc.com.ph/Content/OnlineOrderingImages/Shared/logo.svg"
                style="width: 60px; height: auto; margin-left: 50px;">
            <a class="navbar-brand" href="#"></a>
            <a class="text-white"><i class="fas fa-user"></i>
                <?php echo $user['role']; ?>
            </a>
            <a class="logoutlink" href="<?php echo site_url('dashboard/logout'); ?>"><i class="fas fa-sign-out-alt"></i>
                Logout</a>
        </nav>

        <div class="sidebar">
            <ul class="navbar-nav">
                <?php if ($user['role'] === 'admin'): ?>
                    <li class="nav-item">
                        <a class="sidebar-link" href="<?php echo site_url('dashboard'); ?>"><i class="fas fa-chart-bar"></i>
                            Dashboard</a>
                    </li>
                <?php endif; ?>

                <?php if ($user['role'] === 'admin'): ?>
                    <li class="nav-item">
                        <a class="sidebar-link" href="<?php echo site_url('user'); ?>"><i class="fas fa-users"></i> Manage
                            Users</a>
                    </li>
                <?php endif; ?>

                <?php if ($user['role'] === 'admin' || $user['role'] === 'hr'): ?>
                    <li class="nav-item">
                        <a class="sidebar-link" href="#"><i class="fa fa-user-tie"></i> HRM</a>
                        <ul class="sub-nav">
                            <a class="sidebar-link" href="<?php echo site_url('employee'); ?>"><i class="fa fa-users"></i>
                                Employees</a>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($user['role'] === 'admin' || $user['role'] === 'manager'): ?>
                    <li class="nav-item">
                        <a class="sidebar-link" href="<?php echo site_url('productsource'); ?>"><i
                                class="fa fa-plus-square"></i> Productsource</a>
                    </li>
                <?php endif; ?>

                <?php if ($user['role'] === 'admin' || $user['role'] === 'manager'): ?>
                    <li class="nav-item">
                        <a class="sidebar-link" href="#"><i class="fa fa-warehouse"></i> Manage Inventory</a>
                        <ul class="sub-nav">
                            <a class="sidebar-link" href="<?php echo site_url('product'); ?>"><i
                                    class="fa fa-layer-group"></i>
                                Invetory</a>
                            <a class="sidebar-link" href="<?php echo site_url('purchase'); ?>"><i class="fa fa-store"></i>
                                Purchase</a>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($user['role'] === 'admin' || $user['role'] === 'cashier'): ?>
                    <li class="nav-item">
                        <a class="sidebar-link" href="<?php echo site_url('sale'); ?>"><i class="fas fa-dollar-sign"></i>
                            Sales</a>
                    </li>
                <?php endif; ?>

                <?php if ($user['role'] === 'admin' || $user['role'] === 'accountant'): ?>
                    <li class="nav-item">
                        <a class="sidebar-link" href="#"><i class="fas fa-money-check"></i> Accounting</a>
                        <ul class="sub-nav">
                            <a class="sidebar-link" href="<?php echo site_url('pay'); ?>"><i class="fas fa-money-bill"></i>
                                Payment
                                Proccessing</a>
                            <a class="sidebar-link" href="<?php echo site_url('buy'); ?>"><i class="fa fa-credit-card"></i>
                                Buys</a>
                            <a class="sidebar-link" href="<?php echo site_url('order'); ?>"><i class="fa fa-cart-plus"></i>
                                Orders</a>
                            <a class="sidebar-link" href="<?php echo site_url('payroll'); ?>"><i class="fa fa-coins"></i>
                                Payroll</a>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($user['role'] === 'admin'): ?>
                    <li class="nav-item">
                        <a class="sidebar-link" href="#"><i class="fa fa-chart-bar"></i> Report</a>
                        <ul class="sub-nav">
                            <a class="sidebar-link" href="<?php echo site_url('analytics'); ?>"><i
                                    class="fa fa-chart-bar"></i> Data
                                Analytics Sales</a>
                            <a class="sidebar-link" href="<?php echo site_url('expense'); ?>"><i
                                    class="fa fa-chart-bar"></i> Data
                                Analytics Expenses</a>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($user['role'] === 'admin'): ?>
                    <li class="nav-item">
                        <a class="sidebar-link" href="<?php echo site_url('auditlog'); ?>"><i class="fa fa-flag"></i>
                            Auditlogs</a>
                    </li>
                <?php endif; ?>

                <?php if ($user['role'] === 'admin'): ?>
                    <li class="nav-item">
                        <a class="sidebar-link"
                            href="http://192.168.10.128/RBBI/index.php/login/bank?url=<?php echo site_url('dashboard'); ?>"><i
                                class="fa fa-piggy-bank"></i> Bank Account</a>
                    </li>
                <?php endif; ?>

                <?php if ($user['role'] === 'admin'): ?>
                    <li class="nav-item">
                        <a class="sidebar-link" href="<?php echo site_url('others'); ?>"><i class="fa fa-bars"></i>
                            Others</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Search Bar -->
                <form action="<?php echo site_url('sale/search'); ?>" method="post" class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Products" name="keyword">
                        <div classclass="input-group-append">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </div>
                </form>

                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Sale ID</th>
                            <th>img</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sales as $sale): ?>
                            <tr>
                                <td>
                                    <?php echo $sale['sale_id']; ?>
                                </td>
                                <td>
                                    <div>
                                        <img style='width: 50px; height: auto;'
                                            src="<?php echo UPLOADS_BASE_URL . $sale['img']; ?>" />
                                    </div>
                                </td>

                                <td>
                                    <?php echo $sale['name']; ?>
                                </td>
                                <td>
                                    <?php echo $sale['price']; ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary add-to-order"
                                        data-product-id="<?php echo $sale['sale_id']; ?>"
                                        data-product-name="<?php echo $sale['name']; ?>"
                                        data-product-price="<?php echo $sale['price']; ?>">Add to Order</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <form id='sale_add' action="<?php echo site_url('sale/add'); ?>" method="POST">
                    <!-- <input type="text" for="customer" id="customer" name="customer" class="form-control"
                        placeholder="Customer Name"> -->
                    <input type="hidden" id="cashier" name="cashier" value="<?php echo $user['name'] ?>">
                    <h1>Orders List</h1>
                    <div class="orders">
                        <table class="table table-bordered table-striped receipt-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Totalprice</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="orders-table-body">
                                <!-- Orders content goes here -->
                            </tbody>
                        </table>
                    </div>
                    <div class="receipt-footer">
                        <div class="total-label">Total:</div>
                        <div class="total-value" id="total-value">0.00</div>
                    </div>
                    <div class="list-footer">
                        <input type="hidden" id="order-data" name="order_data">
                        <button class="btn btn-primary" action="" id="pay-button" type="submit">Pay</button>
                        <a type="button" class="btn btn-primary" id="pay-rbbi-button" href="#"><i
                                class="fas fa-edit"></i>Pay with RBBI</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            var originalTable = $('#product-table tbody').html(); // Store the original table HTML
            var orders = []; // Array to store the orders


            var result = <?php echo json_encode($_GET); ?>;

            if (result.success) {

                orders = JSON.parse(window.atob(result.data));
                $('#order-data').val(JSON.stringify(orders));
                document.getElementById('sale_add').submit();
            };


            // Handle add to order button click
            $(document).on('click', '.add-to-order', function () {
                var productId = $(this).data('product-id');
                var productName = $(this).data('product-name');
                var productPrice = $(this).data('product-price');
                var quantity = 1;
                var totalPrice = productPrice * quantity;
                var order = {
                    productId: productId,
                    productName: productName,
                    productPrice: productPrice,
                    quantity: quantity,
                    totalPrice: totalPrice
                };
                orders.push(order); // Add the order to the orders array
                updateOrders(); // Update the orders list

            });

            // Handle order quantity change
            $(document).on('change', '.order-quantity', function () {
                var index = $(this).data('order-index');
                var newQuantity = parseInt($(this).val());
                if (!isNaN(newQuantity) && newQuantity > 0) {
                    orders[index].quantity = newQuantity;
                    orders[index].totalPrice = orders[index].productPrice * newQuantity;
                    updateOrders(); // Update the orders list
                }
            });

            // Handle order removal
            $(document).on('click', '.remove-order', function () {
                var index = $(this).data('order-index');
                orders.splice(index, 1); // Remove the order from the orders array
                updateOrders(); // Update the orders list
            });

            // Handle pay button click
            $('#pay-button').click(function () {
                // Pass the orders data to the other form or perform any desired action
                $('#order-data').val(JSON.stringify(orders)); // Convert orders array to JSON string and set as hidden input value
            });

            //Handle pay with rbbi click
            $('#pay-rbbi-button').click(function () {

                // Trigger the click event of the pay button
                // Get the total value
                var totalAmount = parseFloat($('#total-value').text());

                // Construct the RBBI payment URL with the total amount
                var rbbiUrl = 'http://192.168.10.128/RBBI/index.php/access/index/55/' + totalAmount + '?url=http://192.168.10.89/kfc/index.php/sale/&data=' + window.btoa(JSON.stringify(orders));

                // Redirect to the RBBI payment URL
                window.location.href = rbbiUrl;
            });




            // Function to update the orders list
            function updateOrders() {
                var ordersTableBody = $('#orders-table-body');
                ordersTableBody.empty(); // Clear the orders table body

                var total = 0; // Variable to calculate the overall total

                if (orders.length === 0) {
                    ordersTableBody.append('<tr><td colspan="6" class="text-center">No orders</td></tr>');
                } else {
                    for (var i = 0; i < orders.length; i++) {
                        var order = orders[i];
                        var orderRow = '<tr>' +
                            '<td>' + order.productId + '</td>' +
                            '<td>' + order.productName + '</td>' +
                            '<td>' + order.productPrice + '</td>' +
                            '<td><input type="number" class="form-control order-quantity" data-order-index="' + i + '" value="' + order.quantity + '"></td>' +
                            '<td>' + order.totalPrice + '</td>' +
                            '<td><button class="btn btn-danger btn-sm remove-order" data-order-index="' + i + '"> <i class="fas fa-trash-alt"></i></button></td>' +
                            '</tr>';
                        ordersTableBody.append(orderRow);
                        total += order.totalPrice;
                    }
                }

                // Update the overall total value
                $('#total-value').text(total.toFixed(2));
            }
        });
    </script>


    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>