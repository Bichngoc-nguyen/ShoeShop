<?php
ob_start();
require_once 'header.php';
require_once '../../Controllers/Lib/RequestController.php';
require_once '../../Controllers/Products/ProductsController.php';
$admin = new ProductsController();
if (isset($_GET['customer_id'])) {
  $id = $_GET['customer_id'];
  $getId = $admin->getOrderBillID($id);
}
if (isset($_POST['add'])) {
  $update = $admin->updateBill();
}
?>

<div class="main-upadateSneakers mt-5">
  <form action="" method="POST" enctype="multipart/form-data">
    <h3>Update Giày Sneakers</h3>
    <table>
      <?php if (empty($getId)=== false):  ?>
        <?php foreach ($getId as $value) :?>
          <label>Tên Sản Phẩm :</label>
          <input type="text" class="form-control" name="name" readonly value="<?php echo $value['nameProduct'];?>">
          <label>Số Lượng :</label>
          <input type="text" class="form-control" name="quantity" readonly value="<?php echo $value['quantity']?>">
          <label>Tổng Giá Tiền :</label>
          <input type="text" class="form-control" name="total" readonly value="<?php echo $value['total']?>">
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