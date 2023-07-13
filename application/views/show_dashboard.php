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

    .sidebar .nav-item a {
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

    .nav-item:hover {
      background-color: #343A40;
    }
    
    .sub-nav {
      display: none;
    }

    .nav-item:hover .sub-nav{
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
            
        <?php if ($user['role'] === 'admin' || $user['role'] === 'manager') : ?>
            <li class="nav-item">
              <a class="sidebar-link" href="#"><i class="fa fa-warehouse"></i> Manage Inventory</a>
              <ul class="sub-nav">
                <a class="sidebar-link" href="<?php echo site_url('product'); ?>"><i class="fa fa-warehouse"></i> Invetory</a>
                <a class="sidebar-link" href="<?php echo site_url('purchase'); ?>"><i class="fa fa-warehouse"></i> Purchase</a>
              </ul>
            </li>
        <?php endif; ?>

        <?php if ($user['role'] === 'admin' || $user['role'] === 'cashier') : ?>
            <li class="nav-item">
              <a class="sidebar-link" href="<?php echo site_url('sale'); ?>"><i class="fas fa-dollar-sign"></i> Sales</a>
            </li>
        <?php endif; ?>

        <?php if ($user['role'] === 'admin' || $user['role'] === 'accountant') : ?>
            <li class="nav-item">
              <a class="sidebar-link" href="#"><i class="fas fa-money-bill"></i>Accounting</a>
              <ul class="sub-nav">
                <a class="sidebar-link" href="<?php echo site_url('pay'); ?>"><i class="fas fa-money-bill"></i> Payment Proccessing</a>
                <a class="sidebar-link" href="<?php echo site_url('buy'); ?>"><i class="fa fa-warehouse"></i> Buys</a>
                <a class="sidebar-link" href="<?php echo site_url('order'); ?>"><i class="fa fa-cart-plus"></i> Orders</a>
              </ul>
            </li>
        <?php endif; ?>

        <?php if ($user['role'] === 'admin') : ?>
            <li class="nav-item">
              <a class="sidebar-link" href="#"><i class="fa fa-chart-bar"></i> Report</a>
              <ul class="sub-nav">
                <a class="sidebar-link" href="<?php echo site_url('dataanalytics'); ?>"><i class="fa fa-chart-bar"></i> Data Analytics</a>
              </ul>
            </li>
        <?php endif; ?>

        <?php if ($user['role'] === 'admin') : ?>
            <li class="nav-item">
              <a class="sidebar-link" href= "http://192.168.10.128/RBBI/index.php/login/bank?url=<?php echo site_url('dashboard'); ?>" ><i class="fa fa-chart-bar"></i> Bank Account</a>
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
