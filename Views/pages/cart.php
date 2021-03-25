<?php
    require_once 'header.php';
    require_once '../../Controllers/Pages/PagesController.php';
    require_once '../../Controllers/Lib/ConfirmController.php';
  $confirm = new ConfirmController();
    $pages = new PagesController();

    if (isset($_POST['updateCart'])) {
        $updateCart = $confirm->postCart();
    }
    if (isset($_GET['action'])) {
        $action = $confirm->postAction();
    }

?>
<!-- body -->

<div class="content m-auto">
    <h3>SẢN PHẨM MỚI</h3><hr>
    <?php if (!empty($_SESSION['cart'])):?>
    <form action="" method="POST">
        <table border="1">
            <tr>
                <th>TÊN SẢN PHẨM</th>
                <th>GIÁ</th>
                <th>SIZE</th>
                <th>SỐ LƯỢNG</th>
                <th>TỔNG</th>
                <th>Active</th>
            </tr>
            
                <?php foreach($_SESSION['cart'] as $value){?>
                    <?php
                        $quantity = (int)$value['quantity'];
                        $price = (int)$value['price'];
                    ?>
                    <tr>
                        <td>
                            <input type="text" name="nameProduct[]" readonly class="detail_input cart" value="<?php echo $value['name']?>">
                            <input type="hidden" name="id[]" value="<?php echo $value['id']?>">
                        </td>
                        <td>
                            <span class="detail_input cart"><?php echo $value['price']?>.000đ </span>
                            <input type="hidden" name="price[]" readonly class="detail_input cart" value="<?php echo $value['price']?>">
                        </td>
                        <td>
                            <input type="text" name="size[]" readonly class="detail_input cart" value="<?php echo $value['size']?>">    
                        </td>
                        <td>
                            <input type="number" name="quantity[]" min="1" max="10" value="<?php echo $value['quantity']?>"class="quantity text-center">
                        </td>
                        <td>
                            <input type="text" name="total[]" class="detail_input cart" readonly value="<?php echo $price*$quantity.'.000đ'?>">
                        </td>
                        <td><a href="cart.php?action=remove&id=<?php echo $value['id']?>" name="remove"><i class="fa fa-trash"></i></a></td>
                        
                    </tr>
                <?php }?>
                <tr>
                    <td colspan="5" class="total">Tổng Tiền: <input class="detail_input total" type="text" value="<?php $confirm->getTotal()?>"></td>
                    <td><a href="cart.php?action=clean"  name="action" class="btn btn-warning">Clean All</a></td>
                </tr>
            
            <div class="mb-3">
            <a href="index.php" class="btn btn-info mr-2"><i class="fa fa-arrow-left"></i> Tiếp Tục Chọn Sản Phẩm</a>

            <?php if (isset($_SESSION['cart'])):?>
            <button class="btn btn-warning mr-2" name="updateCart">Cập Nhật Giỏ Hàng</button>
            <a href="checkout.php" class="btn btn-danger">Thanh Toán</a>
            <?php endif?>

            </div>
        </table>
    </form>
    <?php endif?>
</div>
<?php
require_once 'footer.php';
?>
