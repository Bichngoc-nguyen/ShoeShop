<?php
ob_start();
require_once '../../Controllers/Lib/RequestController.php';
require_once '../../Models/Pages.php';
require_once '../../Controllers/Lib/ConfirmController.php';
require_once '../../Models/Products.php';

class PagesController 
{
    public $request;
    public function __construct()
    {
        $request = new RequestController();
        $this->request = $request->getInput();
        $this->current_page = (empty($_GET['page'])===false)?$_GET['page']:1;
    }

    // get new products
    public function getNewProducts()
    {
        $pages = new Pages();
        $newProducts = $pages->getNewProducts();
        while ($rows = $newProducts->fetch_assoc()) {
            $value[]=$rows;
        }
        // lấy ra tất cả image detail theo id 
        foreach ($value as $key=>$valueImg) {
         $products = new Products();
            $getGallery = $products->getGalleryByProductId($valueImg['id']);
            $valueGallery =[];
            while ($rows = $getGallery->fetch_assoc()) {          
                $valueGallery[] = $rows['image'];
            }
            $value[$key]['gallery'] = $valueGallery;
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
        }// lấy ra tất cả image detail theo id 
        foreach ($value as $key=>$valueImg) {
            $products = new Products();
               $getGallery = $products->getGalleryByProductId($valueImg['id']);
               $valueGallery =[];
               while ($rows = $getGallery->fetch_assoc()) {          
                   $valueGallery[] = $rows['image'];
               }
               $value[$key]['gallery'] = $valueGallery;
           }
    return $value;
    }

    // put cart (đặt hàng)
    public function getPayment()
    {
        $cart = !empty($_SESSION['cart'])?$_SESSION['cart']:[];
        if (empty($cart)) {
            echo '<script> alert("bạn chưa chọn sản phẩm");</script>';
        }else{
            if ((empty($cart) && empty($this->request['username']) && empty($this->request['address']) && empty($this->request['phone']) 
                && empty($this->request['email']) && empty($this->request['note'])&& empty($this->request['nameProduct']) 
                && empty($this->request['quantity']) && empty($this->request['price']) && empty($this->request['sum']))===false){   
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

            }  
        }
    }

    // get all list sneakers
    // search sneakers
    
    public function getAllListSneakers()
    {
        // số dòng hiển thị
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:20);
        // số page hiện tại và tính số row page tiếp theo
        $offset = ($this->current_page - 1 )* $item_per_page;
        $pages = new Pages();
        $getList = $pages->getAllListSneakers($item_per_page, $offset);
        $value =[];
        while ($rows = $getList->fetch_assoc()) {
            $value[] = $rows;
        }if (empty($value)) {
           $value = [];
       }
       // lấy ra tất cả image detail theo id 
       foreach ($value as $key=>$valueImg) {
        $products = new Products();
           $getGallery = $products->getGalleryByProductId($valueImg['id']);
           $valueGallery =[];
           while ($rows = $getGallery->fetch_assoc()) {          
               $valueGallery[] = $rows['image'];
           }
           $value[$key]['gallery'] = $valueGallery;
       }
        return $value;
    }

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
         $item_per_page = (empty($_GET['list'])===false?$_GET['list']:20);
         $offset = ($this->current_page -1)* $item_per_page;
         $pages = new Pages();
         $totalNum = $pages->getTotalNumSneakers($item_per_page,$offset);
         if (isset($_GET['page']) && isset($_GET['list'])) {
             $item_per_page = $_GET['list'];
             $pageId = $_GET['page'];
             if ($pageId < 1 || $pageId < $totalNum) {
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
         $item_per_page = (empty($_GET['list'])===false?$_GET['list']:20);
         $offset = ($this->current_page -1)* $item_per_page;
         $pages = new Pages();
         $totalNum = $pages->getTotalNumSneakers($item_per_page,$offset);
         $num = 1;
         for($num = 1; $num <= $totalNum; $num++) {
             $pagination .= "<a class='pagination' href=?list=".$item_per_page."&page=".$num.">".$num."</a>";
         }
         return $pagination;
     }

     // get all list SANDALS
    
    public function getAllListSandals()
    {
        // số dòng hiển thị
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:20);
        // số page hiện tại và tính số row page tiếp theo
        $offset = ($this->current_page - 1 )* $item_per_page;
        $pages = new Pages();
        $getList = $pages->getAllListSandals($item_per_page, $offset);
        $value =[];
        while ($rows = $getList->fetch_assoc()) {
            $value[] = $rows;
        }if (empty($value)) {
           $value = [];
       }
       // lấy ra tất cả image detail theo id 
       foreach ($value as $key=>$valueImg) {
        $products = new Products();
           $getGallery = $products->getGalleryByProductId($valueImg['id']);
           $valueGallery =[];
           while ($rows = $getGallery->fetch_assoc()) {          
               $valueGallery[] = $rows['image'];
           }
           $value[$key]['gallery'] = $valueGallery;
       }
        return $value;
    }

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
                 $pagination = "<a class='pagination' href=?list=".$item_per_page."&page=".$btnPage.">Prev</a>";
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
         $item_per_page = (empty($_GET['list'])===false?$_GET['list']:20);
         $offset = ($this->current_page -1)* $item_per_page;
         $pages = new Pages();
         $totalNum = $pages->getTotalNumSandals($item_per_page,$offset);
         if (isset($_GET['page']) && isset($_GET['list'])) {
             $item_per_page = $_GET['list'];
             $pageId = $_GET['page'];
             if ($pageId <1 || $pageId < $totalNum) {
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
     public function getNumPageSD()
     {
         $pagination = '';
         $item_per_page = (empty($_GET['list'])===false?$_GET['list']:20);
         $offset = ($this->current_page -1)* $item_per_page;
         $pages = new Pages();
         $totalNum = $pages->getTotalNumSandals($item_per_page,$offset);
         $num = 1;
         for($num = 1; $num <= $totalNum; $num++) {
             $pagination .= "<a class='pagination' href=?list=".$item_per_page."&page=".$num.">".$num."</a>";
         }
         return $pagination;
     }

    /**
     * BUPBE
     */
    
     // get all list BupBe
    
     public function getAllListBupBe()
     {
         // số dòng hiển thị
         $item_per_page = (empty($_GET['list'])===false?$_GET['list']:20);
         // số page hiện tại và tính số row page tiếp theo
         $offset = ($this->current_page - 1 )* $item_per_page;
         $pages = new Pages();
         $getList = $pages->getAllListBupBe($item_per_page, $offset);
         $value =[];
         while ($rows = $getList->fetch_assoc()) {
             $value[] = $rows;
         }if (empty($value)) {
            $value = [];
        }
        // lấy ra tất cả image detail theo id 
        foreach ($value as $key=>$valueImg) {
         $products = new Products();
            $getGallery = $products->getGalleryByProductId($valueImg['id']);
            $valueGallery =[];
            while ($rows = $getGallery->fetch_assoc()) {          
                $valueGallery[] = $rows['image'];
            }
            $value[$key]['gallery'] = $valueGallery;
        }
         return $value;
     }
 
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
                  $pagination = "<a class='pagination' href=?list=".$item_per_page."&page=".$btnPage.">Prev</a>";
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
          $item_per_page = (empty($_GET['list'])===false?$_GET['list']:20);
          $offset = ($this->current_page -1)* $item_per_page;
          $pages = new Pages();
          $totalNum = $pages->getTotalNumBupBe($item_per_page,$offset);
          if (isset($_GET['page']) && isset($_GET['list'])) {
              $item_per_page = $_GET['list'];
              $pageId = $_GET['page'];
              if ($pageId < 1 || $pageId < $totalNum) {
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
      public function getNumPageBB()
      {
          $pagination = '';
          $item_per_page = (empty($_GET['list'])===false?$_GET['list']:20);
          $offset = ($this->current_page -1)* $item_per_page;
          $pages = new Pages();
          $totalNum = $pages->getTotalNumBupBe($item_per_page,$offset);
          $num = 1;
          for($num = 1; $num <= $totalNum; $num++) {
              $pagination .= "<a class='pagination' href=?list=".$item_per_page."&page=".$num.">".$num."</a>";
          }
          return $pagination;
      }
 
    /**
     * GOT
     */
    
     // get all list Got
    
     public function getAllListGot()
     {
         // số dòng hiển thị
         $item_per_page = (empty($_GET['list'])===false?$_GET['list']:20);
         // số page hiện tại và tính số row page tiếp theo
         $offset = ($this->current_page - 1 )* $item_per_page;
         $pages = new Pages();
         $getList = $pages->getAllListGot($item_per_page, $offset);
         $value =[];
         while ($rows = $getList->fetch_assoc()) {
             $value[] = $rows;
         }if (empty($value)) {
            $value = [];
        }
        // lấy ra tất cả image detail theo id 
        foreach ($value as $key=>$valueImg) {
         $products = new Products();
            $getGallery = $products->getGalleryByProductId($valueImg['id']);
            $valueGallery =[];
            while ($rows = $getGallery->fetch_assoc()) {          
                $valueGallery[] = $rows['image'];
            }
            $value[$key]['gallery'] = $valueGallery;
        }
         return $value;
     }
 
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
                  $pagination = "<a class='pagination' href=?list=".$item_per_page."&page=".$btnPage.">Prev</a>";
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
          $item_per_page = (empty($_GET['list'])===false?$_GET['list']:20);
          $offset = ($this->current_page -1)* $item_per_page;
          $pages = new Pages();
          $totalNum = $pages->getTotalNumGot($item_per_page,$offset);
          if (isset($_GET['page']) && isset($_GET['list'])) {
              $item_per_page = $_GET['list'];
              $pageId = $_GET['page'];
              if ($pageId < 1 || $pageId < $totalNum) {
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
      public function getNumPageGot()
      {
          $pagination = '';
          $item_per_page = (empty($_GET['list'])===false?$_GET['list']:20);
          $offset = ($this->current_page -1)* $item_per_page;
          $pages = new Pages();
          $totalNum = $pages->getTotalNumGot($item_per_page,$offset);
          $num = 1;
          for($num = 1; $num <= $totalNum; $num++) {
              $pagination .= "<a class='pagination' href=?list=".$item_per_page."&page=".$num.">".$num."</a>";
          }
          return $pagination;
      }

    //   contact (liên hệ)
    public function postContact()
    {
        if ((empty($this->request['username']) && empty($this->request['email']) && empty($this->request['phone']) && empty($this->request['note']))===false) {
            $pages = new Pages();
            $contact = $pages->postContact($this->request['username'],$this->request['email'],$this->request['phone'],$this->request['note']);
            if ($contact) {
                header("location: index.php");
            }
        }
    }

    // search products home
    public function searchProducts()
    {
       if (empty($this->request['name'])===false) {
          switch ($this->request['name']) {
              case 'sneakers':
                 header("location: sneakers.php");
                  break;
              case 'got':
                 header("location: got.php");
                  break;
              case 'sandals':
                 header("location: sandals.php");
                  break;
              case 'bupbe':
                 header("location: bupbe.php");
                  break;
              default:
                header("location: index.php");
                  break;
          }
       }
    }

}
