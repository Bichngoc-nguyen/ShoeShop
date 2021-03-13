<?php
ob_start();
require_once 'header.php';
require_once '../../Controllers/Products/ProductsController.php';
require_once '../../Controllers/Lib/CategoryController.php';
$products = new ProductsController();
$cate = new CategoryController();

if (isset($_POST['add'])) {
    $add =  $products->createProducts();
}
?>

<div class="main-createSneakers mt-5">
    <form action="" method="POST" enctype="multipart/form-data">
        <h3>Register Giày </h3>
        <label>Name :</label>
        <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
        <label>Desciption :</label>
        <input type="file" name="descript" multiple="multiple" value=""><br>
        <label>Image :</label>
        <input type="file" name="photo" value=""> <br>
        <label>Price :</label>
        <input type="text" class="form-control" name="price" placeholder="Giá sản phẩm">
        <label>Quantity :</label>
        <input type="text" class="form-control" name="quantity" placeholder="Số lượng sản phẩm">
        <label>Category :</label>
        <?php $cate->getCategory()?>
        <input type="submit" class="btn btn-success"  value="Thêm" name="add">
        <input type="button" value="Hủy">
    </form>
</div>
</div>
<?php
require_once 'footer.php';