<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .container-fluid {
      padding-left: 0;
      padding-right: 0;
    }

    .content {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background-color: #f8f9fa;
      padding-top: 56px; /* Height of the top navbar */
    }

    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 999;
    }
    .logoutlink {
      margin-left: -500px;
      color: white;
    }

    .sidebar {
      position: fixed;
      top: 56px; /* Height of the top navbar */
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

    .content-wrapper {
      margin-left: 200px; /* Width of the sidebar */
      padding: 20px;
    }

    .card {
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  
  <div class="content">
    <nav class="navbar navbar-dark bg-dark">
      <img src="https://www.kfc.com.ph/Content/OnlineOrderingImages/Shared/logo.svg" style="width: 60px; height: auto; margin-left: 50px;">
      <a class="navbar-brand" href="#"></a>
      <a class="text-white"><i class="fas fa-user"></i> <?php echo $user['role']; ?></a>
      <a class="logoutlink" href="<?php echo site_url('dashboard/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </nav>

    <div class="sidebar">
      <ul class="navbar-nav">

        <?php if ($user['role'] === 'admin' || $user['role'] === 'employee') : ?>
            <li class="nav-item">
              <a class="sidebar-link" href="<?php echo site_url('dashboard'); ?>"><i class="fas fa-chart-bar"></i> Dashboard</a>
            </li>
        <?php endif; ?>

        <?php if ($user['role'] === 'admin') : ?>
          <li class="nav-item">
            <a class="sidebar-link" href="<?php echo site_url('user'); ?>"><i class="fas fa-users"></i> Manage Users</a>
          </li>
        <?php endif; ?>
        
        <?php if ($user['role'] === 'admin' || $user['role'] === 'cashier') : ?>
            <li class="nav-item">
              <a class="sidebar-link" href="<?php echo site_url('order'); ?>"><i class="fa fa-cart-plus"></i> Manage Order</a>
            </li>
        <?php endif; ?>
            
        <?php if ($user['role'] === 'admin' || $user['role'] === 'manager') : ?>
            <li class="nav-item">
              <a class="sidebar-link" href="<?php echo site_url('product'); ?>"><i class="fa fa-warehouse"></i> Manage Inventory</a>
            </li>
        <?php endif; ?>

        <?php if ($user['role'] === 'admin' || $user['role'] === 'accountant') : ?>
            <li class="nav-item">
              <a class="sidebar-link" href="<?php echo site_url('paymentprocessing'); ?>"><i class="fas fa-money-bill"></i> Payment Proccessing</a>
            </li>
        <?php endif; ?>
        
      </ul>
    </div>

    

    <img src="https://www.kfc.com.ph/Content/OnlineOrderingImages/Shared/desk-banner_1200x480.jpg?v=1.1">
    <img src="https://www.kfc.com.ph/Content/OnlineOrderingImages/Menu/Category/Carousel/Cheesy%20Italian%20Zinger%20Steak.jpg?v=0.2">
    <img src="https://www.kfc.com.ph/Content/OnlineOrderingImages/Menu/Category/Carousel/Fully%20Loaded%20Meal.gif?v=0.2">



    
  </div>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>