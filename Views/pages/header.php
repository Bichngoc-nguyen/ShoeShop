<?php session_start();
    require_once '../../Controllers/Lib/ConfirmController.php';
    require_once '../../Controllers/Pages/PagesController.php';
  $confirm = new ConfirmController();
  $pages = new PagesController();
  if (empty($_POST['name'])) {
    $search = $pages->searchProducts();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ShoeShop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstraps -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- fontawsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- style -->
  <link rel="stylesheet" href="../../public/css/jquery.nice-number.css">
  <link rel="stylesheet" href="../../public/css/zInput_default_stylesheet.css">
  <link rel="stylesheet" href="../../public/css/stylePages.css">
  <link rel="stylesheet" href="../../public/css/style.css">
  
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
  <div class="container-fluid pl-0 pr-0">
    <!-- header -->
    <div class="header">
      <div class="header_search  text-center row pl-0 pr-0">
        <div class="header_search-item col-xs-12 col-sm-3 col-lg-3 pl-0 pr-0">
          <a class="navbar-brand header_search-logo ml-5" href="../pages/index.php">
            <i>SHOE SHOP</i> 
          </a>
        </div>
        <div class="col-xs-12 col-sm-9 col-lg-9 pl-0 pr-0">
          <div class="row">
            <div class="menu-list_search col-10">
              <form action="">
                <input type="text" class="form-control" name="name" placeholder="search..."> 
                <p type="submit" class="ml-3 mb-0 search"><i class="fa fa-search"></i></p>
              </form> 
              <div class="menu-list_cart ml-3 mt-4">
              <a href="cart.php" class="menu-list_cart-link"><i class="fa fa-shopping-basket"></i>
              <?php echo ('</br><i>'.$confirm->getTotal().'</i>');?></a>
              </div>
            </div>
            <div class="col-12">
            <div class="header_menu">
          <nav class="navbar navbar-expand-md container text-center ml-9 p-0">
        <div class="collapse header_menu-list" id="collapsibleNavbar">
          <div class="menu-list_item mt-2">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link menu-list_item_link pl-3" href="../pages/news.php">NEWS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menu-list_item_link pl-3" href="../pages/sandals.php">GIÀY SANDALS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menu-list_item_link pl-3" href="../pages/bupbe.php">GIÀY BUP BÊ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menu-list_item_link pl-3" href="../pages/got.php">GIÀY CAO GÓT</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link menu-list_item_link pl-3" href="../pages/sneakers.php">GIÀY SNEAKERS</a>
              </li>   
              <li class="nav-item">
                <a class="nav-link menu-list_item_link pl-3" href="../pages/contact.php">LIÊN HỆ</a>
              </li>   
            </ul>
          </div>
        </div>  
      </nav>
      <br>
      </div>
            </div>
          </div>
      </div>
    </div>
  </div>
    <!-- end header -->
    