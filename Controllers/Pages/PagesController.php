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

    // // get cart
    // public function getCart()
    // {
    //     if ((empty($this->request['nameProduct'])&& empty($this->request['price']) && empty($this->request['size']) 
    //         && empty($this->request['quantity']) ) === false) {
    //             $confirm = new ConfirmController();
    //             $confirmCart = $confirm->postCart($this->request['nameProduct'],$this->request['price'],
    //             $this->request['size'],$this->request['quantity']);
    //     }else{
    //         echo "ddddddddddddd";
    //     }
    // }

}
