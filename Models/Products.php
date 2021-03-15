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

    // get getSellingProducts
    public function getSellingProducts()
    {
        $sql = "SELECT nameProduct,size, SUM(quantity)AS quantity, price 
                 FROM orders 
                 GROUP BY nameProduct ORDER BY SUM(nameProduct)";
        $result = $this->executeQuery($sql);
        return $result;
    }
    /**
     *  ORDERS BILL
     */

    public function getTotalNumBill($item_per_page,$offset)
    {
        $sql = "SELECT  c.username, o.id, o.customer_id, o.nameProduct, o.quantity, o.price, o.sum,o.time, o.status
        FROM (orders o join customer c ON o.customer_id = c.id)";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }

    // get order bill ALL
    public function getOrderBill($item_per_page, $offset)
    {
        $sql = "SELECT  c.username, o.id, o.customer_id, o.nameProduct, o.quantity, o.price, o.sum,o.time, o.status
        FROM (orders o join customer c ON o.customer_id = c.id) limit ".$item_per_page." OFFSET ".$offset;
        $result = $this->executeQuery($sql);
        return $result;
    }
    // get order bill with id
    public function getOrderBillID($id)
    {
        $sql = "SELECT id,customer_id, nameProduct, quantity, price, time, status FROM orders WHERE customer_id = $id";
        $result = $this->executeQuery($sql);
        return $result;
    }

    // search bill
    public function searchBill($time)
    {
        $sql = "SELECT  c.username, o.id, o.customer_id, o.nameProduct, o.quantity, o.price, o.sum, o.time, o.status
        FROM (orders o join customer c ON o.customer_id = c.id) WHERE (time like '%$time%') or (nameProduct like '%$time%') or (username like '%$time%')";
        $result = $this->executeQuery($sql);
        return $result;
    }

    // update orders bill
    public function updateBill($id, $name, $quantity, $price, $status)
    {
        $sql = "UPDATE orders SET nameProduct = '$name', quantity='$quantity', price='$price', status='$status' WHERE id = $id limit 1";
        $result =  $this->executeQuery($sql);
        return $result;
    }
    // edit bill with id
    public function getEditBill($id)
    {
        $sql = "SELECT  c.username, o.id, o.nameProduct, o.quantity, o.price, o.sum, o.status
          FROM (orders o join customer c ON o.customer_id = c.id) WHERE o.id = $id LIMIT 1";
          $result = $this->executeQuery($sql);
          return $result;
    }

    // detail bill
    public function getDetailBill($id)
    {
        $sql = "SELECT  c.username, c.address, c.Phone, c.email, c.note, o.id, o.nameProduct, o.quantity, o.price, o.sum
          FROM (orders o join customer c ON o.customer_id = c.id) WHERE o.customer_id = $id ";
          $result = $this->executeQuery($sql);
          return $result;
    }

}
