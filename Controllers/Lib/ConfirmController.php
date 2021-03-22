<?php
require_once '../../Controllers/Lib/RequestController.php';
require_once '../../Controllers/Pages/PagesController.php';

class ConfirmController 
{
    public $request;
    public function __construct()
    {
        $request = new RequestController();
        $this->request = $request->getInput();
    }

    // update cart
    // public function updateCart()
    // {
    //     if (isset($_SESSION['cart'])) {
    //             $session_array = array(
    //                 "id"=>$_GET["id"],
    //                 "name"=>$this->request['nameProduct'],
    //                 "price"=>$this->request['price']+$this->request['price'],
    //                 "size"=>$this->request['size'],
    //                 "quantity"=>$this->request['quantity']+1
    //             );
    //         $_SESSION['cart'] = $session_array;
    //         var_dump(array_unique($_SESSION['cart']));
    //         // die();
    //         header('location: cart.php');
    //     }
    // }
    public function postCart()
    {
        if (isset($_SESSION['cart'])) {
            $session_id = array_column($_SESSION['cart'],"id");
            if (in_array($_GET['id'], $session_id)) {
                $count = count($_SESSION['cart']);
                $session_array = array(
                    $_GET["id"]=>"id",
                    $this->request['nameProduct']=>"name",
                    $this->request['price']=>"price",
                    $this->request['size']=>"size",
                  $this->request['quantity']+1 =>"quantity"
                );
            $_SESSION['cart'][$count] = $session_array;
            header('location: cart.php');
            }else{
                $count = count($_SESSION['cart']);
                $session_array = array(
                    "id"=>$_GET["id"],
                    "name"=>$this->request['nameProduct'],
                    "price"=>$this->request['price'],
                    "size"=>$this->request['size'],
                    "quantity"=>$this->request['quantity']
                );
            $_SESSION['cart'][$count] = $session_array;
            header('location: cart.php');
            }
        }else{
            unset($_SESSION['cart']['id']);
            $session_array = array(
                "id"=>$this->request["id"],
                "name"=>$this->request['nameProduct'],
                "price"=>$this->request['price'],
                "size"=>$this->request['size'],
                "quantity"=>$this->request['quantity']
            );
            $_SESSION['cart'][]= $session_array;
            header('location: cart.php');
        }
    }

    // action clean
    public function postClean()
    {
        unset($_SESSION['cart']);
    }

    // action remove
    public function postAction()
    {
        if ($_GET['action'] == "clean") {
            unset($_SESSION['cart']);
            echo "<script> window.location='cart.php';</script>";
        }
        if ($_GET['action']=="remove") {
            foreach($_SESSION['cart'] as $key => $value){
                if ($value['id']==$_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                    echo "<script> window.location='cart.php';</script>";
                }
            }
        }
    }

    // action total
    public function getTotal()
    {   
        if (isset($_SESSION['cart'])) {
            $quantity = 0;
            $total = 0;
            foreach($_SESSION['cart'] as $value){
            $quantity += (int)$value['quantity'];
            $total += ((int)$value['price'] * (int)$value['quantity']);
            }
            echo '('.$total.'.000đ)';
        }
        else{
            echo '(0đ)';
        }
    }
}
