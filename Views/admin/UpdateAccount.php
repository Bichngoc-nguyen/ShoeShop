
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title> <!-- bootstraps -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- style -->
    <link rel="stylesheet" href="../../public/css/styleAdmin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="content_update m-auto p-5">
        
        <h3>Nhập Mật Khẩu</h3>
        <form method="post">
            <input type="password" class="w3-input" name="newPass" placeholder="Nhập mật khẩu mới" required value="">
            <p class="ml-4">
                <b>Password strength:</b><br>
                Use at least 8 charcters. Don't use a password from another site, or something too obvious like your pet's name.
            </p>
            <input type="password" class="w3-input" name="confirmPass" placeholder="Xác nhận mật khẩu mới" value="">
                <?php
                    ob_start();
                        session_start();
                        require_once '../../Controllers/Admin/AdminController.php';
                        $admin = new AdminController();
                        $postEmail = $admin->postEmail();
                        if (isset($_POST['changePass'])) {
                            $postPassword = $admin->postPassword();
                        }
                ?><br><br>
            <input type="submit" class="btn btn-primary" name ="changePass" value="CHANGE PASSWORD">
            <a href="login.php" class="btn btn-danger">Hủy</a>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>