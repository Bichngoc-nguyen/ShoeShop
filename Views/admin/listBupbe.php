<?php
ob_start();
require_once 'header.php';
require_once '../../Controllers/Products/ProductsController.php';
$products = new ProductsController();
$search =  $products->searchBupbe();
$numPrev = $products->getBtnPrevBB();
$numNext = $products->getBtnNextBB();
$numPage = $products->getNumPageBB();
$getSelling = $products->getSellingProducts();

?>

<div class="main-listSneakers mt-5">
    <form action="" method="POST">
        <input type="search" class="search p-2 mb-2" name="name" placeholder="Search....">
        <input type="submit" class="btn btn-success" name="search" value="Search">
        <a href="createProduct.php" class="btn btn-warning">Add</a>
    </form>
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
            <?php if (!empty($search)): ?>
              <?php $stt = 1; foreach ($search as $value) {?>
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
                        <td><?php echo $quanSell;?></td>
                        <td><?php echo $quanKho; ?></td>
                        <td><a href="updateProduct.php?id=<?php echo $value['id'] ?>">Edit</a></td>
                        <td><a href="detailProduct.php?id=<?php echo $value['id'] ?>">Detail</a></td>
                        <td><a href="deleteProduct.php?id=<?php echo $value['id'] ?>">Del</a></td>
                    </tr>
                    <?php $stt++; } ?>
                <?php endif ?>
            </table>
            <p class="link_page mt-3 p-1 pl-4">
                <?php echo $numPrev ?>
                <?php echo $numPage ?>
                <?php echo $numNext?>
            </p>
        </form>
    </div>
</div>
<?php require_once 'footer.php';?>