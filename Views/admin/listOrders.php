<?php
require_once 'header.php';
require_once '../../Controllers/Products/ProductsController.php';
$products = new ProductsController();
$search = $products->searchBill();
$numPrev = $products->getBtnPrevBill();
$numNext = $products->getBtnNextBill();
$numPage = $products->getNumPageBill();
$getBill = $products->getOrderBill();

?>

<div class="main-listSneakers mt-5">
    <form action="" method="POST">
        <input type="search" class="search p-2 mb-2" name="time" placeholder="Search....">
        <input type="submit" class="btn btn-success" name="search" value="Search">
    </form>
    <form action="" method="GET">
        <table class="list text-center" border="1">
            <tr>
                <td>STT</td>
                <td>Tên Sản Phẩm</td>
                <td>Số Lượng Đã Bán</td>
                <td>Tổng Giá Tiền</td>
                <td>Tình Trạng</td>
                <td>Thời gian</td>
                <td colspan="3">Active</td>
            </tr>
            <?php if (!empty($search)): ?>
              <?php $stt = 1; foreach ($search as $value) {?>
                 <tr>
                    <td class="color"><?php echo $stt; ?></td>
                    <td><?php echo $value['nameProduct']; ?></td>
                    <td><?php echo $value['quantity']; ?></td>
                    <td><?php echo $value['total']; ?></td>
                    <td><?php echo $value['status']?></td>
                    <td><?php echo $value['time'] ?></td>
                    <td><a href="updateBill.php?id=<?php echo $value['customer_id'] ?>">Edit</a></td>
                    <td><a href="detailBill.php?id=<?php echo $value['customer_id'] ?>">Detail</a></td>
                    <td><a href="deleteBill.php?id=<?php echo $value['customer_id'] ?>">Del</a></td>
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