<?php
    require_once 'header.php';
    require_once '../../Controllers/Pages/PagesController.php';  
    $pages = new PagesController();
    if (isset($_POST['contact'])) {
        $contact = $pages->postContact();
    }
?>
<!-- body -->
<div class="content m-auto">
    <div class="content_contact">
        <h2>LIÊN HỆ VỚI SHOESHOP</h2><hr class="mt-0">
            <div class="contact-item row ml-0 mr-0">
                <div class="col-xs-12 col-sm-12 col-lg-7">
                    <form action="" method="POST">
                        <input type="text" class="w3-input" name="username" placeholder="Họ và tên của bạn">
                        <input type="text"  class="w3-input" name="email" placeholder="Email">
                        <input type="text" name="phone" class="w3-input" placeholder="Số điện thoại">
                        <textarea name="note" class="w3-input" placeholder="Nội dung bạn muốn nhắn gửi" cols="30" rows="10"></textarea>
                        <input type="submit" name="contact" class="btn btn-dark" value="GỬI TỚI SHOESHOP">
                    </form>
                </div>

                <div class="col-xs-12 col-sm-12 col-lg-5">
                    <div class="contact_info p-5">
                        <h3>0909052817</h3>
                        <p>Hỗ trợ từ: 9:00-21:00</p>
                        <p><b>Địa chỉ: </b>174 LÂM VĂN BỀN, P.TÂN QUY, Q.7, TP HCM</p>
                        <p><b>Email: </b>kinhdoanh@gaugaushop.com</p>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php require_once 'footer.php';?>