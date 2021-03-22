<?php
require_once 'header.php';
require_once '../../Controllers/Admin/AdminController.php';
$admin = new AdminController();
if (isset($_GET['id'])) {
    $id = $_GET['id'];  
    $getDetail = $admin->DetailUser($id);
}
?>

<div class="main-listSneakers mt-5">
    <div class="detail_info">
        <h3>Thông tin chi tiết</h3>
        <form method="get">
            <table class="table">
                <?php if(!empty($getDetail)): ?>
                <?php foreach ($getDetail as $value) {?>
                <tr>
                    <th>Họ Tên: </th>
                    <td><?php echo $value['username']?></td>
                </tr>
                <tr>
                    <th>Địa Chỉ: </th>
                    <td><?php echo $value['address']?></td>
                </tr>
                <tr>
                    <th>Ngày Sinh: </th>
                    <td><?php echo $value['birthday']?></td>
                </tr>
                <tr>
                    <th>Số Điện Thoại: </th>
                    <td><?php echo $value['phone']?></td>
                </tr>
                <tr>
                    <th>Email: </th>
                    <td><?php echo $value['email']?></td>
                </tr>
                <tr>
                    <th>Mật Khẩu: </th>
                    <td><?php echo $value['password']?></td>
                </tr>
                <tr>
                    <th>Chức Vụ: </th>
                    <td><?php echo $value['position']?></td>
                </tr>
                <tr>
                    <th>Hình Đại Diện: </th>
                    <td><img src="../../public/upload/<?php echo $value['avatar']?>"> </td>
                </tr>
                    <?php }?>
            <?php endif?>
            </table>
                <a href="updateUser.php?id=<?php echo $value['id'] ?>" class="btn btn-warning">Edit</a>
                <a href="delUser.php?id=<?php echo $value['id'] ?>"  class="btn btn-danger">Del</a>
        </form>
    </div>
</div>
</div>
<?php require_once 'footer.php';?>