<?php
require_once '../../Controllers/Lib/RequestController.php';
require_once '../../Models/Products.php';
class CategoryController 
{

    public $request;
    public function __construct()
    {
        $request = new RequestController();
        $this->request = $request->getInput();
    }

    // create danh mục
    public function createCate()
    {
        if (empty($this->request['name'])===false) {
            $products = new Products();
            $postCate = $products->createCate($this->request['name']);
            if ($postCate) {
                echo 'true';
                header('location: category.php');
            }
        }
    }

    // get danh sách dah mục
    public function getCategory()
    {
        $products = new Products();
        $cate = $products->getAllListCategories();
        while ($rows = $cate->fetch_assoc()) {
            $value[] = $rows;
        }
        $html = '<select class="form-control input-item" name="cate"selected>';
            foreach($value as $valueC){
                $change = implode($valueC);
                $html.=' <option value="'.$valueC['id'].'">'.$valueC['nameCategories'].'</option>';
            }   
        $html.='</select>';
        print_r($html);
    }

    // get danh sach category
    public function getAllListCategories()
    {
        $products = new Products();
        $cate = $products->getAllListCategories();
        while ($rows = $cate->fetch_assoc()) {
            $value[] = $rows;
        }
        return $value;
    }
}

