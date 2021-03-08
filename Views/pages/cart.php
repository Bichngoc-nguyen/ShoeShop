<?php
    require_once 'header.php';
    require_once '../../Controllers/Lib/ConfirmController.php';
    require_once '../../Controllers/Pages/PagesController.php';
    $pages = new PagesController();
    $confirm = new ConfirmController();
    if (isset($_POST['payment'])) {
        // $getPayment = $pages->getPayment();
    }

    if (isset($_POST['updateCart'])) {
        $updateCart = $confirm->postCart();
    }
    if (isset($_GET['action'])) {
        $action = $confirm->postAction();
    }
    
    // if (isset($_POST['remove'])) {
    //     $action = $confirm->postRemove();
    // }

?>
<!-- body -->

<div class="content m-auto">
    <h3>SẢN PHẨM MỚI</h3><hr>
    <form action="" method="POST">
        <table border="1">
            <tr>
                <th>TÊN SẢN PHẨM</th>
                <th>GIÁ</th>
                <th>SIZE</th>
                <th>SỐ LƯỢNG</th>
                <th>TỔNG</th>
                <th></th>
            </tr>
            <?php if (isset($_SESSION['cart'])):?>
                <?php foreach($_SESSION['cart'] as $value){?>
                    <?php
                    $quantity = (int)$value['quantity'];
                    $price = (int)$value['price'];
                    $total = 0;
                    ?>
                    
                    <tr>
                        <td>
                            <input type="text" name="nameProduct" readonly class="detail_input" value="<?php echo $value['name']?>">
                        </td>
                        <td>
                            <input type="text" name="price" readonly class="detail_input" value="<?php echo $value['price']?>">
                        </td>
                        <td>
                            <input type="text" name="size" readonly class="detail_input" value="<?php echo $value['size']?>">    
                        </td>
                        <td>
                            <input type="number" name="quantity" value="<?php echo $value['quantity']?>" class="quantity text-center">
                        </td>
                        <td>
                            <?php echo ($price*$quantity).'.000đ'?>
                        </td>
                        <td><a href="cart.php?action=remove&id=<?php echo $value['id']?>" name="remove"><i class="fa fa-trash"></i></a></td>
                    </tr>
                <?php }?>
                    <tr>
                        <td colspan="5">Tổng Tiền:
                            <?php
                                $total = $total + ($quantity * $price);
                                echo number_format($total,2);
                            ?>
                        </td>
                        <td><a href="cart.php?action=clean"  name="action" class="btn btn-warning">Clean All</a></td>
                    </tr>
            <?php endif?>
            <button class="btn-danger" name="payment">Thanh Toán</button>
            <button class="btn-danger" name="updateCart">Cập Nhật Giỏ Hàng</button>
        </table>
    </form>
</div>
<?php
require_once 'footer.php';
?>
