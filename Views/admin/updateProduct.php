<?php
ob_start();
  require_once 'header.php';
  require_once '../../Controllers/Lib/RequestController.php';
  require_once '../../Controllers/Products/ProductsController.php';
  $admin = new ProductsController();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $getId = $admin->getIdProduct($id);
    }
    if (isset($_POST['add'])) {
      $update = $admin->updateProduct();
    }
?>

<div class="main-upadateSneakers mt-5">
    <form action="" method="POST" enctype="multipart/form-data">
      <h3>Update Giày Sneakers</h3>
      <table>
        <?php if (empty($getId)=== false):  ?>
        <?php foreach ($getId as $value) :?>
        <label>Name :</label>
        <input type="text" class="form-control" name="name" value="<?php echo $value['nameProduct'];?>">
        <label>Desciption :</label>
        <input type="file" name="descript" multiple="multiple"><br>
        <label>Image :</label>
        <input type="file" name="photo"> <br>
        <label>Price :</label>
        <input type="text" class="form-control" name="price" value="<?php echo $value['price']?>">
        <label>Quantity :</label>
        <input type="text" class="form-control" name="quantity" value="<?php echo $value['quantity']?>">
        <input type="submit" class="btn btn-success"  value="Thêm" name="add">
        <input type="submit" class="btn btn-danger" value="Hủy" name="cancel">
        <?php endforeach ?>
        <?php endif?>
      </table>
    </form>
</div>
</div>
<?php require_once 'footer.php';?>