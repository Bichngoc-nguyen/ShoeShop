<?php
    require_once 'header.php';
    require_once '../../Controllers/Products/ProductsController.php';
    require_once '../../Controllers/Pages/PagesController.php';
    $pages = new PagesController();
?>
<div class="content_news">
    <!-- banner news -->
    <div class="news-banner container-fluid pl-0 pr-0">
        <div class="news-banner_text">
            <h2>Tin Tức</h2><br>
            <p><a href="index.php">TRANG CHỦ</a> > BLOG</p>
        </div>
    </div>
    <!-- body news -->
    <div class="content-blog row">
        <div class="blog_sibar col-3 mt-1 container">
            <div class="sibar-title">
                <h3 class="p-3">DANH MỤC TIN TỨC</h3>
            </div>
            <div class="sibar-img">
                <a href="sneakers.php"><img src="../../public/img/sibar.png" alt=""></a>
            </div>
            <div class="sibar-title">
                <h3 class="p-3">TỪ KHÓA</h3>
            </div>
            <div class="sibar-img">
                <a href="sandals.php"><img src="../../public/img/sandal13.jpg" alt=""></a>
            </div>
        </div>
        <div class="blog_news col-8 container">
            <h2>TIN TỨC</h2>
            <div class="row">
                <!-- CÁCH BẢO QUẢN GIÀY THỂ THAO ĐÚNG CÁCH  NHẤT -->
                <div class="col-xs-12 col-sm-6 col-lg-6 blog_col1">
                    <div class="blog_col1-img">
                        <a href="https://giaystore.net/blogs/news/cach-bao-quan-giay-the-thao-dung-cach-nhat">
                        <img src="../../public/img/col1.jpg" alt="CÁCH BẢO QUẢN GIÀY THỂ THAO ĐÚNG CÁCH  NHẤT">
                        </a>
                    </div>
                    <b>CÁCH BẢO QUẢN GIÀY THỂ THAO ĐÚNG CÁCH  NHẤT</b>
                    <div class="blog-icon row mt-4 mb-2">
                        <div class="col-xs-4 col-sm-4 col-lg-4">
                            <i class="fa fa-calendar"></i> 17/03/19
                        </div>
                        <div class="col-xs-4 col-sm-4 col-lg-4">
                            <i class="fa fa-user"></i> Trần Nam
                        </div>
                        <div class="col-xs-4 col-sm-4 col-lg-4">
                            <i class="fa fa-commenting-o"></i> 0
                        </div>
                    </div>
                    <i>Mách bạn cách bảo quản giày thể thao. Định kỳ vệ sinh giày, khi giày bẩn nên dùng vải sạch thấm nước xà bông lau nhẹ nhàng, không dùng bàn chải để chà, không sử dụng thuốc tẩy để ...</i>
                </div>
                <!-- NHỮNG CÁCH BUỘC DÂY GIÀY ĐẸP AI NHÌN CŨNG THÍCH MÊ -->
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <div class="blog_col1-img">
                        <a href="https://giaystore.net/blogs/news/nhung-cach-buoc-day-giay-dep-ai-nhin-cung-thich-me">
                        <img src="../../public/img/col2.png" alt="NHỮNG CÁCH BUỘC DÂY GIÀY ĐẸP AI NHÌN CŨNG THÍCH MÊ">
                        </a>
                        </div>
                        <b>NHỮNG CÁCH BUỘC DÂY GIÀY ĐẸP AI NHÌN CŨNG THÍCH MÊ</b>
                        <div class="blog-icon row mt-4 mb-2">
                            <div class="col-xs-4 col-sm-4 col-lg-4">
                                <i class="fa fa-calendar"></i> 15/03/19
                            </div>
                            <div class="col-xs-4 col-sm-4 col-lg-4">
                                <i class="fa fa-user"></i> Trần Nam
                            </div>
                            <div class="col-xs-4 col-sm-4 col-lg-4">
                                <i class="fa fa-commenting-o"></i> 0
                            </div>
                        </div>
                        <i>Tùy theo từng kiểu dáng khác nhau, bạn cũng sẽ có vô vàn cách buộc dây giày đẹp cần phải tham khảo đấy nhé.Đối với các tín đồ yêu thích giày sneaker, một đôi giày đẹp chính là t...</i>
                </div>
                <!-- MÁCH CÁCH GIẶT GIÀY THỂ THAO "MỘT PHÚT XONG NGAY" MÀ LẠI SẠCH THƠM NHƯ MỚI -->
                <div class="col-xs-12 col-sm-6 col-lg-6 mt-5">
                    <div class="blog_col1-img">
                        <a href="https://giaystore.net/blogs/news/mach-cach-giat-giay-the-thao-mot-phut-xong-ngay-ma-lai-sach-thom-nhu-moi">
                        <img src="../../public/img/col3.jpg" alt='MÁCH CÁCH GIẶT GIÀY THỂ THAO "MỘT PHÚT XONG NGAY" MÀ LẠI SẠCH THƠM NHƯ MỚI'>
                        </a>
                        </div>
                        <b>MÁCH CÁCH GIẶT GIÀY THỂ THAO "MỘT PHÚT XONG NGAY" MÀ LẠI SẠCH THƠM NHƯ MỚI</b>
                        <div class="blog-icon row mt-4 mb-2">
                            <div class="col-xs-4 col-sm-4 col-lg-4">
                                <i class="fa fa-calendar"></i> 15/03/19
                            </div>
                            <div class="col-xs-4 col-sm-4 col-lg-4">
                                <i class="fa fa-user"></i> Trần Nam
                            </div>
                            <div class="col-xs-4 col-sm-4 col-lg-4">
                                <i class="fa fa-commenting-o"></i> 0
                            </div>
                        </div>
                        <i>Giày thể thao là một trong số những phụ kiện không thể thiếu, làm nổi bật bộ trang phục bạn mặc hàng ngày, tôn lên nét cá tính riêng, lại giúp bạn dễ dàng đi lại, di chuyển. Chí...</i>
                </div>
                <!-- Giữ “phong độ” cho Sneaker trắng ra sao -->
                <div class="col-xs-12 col-sm-6 col-lg-6 mt-5">
                    <div class="blog_col1-img">
                        <a href="https://giayxshop.vn/giu-phong-do-cho-sneaker-trang-voi-loat-cach-lam-sach-hay-ho/">
                        <img src="../../public/img/col4.png" alt="Giữ “phong độ” cho Sneaker trắng ra sao">
                        </a>
                        </div>
                        <b>Giữ “phong độ” cho Sneaker trắng ra sao</b>
                        <div class="blog-icon row mt-4 mb-2">
                            <div class="col-xs-4 col-sm-4 col-lg-4">
                                <i class="fa fa-calendar"></i> 20/03/19
                            </div>
                            <div class="col-xs-4 col-sm-4 col-lg-4">
                                <i class="fa fa-user"></i> Trần Nam
                            </div>
                            <div class="col-xs-4 col-sm-4 col-lg-4">
                                <i class="fa fa-commenting-o"></i> 0
                            </div>
                        </div>
                        <i>Bạn đã biết cách làm sạch giày sneaker trắng thế nào cho đúng cách để vừa giữ được vẻ tinh khôi sành điệu cho đôi giày lại vừa</i>
                </div>
            </div> 
        </div>
    </div>
    <?php require_once 'btnUp/Down.php';?>
</div>
<?php require_once 'footer.php';?>

