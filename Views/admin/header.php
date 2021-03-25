<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- bootstraps -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- style -->
    <link rel="stylesheet" href="../../public/css/styleAdmin.css">
</head>
<body>
    <div class="container-fluid pl-0 pr-0">
        <!-- header -->
        <div class="header row ml-0 mr-0 p-1">
            <div class="col-6">
                <h3><a href="../pages/index.php">Shoe Shop</a></h3>
            </div>
            <div class="col-6 text-right">
                <a href="logout.php" title="Logout"><i class="fa fa-user logout"></i></a>
            </div>
        </div>
        <div class="main">
           <!-- sidebar -->
           <div class="main-sidebar">
            <div class="content_sidebar">
                <ul>
                    <li><a href="index.php"><i class="fa fa-home"></i> DashBoarch</a></li>
                    <li><a href="category.php"><i class="fa fa-tachometer"></i> Category</a></li>
                    <li class="sidebar-products"><a href="#"><i class="fa fa-file-image-o"></i> Products</a></li>
                    <li class="products-item p-0">
                        <ul>
                            <li class="pl-4 sneakers"><a href="createProduct.php"> <i class="fa fa-snowflake-o"></i> Create Product</a></li>
                            <li class="pl-4 sneakers"><a href="listSneakers.php"> <i class="fa fa-snowflake-o"></i> Giày Sneakers</a></li>
                            <li class="pl-4 sandals"><a href="listSandals.php"> <i class="fa fa-snowflake-o"></i> Giày Sandals</a></li>
                            <li class="pl-4 got"><a href="listGots.php"> <i class="fa fa-snowflake-o"></i> Giày Cao Gót</a></li>
                            <li class="pl-4 bupbe"><a href="listBupbe.php"> <i class="fa fa-snowflake-o"></i> Giày Bupbe</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-selling-products"><a href="../admin/sellingProducts.php"><i class="fa fa-line-chart"></i> Selling Products</a></li>
                    <li class="orders-products"><a href="../admin/ListOrders.php"><i class="fa fa-calculator"></i>  Orders</a></li>
                    <li class="customers-products"><a href="../admin/listCustomers.php"><i class="fa fa-users"></i> Customers</a></li>
                    <li><a href="listContact.php"><i class="fa fa-phone"></i> Contact Customers</a></li>
                    <li class="sidebar-users"><a href=""> <i class="fa fa-user-circle-o"></i> Users</a></li>  
                    <li class="users-item p-0">
                        <ul>
                            <li class="pl-4"><a href="createUser.php"> <i class="fa fa-eercast"></i> Create Users</a></li>
                            <li class="pl-4"><a href="listUsers.php"> <i class="fa fa-eercast"></i> Lists Users</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        


