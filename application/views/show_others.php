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
                        <a class="sidebar-link" href="#"><i class="fa fa-warehouse"></i>HRM</a>
                        <ul class="sub-nav">
                            <a class="sidebar-link" href="<?php echo site_url('employee'); ?>"><i
                                    class="fa fa-warehouse"></i> Employees</a>
                            <a class="sidebar-link" href="<?php echo site_url('payroll'); ?>"><i
                                    class="fa fa-cart-plus"></i> Payroll</a>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($user['role'] === 'admin' || $user['role'] === 'manager'): ?>
                    <li class="nav-item">
                        <a class="sidebar-link" href="#"><i class="fa fa-warehouse"></i> Manage Inventory</a>
                        <ul class="sub-nav">
                            <a class="sidebar-link" href="<?php echo site_url('product'); ?>"><i
                                    class="fa fa-warehouse"></i> Invetory</a>
                            <a class="sidebar-link" href="<?php echo site_url('purchase'); ?>"><i
                                    class="fa fa-warehouse"></i> Purchase</a>
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
                        <a class="sidebar-link" href="#"><i class="fas fa-money-bill"></i>Accounting</a>
                        <ul class="sub-nav">
                            <a class="sidebar-link" href="<?php echo site_url('pay'); ?>"><i class="fas fa-money-bill"></i>
                                Payment Proccessing</a>
                            <a class="sidebar-link" href="<?php echo site_url('buy'); ?>"><i class="fa fa-warehouse"></i>
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
                                    class="fa fa-chart-bar"></i> Data Analytics</a>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($user['role'] === 'admin'): ?>
                    <li class="nav-item">
                        <a class="sidebar-link"
                            href="http://192.168.10.128/RBBI/index.php/login/bank?url=<?php echo site_url('dashboard'); ?>"><i
                                class="fa fa-chart-bar"></i> Bank Account</a>
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

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th></th>
                    <th>Other ERP</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="http://192.168.10.95/clickers">
                            <img src="data:image/png;base64,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"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.72/Monterey">
                            <img src="https://monterey.wingoninc.com.ph/cdn/shop/files/48406067_218255829063664_2858640222587977728_n_180x.jpg?v=1613553577"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.65/FiveStarBusV2/">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b3/Five_Star_Bus_Co.%2C_Inc._logo_%26_eblem_2.png"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://192.168.10.75/LBC">
                            <img src="https://www.lbcexpress.com/assets/lbcrevamp/img/icon.png"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.66/BDO">
                            <img src="https://th.bing.com/th/id/OIP.oIjZHSNGh31WkVErshKVawHaE7?pid=ImgDet&rs=1"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.70/EasternGasStation">
                            <img src="https://easterngroup.ph/wp-content/uploads/2019/07/easternpetroleum-logo-slide.png"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://192.168.10.88/Hendison">
                            <img src="https://scontent.fbag2-1.fna.fbcdn.net/v/t1.15752-9/361801882_611060294532709_9113283381671575027_n.jpg?_nc_cat=107&cb=99be929b-3346023f&ccb=1-7&_nc_sid=ae9488&_nc_eui2=AeE9_-OD1Nz3ZEqLwojdTtRxq4QaQA1Y2XerhBpADVjZd6BK7Ij3R8eYhUKyenODUe1Iuu6NBg8NA9RcPV84DL-a&_nc_ohc=wmWoHi--ObYAX8Ts2fL&_nc_ht=scontent.fbag2-1.fna&oh=03_AdTamTPkGoAsal-qhKoOdjMAgXHadWaIBgPgCN1SEauocQ&oe=64DD506D"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.80/savemore">
                            <img src="https://sih.booky.ph/eyJidWNrZXQiOiJib29reS1hcnRlbWlzIiwia2V5IjoiYXNzZXRzLzE2ODA5MTMxNjktYzJkYTc1MzVmZGI5YjRjNTRkMzkyMmYxMmE2ZjM2OWJmNTZiYjBjMC5qcGciLCJlZGl0cyI6eyJyZXNpemUiOnsid2lkdGgiOjEwMCwiaGVpZ2h0IjoxMDAsImZpdCI6ImNvdmVyIn19fQ=="
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.99/Greenwich/">
                            <img src="http://i2.wp.com/www.boholtourismph.com/wp-content/uploads/2014/11/greenwich-logo.png?resize=917%2C1024"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://192.168.10.90/Mercury">
                            <img src="https://scontent.fbag2-1.fna.fbcdn.net/v/t31.18172-8/23674924_1223963547747237_1084384301314189321_o.jpg?_nc_cat=105&cb=99be929b-3346023f&ccb=1-7&_nc_sid=174925&_nc_eui2=AeHxgX6jvcm9Dng7Bpppkw47HJY4XREWgjEcljhdERaCMZmxIEVuhd1KRxtnHHeXLnjQWVHE1xEHclKkLifxpzZ-&_nc_ohc=p1M6zIz8MUMAX9MbF3i&_nc_oc=AQnSYk0G5FmaUSyYiXI1Tz8gA1uBvBJ5BKKFIcIgvfOi-v3IUQCmtzKSYu2FvYSoGrE&_nc_ht=scontent.fbag2-1.fna&oh=00_AfD-6xkk-lPgPH6Bhc_0sUqM0qChnWmVvBNlCUarIJnX7Q&oe=64DD6482"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.128/RBBI">
                            <img src="https://www.rbsolano.com/assets/images/logo/rbs_logo.png"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.69/Villarica">
                            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/1400/25f17927720467.56369a7bc3fd3.png"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://192.168.10.83/Andoks">
                            <img src="https://sih.booky.ph/eyJidWNrZXQiOiJib29reS1hcnRlbWlzIiwia2V5IjoiYXNzZXRzLzE2ODA2NDk4MTQtZWUzMTA0YTIyNDE5NGIzYjNiY2Q4NmQ5N2QzM2E5N2M4ZmQyMjcwYi5qcGciLCJlZGl0cyI6eyJyZXNpemUiOnsid2lkdGgiOjEwMCwiaGVpZ2h0IjoxMDAsImZpdCI6ImNvdmVyIn19fQ=="
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.143/24-7INN">
                            <img src="https://pinoytownhall.com/wp-content/uploads/2014/11/24-7-Inn.jpg"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.151/nationalbookstore">
                            <img src="http://192.168.10.151/nationalbookstore/public/assets/nbs.jpg"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://192.168.10.225/MrsBakers">
                            <img src="https://scontent.fbag2-1.fna.fbcdn.net/v/t39.30808-6/243322004_253472606786599_5597474800792263463_n.jpg?_nc_cat=110&cb=99be929b-3346023f&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeEjHjEnCgM0ePWzBny0xKnZT5AqUYPzZ_hPkCpRg_Nn-NFcnGqbVNByDci0Zo54fGPDIi0r00Tc67t0vwfl_CFK&_nc_ohc=JDJ4vpRMFRcAX-NWG02&_nc_ht=scontent.fbag2-1.fna&oh=00_AfDaSCzIgrhebhhkQo5fkCo1nBsGleM0Q2EFUQPG-PKFNw&oe=64BAF039"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.186/pldt">
                            <img src="https://pldthome.com/images/default-source/navbar-update-072023/pldt-logo-at-2x.png"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.169/7-11">
                            <img src="https://1000logos.net/wp-content/uploads/2020/09/7-Eleven-Logo-1986.png"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://192.168.10.92/pandayan">
                            <img src="https://yt3.googleusercontent.com/IMRbdyCXuoQsXdE7cgsVoOjzzI2i-zTV1WWbV-sk6mqwf3T4oV6_wosRIafArwovKJ8TmBdl=s176-c-k-c0x00ffffff-no-rj"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.224/saberinn">
                            <img src="https://scontent.fbag2-1.fna.fbcdn.net/v/t39.30808-6/361278614_743776647754119_5712522378943475656_n.jpg?_nc_cat=110&cb=99be929b-3346023f&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeG_kbZhPmEiEyu7nzLg-vd9miV0TYuXseCaJXRNi5ex4G1zs6F1bAgBC8FeUrDdvV1Tc0dRRBD75IFqgCUt8HgD&_nc_ohc=ABnf3ypgRqwAX-_bEZ9&_nc_ht=scontent.fbag2-1.fna&oh=00_AfD9l-c5Jj9GZuP6GqQoAnUCKrJPmIfbsqtMWJXo0wzjLQ&oe=64BBB6A8"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.111/catholicchurch">
                            <img src="https://scontent.fbag2-1.fna.fbcdn.net/v/t1.18169-9/29572766_1056082997864434_3443122291022385283_n.jpg?_nc_cat=106&cb=99be929b-3346023f&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeFNMm9LrNG9KJDs89QcVr48xqA-QH8XlBHGoD5AfxeUERbKSIagezwgMjCAvt0-roiJfr4SdwRE3QMNsOPsE2R4&_nc_ohc=R0HnOFHw99AAX_MJI3_&_nc_ht=scontent.fbag2-1.fna&oh=00_AfDYgbaCOW4NAg7uvy_rMRvO7hGXSRlWX5B1l_21gf5VJA&oe=64DD6301"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://192.168.10.103/MangInasal">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d0/Mang_Inasal.svg "
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.199/MisterDonut">
                            <img src="https://images.summitmedia-digital.com/spotph/images/articles/2016/md-est.png"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.204/CindysBakery">
                            <img src="https://scontent.fmnl25-2.fna.fbcdn.net/v/t1.6435-9/192141472_10159134953152170_1491773490992225687_n.png?_nc_cat=111&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeEZzxn2dLAe9BCm-oaYFhRIS_SvRsjCREpL9K9GyMJESpUb3M6ivAuleM1otnSVO4fRLIAGbYCyfcgOkZFEeJey&_nc_ohc=HOfX4eTUDQ8AX9a1RQc&_nc_ht=scontent.fmnl25-2.fna&oh=00_AfBNZtY2L1bwSi18WIccjCB-bLPDtGVhq7JRIgkYWkP-FA&oe=64CCECFA"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://192.168.10.120/Footstep">
                            <img src="https://d1yjjnpx0p53s8.cloudfront.net/styles/logo-original-577x577/s3/112013/zenco_0.png?itok=AFuZGh54"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.82/EliteGym">
                            <img src="https://images-platform.99static.com/yvPgw9kRLjoc4qoHkiu_Tl3rd9E=/500x500/top/smart/99designs-contests-attachments/16/16376/attachment_16376332"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="192.168.10.213/watsons">
                            <img src="https://www.capitaland.com/content/dam/capitaland-sites/singapore/shop/malls/funan/tenants/Watsons.png.transform/cap-midres/image.png"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="http://192.168.10.203/ludansstore">
                            <img src="https://scontent.fbag2-1.fna.fbcdn.net/v/t39.30808-6/361609848_6335244693260787_3810373670961975206_n.jpg?_nc_cat=102&cb=99be929b-3346023f&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeHda0lFpxPWLbBMm4Cm9m6yEny2BHBIZ18SfLYEcEhnX3sum9g6fYAc30rFhhqxh6S-JkLE4mhpF7StFDuIxR8Z&_nc_ohc=YH_FwK7ufUUAX9BlQzs&_nc_ht=scontent.fbag2-1.fna&oh=00_AfCkfj3ymyNcM08fK40MB1jeAFb12LJI93kzc76Vo5v2qA&oe=64BB4C87"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.89/kfc">
                            <img src="https://www.kfc.com.ph/Content/OnlineOrderingImages/Shared/logo.svg"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                    <td>
                        <a href="http://192.168.10.224/pcinet">
                            <img src="https://scontent.fbag2-1.fna.fbcdn.net/v/t39.30808-6/356072870_757978639665826_4039318455696703655_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeFwBb0kVqaBkQOOJGpdAm7SLEgWZD7ScXcsSBZkPtJxd0fmqI5atvxO4bIBqz1QIfaetFefxs3MbjVW6VaxhQk1&_nc_ohc=3zI959Ef9nYAX9dLImu&_nc_ht=scontent.fbag2-1.fna&oh=00_AfBuT33N4og5Z9fy_vtfzjhuY0Ys9eqbkBwFhPE2me6oKg&oe=64BA446E"
                                style="width: 60px; height: auto; margin-left: 50px;">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>