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
<body class="login">
    <div class="container-fluid">
        <div class="content mt-5 p-3">
        <?php
          require_once '../../Controllers/Admin/AdminController.php';
          $admin = new AdminController();
          if (isset($_POST['register'])) {
            $register = $admin->register();
          }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <h3>REGISTER</h3>
            <label>Username :</label>
            <input type="text"class="form-control" placeholder="Nhap name" name="username" require> <br>
            <label>Address :</label>
            <input type="text"class="form-control" placeholder="Nhap address" name="address" require> <br>
            <label>Birthday :</label>
            <input type="date"class="form-control" placeholder="Nhap birthday" name="birthday" require> <br>
            <label>Telephone :</label>
            <input type="text"class="form-control" placeholder="Nhap telephone" name="telephone" require> <br>
            <label>Email :</label>
            <input type="email"class="form-control" placeholder="Nhap email" name="email" require> <br>
            <label>Password :</label>
            <input type="password" class="form-control" placeholder="Nhap password" name="password" require><br>
            <label>Position :</label>
            <select name="position" class="form-control" require>
              <option value="Quản trị viên">Quản trị viên</option>
              <option value="Nhân viên">Nhân viên</option>
            </select>
            <label>Avatar :</label>
            <input type="file" name="avatar" require><br>
            <input type="submit" class="btn btn-success" value="Register" name="register">
            <button class="btn btn-warning"><a href="login.php">Login</a></button>
        </form>    
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>