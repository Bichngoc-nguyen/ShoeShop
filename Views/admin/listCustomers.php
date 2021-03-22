<?php
ob_start();
require_once 'header.php';
require_once '../../Controllers/Customers/CustomersController.php';
$customer = new CustomersController();
$search = $customer->searchCus();
$numPrev = $customer->getBtnPrevCus();
$numNext = $customer->getBtnNextCus();
$numPage = $customer->getNumPageCus();
// $getCus = $customer->getCustomers();

?>

<div class="main-listSneakers mt-5">
    <form action="" method="POST">
        Tìm kiếm: <input type="search" class="search p-2 mb-2" name="name" placeholder="Search....">
        <input type="submit" class="btn btn-success" name="search" value="Search">
    </form>
    <form action="" method="GET">
        <table class="list text-center" border="1">
            <tr>
                <td>STT</td>
                <td>Tên Khách Hàng</td>
                <td>Địa Chỉ</td>
                <td>Số Điện Thoại</td>
                <td>Email</td>
                <td>Note</td>
                <td>Trạng Thái</td>
                <td colspan="3">Active</td>
            </tr>
            <?php if (!empty($search)): ?>
              <?php $stt = 1; foreach ($search as $value) {?>
                 <tr>
                    <td class="color"><?php echo $stt; ?></td>
                    <td><?php echo $value['username']; ?></td>
                    <td><?php echo $value['address']; ?></td>
                    <td><?php echo $value['Phone']; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td><?php echo $value['note']?></td>
                    <td><?php echo $value['status'] ?></td>
                    <td><a href="updateCus.php?id=<?php echo $value['id'] ?>">Edit</a></td>
                    <td><a href="detailBill.php?id=<?php echo $value['customer_id'] ?>">Detail</a></td>
                    <td><a href="deleteCus.php?id=<?php echo $value['id'] ?>">Del</a></td>
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