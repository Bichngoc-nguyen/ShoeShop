<?php
require_once '../../Controllers/Admin/AdminController.php';
$admin = new AdminController();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $del = $admin->delUser($id);
}
?>