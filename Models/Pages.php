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
}