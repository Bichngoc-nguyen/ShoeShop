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
    public function updateCart()
    {
        if (empty($this->request['nameProduct']) && empty($this->request['price']) && empty($this->request['size'])
         && empty($this->request['quantity'])) {
            // echo $_SESSION['nameProduct']=$name;
            // echo $_SESSION['price']=$price;
            // echo $_SESSION['size']=$size;
            // echo $_SESSION['quantity']=$quantity;
            return $this->postCart();
        }else{
            echo '';
        }
    }
    
    // // confirm get name
    // public function getNameProduct()
    // {
    //     if (isset($_SESSION['nameProduct'])) {
    //         echo $_SESSION['nameProduct'];
    //     }else{
    //         echo '';
    //     }
    // }

    // // confirm get size
    // public function getSize()
    // {
    //     if (isset($_SESSION['size'])) {
    //         echo $_SESSION['size'];
    //     }else{
    //         echo '';
    //     }
    // }

    // // confirm get price
    // public function getPrice()
    // {
    //     if (isset($_SESSION['price'])) {
    //         echo $_SESSION['price'];
    //     }else{
    //         echo '';
    //     }
    // }

    // // confirm get quantity
    // public function getQuantity()
    // {
    //     if (isset($_SESSION['quantity'])) {
    //         echo $_SESSION['quantity'];
    //     }else{
    //         echo '';
    //     }
    // }

    public function postCart()
    {
        if (isset($_SESSION['cart'])) {
            $session_id = array_column($_SESSION['cart'],"id");
            if (in_array($_GET['id'], $session_id)) {
                echo "<script> alert('Product is already add in cart');</script>";
                echo "<script> window.location='index.php';</script>";
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
            echo $total.'.000đ';
        }
    }
}
