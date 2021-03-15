<?php
ob_start();
require_once '../../Controllers/Lib/RequestController.php';
require_once '../../Models/Pages.php';
require_once '../../Controllers/Lib/ConfirmController.php';

class PagesController 
{
    public $request;
    public function __construct()
    {
        $request = new RequestController();
        $this->request = $request->getInput();
    }

    // get new products
    public function getNewProducts()
    {
        $pages = new Pages();
        $newProducts = $pages->getNewProducts();
        while ($rows = $newProducts->fetch_assoc()) {
            $value[]=$rows;
        }
        return $value;
    }

    // get detail product
    public function getDetailProducts($id)
    {
        $pages = new Pages();
        $getDetail = $pages->getDetailProducts($id);
        while ($rows = $getDetail->fetch_assoc()) {
            $value[] = $rows;
        }
    return $value;
    }

    // put cart (đặt hàng)
    public function getPayment()
    {
            if ((empty($this->request['username']) && empty($this->request['address']) && empty($this->request['phone']) 
            && empty($this->request['email']) && empty($this->request['note'])&& empty($this->request['nameProduct']) 
            && empty($this->request['quantity']) && empty($this->request['price']) && empty($this->request['sum']))===false){   
            $cart = !empty($_SESSION['cart'])?$_SESSION['cart']:[];
            $pages = new Pages();
            $customer = $pages->postCustomer($this->request['username'],$this->request['address'], $this->request['phone'],
                                             $this->request['email'],$this->request['note']);
            if ($customer===true) {
                    $orders = $pages->postOrders($cart,$this->request['sum']);
            }
            if ($orders) {
                unset($_SESSION['cart']);
                echo '<script> alert ("Bạn đã đặt hàng thành công ");</script>';
                echo "<script> window.location='index.php';</script>";
            }

        }else{
            echo 'fail';
        }
    }

}
