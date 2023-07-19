<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .bb {
            background-color: #F5F5F5;
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
                        <a class="sidebar-link" href="#"><i class="fa fa-user-tie"></i>HRM</a>
                        <ul class="sub-nav">
                            <a class="sidebar-link" href="<?php echo site_url('employee'); ?>"><i class="fa fa-users"></i>
                                Employees</a>
                            <a class="sidebar-link" href="<?php echo site_url('payroll'); ?>"><i class="fa fa-coins"></i>
                                Payroll</a>
                        </ul>
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
                        <a class="sidebar-link" href="#"><i class="fas fa-money-check"></i>Accounting</a>
                        <ul class="sub-nav">
                            <a class="sidebar-link" href="<?php echo site_url('pay'); ?>"><i class="fas fa-money-bill"></i>
                                Payment
                                Proccessing</a>
                            <a class="sidebar-link" href="<?php echo site_url('buy'); ?>"><i class="fa fa-credit-card"></i>
                                Buys</a>
                            <a class="sidebar-link" href="<?php echo site_url('order'); ?>"><i class="fa fa-cart-plus"></i>
                                Orders</a>
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
        <div class="mt-20 px-4">
            <div class="grid grid-cols-1 gap-8 px-20 py-2">
                <div class="rounded-lg shadow-md px-20 bb">
                    <h2 class="text-2xl text-center font-bold mb-4">Daily Sales</h2>
                    <div class="form-group row mb-4">
                        <label for="monthSelect" class="col-sm-2 col-form-label">Select Month:</label>
                        <div class="col-sm-10">
                            <select id="monthSelect" onchange="updateChart(this.value)" class="form-control">
                                <option value="0">All</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>
                    <canvas id="dailySalesChart"></canvas>
                </div>
                <div class="bg-white rounded-lg shadow-md px-20">
                    <h2 class="text-2xl text-center font-bold mb-4">Monthly Sales</h2>
                    <canvas id="monthlySalesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        var dailySalesData = <?php echo json_encode($daily_sales); ?>;
        var monthlySalesData = <?php echo json_encode($monthly_sales); ?>;
        var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var dailySalesChart = null;
        var monthlySalesChart = null;

        // Function to filter sales data by month
        function filterSalesByMonth(month) {
            if (month === '0') {
                return dailySalesData;
            } else {
                return dailySalesData.filter(function (item) {
                    var itemDate = new Date(item.orderdate);
                    var itemMonth = itemDate.getMonth() + 1;
                    return itemMonth === parseInt(month);

                    console.log(dailySalesData)
                });
            }
        }

        function updateChart(selectedMonth) {
            var filteredSalesData = filterSalesByMonth(selectedMonth);

            var dailyLabels = filteredSalesData.map(function (item) {
                return item.orderdate;
            });
            var dailyAmounts = filteredSalesData.map(function (item) {
                return item.dailysales;
            });

            if (dailySalesChart !== null) {
                dailySalesChart.destroy();
            }

            var dailySalesCtx = document.getElementById('dailySalesChart').getContext('2d');
            dailySalesChart = new Chart(dailySalesCtx, {
                type: 'bar',
                data: {
                    labels: dailyLabels,
                    datasets: [{
                        label: 'Daily Sales',
                        data: dailyAmounts,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgb(153, 102, 255)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            updateMonthlySalesChart();
        }

        function updateMonthlySalesChart() {
            var monthlyLabels = monthNames;
            var monthlyAmounts = [];

            for (var i = 0; i < 12; i++) {
                var monthLabel = monthNames[i];
                var monthlySale = monthlySalesData.find(function (item) {
                    return item.month === monthLabel;
                });
                var salesAmount = monthlySale ? monthlySale.sales : 0;
                monthlyAmounts.push(salesAmount);
            }

            if (monthlySalesChart !== null) {
                monthlySalesChart.destroy();
            }

            var monthlySalesCtx = document.getElementById('monthlySalesChart').getContext('2d');
            monthlySalesChart = new Chart(monthlySalesCtx, {
                type: 'bar',
                data: {
                    labels: monthlyLabels,
                    datasets: [{
                        label: 'Monthly Sales',
                        data: monthlyAmounts,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgb(153, 102, 255)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }

        updateChart('0');
    </script>

    <!-- Modal Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>

    <!-- Bootstrap JS (optional, if you need any JavaScript functionality) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>