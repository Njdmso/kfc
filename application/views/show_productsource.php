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


        <!-- Search Bar -->
        <form action="<?php echo site_url('productsource/search'); ?>" method="post" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Productsource" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Product_id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"
                            style="margin-left: 10px;"><i class="fas fa-plus"></i> Add</button></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productsources as $productsource): ?>
                    <tr>
                        <td>
                            <?php echo $productsource['purchase_id']; ?>
                        </td>
                        <td>
                            <div>
                                <img style='width: 50px; height: auto;'
                                    src="<?php echo UPLOADS_BASE_URL . $productsource['img']; ?>" />
                            </div>
                        </td>

                        <td>
                            <?php echo $productsource['name']; ?>
                        </td>
                        <td>
                            <?php echo $productsource['price']; ?>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Actions">
                                <button type="button" class="btn btn-primary edit-button" data-toggle="modal"
                                    data-target="#editModal" data-purchase_id="<?php echo $productsource['purchase_id']; ?>"
                                    data-name="<?php echo $productsource['name']; ?>"
                                    data-price="<?php echo $productsource['price']; ?>"><i
                                        class="fas fa-edit"></i>Edit</button>
                                <a href="<?php echo site_url('productsource/delete/' . $productsource['purchase_id']); ?>"
                                    class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Edit User Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" action="<?php echo site_url('productsource/update'); ?>">
                            <div class="form-group">
                                <label for="purchase_id">Productsource ID</label>
                                <input type="text" class="form-control" id="purchase_id" name="purchase_id" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="update_purchase">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Product Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add New Purchase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('productsource/add_productsource'); ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="img" class="block text-gray-700 font-bold mb-2">Image:</label>
                            <input type="file" name="img" id="img" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Modal Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>


    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // JavaScript code to handle the click event on the "Buy" button
        $(document).on('click', '.edit-button', function () {
            var purchase_id = $(this).data('purchase_id');
            var img = $(this).data('img');
            var name = $(this).data('name');
            var price = $(this).data('price');

            // Set the values in the modal
            $('#purchase_id').val(purchase_id);
            $('#img').val(img); // Set the img data in the hidden input field
            $('#name').val(name);
            $('#price').val(price);
        });
    </script>
</body>

</html>