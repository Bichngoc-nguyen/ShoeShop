<?php
require_once '../../Controllers/Products/ProductsController.php';
$product = new ProductsController();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $del = $product->delContact($id);
}
?>