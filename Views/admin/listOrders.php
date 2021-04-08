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
  <h2>CHI TIẾT SẢN PHẨM</h2>
    <form action="" method="POST">
        <input type="text" class="search p-2 mb-2" name="time" placeholder="Nhập tên sản phẩm hoặc thời gian...">
        <input type="submit" class="btn btn-success" name="search" value="Search">
    </form>
    <!-- ko cần thiết -->
    <form action="" method="GET">
        <table class="list text-center table table-striped" border="1">
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
                    <td><a class="action" href="detailBill.php?id=<?php echo $value['customer_id'] ?>"><i class="fa fa-info" title="chi tiết"></i></a></td>
                    <td><a class="action" onClick="deletePD(<?php echo $value['id'];?>)"><i class="fa fa-trash" title="xóa"></i></a></td> 
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