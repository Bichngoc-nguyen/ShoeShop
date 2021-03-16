<?php
require_once '../../Controllers/Customers/CustomersController.php';
$customer = new CustomersController();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $del = $customer->deleteCus($id);
    var_dump($del);
    die();
}
?>