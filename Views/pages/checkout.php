<?php
    require_once 'header.php';
    require_once '../../Controllers/Pages/PagesController.php';
    $pages = new PagesController();
    if (isset($_POST['payment'])) {
        $getPayment = $pages->getPayment();
    }
    if (isset($_POST['updateCart'])) {
        $updateCart = $confirm->postCart();
    }
    if (isset($_GET['action'])) {
        $action = $confirm->postAction();
    }

?>
<!-- body -->

<div class="content m-auto">
    <form action="" method="POST">
        <div class="row">
            <!-- info customer -->
            <div class="col-xs-12 col-sm-12 col-lg-4 ml-5 mt-5">
                <h3>THÔNG TIN KHÁCH HÀNG</h3>
                <label>Họ tên *</label>
                <input type="text" name="username" class="form-control" required>
                <label>Địa Chỉ *</label>
                <input type="text" name="address" class="form-control" required>
                <label>Số Điện Thoại *</label>
                <input type="text" name="phone" max="10" class="form-control" required>
                <label>Email *</label>
                <input type="email" name="email" class="form-control" required>
                <label>Thông Tin Bổ Sung</label>
                <textarea name="note" cols="30" class="form-control" rows="10"></textarea>
            </div>
            <!-- col products -->
            <div class="col-xs-12 col-sm-12 col-lg-7 p-4 m-3 info_cart">
                <h3>ĐƠN HÀNG CỦA BẠN</h3>
                <table class="table">
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Size</th>
                            <th>Số Lượng</th>
                            <th>Tạm Tính</th>
                        </tr>
                        <?php if (isset($_SESSION['cart'])):?>
                            <?php foreach($_SESSION['cart'] as $value){?>
                                <?php
                                    $quantity = (int)$value['quantity'];
                                    $price = (int)$value['price'];
                                ?>
                                <tr>
                                    <td>
                                        <input type="text" name="nameProduct" readonly class="detail_input cart" value="<?php echo $value['name']?>">
                                    </td>
                                    <td>
                                        <input type="text" name="size" readonly class="detail_input cart" value="<?php echo $value['size']?>">
                                    </td>
                                    <td class="detail_total">
                                        <input type="text" name="price" readonly class="detail_input cart" value="<?php echo $value['price']?>">
                                    </td>
                                    <td>
                                        <input type="text" name="quantity" min="1" max="10" onchange="updateQ(<?php echo $value['quantity']?>)" value="<?php echo $value['quantity']?>"class="quantity detail_input cart text-center">
                                    </td>
                                    <td>
                                        <input type="text" name="total" class="detail_input cart" readonly value="<?php echo (int)$value['quantity'] * (int)$value['price'].'.000đ'?>">
                                    </td>
                                </tr>
                            <?php }?>
                        <?php endif?>
                                <tr>
                                    <th colspan="3">Tổng Tiền: </th>
                                    <td><input class="detail_input cart" type="text" name="sum" readonly value="<?php $confirm->getTotal()?>"></td>
                                </tr>
                </table>
                        <div class="mb-3">
                            <b>Trả tiền mặt khi nhận hàng</b>
                            <p>Trả tiền mặt khi giao hàng</p>
                        <input type="submit" class="btn btn-danger" name="payment" value="Đặt Hàng">
                        </div>
            </div>
        </div>
    </form>
</div>
<?php
require_once 'footer.php';
?>
