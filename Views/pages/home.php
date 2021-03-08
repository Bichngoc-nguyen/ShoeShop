<?php
    require_once 'header.php';
    require_once '../../Controllers/Pages/PagesController.php';  
    $pages = new PagesController();
    $getNProducts=$pages->getNewProducts();
?>
<!-- body -->
<div class="content m-auto">
    <h3>SẢN PHẨM MỚI</h3><hr>
    <form action="" method="GET">
        <div class="content-products row ml-0 mr-0">
            <?php if (!empty($getNProducts)): ?>
                <?php foreach($getNProducts as $value){?>
                    <div class="col-xs-12 col-sm-6 col-lg-3 content-products_item mb-4">
                        <div class="products-item_image">
                            <a href="detailProduct.php?id=<?php echo $value['id'];?>"><img src="<?php echo '../../public/upload/'.$value['photo'];?>" alt=""></a>
                        </div>
                        <div class="products-item_description mt-1">
                            <img class="description-img-detail" src="<?php echo '../../public/upload/'.$value['image'];?>" alt="">
                            <p class="description-price"><?php echo $value['price'].",000đ"?></p>
                            <p><?php echo $value['nameProduct']?></p>
                        </div>
                    </div>
                <?php }?>
            <?php endif?>
    </div>
    </form>
</div>
