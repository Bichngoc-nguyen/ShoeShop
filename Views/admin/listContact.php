<?php
require_once 'header.php';
require_once '../../Controllers/Products/ProductsController.php';
$product = new ProductsController();
$numPrev = $product->getBtnPrevContact();
$numNext = $product->getBtnNextContact();
$numPage = $product->getNumPageContact();
$list = $product->getAllContacts();

?>

<div class="main-listSneakers mt-5">
    <form action="" method="POST">
        Tìm Kiếm: <input type="search" class="search p-2 mb-2" name="name" placeholder="Nhập tên nhân viên, địa chỉ....">
        <input type="submit" class="btn btn-success" name="search" value="Search">
        <button class="btn btn-warning"><a href="createUser.php">Add</a></button>
    </form>
    <form action="" method="GET">
        <table class="list text-center" border="1">
            <tr>
                <th>STT</th>
                <th>Họ Tên KH</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Ghi Chú</th>
                <th>Thời Gian</th>
                <th colspan="3">Active</th>
            </tr>
            <?php if (!empty($list)): ?>
              <?php $stt = 1; foreach ($list as $value) {?>
                 <tr>
                    <td class="color"><?php echo $stt; ?></td>
                    <td><?php echo $value['username']; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td><?php echo $value['phone']; ?></td>
                    <td><?php echo $value['note']; ?></td>
                    <td><?php echo $value['time']; ?></td>
                    <td><a class="action" onClick="deleteCT(<?php echo $value['id'];?>)"><i class="fa fa-trash" title="xóa"></i></a></td>     
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
    function deleteCT(delId){ 
        if (confirm("Are you sure you want to delete this record? ")==true){ 
            window.location.href="delContact.php?id=" + delId; 
        }
    } 
</script>
<?php require_once 'footer.php';?>