<?php
ob_start();
require_once 'Database.php';
class Products extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    // create category
    public function createCate($name)
    {
       $sql = "INSERT INTO categories (nameCategories) VALUES ('$name')";
       return $this->executeQuery($sql);
    }

    // get category
    public function getAllListCategories()
    {
        $sql = "SELECT * FROM categories";
        return $this->executeQuery($sql);
    }

    // get cate with id
    public function getCategoriesId($id)
    {
        $sql = "SELECT * FROM categories where id = $id";
        return $this->executeQuery($sql);
    }

    // update Category
    public function updateCate($id, $name)
    {
       $sql = "UPDATE categories set nameCategories = '$name' where id = $id";
       return $this->executeQuery($sql);
    }

    // delete Category
    public function deleteCate($id)
    {
        $sql = "DELETE from categories where id = $id";
        return $this->executeQuery($sql);
    }

    // create products
    public function createProducts($name, $photo, $price, $quantity, $descript, $cate)
    {
            $sql= "INSERT INTO product (nameProduct,photo, price,quantity,category_id) VALUES ('$name', '$photo', '$price', '$quantity','$cate')";
            $result = $this->executeQuery($sql);
        if ($result==true) {
            $last_id = $this->conn->insert_id;
            if (!empty($descript)) {
                foreach ($descript as $item) {
                    $sql ="INSERT INTO productDetail (product_id, image) VALUES ('$last_id', '$item')";
                    $result = $this->executeQuery($sql);
                }
            }
        }
        else{
            echo "error";
        }
        return $result;
    }

    /**
     * products
     * */ 
    // list products theo id 
    public function getIdProduct($id)
    {
        $sql = "SELECT p.id , p.nameProduct, pd.image,p.photo,p.price, p.quantity 
        FROM product p join productdetail pd ON p.id = pd.product_id WHERE product_id = '$id' group by p.id";
        return $this->executeQuery($sql);
    }

    // update product
    public function updateProduct($id, $name, $photo, $price, $quantity, $descript)
    {
         $sql = "UPDATE product set nameProduct = '$name', photo = '$photo', price = '$price', quantity = '$quantity'
        WHERE id = $id ";
        $result = $this->executeQuery($sql);
        if ($result===true) {
            $sql1 = "SELECT * FROM productDetail WHERE product_id = $id";
            $result1 = $this->executeQuery($sql1);
            while( $row = mysqli_fetch_assoc( $result1)){
                $new_array[] = $row; // Inside while loop
            }
            if (!empty($descript)) {
                $i = 0;
                foreach ($descript as $item) {
                    $tam = $new_array[$i]['id'];
                    $sql2 ="UPDATE productDetail SET product_id = '$id',image = '$item' WHERE id = $tam";
                    $re = $this->executeQuery($sql2);
                    $i++;
                }
            }
        }
        return $result;
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
        join categories ct ON p.category_id = ct.id) WHERE ct.nameCategories = 'Sneakers' group by p.id";
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

    // get image with id of product_id
    public function getGalleryByProductId($productId)
    {
        $sql = "SELECT * FROM productDetail WHERE product_id = $productId";
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
        join categories ct ON p.category_id = ct.id) WHERE ct.nameCategories = 'BupBe'  group by p.id";
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
     join categories ct ON p.category_id = ct.id) WHERE ct.nameCategories = 'BupBe' GROUP BY p.nameProduct limit ".$item_per_page." OFFSET ".$offset;
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
        join categories ct ON p.category_id = ct.id) WHERE ct.nameCategories = 'Sandals' GROUP BY p.id";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }

    // list giày sandals
    public function getAllListSandals($item_per_page, $offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'Sandals' GROUP BY p.nameProduct limit ".$item_per_page." OFFSET ".$offset;
        return $this->executeQuery($sql);
    }
    // end shoe sandals

    /**
     * shoe Gots
     * */ 
     // list tổng sổ dòng tables Gots
    public function getTotalNumGot($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'Wood' GROUP BY p.id";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }
    // list giày got
    public function getAllListGot($item_per_page,$offset)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'Wood' GROUP BY p.nameProduct limit ".$item_per_page." OFFSET ".$offset;
        return $this->executeQuery($sql);
    }
    // end shoe Gots

    // search Sneakers
    public function searchSneakers($name)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'Sneakers' AND p.nameProduct LIKE '%".$name."%' GROUP BY p.nameProduct";
        return $this->executeQuery($sql);
    }

    // search Bupbe
    public function searchBupbe($name)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'Bupbe' AND p.nameProduct LIKE '%".$name."%' GROUP BY p.nameProduct";    
        return $this->executeQuery($sql);
    }

    // search sandals
    public function searchSandals($name)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'Sandals' AND p.nameProduct LIKE '%".$name."%'";
        return $this->executeQuery($sql);
    }
    
    // search sandals
    public function searchGots($name)
    {
        $sql = "SELECT p.id, p.nameProduct, pd.image,p.photo,p.price, p.quantity,ct.nameCategories 
        FROM (( product p INNER join productDetail pd ON p.id = pd.product_id ) 
        INNER join categories ct ON p.category_id = ct.id ) WHERE ct.nameCategories = 'Wood' AND p.nameProduct LIKE '%".$name."%'";
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

     // get order selling ALL
     public function getOrderSell($item_per_page, $offset)
     {
        
         $sql = "SELECT c.username, o.id, o.customer_id, o.nameProduct, SUM(o.quantity) AS quantity, o.price, o.sum,c.time, c.status 
         FROM (orders o join customer c ON o.customer_id = c.id) 
         WHERE o.quantity > 3 GROUP BY nameProduct ORDER BY quantity limit ".$item_per_page." OFFSET ".$offset ;
         $result = $this->executeQuery($sql);
         return $result;
     }
    
    /**
     *  ORDERS BILL
     */

    public function getTotalNumBill($item_per_page,$offset)
    {
        $sql = "SELECT  c.username, o.id, o.customer_id, o.nameProduct, o.quantity, o.price, o.sum,c.time, c.status
        FROM (orders o join customer c ON o.customer_id = c.id) group by c.username";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }

    // get order bill ALL
    public function getOrderBill($item_per_page, $offset)
    {
        $sql = "SELECT  c.username, o.id, o.customer_id, o.nameProduct, o.quantity, o.price, o.sum,c.time, c.status
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
        $sql = "SELECT  c.username, o.id, o.customer_id, o.nameProduct, o.quantity, o.price, o.sum, c.time, c.status
        FROM (orders o join customer c ON o.customer_id = c.id) WHERE (time like '%$time%') 
        or (nameProduct like '%$time%') or (username like '%$time%') or (status like '%$time%')";
        $result = $this->executeQuery($sql);
        return $result;
    }

    // search bill
    public function postSelectTime($time)
    {
        $sql = "SELECT  c.username, o.id, o.customer_id, o.nameProduct, o.quantity, o.price, o.sum, c.time, c.status
        FROM (orders o join customer c ON o.customer_id = c.id) WHERE (time = '$time')";
        var_dump($sql);
        die;
        $result = $this->executeQuery($sql);
        return $result;
    }

     // search bill
    public function searchTime()
    {
        $sql = "SELECT  c.username, o.id, o.customer_id, o.nameProduct, o.quantity, o.price, o.sum, c.time, c.status
        FROM (orders o join customer c ON o.customer_id = c.id) group by c.time";
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
        $sql = "SELECT  c.username, o.id, o.nameProduct, o.quantity, o.price, o.sum, c.status
          FROM (orders o join customer c ON o.customer_id = c.id) WHERE o.id = $id LIMIT 1";
          $result = $this->executeQuery($sql);
          return $result;
    }

    // detail bill
    public function getDetailBill($id)
    {
        $sql = "SELECT  c.username, c.address, c.Phone, c.email, c.note,c.time, o.id, o.nameProduct, o.quantity, o.price, o.sum
          FROM (orders o join customer c ON o.customer_id = c.id) WHERE o.customer_id = $id ";
          $result = $this->executeQuery($sql);
          return $result;
    }

    /**
     * customer contact
     * */ 
    
    // list contact
    public function getAllContacts($item_per_page,$offset)
    {
       $sql = "SELECT * FROM contact limit ".$item_per_page." OFFSET ".$offset;
       return $this->executeQuery($sql);
    }

    // search contact
    public function searchContact($name)
    {
     $sql = "SELECT * from contact where username LIKE '%$name%'";
     $result = $this->executeQuery($sql);
    return $result;
    }

    // get total num pages contact
    public function getTotalNumContact($item_per_page)
    {
       $sql = "SELECT * FROM contact limit ".$item_per_page;
       $result = $this->executeQuery($sql);
       $totalRows = $result->num_rows;
       $totalPages = ceil($totalRows/$item_per_page);
       return $totalPages;
    }

    // delete contact
    public function delContact($id)
    {
        $sql = "DELETE FROM contact WHERE id = $id";
        return $this->executeQuery($sql);
    }
}
