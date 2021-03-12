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
            <div class="col-xs-12 col-sm-12 col-lg-6 mt-5">
                <h3>THÔNG TIN KHÁCH HÀNG</h3>
                <label>Họ tên *</label>
                <input type="text" name="username" class="form-control" required>
                <label>Địa Chỉ *</label>
                <input type="text" name="address" class="form-control" required>
                <label>Số Điện Thoại *</label>
                <input type="text" name="phone" class="form-control" required>
                <label>Email *</label>
                <input type="email" name="email" class="form-control" required>
                <label>Thông Tin Bổ Sung</label>
                <textarea name="note" cols="30" class="form-control" rows="10"></textarea>
            </div>
            <!-- col products -->
            <div class="col-xs-12 col-sm-12 col-lg-5 p-4 m-3 info_cart">
                <h3>ĐƠN HÀNG CỦA BẠN</h3>
                <table class="table">
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Tạm Tính</th>
                        </tr>
                        <?php if (isset($_SESSION['cart'])):?>
                            <?php foreach($_SESSION['cart'] as $value){?>
                                <?php
                                $total = 0;
                                $quantity = (int)$value['quantity'];
                                $price = (int)$value['price'];
                                ?>
                                
                                <tr>
                                    <td>
                                        <input type="text" name="nameProduct" readonly class="detail_input" value="<?php echo $value['name']?>">
                                    </td>
                                    <td>
                                        <input type="text" name="quantity" min="1" max="10" value="<?php echo $value['quantity']?>"class="quantity detail_input text-center">
                                    </td>
                                    <td>
                                        <input type="text" name="total" class="detail_input" readonly value="<?php echo ($price*$quantity).'.000đ'?>">
                                    </td>
                                </tr>
                            <?php }?>
                                <tr>
                                    <th>Tổng Tiền: </th>
                                    <td></td>
                                    <td><input class="detail_input" type="text" name="sum" readonly value="<?php $confirm->getTotal()?>"></td>
                                </tr>
                        <?php endif?>
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