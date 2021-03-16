<?php
require_once '../../Controllers/Lib/RequestController.php';
require_once '../../Models/Customers.php';

class CustomersController 
{
    public $request;
    public function __construct()
    {
        $request = new RequestController();
        $this->request = $request->getInput();
        $this->current_page = (empty($_GET['page'])===false)?$_GET['page']:1;
    }
        

    /**
     * Customers
     */

    // get order bill
    public function getCustomers()
    {   
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:5);
        $offset = ($this->current_page - 1)* $item_per_page;
        $customers = new Customers();
        $getList = $customers->getCustomers($item_per_page,$offset);
        $value=[];
        while ($rows = $getList->fetch_assoc()) {
            $customers=1;
            $value[] = $rows;
            $customers++;
        }
        return $value;
    }

    // search customer
    public function searchCus()
    {
        $search='';
        if (empty($this->request['name'])===false) {
            $customers = new  Customers();
            $search = $customers->searchCus($this->request['name']);
            return $search;
        }else{
            return $this->getCustomers();
        }
        return $search;
    }

    /**
     * Phân trang (pagination)
     * */ 
    //phân trang btn prev
    public function getBtnPrevCus()
    {
        $pagination = '';
        $btnPage = 0;
        if (isset($_GET['page']) && isset($_GET['list'])) {
            $item_per_page = $_GET['list'];
            $pageId = $_GET['page'];
            if ($pageId > 1) {
                $btnPage = $pageId - 1;
                $pagination = "<a href=?list=".$item_per_page."&page=".$btnPage." class='pagination'>Prev</a>";
            }
        }else{
            $pagination = '';
        }
        return $pagination;
    }

    //phân trang btn next
    public function getBtnNextCus()
    {
        $pagination = '';
        $btnPage = 0;
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:5);
        $offset = ($this->current_page -1) * $item_per_page;
        $customers = new Customers();
        $totalNum = $customers->getTotalNumCus($item_per_page, $offset);
        if (isset($_GET['page']) && isset($_GET['list'])) {
            $item_per_page = $_GET['list'];
            $pageId = $_GET['page'];
            if ($pageId == 1 || $pageId < $totalNum) {
                $btnPage = $pageId + 1;
                $pagination = "<a href=?list=".$item_per_page."&page=".$btnPage." class='pagination'>Next</a>";
            }elseif ($pageId == $totalNum ) {
                $pagination = "";
            }
        }else{
            $pagination = '<a href=?list='.$item_per_page.'&page=1 class="pagination"">Next</a>';
        }
        return $pagination;
    }

    // list num btn
    public function getNumPageCus()
    {
        $pagination = '';
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:5);
        $offset = ($this->current_page -1)* $item_per_page;
        $customers = new Customers();
        $totalNum = $customers->getTotalNumCus($item_per_page,$offset);
        $num = 1;
        for($num = 1; $num <= $totalNum; $num++) {
            $pagination .= "<a class='pagination' href=?list=".$item_per_page."&page=".$num.">".$num."</a>";
        }
        return $pagination;
    }

     // get order Customer with id to update
     public function getEditCus($id)
     {
         $customer = new Customers();
         $getEditCus = $customer->getEditCus($id);
         $value = [];
         while ($row = $getEditCus->fetch_assoc()) {
             $value[] = $row;
         }
         return $value;
     }
     
     // update order Cus 
     public function updateCus()
     {
         if ((empty($this->request['name']) && empty($this->request['address']) && empty($this->request['phone'])
         && empty($this->request['email']) && empty($this->request['note']) && empty($this->request['status'])) === false) {
            $customer = new Customers();
            $update = $customer->updateCus($this->request['id'],$this->request['name'],$this->request['address'],$this->request['phone'],
            $this->request['email'],$this->request['note'], $this->request['status']);
            if ($update) {
                header("location: listCustomers.php");
            }
         }
     }

     
    // delete order
    public function deleteCus($id)
    {
        $customer = new Customers();
        $del = $customer->deleteCus($id);
        if ($del) {
            header('location: listCustomers.php');
        }
        else{
            echo'ko thanh cong';
        }
    }

}
