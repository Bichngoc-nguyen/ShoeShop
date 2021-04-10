<?php
require_once '../../Controllers/Lib/CategoryController.php';
$cate = new CategoryController();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delCate = $cate->deleteCate($id);
}