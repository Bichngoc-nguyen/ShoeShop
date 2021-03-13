<?php
require_once 'header.php';
require_once '../../Controllers/Products/ProductsController.php';
$products = new ProductsController();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $getBill = $products->getDetailBill($id);
}

?>

<div class="main-listSneakers detail_bill mt-5">
    <form action="" method="GET">
        <div class="row ml-0 mr-0 mt-5">
            <div class="col-6">
                <?php if (!empty($getBill)): ?>
                    <?php foreach ($getBill as $value) {?>
                        <p class="info_shop mb-0">
                            <span class="name_shop"><h4>THÔNG TIN KHÁCH HÀNG</h4></span>
                        </p>
                        <p>
                            <b><i>Tên Khách hàng: </i></b>
                            <?php echo $value['username'];?>
                        </p>
                        <p>
                            <b><i>Địa chỉ: </i></b>
                            <?php echo $value['address'];?>
                        </p>
                        <p>
                            <b><i>Số điện thoại: </i></b>
                            <?php echo $value['Phone'];?>
                        </p>
                        <p>
                            <b><i>Email: </i></b>
                            <?php echo $value['email'];?>
                        </p>
                        <p>
                            <b><i>Note: </i></b>
                            <?php echo $value['note'];?>
                        </p>
                        <?php break; } ?>
                    <?php endif ?>
                </div>
                <div class="col-6">
                    <p class="info_shop mb-0">
                        <span class="name_shop"><h3>SHOESHOP</h3></span>
                    </p>
                    <p>
                        <b><i>Địa chỉ: </i></b>
                        174 LÂM VĂN BỀN, P.TÂN QUY, Q.7, TP HCM
                    </p>
                    <p>
                        <b><i>Email: </i></b>
                        kinhdoanh@gaugaushop.com
                    </p>
                    <p>
                        <b><i>Số điện thoại : </i></b>
                        0909052817 – 0963404074 – 0933463332
                    </p>
                </div>
            </div>
            <table class="list text-center" border="1">
                <tr>
                    <td>STT</td>
                    <td>Tên Sản Phẩm</td>
                    <td>Số Lượng</td>
                    <td>Thành Tiền</td>
                </tr>
                <?php if (!empty($getBill)): ?>
                    <?php $stt = 1; foreach ($getBill as $value) {?>
                        <tr>
                            <td class="color"><?php echo $stt; ?></td>
                            <td><?php echo $value['nameProduct']; ?></td>
                            <td><?php echo $value['quantity']; ?></td>
                            <td><?php echo $value['total']; ?></td>
                        </tr>
                        <?php $stt++; } ?>
                    <?php endif ?>
                    <tr>
                        <td colspan="4"><b>Tổng tiền: <?php echo $value['sum']?></b></td>
                    </tr>
                </table>
            </form>
            <div class="row ml-0 mr-0 text-center">
                <div class="col-6">
                    <b>Chú ý:</b>
                    <p> - Quý khách vui lòng đổi hàng bị lỗi trong vòng 7 ngày (Nhớ kèm theo hóa đơn). <br>
                    - Quá thời hạn ghi trên hóa đơn chúng tôi hoàn toàn không chịu trách nghiệm. Xin cảm ơn!</p>
                </div>
                <div class="col-6">
                    <p>Ngày ........ Tháng .......... Năm......</p>
                    <b>Người viết hóa đơn</b>
                </div>
            </div>
            <a href="#" class="btn btn-danger">In Hóa Đơn</a>
            <a href="listOrders.php" class="btn btn-warning">Hủy</a>
        </div>
    </div>
    <?php require_once 'footer.php';?>