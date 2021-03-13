<?php
require_once 'header.php';
require_once '../../Controllers/Products/ProductsController.php';
$products = new ProductsController();
$getSelling = $products->getSellingProducts();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $getList =  $products->getIdProduct($id);
}
    // edit 
if (isset($_POST['add'])) {
 $update = $products->updateProduct();
}
    // delete
if (isset($_POST['cancel'])) {
    $del = $products->delProduct($id);
}
?>

<div class="main-listSneakers mt-5">
    <form action="" method="POST">
        <table class="list text-center" border="1">
            <tr>
                <td>STT</td>
                <!-- <td>id</td> -->
                <td>Tên SP</td>
                <td>Hình Ảnh</td>
                <td>Mô Tả</td>
                <td>Giá</td>
                <td>Số Lượng</td>
                <td>Số Lượng Đã Bán</td>
                <td>Số lượng Tồn Kho</td>
                <td colspan="3">Active</td>
            </tr>
            <?php if (!empty($getList)): ?>
              <?php $stt = 1; foreach ($getList as $value) {?>
                <?php if (!empty($getSelling)): ?>
                  <?php foreach ($getSelling as $selling) {?>
                    <?php 
                            $quanTotal = $value['quantity'];// tổng số sp 
                            $nameP = $value['nameProduct'];
                            $quanSell = $selling['quantity']; // số sp đã bán
                            $quanKho = 0; // số sp tồn kho
                            $nameO = $selling['nameProduct'];
                            if ($nameO == $nameP) {
                                $quanKho = $quanTotal - $quanSell;
                                $quanSell = $quanSell;
                                break;
                            }else{
                                $quanSell = 0;
                                $quanKho = $quanTotal;
                            }
                            ?>
                        <?php }?>
                    <?php endif?>
                    <tr>
                        <td class="color"><?php echo $stt; ?></td>
                        <td><?php echo $value['nameProduct']; ?></td>
                        <td><img src="<?php echo '../../public/upload/'.$value['photo']; ?>" alt=""></td>
                        <td><img src="<?php echo '../../public/upload/'.$value['image']; ?>" alt=""></td>
                        <td><?php echo $value['price']; ?></td>
                        <td><?php echo $value['quantity']; ?></td>
                        <td><?php echo $quanSell?></td>
                        <td><?php echo $quanKho ?></td>
                        <td><a href="updateProduct.php?id=<?php echo $value['id'] ?>">Edit</a></td>
                        <td><a href="detailProduct.php?id=<?php echo $value['id'] ?>">Detail</a></td>
                        <td><a href="deleteProduct.php?id=<?php echo $value['id'] ?>">Del</a></td>
                    </tr>
                    <?php $stt++; } ?>
                <?php endif ?>
            </table>
        </form>
    </div>
</div>
<?php require_once 'footer.php';?>