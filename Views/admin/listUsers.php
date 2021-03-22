<?php
require_once 'header.php';
require_once '../../Controllers/Admin/AdminController.php';
$admin = new AdminController();
$search = $admin->searchUsers();
$numPrev = $admin->getBtnPrevUsers();
$numNext = $admin->getBtnNextUsers();
$numPage = $admin->getNumPageUsers();
$getUsers = $admin->getAllListUsers();

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
                <th>Tên Nhân Viên</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Avatar</th>
                <th colspan="3">Active</th>
            </tr>
            <?php if (!empty($search)): ?>
              <?php $stt = 1; foreach ($search as $value) {?>
                 <tr>
                    <td class="color"><?php echo $stt; ?></td>
                    <td><?php echo $value['username']; ?></td>
                    <td><?php echo $value['address']; ?></td>
                    <td><?php echo $value['phone']; ?></td>
                    <td><img src="../../public/upload/<?php echo $value['avatar']?>"></td>
                    <td><a href="updateUser.php?id=<?php echo $value['id'] ?>">Edit</a></td>
                    <td><a href="detailUser.php?id=<?php echo $value['id'] ?>">Detail</a></td>
                    <td><a href="delUser.php?id=<?php echo $value['id'] ?>">Del</a></td>
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