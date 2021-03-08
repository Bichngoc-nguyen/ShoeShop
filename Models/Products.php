<?php
ob_start();
require_once 'Database.php';
class Products extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    // get category
    public function getAllListCategories()
    {
        $sql = "SELECT nameCategories FROM categories";
        return $this->executeQuery($sql);
    }

    // create products
    public function createProducts($name, $photo, $price, $quantity, $descript, $cate)
    {
        $sql= "INSERT INTO product (nameProduct,photo, price,quantity) VALUES ('$name', '$photo', '$price', '$quantity')";
        $result = $this->executeQuery($sql);
        if ($result==true) {
            $last_id = $this->conn->insert_id;
            $sql ="INSERT INTO productDetail (product_id, image) VALUES ('$last_id', '$descript')";
            $result1 = $this->executeQuery($sql);
        }
        if ($result1==true) {
            $last_id = $this->conn->insert_id;
            $sql ="INSERT INTO categories (nameCategories, product_id ) VALUES ('$cate', '$last_id')";
            $result2 = $this->executeQuery($sql);
        // var_dump($sql);
        // die();
        }
        else{
            echo "error";
        }
        return $result2;
    }

    /**
     * products
     * */ 
    // list products theo id 
    public function getIdProduct($id)
    {
        $sql = "SELECT p.nameProduct, pd.image,p.photo,p.price, p.quantity FROM product p join productdetail pd ON p.id = pd.product_id WHERE product_id = '$id'";
        return $result = $this->executeQuery($sql);
    }

    // update product
    public function updateProduct($id, $name, $photo, $price, $quantity, $image)
    {
        $sql = "UPDATE product p inner join productdetail pd 
        on p.id = pd.product_id 
        set p.nameProduct = '$name', p.photo = '$photo', p.price = '$price', p.quantity = '$quantity', pd.image = '$image'
        WHERE p.id = $id";
        return $this->executeQuery($sql);
    }

    // delete product
    public function delProduct($id)
    {
        $sql = "DELETE product, productdetail FROM product INNER JOIN productdetail ON productdetail.product_id = product.id WHERE product.id=$id";
        return $this->executeQuery($sql);
    }
    
    /**
     * end Products
     * */ 

    /**
     * Giày sneakers
     * */ 
    
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

    /*
    * end sneakers
    */ 

    /**
     * Shoe Bupbe
     * */ 
    // list tổng sổ dòng tables bupbe
    public function getTotalNumBupbe($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Bupbe'";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }
    // list giày bupbe
    public function getAllListBupbe($item_per_page, $offset)
    {
     $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
     FROM (( product p join productDetail pd ON p.id = pd.product_id) 
     join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Bupbe' limit ".$item_per_page." OFFSET ".$offset;
    //  var_dump($sql);
    //  die();
     return $this->executeQuery($sql);
    }
    // end shoe bupbe

    /**
     * shoe Sandals
     * */ 
    // list tổng sổ dòng tables Sandals
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
    // list giày sandals
    public function getAllListSandals($item_per_page, $offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Sandals' limit ".$item_per_page." OFFSET ".$offset;
        return $this->executeQuery($sql);
    }
    // end shoe sandals

    /**
     * shoe Gots
     * */ 
     // list tổng sổ dòng tables Gots
    public function getTotalNumGot($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Cao Gót'";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }
    // list giày got
    public function getAllListGot($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Cao gót' limit ".$item_per_page." OFFSET ".$offset;
        return $this->executeQuery($sql);
    }
    // end shoe Gots

    // search Sneakers
    public function searchSneakers($name)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Sneakers' AND p.nameProduct Like '%".$name."%'";
        return $this->executeQuery($sql);
    }

    // search Bupbe
    public function searchBupbe($name)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Bupbe' AND p.nameProduct LIKE '%".$name."%'";
        return $this->executeQuery($sql);
    }

    // search sandals
    public function searchSandals($name)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Sandals' AND p.nameProduct LIKE '%".$name."%'";
        return $this->executeQuery($sql);
    }
    
    // search sandals
    public function searchGots($name)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity, ct.nameCategories 
        FROM (( product p join productDetail pd ON p.id = pd.product_id) 
        join categories ct ON pd.id = ct.product_id) WHERE ct.nameCategories = 'Cao gót' AND p.nameProduct LIKE '%".$name."%'";
        return $this->executeQuery($sql);
    }
    
}
