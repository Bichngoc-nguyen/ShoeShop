<?php
ob_start();
require_once 'header.php';
require_once '../../Controllers/Lib/RequestController.php';
require_once '../../Controllers/Lib/CategoryController.php';
$cate = new CategoryController();
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $getId = $cate->getCategoriesId($id);
}
if (isset($_POST['add'])) {
  $update = $cate->updateCate();
}
?>

<div class="main-upadateSneakers mt-5">
  <form action="" method="POST" enctype="multipart/form-data">
    <h3>Update Categories</h3>
    <table>
      <?php if (empty($getId)=== false):  ?>
        <?php foreach ($getId as $value) :?>
          <label>Tên Thư Mục :</label>
          <input type="text" class="form-control" name="name" value="<?php echo $value['nameCategories'];?>">
          <input type="submit" class="btn btn-success mt-3 mr-2"  value="Cập Nhật" name="add">
          <a href="category.php" class="btn btn-danger mt-3">Hủy</a>
        <?php endforeach ?>
      <?php endif?>
    </table>
  </form>
</div>
</div>
<?php require_once 'footer.php';?>