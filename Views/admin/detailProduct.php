<?php
    require_once 'header.php';
    require_once '../../Controllers/Products/ProductsController.php';
    $admin = new ProductsController();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $getList =  $admin->getIdProduct($id);
    }
    // edit 
    if (isset($_POST['add'])) {
       $update = $admin->updateProduct();
    }
    // delete
    if (isset($_POST['cancel'])) {
        $del = $admin->delProduct($id);
    }
?>

<div class="main-listSneakers mt-5">
    <form action="" method="POST">
        <table class="list text-center" border="1">
            <tr>
                <td>STT</td>
                <!-- <td>id</td> -->
                <td>Tên SP</td>
                <td>Hình Ảnh</td>
                <td>Mô Tả</td>
                <td>Giá</td>
                <td>Số Lượng</td>
                <td>Số Lượng Đã Bán</td>
                <td>Số lượng Tồn Kho</td>
                <td colspan="3">Active</td>
            </tr>
            <?php if (!empty($getList)): ?>
		<?php $stt = 1; foreach ($getList as $value) {?>
			<tr>
				<td class="color"><?php echo $stt; ?></td>
					<td><?php echo $value['nameProduct']; ?></td>
					<td><img src="<?php echo '../../public/img/'.$value['photo']; ?>" alt=""></td>
					<td><img src="<?php echo '../../public/img/'.$value['image']; ?>" alt=""></td>
					<td><?php echo $value['price']; ?></td>
					<td><?php echo $value['quantity']; ?></td>
					<td>Trống</td>
					<td>Trống</td>
					<td><a href="updateProduct.php?id=<?php echo $_GET['id'] ?>">Edit</a></td>
					<td><a href="deleteProduct.php?id=<?php echo $_GET['id'] ?>">Del</a></td>
				</tr>
				<?php $stt++; } ?>
			<?php endif ?>
        </table>
    </form>
</div>
</div>
<?php require_once 'footer.php';?>