<?php
ob_start();
require_once 'header.php';
require_once '../../Controllers/Admin/AdminController.php';
$admin = new AdminController();
if (isset($_POST['add'])) {
  $create = $admin->createUsers();
}


?>
    <div class="container-fluid">
        <div class="content_user mt-5 p-3">
        <?php
          require_once '../../Controllers/Admin/AdminController.php';
          $admin = new AdminController();
          if (isset($_POST['register'])) {
            $register = $admin->register();
          }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <h3>Tạo Thông Tin Nhân Viên</h3>
            <table class="table">
              <tr>
                <th>Tên Nhân Viên :</th>
                <td><input type="text" class="form-control" name="username" require></td>
              </tr>
              <tr>
                <th>Địa Chỉ :</th>
                <td><input type="text" class="form-control" name="address" require></td>
              </tr>
              <tr>
                <th>Ngày Sinh:</th>
                <td> <input type="date" class="form-control" name="birthday" require></td>
              </tr>
              <tr>
                <th>Số Điện Thoại:</th>
                <td><input type="text" class="form-control" name="telephone" require ></td>
              </tr>
              <tr>
                <th>Email:</th>
                <td><input type="email" class="form-control" name="email" require></td>
              </tr>
              <tr>
                <th>Mật Khẩu:</th>
                <td><input type="password" class="form-control" name="password" require></td>
              </tr>
              <tr>
                <th>Chức Vụ: </th>
                <td>
                  <select name="position" class="form-control">
                    <option value="Quản trị viên">Quản trị viên</option>
                    <option value="Nhân viên">Nhân viên</option>
                  </select>
                </td>
              </tr>
              <tr>
                <th>Hình Đại Diện:</th>
                <td><input type="file" name="avatar" require><br></td>
              </tr>
              <tr>
                <td><input type="submit" class="btn btn-success mt-3 mr-2" value="Thêm" name="add">
                <a href="listUsers.php" class="btn btn-danger mt-3">Hủy</a>
                </td>
              </tr>
            </table>
          
        </form>    
        </div>
    </div>
</div>
<?php require_once 'footer.php';?>