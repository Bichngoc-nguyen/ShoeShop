<?php
require_once '../../Models/Products.php';
class CategoryController 
{
    public function getCategory()
    {
        // echo 'eeeeee';
        $products = new Products();
        $cate = $products->getAllListCategories();
        while ($rows = $cate->fetch_assoc()) {
            $value[] = $rows;
        }
        // $arr = array_unique($value);
        $html = '<select class="form-control input-item" name="cate"><option>Category</option>';
            foreach($value as $valueC){
                $change = implode($valueC);
                $html.='<option value="'.$change.'">'.$change.'</option>';
            }   
        $html.='</select>';
        print_r($html);
    }
}

