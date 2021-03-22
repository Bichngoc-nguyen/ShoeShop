<?php
ob_start();
require_once 'header.php';
require_once '../../Controllers/Lib/RequestController.php';
require_once '../../Controllers/Admin/AdminController.php';
$admin = new AdminController();
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $getId = $admin->DetailUser($id);
}
if (isset($_POST['add'])) {
  $update = $admin->updateUser();
}
?>

<div class="main-upadateSneakers mt-5">
  <form action="" method="post" enctype="multipart/form-data">
    <h3>Update User </h3>
    <table class="table">
      <?php if (empty($getId)=== false):  ?>
        <?php foreach ($getId as $value) :?>
        <tr>
          <th>Tên Nhân Viên :</th>
          <td><input type="text" class="form-control" name="name" require value="<?php echo $value['username'];?>"></td>
        </tr>
        <tr>
          <th>Địa Chỉ :</th>
          <td><input type="text" class="form-control" name="address" require value="<?php echo $value['address'];?>"></td>
        </tr>
        <tr>
          <th>Ngày Sinh:</th>
          <td> <input type="date" class="form-control" name="birthday" require value="<?php echo $value['birthday'];?>"></td>
        </tr>
        <tr>
          <th>Số Điện Thoại:</th>
          <td><input type="text" class="form-control" name="phone" require value="<?php echo $value['phone']?>"></td>
        </tr>
        <tr>
          <th>Email:</th>
          <td><input type="email" class="form-control" name="email" require value="<?php echo $value['email']?>"></td>
        </tr>
        <tr>
          <th>Mật Khẩu:</th>
          <td><input type="password" class="form-control" name="password" require value="<?php echo $value['password']?>"></td>
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
          <td><input type="file" name="avatar" require value="<?php echo $value['avatar']?>"><br></td>
        </tr>
          <tr>
            <td><input type="submit" class="btn btn-success mt-3 mr-2"  value="Cập Nhật" name="add">
            <a href="listUsers.php" class="btn btn-danger mt-3">Hủy</a>
            </td>
          </tr>
        <?php endforeach ?>
      <?php endif?>
    </table>
  </form>
</div>
</div>
<?php require_once 'footer.php';?>