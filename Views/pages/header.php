<?php session_start();?>
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
</head>
<body>
  <div class="container-fluid pl-0 pr-0">
    <!-- header -->
    <div class="header bg-light">
      <nav class="navbar navbar-expand-md navbar-dark header_menu container text-center">
        <a class="navbar-brand  header_menu-logo" href="../pages/index.php">
          <img src="../../public/img/banner.jpg" alt="">
        </a>
        <button class="btn btn-dark header_menu-button">
        <i class="fa fa-bars"></i>
        </button>
        <div class="collapse header_menu-list" id="collapsibleNavbar">
          <div class="menu-list_search">
            <form action="">
              <input type="text" class="form-control" placeholder="search..."> 
              <input type="submit" class="btn btn-success ml-3" value="Tìm kiếm">
            </form> 
            <div class="menu-list_cart ml-5">
            <a href="#" class="menu-list_cart-link"><i class="fa fa-shopping-basket"></i></a>
            </div>
          </div>
          <div class="menu-list_item mt-3">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link menu-list_item_link pl-3" href="pages/news.php">NEWS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menu-list_item_link pl-3" href="pages/sandals.php">GIÀY SANDALS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menu-list_item_link pl-3" href="pages/bupbe.php">GIÀY BUP BÊ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menu-list_item_link pl-3" href="pages/got.php">GIÀY CAO GÓT</a>
              </li>  
              <li class="nav-item">
                <a class="nav-link menu-list_item_link pl-3" href="pages/sneakers.php">GIÀY SNEAKERS</a>
              </li>     
            </ul>
          </div>
        </div>  
      </nav>
      <br>
    </div>
    <!-- end header -->
    <!-- slide -->
    <div class="slide detail">
      <div class="slide-list">
        <div class="slide-list_item active"><img src="../../public/img/banner.jpg"></div>
        <div class="slide-list_item "><img src="../../public/img/banner2.jpg"></div>
        <div class="slide-list_item "><img src="../../public/img/banner3.jpg"></div>
      </div>
      <div class="slide-btn-prev" id="btn-prev">
          <span><i class="fa fa-angle-left"></i></span>
      </div>
      <div class="slide-btn-next" id="btn-next">
          <span><i class="fa fa-angle-right"></i></span>
      </div>
    </div>