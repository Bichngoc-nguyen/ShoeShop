<?php
require_once '../../Controllers/Products/ProductsController.php';
$admin = new ProductsController();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $del = $admin->deleteCustomer($id);
}
?>