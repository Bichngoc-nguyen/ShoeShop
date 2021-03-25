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

    // tạo session cho giỏ hàng
    public function postCart()
    {
        // check isset đã có session cart 
        if (isset($_SESSION['cart'])) {
            // nếu exist id trong session cart 
            if (isset($_GET['id'])) {
                $key = "";
                foreach ($_SESSION['cart'] as $keyItem=>$item) {
                    if ($item["id"] == $this->request['id']) {
                        $key = $keyItem;
                        break;
                    }
                }
                //thêm từ sp đã có trong giỏ hàng($_GET)
                // nếu đã tồn tại id trong session cart thì công thêm số lượng vào cart có id đó
                if ($key !== "") {
                    $_SESSION['cart'][$key]["quantity"] += $this->request['quantity'];
                } 
                // ngược lại id chưa có trong session cart
                // thêm sp chưa có trong giỏ hàng vào ($_GET)
                else {
                    $session_array = array(
                        "id"=> $this->request['id'],
                        "name"=>$this->request['nameProduct'],
                        "price"=>$this->request['price'],
                        "size"=>$this->request['size'],
                        "quantity"=>$this->request['quantity']
                    );
                    $_SESSION['cart'][] = $session_array;
                    
                }
            }
            // update giỏ hàng ($_POST)
             else {
                foreach (array_keys($_SESSION['cart']) as $key) {
                    $_SESSION['cart'][$key] = array(
                        "id"=> $this->request['id'][$key],
                        "name"=>$this->request['nameProduct'][$key],
                        "price"=>$this->request['price'][$key],
                        "size"=>$this->request['size'][$key],
                        "quantity"=>$this->request['quantity'][$key]
                    );
                }
            }
            header('location: cart.php');
        } 
       // tạo session cart  
        else{
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
        } else if ($_GET['action']=="remove") {
            foreach($_SESSION['cart'] as $key => $value){
                if ($value['id']==$_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }
        }
        header('location: cart.php');
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
