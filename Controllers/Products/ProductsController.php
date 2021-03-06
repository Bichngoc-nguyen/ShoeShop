<?php
ob_start();
require_once '../../Controllers/Lib/RequestController.php';
require_once '../../Models/Products.php';
class ProductsController 
{
    public $request;
    public $current_page;
    public function __construct()
    {
        $request = new RequestController();
        $this->request = $request->getInput();
        // page hiện tại
        $this->current_page = (empty($_GET['page'])===false)?$_GET['page']:1;
    }

    // kiểm tra upload file(imge)
    public function checkUploadFile()
    {
        if (isset($_FILES['photo'])) {
            if ($_FILES['photo']['error'] > 0) {
                echo "upload file error";
            }else{
                move_uploaded_file($_FILES['photo']['tmp_name'], '../../public/upload/' . $_FILES['photo']['name']);
                $file =  $_FILES['photo']['name'];
            }
        }
        return $file;
    }

    // kiểm tra upload file(imge) insert nhìu hình
    public function checkUploadFileDetail()
    {
        $files = [];
        if (isset($_FILES['descript'])) {
            foreach ($_FILES['descript']["name"] as $key=>$name) {
                $name = date('YmdHis') . $name; //gán time cho mỗi hình
                move_uploaded_file($_FILES['descript']['tmp_name'][$key], '../../public/upload/' . $name);
                $files[] = $name;
            }
        }
        return $files;
   }

    /**
     * Products
     * */ 

    //create Product
    public function createProducts()
    {
         if ((empty($this->request['name']) && empty($this->request['photo']) && 
         empty($this->request['price']) && empty($this->request['quantity']) && 
         empty($this->request['descript']) && empty($this->request['cate']))=== false) {
             $file = $this->checkUploadFile();
             $files = $this->checkUploadFileDetail();
             $products = new Products();
             $create = $products->createProducts($this->request['name'], $file, 
                 $this->request['price'], $this->request['quantity'],$files,$this->request['cate']);
             if ($create) {
                 header('location: index.php');
             }
         }
     }
 
    // list Product id
    public function getIdproduct($id)
    {
        $products = new Products();
        $getId = $products->getIdproduct($id);
        $value=[];
        while ($rows = $getId->fetch_assoc()) {
            $value[] = $rows;
        }
        // get image detail theo product_id
        foreach($value as $key=>$valueImg){
            $getGallery = $products->getGalleryByProductId($valueImg['id']);
            $valueGallery =[];
            while ($rows = $getGallery->fetch_assoc()) {
                $valueGallery[] = $rows['image'];
            }
            $value[$key]['gallery'] = $valueGallery;
        }
        return $value;
    }

    // update product
    public function updateProduct()
    {
        if ((isset($this->request['name']) && isset($this->request['photo'])
        && isset($this->request['price']) && isset($this->request['quantity']) 
        && isset($this->request['descript'])&& isset($this->request['descript']))=== false) {
            $file = $this->checkUploadFile();
            $files = $this->checkUploadFileDetail();
            $products = new Products();
            $update = $products->updateProduct($this->request['id'],$this->request['name'], $file, 
                $this->request['price'], $this->request['quantity'],$files);
            if ($update) {
                header('location: listSneakers.php');
            }
        }
    }

    // delete product
    public function delProduct($id)
    {
        $products = new Products();
        $del = $products->delProduct($id);
        if ($del) {
            header('location: listSneakers.php');
        }
        else{
            echo'ko thanh cong';
        }
    }
    
    /**
     * end Products
     * */

    /**
     * shoe sneakers
     * */  

     // list giày sneakers 
     public function getAllListSneakers()
     {
         // số dòng hiển thị
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        // số page hiện tại và tính số row page tiếp theo
        $offset = ($this->current_page - 1 )* $item_per_page;
        $products = new Products();
        $getList = $products->getAllListSneakers($item_per_page, $offset);
        $value =[];
        while ($rows = $getList->fetch_assoc()) {
            $value[] = $rows;
        }if (empty($value)) {
            $value = [];
        }
        // lấy ra tất cả image detail theo id 
        foreach ($value as $key=>$valueImg) {
            $getGallery = $products->getGalleryByProductId($valueImg['id']);
            $valueGallery =[];
            while ($rows = $getGallery->fetch_assoc()) {          
                $valueGallery[] = $rows['image'];
            }
            $value[$key]['gallery'] = $valueGallery;
        }

        return $value;
     }
    
    /**
     * Phân trang (pagination)
     * */ 
    //phân trang btn prev
    public function getBtnPrev()
    {
        $pagination = '';
        $btnPage = 0;
        if (isset($_GET['page']) && isset($_GET['list'])) {
            $item_per_page = $_GET['list'];
            $pageId = $_GET['page'];
            if ($pageId > 1) {
                $btnPage = $pageId - 1;
                $pagination = "<a class='pagination' href=?list=".$item_per_page."&page=".$btnPage.">Prev</a>";
            }
        }else{
            $pagination = '';
        }
        return $pagination;
    }

    //phân trang btn next
    public function getBtnNext()
    {
        $pagination = '';
        $btnPage = 0;
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page -1)* $item_per_page;
        $products = new Products();
        $totalNum = $products->getTotalNumSneakers($item_per_page,$offset);
        if (isset($_GET['page']) && isset($_GET['list'])) {
            $item_per_page = $_GET['list'];
            $pageId = $_GET['page'];
            if ($pageId == 1 || $pageId < $totalNum) {
                $btnPage = $pageId + 1;
                $pagination = "<a class='pagination' href=?list=".$item_per_page."&page=".$btnPage.">Next</a>";
            }elseif ($pageId == $totalNum ) {
				$pagination = "";
			}
        }else{
            $pagination = '<a href=?list='.$item_per_page.'&page=1 class="pagination"">Next</a>';
        }
        return $pagination;
    }

    // list num btn
    public function getNumPage()
    {
        $pagination = '';
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page -1)* $item_per_page;
        $products = new Products();
        $totalNum = $products->getTotalNumSneakers($item_per_page,$offset);
        $num = 1;
        for($num = 1; $num <= $totalNum; $num++) {
            $pagination .= "<a class='pagination' href=?list=".$item_per_page."&page=".$num.">".$num."</a>";
        }
        return $pagination;
    }

    // end pagination

    /**
     * end sneakers
     * */  

    /**
     * shoe Bupbe
     * */ 
    // list giày Bupbe 
    public function getAllListBupbe()
    {
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        // num page current and caculator row page next
        $offset = ($this->current_page -1) * $item_per_page;
        $products = new Products();
        $getList = $products->getAllListBupbe($item_per_page, $offset);
        $value=[];
        while ($rows = $getList->fetch_assoc()) {
            $value[] = $rows;
        }if (empty($value)) {
            $value = [];
        }

        // get image detail theo product_id
        foreach($value as $key=>$valueImg){
            $getGallery = $products->getGalleryByProductId($valueImg['id']);
            $valueGallery =[];
            while ($rows = $getGallery->fetch_assoc()) {
                $valueGallery[] = $rows['image'];
            }
            $value[$key]['gallery'] = $valueGallery;
        }
        return $value;
    }
    
    /**
     * Phân trang (pagination)
     * */ 
    //phân trang btn prev
    public function getBtnPrevBB()
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
    public function getBtnNextBB()
    {
        $pagination = '';
        $btnPage = 0;
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page -1) * $item_per_page;
        $products = new Products();
        $totalNum = $products->getTotalNumBupbe($item_per_page,$offset);
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
    public function getNumPageBB()
    {
        $pagination = '';
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page -1)* $item_per_page;
        $products = new Products();
        $totalNum = $products->getTotalNumBupbe($item_per_page, $offset);
        $num = 1;
        for($num = 1; $num <= $totalNum; $num++) {
            $pagination .= "<a class='pagination' href=?list=".$item_per_page."&page=".$num.">".$num."</a>";
        }
        return $pagination;
    }

    // end pagination
    // end shoe Bupbe

    /**
     * shoe Sandals
     * */ 
    // list giày Sandals 
    public function getAllListSandals()
    {
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page - 1)* $item_per_page;
        $products = new Products();
        $getList = $products->getAllListSandals($item_per_page,$offset);
        $value=[];
        while ($rows = $getList->fetch_assoc()) {
            $value[] = $rows;
        }if (empty($value)) {
            $value = [];
        }
        // get image detail products
        foreach($value as $key=>$valueImg){
            $getGallery = $products->getGalleryByProductId($valueImg['id']);
            $valueGallery=[];
            while ($rows = $getGallery->fetch_assoc()) {
                $valueGallery[] = $rows['image'];
            }
            $value[$key]['gallery'] = $valueGallery;
        }
        return $value;
    }

    
    /**
     * Phân trang (pagination)
     * */ 
    //phân trang btn prev
    public function getBtnPrevSD()
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
    public function getBtnNextSD()
    {
        $pagination = '';
        $btnPage = 0;
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page -1) * $item_per_page;
        $products = new Products();
        $totalNum = $products->getTotalNumSandals($item_per_page,$offset);
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
    public function getNumPageSD()
    {
        $pagination = '';
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page -1)* $item_per_page;
        $products = new Products();
        $totalNum = $products->getTotalNumSandals($item_per_page,$offset);
        $num = 1;
        for($num = 1; $num <= $totalNum; $num++) {
            $pagination .= "<a class='pagination' href=?list=".$item_per_page."&page=".$num.">".$num."</a>";
        }
        return $pagination;
    }

    // end pagination
    // end shoe sandals
    /**
     * shoe Gots
     * */ 
    // list giày gots 
    public function getAllListGot()
    {   
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page - 1)* $item_per_page;
        $products = new Products();
        $getList = $products->getAllListGot($item_per_page,$offset);
        $value=[];
        while ($rows = $getList->fetch_assoc()) {
            $value[] = $rows;
        }
        // get image detail theo product_id
        foreach($value as $key=>$valueImg){
            $getGallery = $products->getGalleryByProductId($valueImg['id']);
            $valueGallery =[];
            while ($rows = $getGallery->fetch_assoc()) {
                $valueGallery[] = $rows['image'];
            }
            $value[$key]['gallery'] = $valueGallery;
        }
        return $value;
    }

    /**
     * Phân trang (pagination)
     * */ 
    //phân trang btn prev
    public function getBtnPrevGot()
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
    public function getBtnNextGot()
    {
        $pagination = '';
        $btnPage = 0;
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page -1) * $item_per_page;
        $products = new Products();
        $totalNum = $products->getTotalNumGot($item_per_page, $offset);
        if (isset($_GET['page']) && isset($_GET['list'])) {
            $item_per_page = $_GET['list'];
            $pageId = $_GET['page'];
            if ($pageId < 1 || $pageId < $totalNum) {
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
    public function getNumPageGot()
    {
        $pagination = '';
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page -1)* $item_per_page;
        $products = new Products();
        $totalNum = $products->getTotalNumGot($item_per_page,$offset);
        $num = 1;
        for($num = 1; $num <= $totalNum; $num++) {
            $pagination .= "<a class='pagination' href=?list=".$item_per_page."&page=".$num.">".$num."</a>";
        }
        return $pagination;
    }

    // end pagination
    // end shoe Gots
    
    // search
    // search sneakers
    public function searchSneakers()
    {
        $search='';
        if (empty($this->request['name'])===false) {
            $products = new  Products();
            $search = $products->searchSneakers($this->request['name']);
            while ($rows = $search->fetch_assoc()) {
                $value[] = $rows;
            }if (empty($value)) {
                $value = [];
            }
            // get image detail theo product_id
            foreach($value as $key=>$valueImg){
                $getGallery = $products->getGalleryByProductId($valueImg['id']);
                $valueGallery =[];
                while ($rows = $getGallery->fetch_assoc()) {
                    $valueGallery[] = $rows['image'];
                }
                $value[$key]['gallery'] = $valueGallery;
            }
            return $value;
        }else{
            return $this->getAllListSneakers();
        }
        return $search;
    }

    // search bupbe
    public function searchBupbe()
    {
        $search='';
        if (empty($this->request['name'])===false) {
            $products = new  Products();
            $search = $products->searchBupbe($this->request['name']);
            while ($rows = $search->fetch_assoc()) {
                $value[] = $rows;
            }if (empty($value)) {
                $value = [];
            }
            // get image detail theo product_id
            foreach($value as $key=>$valueImg){
                $getGallery = $products->getGalleryByProductId($valueImg['id']);
                $valueGallery =[];
                while ($rows = $getGallery->fetch_assoc()) {
                    $valueGallery[] = $rows['image'];
                }
                $value[$key]['gallery'] = $valueGallery;
            }
            return $value;
        }else{
            return $this->getAllListBupbe();
        }
        return $search;
    }

    // search sandals
    public function searchSandals()
    {
        $search='';
        if (empty($this->request['name'])===false) {
            $products = new  Products();
            $search = $products->searchSandals($this->request['name']);
            while ($rows = $search->fetch_assoc()) {
                $value[] = $rows;
            }if (empty($value)) {
                $value = [];
            }
            // get image detail theo product_id
            foreach($value as $key=>$valueImg){
                $getGallery = $products->getGalleryByProductId($valueImg['id']);
                $valueGallery =[];
                while ($rows = $getGallery->fetch_assoc()) {
                    $valueGallery[] = $rows['image'];
                }
                $value[$key]['gallery'] = $valueGallery;
            }
            return $value;
        }else{
            return $this->getAllListSandals();
        }
        return $search;
    }
    
    // search cao gót
    public function searchGots()
    {
        $search='';
        if (empty($this->request['name'])===false) {
            $products = new  Products();
            $search = $products->searchGots($this->request['name']);
            while ($rows = $search->fetch_assoc()) {
                $value[] = $rows;
            }if (empty($value)) {
                $value = [];
            }
            // get image detail theo product_id
            foreach($value as $key=>$valueImg){
                $getGallery = $products->getGalleryByProductId($valueImg['id']);
                $valueGallery =[];
                while ($rows = $getGallery->fetch_assoc()) {
                    $valueGallery[] = $rows['image'];
                }
                $value[$key]['gallery'] = $valueGallery;
            }
            return $value;
        }else{
            return $this->getAllListGot();
        }
        return $search;
    }
    
    // selling products   
    public function getSellingProducts()
    {
        $products = new Products();
        $getSelling = $products->getSellingProducts();
        $value = [];
        while ($row = $getSelling->fetch_assoc()) {
            $value[] = $row;
        }
        return $value;
    }

    // get order selling
    public function getOrderSell()
    {   
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page - 1)* $item_per_page;
        $products = new Products();
        $getList = $products->getOrderSell($item_per_page,$offset);
        $value=[];
        while ($rows = $getList->fetch_assoc()) {
            $products=1;
            $value[] = $rows;
            $products++;
        }
        return $value;
    }
        // search selling
    public function searchSell()
    {
        $search='';
        if (empty($this->request['time'])===false) {
            $products = new  Products();
            $search = $products->searchBill($this->request['time']);
            return $search;
        }else{
            return $this->getOrderSell();
        }
        return $search;
    }

    /**
     * Order Bill
     */
    // get order bill with id
    public function getOrderBillID($id)
    {
        $products = new Products();
        $getBillId = $products->getOrderBillID($id);
        while ($row = $getBillId->fetch_assoc()) {
            $value[] = $row;
        }
        return $value;
    }

    // get order bill with id to update
    public function getEditBill($id)
    {
        $products = new Products();
        $getEditBill = $products->getEditBill($id);
        $value = [];
        while ($row = $getEditBill->fetch_assoc()) {
            $value[] = $row;
        }
        return $value;
    }
    
    // update order bill 
    public function updateBill()
    {
        if ((empty($this->request['name']) && empty($this->request['quantity'])
         && empty($this->request['total']) && empty($this->request['status'])) === false) {
           $products = new Products();
           $update = $products->updateBill($this->request['id'],$this->request['name'],$this->request['quantity'],$this->request['total'], $this->request['status']);
           if ($update) {
               header("location: listOrders.php");
           }
        }
    }
    
    // get order bill
    public function getOrderBill()
    {   
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page - 1)* $item_per_page;
        $products = new Products();
        $getList = $products->getOrderBill($item_per_page,$offset);
        $value=[];
        while ($rows = $getList->fetch_assoc()) {
            $products=1;
            $value[] = $rows;
            $products++;
        }
        return $value;
    }

    /**
     * Phân trang (pagination)
     * */ 
    //phân trang btn prev
    public function getBtnPrevBill()
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
    public function getBtnNextBill()
    {
        $pagination = '';
        $btnPage = 0;
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page -1) * $item_per_page;
        $products = new Products();
        $totalNum = $products->getTotalNumBill($item_per_page, $offset);
        if (isset($_GET['page']) && isset($_GET['list'])) {
            $item_per_page = $_GET['list'];
            $pageId = $_GET['page'];
            if ($pageId <= 1 || $pageId < $totalNum) {
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
    public function getNumPageBill()
    {
        $pagination = '';
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page -1)* $item_per_page;
        $products = new Products();
        $totalNum = $products->getTotalNumBill($item_per_page,$offset);
        $num = 1;
        for($num = 1; $num <= $totalNum; $num++) {
            $pagination .= "<a class='pagination' href=?list=".$item_per_page."&page=".$num.">".$num."</a>";
        }
        return $pagination;
    }

    // select time 
    public function selectTime()
    {
        $products = new  Products();
        $select = $products->searchTime();
        $value = [];
        while ($rows = $select->fetch_assoc()) {
           $value[] = $rows;
        }
        return $value;
    }

    // post select time
    public function postSelectTime()
    {
        if (isset($this->request['time'])===false) {
            $products = new  Products();
            $select = $products->postSelectTime($this->request['time']);
            $value = [];
            while ($rows = $select->fetch_assoc()) {
                $value[] = $rows;
             }
             return $value;
        }
        else{
            echo 'dddddddđ';
        }
        
    }
    // search bill
    public function searchBill()
    {
        $search='';
        if (empty($this->request['time'])===false) {
            $products = new  Products();
            $search = $products->searchBill($this->request['time']);
            return $search;
        }else{
            return $this->getOrderBill();
        }
        return $search;

        
    }

    // get detail order bill    
    public function getDetailBill($id)
    {
        $products = new Products();
        $getDetailBill = $products->getDetailBill($id);
        while ($row = $getDetailBill->fetch_assoc()) {
            $value[] =$row;
        }
        return $value;
    }
    
    /*
    * Customer Contact 
    */
    public function getAllContacts()
    {
        // số dòng hiển thị
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:5);
        // số page hiện tại và tính số row kế tiếp
        $offset = ($this->current_page-1) * $item_per_page;
        $products = new Products();
        $contact = $products->getAllContacts($item_per_page,$offset);
        while ($rows = $contact->fetch_assoc()) {
            $value[]=$rows;
        }if (empty($value)) {
            $value=[];
        }
        return $value;
    }

    // get search contact
    public function searchContact()
    {
       if (empty($this->request['name'])===false) {
           $products = new Products();
           $search = $products->searchContact($this->request['name']);
           $value=[];
           while ($row = $search->fetch_assoc()) {
               $value[] = $row;
           }if (empty($value)) {
                $value=[];
            }
           return $value;
       }else{
        return $this->getAllContacts();
       }
    }

    // get total number pages 
    public function getNumPageContact()
    {
        $pagination ='';
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:5);
        $offset = ($this->current_page -1 )* $item_per_page;
        $products = new Products();
        $totalNum = $products->getTotalNumContact($item_per_page);
        for ($i= 1; $i <= $totalNum ; $i++) { 
            $pagination ="<a class='pagination' href=?list=".$item_per_page."&page=".$i.">".$i."</a>";
        }
        return $pagination;
    }

    // phân trang prev
    public function getBtnPrevContact()
    {
        $pagination = '';
        $btnPage = 0;
        if (isset($_GET['page'])&& isset($_GET['list'])) {
            $item_per_page = $_GET['list'];
            $pageId = $_GET['page'];
            if ($pageId > 1) {
                $btnPage = $pageId - 1;
                $pagination = "<a class='pagination' href=?list=".$item_per_page."&page=".$btnPage.">Prev</a>";
            }
        }else{
            $pagination = '';
        }
        return $pagination;
    }

    // phân trang next
    public function getBtnNextContact()
    {
       $pagination = '';
       $pageId = 0;
       $item_per_page = (empty($_GET['list'])===false?$_GET['list']:5);
       $offset = ($this->current_page -1 )* $item_per_page;
       $products = new Products();
       $totalNum = $products->getTotalNumContact($item_per_page);
       if (isset($_GET['list'])&& isset($_GET['page'])) {
           $item_per_page = $_GET['list'];
           $pageId = $_GET['page'];
           if ($pageId < 1|| $pageId < $totalNum) {
               $btnPage = $pageId + 1;
               $pagination = "<a class='pagination' href=?list=".$item_per_page."&page=".$btnPage.">Next</a>";
           }elseif ($pageId == $totalNum) {
               $pagination="";
           }
       }else{
            $pagination = '<a href=?list='.$item_per_page.'&page=1 class="pagination"">Next</a>';
       }
        return $pagination;
    }

    // delete contact
    public function delContact($id)
    {
        $products = new Products();
        $delContact = $products->delContact($id);
        if ($delContact) {
            header("location: listContact.php");
        }
    }
}
