<?php
ob_start();
require_once 'header.php';
require_once '../../Controllers/Customers/CustomersController.php';
$customer = new CustomersController();
$search = $customer->searchCus();
$numPrev = $customer->getBtnPrevCus();
$numNext = $customer->getBtnNextCus();
$numPage = $customer->getNumPageCus();

?>

<div class="main-listSneakers mt-5">
    <form action="" method="POST">
        <input type="search" class="search p-2 mb-2" name="time" placeholder="Nhập tên SP, tên KH, trạng thái hoặc thời gian....">
        <input type="submit" class="btn btn-success" name="search" value="Search">
    </form>
    <form action="" method="GET">
        <table class="list text-center table table-striped" border="1">
            <tr>
                <th>STT</th>
                <th>Tên Khách Hàng</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Email</th>
                <th>Note</th>
                <th>Trạng Thái</th>
                <th>Thời gian</th>
                <th colspan="3">Active</th>
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
                    <td><?php echo $value['time'] ?></td>
                    <td><a class="action" href="updateCus.php?id=<?php echo $value['id'] ?>"><i class="fa fa-pencil" title="chỉnh sửa"></i></a></td>
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
<script language="javascript"> 
    function deletePD(delId){ 
        if (confirm("Are you sure you want to delete this record? ")==true){ 
            window.location.href="deleteCus.php?id=" + delId; 
        }
    } 
</script>
<?php require_once 'footer.php';?>