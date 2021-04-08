<?php
require_once 'header.php';
require_once '../../Controllers/Products/ProductsController.php';
$products = new ProductsController();
// $select = $products->postSelectTime();

?>
<div class="main-listSneakers mt-5">
<?php 
    if (isset($_POST['time'])) {
        $products = new  Products();
        $select = $products->postSelectTime($_POST['time']);
        $value = [];
        while ($rows = $select->fetchAll()) {
            $value[] = $rows;
         }
         var_dump($value);
         die;
         return $value;
    }
?>
	<?php if (!empty($select)): ?>
		<?php foreach ($select as $value) {
            var_dump($value);
			$output = array(
                'month' => $value['time'],
                'profit' => floatval($value['quantity'])
           );
		}echo json_encode($output);
		?>
	<?php endif ?>
</div>
<?php require_once 'footer.php';?>  