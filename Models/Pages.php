<?php
require_once 'Database.php';
class Pages extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    // get san pham moi 
    public function getNewProducts()
    {
         $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity 
         FROM product p join productDetail pd ON p.id = pd.product_id
         group by p.nameProduct DESC LIMIT 20";
         return $this->executeQuery($sql);
    }

    // get detail products with id
    public function getDetailProducts($id)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity 
        FROM product p join productDetail pd ON p.id = pd.product_id
        WHERE p.id = $id group by p.nameProduct";
        return $this->executeQuery($sql);
    }

    // create customer
    public function postCustomer($username, $address, $phone, $email, $note)
    {
        $sql = "INSERT INTO customer (username, address, phone, email, note, status) 
               VALUES ('$username', '$address','$phone','$email', '$note', 'Chưa Thanh toán')";
            //    var_dump($sql);
            //    die;
            $result =  $this->executeQuery($sql);
            return $result;
    }

    // insert order bill
    public function postOrders($cart, $sum)
    {   
        $sql1 = array();
        foreach($cart as $value){
            $name = $value["name"];
            $size = $value["size"];
            $price = $value["price"];
            $quantity = $value["quantity"];
            $last_id = $this->conn->insert_id;
            $sql1[] = "('$last_id','$name','$size','$quantity','$price','$sum')";
        } 
        $sql = "INSERT INTO orders (customer_id, nameProduct,size, quantity, price ,sum) VALUES ".implode(',',$sql1);
        $result = $this->executeQuery($sql);
        return $result;
    }
    
    // list tổng sổ dòng tables sneakers
    public function getTotalNumSneakers($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'Sneakers' group by p.id";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }
    
    // list giày sneakers 
    public function getAllListSneakers($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'Sneakers' GROUP BY p.nameProduct limit ".$item_per_page." OFFSET ".$offset;
        return $this->executeQuery($sql);
    }

    /**
     * sandals
     * */ 
    // list tổng sổ dòng tables sandals
    public function getTotalNumSandals($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'Sandals'group by p.id";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }
    
    // list giày Sandals 
    public function getAllListSandals($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'Sandals'GROUP BY p.nameProduct limit"." ".$item_per_page." "." OFFSET"." ".$offset;
        return $this->executeQuery($sql);
    }

    /**
     * Bupbe
     * */ 
    // list tổng sổ dòng tables Bupbe
    public function getTotalNumBupBe($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'BupBe' group by p.id";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page)-1;
        return $totalPages;
    }
    
    // list giày BupBe 
    public function getAllListBupBe($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'BupBe' GROUP BY p.nameProduct limit"." ".$item_per_page." "." OFFSET"." ".$offset;
        return $this->executeQuery($sql);
    }

    /**
     * wood
     * */ 
    // list tổng sổ dòng tables wood   
    public function getTotalNumGot($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'wood'group by p.id";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }
    
    // list giày wood   
    public function getAllListGot ($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'wood'GROUP BY p.nameProduct limit"." ".$item_per_page." "." OFFSET"." ".$offset; 
        return $this->executeQuery($sql);
    }

    // contact (liên hệ)
    public function postContact($name, $email,$phone,$note)
    {
        $sql = "INSERT INTO contact (username,email, phone, note) VALUES ('$name', '$email', '$phone','$note')";
        return $this->executeQuery($sql);
    }


}