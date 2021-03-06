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
        <table class="list text-center table" border="1">
            <tr>
                <th>STT</th>
                <!-- <th>ih</th> -->
                <th>Tên SP</th>
                <th>Hình Ảnh</th>
                <th>Mô Tả</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>Số Lượng Đã Bán</th>
                <th>Số lượng Tồn Kho</th>
                <th colspan="3">Active</th>
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
                        <td>
                            <?php foreach($value['gallery'] as $item): ?>
                                <img src="<?php echo '../../public/upload/'.$item; ?>" alt="">
                            <?php endforeach ?>
                        </td>
                        <td><?php echo $value['price']; ?></td>
                        <td><?php echo $value['quantity']; ?></td>
                        <td><?php echo $quanSell?></td>
                        <td><?php echo $quanKho ?></td>
                        <td><a href="updateProduct.php?id=<?php echo $value['id'] ?>">Edit</a></td>
                        <td><a href="detailProduct.php?id=<?php echo $value['id'] ?>">Detail</a></td>
                        <td><a class="action" onClick="deletePD(<?php echo $value['id'];?>)"><i class="fa fa-trash" title="xóa"></i></a></td>    
                    </tr>
                    <?php $stt++; } ?>
                <?php endif ?>
            </table>
        </form>
    </div>
</div>
<?php 
    require_once 'confirmDel.php';
    require_once 'footer.php';
?>