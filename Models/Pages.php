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
         ORDER BY id DESC LIMIT 20";
         return $this->executeQuery($sql);
    }

    // get detail products with id
    public function getDetailProducts($id)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity 
        FROM product p join productDetail pd ON p.id = pd.product_id
        WHERE p.id = $id";
        return $this->executeQuery($sql);
    }

    // // payment Cart
    // public function getPayment($username, $address, $phone, $email, $note, $nameProduct, $quantity, $total,$sum)
    // {
    //     $sql = "INSERT INTO customer (username, address, phone, email, note) 
    //     VALUES ('$username', '$address','$phone','$email', '$note')";
    //     $result = $this->executeQuery($sql);
    //     if ($result === true) {
    //         $last_id = $this->conn->insert_id;
    //         $sql= "INSERT INTO orders (customer_id,nameProduct, quantity, price ,sum) VALUES ('$last_id','$nameProduct','$quantity','$total','$sum')";
    //         $result1 = $this->executeQuery($sql);
    //     }
    //     return $result1;
    // }

    // create customer
    public function postCustomer($username, $address, $phone, $email, $note)
    {
        $sql = "INSERT INTO customer (username, address, phone, email, note) 
               VALUES ('$username', '$address','$phone','$email', '$note')";
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
            $sql1[] = "('$last_id','$name','$size','$quantity','$price','$sum', 'Chưa Thanh toán')";
        } 
        $sql = "INSERT INTO orders (customer_id, nameProduct,size, quantity, price ,sum, status) VALUES ".implode(',',$sql1);
        $result = $this->executeQuery($sql);
        return $result;
    }
    
    // list tổng sổ dòng tables sneakers
    public function getTotalNumSneakers($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Sneakers'";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }
    
    // list giày sneakers 
    public function getAllListSneakers($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Sneakers' limit"." ".$item_per_page." "." OFFSET"." ".$offset;
        return $this->executeQuery($sql);
    }

    /**
     * sandals
     * */ 
    // list tổng sổ dòng tables sandals
    public function getTotalNumSandals($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Sandals'";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }
    
    // list giày Sandals 
    public function getAllListSandals($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Sandals' limit"." ".$item_per_page." "." OFFSET"." ".$offset;
        return $this->executeQuery($sql);
    }

    /**
     * Bupbe
     * */ 
    // list tổng sổ dòng tables Bupbe
    public function getTotalNumBupBe($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'BupBe'";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }
    
    // list giày BupBe 
    public function getAllListBupBe($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'BupBe' limit"." ".$item_per_page." "." OFFSET"." ".$offset;
        return $this->executeQuery($sql);
    }

    /**
     * Got
     * */ 
    // list tổng sổ dòng tables Got
    public function getTotalNumGot($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Cao gót'";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }
    
    // list giày Got 
    public function getAllListGot($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Cao gót' limit"." ".$item_per_page." "." OFFSET"." ".$offset;
        return $this->executeQuery($sql);
    }

    // contact (liên hệ)
    public function postContact($name, $email,$phone,$note)
    {
        $sql = "INSERT INTO contact (username,email, phone, note) VALUES ('$name', '$email', '$phone','$note')";
        return $this->executeQuery($sql);
    }
}