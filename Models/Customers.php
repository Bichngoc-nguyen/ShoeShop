<?php
require_once 'Database.php';
class Customers extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Customers
     * */ 
    // get number page customer
    public function getTotalNumCus($item_per_page,$offset)
    {
        $sql = "SELECT  c.username, o.id, o.customer_id, o.nameProduct, o.quantity, o.price, o.sum,o.time, o.status
        FROM (orders o join customer c ON o.customer_id = c.id)";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }
    // get customers
    public function getCustomers($item_per_page, $offset)
    {
        $sql = "SELECT c.id, c.username, c.address, c.Phone, c.email, c.note, o.customer_id, o.sum, o.time, o.status
        FROM (orders o join customer c ON o.customer_id = c.id) limit ".$item_per_page." OFFSET ".$offset;
        $result = $this->executeQuery($sql);
        return $result;
    }

    // search Customers
    public function searchCus($time)
    {
        $sql = "SELECT c.id, c.username, c.address, c.Phone, c.email, c.note, o.customer_id, o.sum, o.time, o.status
        FROM (orders o join customer c ON o.customer_id = c.id) WHERE (username like '%$time%')";
        $result = $this->executeQuery($sql);
        return $result;
    }
    
    // edit bill with id
    public function getEditCus($id)
    {
        $sql = "SELECT  c.id, c.username, c.address, c.Phone, c.email, c.note, o.customer_id, o.nameProduct, o.quantity, o.price, o.sum, o.status
          FROM (orders o join customer c ON o.customer_id = c.id) WHERE c.id = $id LIMIT 1";
          $result = $this->executeQuery($sql);
          return $result;
    }

    // update customer
    public function updateCus($id, $name, $address, $phone,$email,$note, $status)
    {
        $sql = "UPDATE customer c
            INNER JOIN
                orders o ON c.id = o.customer_id 
            SET c.id = '$id',username = '$name', address = '$address', Phone = '$phone',
            email = '$email',note = '$note', o.status = '$status' WHERE o.customer_id = $id";
            $result =  $this->executeQuery($sql);
            return $result;
    }

    // delete order 
    public function deleteCus($id)
    {
        $sql = "DELETE c,o FROM customer c INNER JOIN
                orders o ON o.customer_id = c.id 
            WHERE c.id = $id";
        // $sql = "DELETE customer, orders FROM customer INNER JOIN orders ON orders.customer_id = customer.id WHERE orders.customer_id = $id";
        // var_dump($sql);
        // die();
          $result = $this->executeQuery($sql);
          return $result;
    }
}

    