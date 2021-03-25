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
        <input type="search" class="search p-2 mb-2" name="time" placeholder="Nhập tên SP, tên KH, trạng thái hoặc thời gian....">
        <input type="submit" class="btn btn-success" name="search" value="Search">
    </form>
    <form action="" method="GET">
        <table class="list text-center" border="1">
            <tr>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng Đã Bán</th>
                <th>Tổng Giá Tiền</th>
                <th>Thời gian</th>
                <th colspan="2">Active</th>
            </tr>
            <?php if (!empty($search)): ?>
              <?php $stt = 1; foreach ($search as $value) {?>
                <?php 
                    $price = (int)$value['price'];
                    $quantity = (int)$value['quantity'];
                ?>
                 <tr>
                    <td class="color"><?php echo $stt; ?></td>
                    <td><?php echo $value['nameProduct']; ?></td>
                    <td><?php echo $value['quantity']; ?></td>
                    <td><?php echo $quantity * $price.".000đ"; ?></td>
                    <td><?php echo $value['time'] ?></td>
                    <td><a href="updateBill.php?id=<?php echo $value['id'] ?>">Edit</a></td>
                    <td><a href="detailBill.php?id=<?php echo $value['customer_id'] ?>">Detail</a></td>
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