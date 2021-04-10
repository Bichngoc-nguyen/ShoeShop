<?php
ob_start();
require_once 'header.php';
require_once '../../Controllers/Lib/RequestController.php';
require_once '../../Controllers/Customers/CustomersController.php';
$customer = new CustomersController();
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $getId = $customer->getEditCus($id);
}
if (isset($_POST['add'])) {
  $update = $customer->updateCus();
}
?>

<div class="main-upadateSneakers mt-5">
  <form action="" method="post" enctype="multipart/form-data">
    <h3>Update Thông Tin Khách Hàng </h3>
    <table>
      <?php if (empty($getId)=== false):  ?>
        <?php foreach ($getId as $value) :?>
          <label>Tên Khách hàng :</label>
          <input type="text" class="form-control" name="name" readonly value="<?php echo $value['username'];?>">
          <label>Địa Chỉ :</label>
          <input type="text" class="form-control" name="address" readonly value="<?php echo $value['address'];?>">
          <label>Số Điện Thoại:</label>
          <input type="text" class="form-control" name="phone" readonly value="<?php echo $value['Phone']?>">
          <label>Email:</label>
          <input type="email" class="form-control" name="email" readonly value="<?php echo $value['email']?>">
          <label>Note:</label>
          <input type="text" class="form-control" name="note" readonly value="<?php echo $value['note']?>">
          <label>Trạng Thái : </label>
          <input type="text" class="form-control" name="status" value="<?php echo $value['status']?>">
          <input type="submit" class="btn btn-success mt-3 mr-2"  value="Cập Nhật" name="add">
          <a href="listOrders.php" class="btn btn-danger mt-3">Hủy</a>
        <?php endforeach ?>
      <?php endif?>
    </table>
  </form>
</div>
</div>
<?php require_once 'footer.php';?>