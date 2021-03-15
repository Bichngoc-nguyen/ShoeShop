<?php
require_once 'header.php';
require_once '../../Controllers/Pages/PagesController.php'; 
require_once '../../Controllers/Lib/ConfirmController.php';  
$pages = new PagesController();
$confirm = new ConfirmController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $getDetail=$pages->getDetailProducts($id);
}

if (isset($_POST['buy'])) {
    $getCart = $confirm->postCart();
}
?>
<!-- body -->
<div class="content m-auto">
    <h3>SẢN PHẨM MỚI</h3><hr>
    <form action="" method="post">
        <div class="content-products row ml-0 mr-0">
            <?php if (!empty($getDetail)): ?>
                <?php foreach($getDetail as $value){?>
                    <?php
                    $quantity = (int)$value['quantity'];
                    $price = (int)$value['price'];
                    $total = $quantity*$price;
                    ?>
                    <div class="col-xs-12 col-sm-6 col-lg-6 content-products_item show_image mb-4">
                        <!-- hinh anh big -->
                        <div class="products-item_image detail big_img">
                            <img src="<?php echo '../../public/upload/'.$value['photo'];?>". alt="">
                        </div>
                        <!-- hinh anh descript -->
                        <div class="products-item_description small_img mt-1">
                            <img class="description-img-detail" src="<?php echo '../../public/upload/'.$value['image'];?>" alt="">
                        </div>
                    </div>
                    <!-- chi tiet sp -->
                    <div class="col-xs-12 col-sm-6 col-lg-6 content-products_item mb-4">
                        <h1><input type="text"class="nameProduct" readonly name="nameProduct" value="<?php echo $value['nameProduct']?>"></h1>
                        <i>Chất liệu cao cấp, bền đẹp theo thời gian. Thiết kế thời trang. Kiểu dáng phong cách. Độ bền cao. Dễ phối đồ.</i>
                        <p class="description-price price">
                            Giá: <input type="text" name="price" class="detail_input" readonly value="<?php echo $value['price']?>">.000đ
                        </p>
                        <div id="size">
                            <b>Size:</b>
                            <input type="radio" name="size" title="36" value="36" checked>
                            <input type="radio" name="size" title="37" value="37">
                            <input type="radio" name="size" title="38" value="38">
                            <input type="radio" name="size" title="39" value="39">
                            <input type="radio" name="size" title="40" value="40">
                        </div>
                        <p>
                            <b>Số lượng: </b>
                            <input type="number" name="quantity" min="1" max="10" value="1" class="quantity text-center">
                        </p>
                        <button class="btn-warning buy p-2" name="buy">MUA NGAY</button><br><br>
                        <p>
                            <b>Hàng Có Sẵn Tại Shop - Giao Hàng Cực Nhanh Toàn Quốc (1-3 ngày)</b><br>
                        Hotline đặt hàng nhanh: 0909052817 - 0963404074 (Zalo - Viber)</p>
                    </div>
                <?php }?>
            <?php endif?>
        </div>
    </form>
</div>
<?php
require_once 'footer.php';
?>
