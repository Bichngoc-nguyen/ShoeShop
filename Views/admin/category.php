<?php
ob_start();
require_once 'header.php';
require_once '../../Controllers/Lib/CategoryController.php';
$cate = new CategoryController();
$listCate = $cate->getAllListCategories();

if (isset($_POST['add'])) {
    $add =  $cate->createCate();
}
?>

<div class="main-createCate mt-5">
    <!-- tạo danh mục -->
    <div class="createCate p-4 mb-5">
        <form action="" method="POST" enctype="multipart/form-data">
        <h3>Thêm Danh Mục </h3>
        <label>Tên Danh Mục :</label>
        <input type="text" name="name" class="form-control mb-1" placeholder="Nhập Tên Danh Mục">
        <input type="submit" class="btn btn-success"  value="Thêm" name="add">
        <a class="btn btn-danger"href="index.php">Hủy</a>
    </form>
    </div>
    <!-- list danh mục -->
    <div class="listCate">
        <form action="" method="GET">
            <table class="table" border="1">
                <tr>
                    <th>Stt</th>
                    <th>Tên Danh Mục</th>
                    <th colspan="2">Active</th>
                </tr>
                <?php if(!empty($listCate)):?>
                    <?php $stt=1; foreach ($listCate as $value){?>
                        <tr>
                            <td><?php echo $stt?></td>
                            <td><?php echo $value['nameCategories']?></td>
                            <td><a href="updateCate.php?id=<?php echo $value['id']?>" class="btn btn-warning">Edit</a></td>
                            <td><a href="delCate.php?id=<?php echo $value['id']?>" class="btn btn-danger">Del</a></td>
                        </tr>
                    <?php $stt++; }?>
                <?php endif;?>

            </table>
        </form>
    </div>
</div>
</div>
<?php
require_once 'footer.php';