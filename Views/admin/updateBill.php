<?php
ob_start();
require_once 'header.php';
require_once '../../Controllers/Lib/RequestController.php';
require_once '../../Controllers/Products/ProductsController.php';
$admin = new ProductsController();
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // var_dump($id);
  // die();
  $getId = $admin->getEditBill($id);
}
if (isset($_POST['add'])) {
  $update = $admin->updateBill();
}
?>

<div class="main-upadateSneakers mt-5">
  <form action="" method="post" enctype="multipart/form-data">
    <h3>Update Giày Product Orders </h3>
    <table>
      <?php if (empty($getId)=== false):  ?>
        <?php foreach ($getId as $value) :?>
          <?php 
            $price = (int)$value['price'];
            $quantity = (int)$value['quantity'];
          ?>
          <label>Tên Khách hàng :</label>
          <input type="text" class="form-control" name="name" readonly value="<?php echo $value['username'];?>">
          <label>Tên Sản Phẩm :</label>
          <input type="text" class="form-control" name="name" readonly value="<?php echo $value['nameProduct'];?>">
          <label>Số Lượng :</label>
          <input type="text" class="form-control" name="quantity" readonly value="<?php echo $value['quantity']?>">
          <label>Tổng Giá Tiền :</label>
          <input type="text" class="form-control" name="total" readonly value="<?php echo $quantity * $price.".000đ"; ?>">
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