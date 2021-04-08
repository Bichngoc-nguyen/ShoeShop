<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
  <!-- bootstraps -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- style -->
  <link rel="stylesheet" href="../../public/css/styleAdmin.css">
</head>
<body>
<?php
session_start();
require_once '../../Controllers/Admin/AdminController.php';
$admin = new AdminController();
if (isset($_POST['search'])) {
    $postEmail = $admin->postEmail();
}
?>
<div class="content_remember">
    <div class='remember-password mt-5 p-4'>
        <h3>Tìm tài khoản của bạn</h3><hr>
        <form action="" method="post">
            <label>Vui lòng nhập email của bạn</label>
            <input type="email" placeholder="Nhập email" name="email" class="form-control" required><br>
            <a href="login.php" class="btn btn-danger">Hủy</a>
            <button class="btn btn-primary" name="search">Tìm kiếm</button>
        </form>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>