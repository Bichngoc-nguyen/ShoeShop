<?php
require_once '../../Controllers/Lib/RequestController.php';
class ConfirmController 
{
    public $request;
    public function __construct()
    {
        $request = new RequestController();
        $this->request = $request->getInput();
    }

    // // session name
    // public function postCart($name, $price, $size, $quantity)
    // {
    //     if (isset($name) && isset($price) && isset($size)
    //      && isset($quantity)) {
    //         echo $_SESSION['nameProduct']=$name;
    //         echo $_SESSION['price']=$price;
    //         echo $_SESSION['size']=$size;
    //         echo $_SESSION['quantity']=$quantity;
            
    //         header('location: cart.php');
    //     }else{
    //         echo '';
    //     }
    // }
    
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

    // // confirm get total
    // public function getTotal()
    // {
    //     if (isset($_SESSION['quantity']) && isset($_SESSION['price'])) {
    //         $quantity = (int)$_SESSION['quantity'];
    //         $price = (int)$_SESSION['price'];
    //         $total = $quantity * $price;
    //         echo $total.'.000đ';
    //     }else{
    //         echo '';
    //     }
    // }

    public function postCart()
    {
        if (isset($_SESSION['cart'])) {
            $session_id = array_column($_SESSION['cart'],"id");
            if (in_array($this->request['id'], $session_id)===false) {
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
        }
        if ($_GET['action']=="remove") {
            foreach($_SESSION['cart'] as $key => $value){
                if ($value['id']==$_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
}
