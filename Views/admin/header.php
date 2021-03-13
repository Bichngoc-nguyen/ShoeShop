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
                <h3>ADMIN</h3>
            </div>
            <div class="col-6 text-right">
                <a href="logout.php"><i class="fa fa-user logout"></i></a>
            </div>
        </div>
        <div class="main">
           <!-- sidebar -->
           <div class="main-sidebar">
            <div class="content_sidebar">
                <ul>
                    <li class="sidebar-cate"><a href="#"><i class="fa fa-tachometer"></i> Category</a></li>
                    <li class="cate-item p-0">
                        <ul>
                            <li class="pl-4"><a href="createCategory.php"> <i class="fa fa-eercast"></i> Create Category</a></li>
                            <li class="pl-4"><a href="listCategories.php"> <i class="fa fa-eercast"></i> Lists Category</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-products"><a href="#"><i class="fa fa-file-image-o"></i> Products</a></li>
                    <li class="products-item p-0">
                        <ul>
                            <li class="pl-4 sneakers"><a href="#"> <i class="fa fa-snowflake-o"></i> Giày Sneakers</a></li>
                            <li class="sneakers-item p-0">
                                <ul>
                                    <li class="pl-5"><a href="createProduct.php"> <i class="fa fa-eercast"></i>Create Sneakers</a></li>
                                    <li class="pl-5"><a href="listSneakers.php"> <i class="fa fa-eercast"></i>Lists Sneakers</a></li>
                                </ul>
                            </li>
                            <li class="pl-4 sandals"><a href="#"> <i class="fa fa-snowflake-o"></i> Giày Sandals</a></li>
                            <li class="sandals-item p-0">
                                <ul>
                                    <li class="pl-5"><a href="createProduct.php"> <i class="fa fa-eercast"></i> Create Sandals</a></li>
                                    <li class="pl-5"><a href="listSandals.php"> <i class="fa fa-eercast"></i> Lists Sandals</a></li>
                                </ul>
                            </li>
                            <li class="pl-4 got"><a href="#"> <i class="fa fa-snowflake-o"></i> Giày Cao Gót</a></li>
                            <li class="got-item p-0">
                                <ul>
                                    <li class="pl-5"><a href="createProduct.php"> <i class="fa fa-eercast"></i> Create Got</a></li>
                                    <li class="pl-5"><a href="listGots.php"> <i class="fa fa-eercast"></i> Lists Got</a></li>
                                </ul>
                            </li>
                            <li class="pl-4 bupbe"><a href="#"> <i class="fa fa-snowflake-o"></i> Giày Bupbe</a></li>
                            <li class="bupbe-item p-0">
                                <ul>
                                    <li class="pl-5"><a href="createProduct.php"> <i class="fa fa-eercast"></i> Create Bupbe</a></li>
                                    <li class="pl-5"><a href="listBupbe.php"> <i class="fa fa-eercast"></i> Lists Bupbe</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-selling-products"><a href="../admin/sellingProducts.php"><i class="fa fa-line-chart"></i> Selling Products</a></li>
                    <li class="orders-products"><a href="../admin/ListOrders.php"><i class="fa fa-calculator"></i>  Orders</a></li>
                    <li class="customers-products"><a href="../admin/customers.php"><i class="fa fa-users"></i> Customers</a></li>
                    <li class="sidebar-users"><a href=""> <i class="fa fa-user-circle-o"></i> Users</a></li>  
                    <li class="users-item p-0">
                        <ul>
                            <li class="pl-4"><a href="#"> <i class="fa fa-eercast"></i> Create Users</a></li>
                            <li class="pl-4"><a href="#"> <i class="fa fa-eercast"></i> Lists Users</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        


