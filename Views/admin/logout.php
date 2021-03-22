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
    <div class="container-fluid">
        <div class="content mt-5 p-3">
        <form action="" method="POST">
            <h3>LOGIN</h3>
            <label>Email :</label>
            <input type="text"class="form-control" placeholder="Nhap email"> <br>
            <label>Password :</label>
            <input type="password" class="form-control"  placeholder="Nhap password"><br>
            <input type="submit" class="btn btn-success" value="Login">
            <button class="btn btn-warning"><a href="register.php">Register</a></button>
        </form>    
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>