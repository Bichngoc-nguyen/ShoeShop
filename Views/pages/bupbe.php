<?php
    require_once 'header.php';
    require_once '../../Controllers/Products/ProductsController.php';
    require_once '../../Controllers/Pages/PagesController.php';
    $pages = new PagesController();
    $getList = $pages->getAllListBupBe();
    $numPrev = $pages->getBtnPrevBB();
    $numNext = $pages->getBtnNextBB();
    $numPage = $pages->getNumPageBB();
    
?>

<div class="content m-auto">
    <div class="content_productsNew">
        <h4><a href="index.php">TRANG CHỦ</a> > GIÀY BUPBE</h4><hr class="mt-0">
        <form action="" method="GET">
            <div class="content-products row ml-0 mr-0">
                <?php if (!empty($getList)): ?>
                    <?php foreach($getList as $value){?>
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
        <p class="link_page mt-3 p-1 pl-4">
            <?php echo $numPrev ?>
            <?php echo $numPage ?>
            <?php echo $numNext?>
        </p>
    </form>
</div>
</div>
<?php require_once 'footer.php';?>