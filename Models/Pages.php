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
         ORDER BY id DESC LIMIT 12";
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
}