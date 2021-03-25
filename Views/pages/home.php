<?php
    require_once 'header.php';
    require_once '../../Controllers/Pages/PagesController.php';  
    require_once '../../Controllers/Products/ProductsController.php';  
    $pages = new PagesController();
    $products = new ProductsController();
    $getNProducts=$pages->getNewProducts();
    $sneakers = $products->searchSneakers();
    $sandals = $products->searchSandals();
    $BupBe = $products->searchBupbe();
    $got = $products->searchGots();
    $numPrev = $products->getBtnPrev();
    $numNext = $products->getBtnNext();
    $numPage = $products->getNumPage();
?>
<!-- body -->
<div class="content m-auto">
    <div id="slide" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#slide" data-slide-to="0" class="active"></li>
            <li data-target="#slide" data-slide-to="1"></li>
            <li data-target="#slide" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../../public/img/banner.jpg" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="../../public/img/banner2.jpg" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="../../public/img/banner3.jpg" width="1100" height="500">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#slide" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#slide" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <!-- sản phẩm mới -->
    <div class="content_productsNew">
        <h1>SẢN PHẨM MỚI</h1><hr class="mt-0">
        <form action="" method="GET">
            <div class="content-products row ml-0 mr-0">
                <?php if (!empty($getNProducts)): ?>
                    <?php foreach($getNProducts as $value){?>
                        <div class="col-xs-12 col-sm-6 col-lg-3 content-products_item mb-4">
                            <div class="products-item_image">
                                <a href="detailProduct.php?id=<?php echo $value['id'];?>"><img src="<?php echo '../../public/upload/'.$value['photo'];?>" alt=""></a>
                            </div>
                            <div class="products-item_description mt-1">
                                <?php foreach($value['gallery'] as $item): ?>
                                    <img class="description-img-detail" src="<?php echo '../../public/upload/'.$item; ?>" alt="">
                                <?php endforeach ?>
                                <p class="description-price"><?php echo $value['price'].",000đ"?></p>
                                <p><?php echo $value['nameProduct']?></p>
                            </div>
                        </div>
                    <?php }?>
                <?php endif?>
            </div>
        </form>
    </div>
    <!-- shop hoa của cửa hàng -->
    <div class="content_active p-5">
        <h1>SHOESHOP CỦA CỬA HÀNG</h1> <hr class="mt-0 mb-5">
        <!-- row 1  -->
        <div class="row ml-0 mr-0 container">
            <div class="col-xs-12 col-sm-6 col-lg-6 content-active_item mb-4">   
            <div class="row active_comment">
                <div class="icon_comment  col-xs-12 col-sm-3 col-lg-2">
                    <img src="../../public/img/ship.png" alt="">
                </div>
                <div class="icon_comment  col-xs-12 col-sm-9 col-lg-10 pt-2">
                   <b>Giao hàng nhanh chóng</b>
                    <p>Shop giao hàng trong 60p đối với khu vực nội thành</p>
                </div>
            </div>
            </div>        
            <div class="col-xs-12 col-sm-6 col-lg-6 content-active_item mb-4">   
                <div class="row active_comment">
                    <div class="icon_comment  col-xs-12 col-sm-3 col-lg-2">
                        <img src="../../public/img/FREESHIP.png" alt="">
                    </div>
                    <div class="icon_comment  col-xs-12 col-sm-9 col-lg-10 pt-2">
                        <b>Miễn phí giao hàng</b>
                        <p>Miễn phí giao hàng khu vực nội thành TP.HCM</p>
                    </div>
                </div>
            </div>        
        </div>
         <!-- row 2 -->
        <div class="row ml-0 mr-0 container">
            <div class="col-xs-12 col-sm-6 col-lg-6 content-active_item mb-4">   
            <div class="row active_comment">
                <div class="icon_comment col-xs-12 col-sm-3 col-lg-2">
                    <img src="../../public/img/qua.jpg" alt="">
                </div>
                <div class="icon_comment col-xs-12 col-sm-9 col-lg-10 pt-2">
                    <b>Đổi hàng trong 7 ngày</b>
                    <p>Miễn ship khi đổi trả hàng</p>
                </div>
            </div>
            </div>        
            <div class="col-xs-12 col-sm-6 col-lg-6 content-active_item mb-4">   
                <div class="row active_comment">
                    <div class="icon_comment col-xs-12 col-sm-3 col-lg-2">
                        <img src="../../public/img/camera.jpg" alt="">
                    </div>
                    <div class="icon_comment col-xs-12 col-sm-9 col-lg-10 pt-2">
                        <b>Chụp hình trước khi giao</b>
                        <p>Shop gửi hình cho khách trước khi giao</p>
                    </div>
                </div>
            </div>        
        </div>
    </div>

    <!-- đánh giá của khách hàng về shop -->
    <div class="content_feedback mt-5">
        <h1>KHÁCH HÀNG NÓI GÌ VỀ SHOESHOP</h1><hr class="mt-0 mb-5">
        <div class="row mr-0 ml-0">
            <div class="col-xs-12 col-sm-6 col-lg-3 img_feedback text-center">
                <img src="../../public/img/feedback1.jpg" alt=""><br><br>
                <i>Giày rất đẹp và tôi rất thích, cảm ơn shop rất nhiều.</i> <br>
                <b>Bích Thảo</b>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 img_feedback text-center ">
                <img src="../../public/img/feedback2.jpg" alt=""><br><br>
                <i>Tôi rất hài lòng về chất lượng hoa cũng như thái độ phục vụ của shop.</i> <br>
                <b>Thanh Loan</b>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 img_feedback text-center">
                <img src="../../public/img/feedback3.jpg" alt=""><br><br>    
                <i>Tôi rất thich và rất vui vì tất cả hoa trong buổi tiệc đều rất tươi và đẹp…cảm ơn shop rất nhiều.</i> <br>
                <b>Mai Phương</b>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-3 img_feedback text-center">
                <img src="../../public/img/feedback4.jpg" alt=""><br><br>     
                <i>Hàng chất lượng và giao rất nhanh tôi rất hài lòng</i> <br>
                <b>Như Thủy</b>
            </div>
        </div>
    </div>

    <!-- giày sneakers -->
    <div class="content_productsNew">
        <h1>Giày Sneakers</h1><hr class="mt-0">
        <form action="" method="GET">
                <div class="content-products row ml-0 mr-0">
                    <?php if (!empty($sneakers)): ?>
                        <?php foreach($sneakers as $value){?>
                            <div class="col-xs-12 col-sm-6 col-lg-3 content-products_item mb-4">
                                <div class="products-item_image">
                                    <a href="detailProduct.php?id=<?php echo $value['id'];?>"><img src="<?php echo '../../public/upload/'.$value['photo'];?>" alt=""></a>
                                </div>
                                <div class="products-item_description mt-1">
                                    <?php foreach($value['gallery'] as $item): ?>
                                        <img class="description-img-detail" src="<?php echo '../../public/upload/'.$item; ?>" alt="">
                                    <?php endforeach ?>
                                    <p class="description-price"><?php echo $value['price'].",000đ"?></p>
                                    <p><?php echo $value['nameProduct']?></p>
                            </div>
                        </div>
                     <?php }?>
                <?php endif?>
            </div>
         </form>
         <a href="sneakers.php" class="btn productsNew-more">Xem Tất cả sản phẩm</a>
    </div>

    <!-- giày sandals -->
    <div class="content_productsNew">
        <h1>Giày Sandals</h1><hr class="mt-0">
        <form action="" method="GET">
                <div class="content-products row ml-0 mr-0">
                    <?php if (!empty($sandals)): ?>
                        <?php foreach($sandals as $value){?>
                            <div class="col-xs-12 col-sm-6 col-lg-3 content-products_item mb-4">
                                <div class="products-item_image">
                                    <a href="detailProduct.php?id=<?php echo $value['id'];?>"><img src="<?php echo '../../public/upload/'.$value['photo'];?>" alt=""></a>
                                </div>
                                <div class="products-item_description mt-1">
                                    <?php foreach($value['gallery'] as $item): ?>
                                        <img class="description-img-detail" src="<?php echo '../../public/upload/'.$item; ?>" alt="">
                                    <?php endforeach ?>
                                    <p class="description-price"><?php echo $value['price'].",000đ"?></p>
                                    <p><?php echo $value['nameProduct']?></p>
                            </div>
                        </div>
                     <?php }?>
                <?php endif?>
            </div>
         </form>
         <a href="sandals.php" class="btn productsNew-more">Xem Tất cả sản phẩm</a>
    </div>

    <!-- giày BupBe -->
    <div class="content_productsNew">
        <h1>Giày BupBe</h1><hr class="mt-0">
        <form action="" method="GET">
                <div class="content-products row ml-0 mr-0">
                    <?php if (!empty($BupBe)): ?>
                        <?php foreach($BupBe as $value){?>
                            <div class="col-xs-12 col-sm-6 col-lg-3 content-products_item mb-4">
                                <div class="products-item_image">
                                    <a href="detailProduct.php?id=<?php echo $value['id'];?>"><img src="<?php echo '../../public/upload/'.$value['photo'];?>" alt=""></a>
                                </div>
                                <div class="products-item_description mt-1">
                                    <?php foreach($value['gallery'] as $item): ?>
                                        <img class="description-img-detail" src="<?php echo '../../public/upload/'.$item; ?>" alt="">
                                    <?php endforeach ?>
                                    <p class="description-price"><?php echo $value['price'].",000đ"?></p>
                                    <p><?php echo $value['nameProduct']?></p>
                            </div>
                        </div>
                     <?php }?>
                <?php endif?>
            </div>
         </form>
         <a href="bupbe.php" class="btn productsNew-more">Xem Tất cả sản phẩm</a>
    </div>
    
    <!-- giày got -->
    <div class="content_productsNew">
        <h1>Giày Cao Gót</h1><hr class="mt-0">
        <form action="" method="GET">
                <div class="content-products row ml-0 mr-0">
                    <?php if (!empty($got)): ?>
                        <?php foreach($got as $value){?>
                            <div class="col-xs-12 col-sm-6 col-lg-3 content-products_item mb-4">
                                <div class="products-item_image">
                                    <a href="detailProduct.php?id=<?php echo $value['id'];?>"><img src="<?php echo '../../public/upload/'.$value['photo'];?>" alt=""></a>
                                </div>
                                <div class="products-item_description mt-1">
                                    <?php foreach($value['gallery'] as $item): ?>
                                        <img class="description-img-detail" src="<?php echo '../../public/upload/'.$item; ?>" alt="">
                                    <?php endforeach ?>
                                    <p class="description-price"><?php echo $value['price'].",000đ"?></p>
                                    <p><?php echo $value['nameProduct']?></p>
                            </div>
                        </div>
                     <?php }?>
                <?php endif?>
            </div>
         </form>
         <a href="got.php" class="btn productsNew-more">Xem Tất cả sản phẩm</a>
    </div>
</div>
