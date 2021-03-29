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
        $sql = "SELECT c.id, c.username, c.address, c.Phone, c.email, c.note, o.customer_id, o.sum, c.time, c.status
        FROM (customer c join orders o ON c.id = o.customer_id) GROUP BY c.id";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }
    // get customers
    public function getCustomers($item_per_page, $offset)
    {
        $sql = "SELECT c.id, c.username, c.address, c.Phone, c.email, c.note, o.customer_id, o.sum, c.time, c.status
        FROM (customer c join orders o ON c.id = o.customer_id)  GROUP BY c.id limit ".$item_per_page." OFFSET ".$offset;
        $result = $this->executeQuery($sql);
        return $result;
    }

    // search Customers
    public function searchCus($name)
    {
        $sql = "SELECT c.id, c.username, c.address, c.Phone, c.email, c.note, o.customer_id, o.sum, c.time, c.status
        FROM (customer c join orders o ON c.id = o.customer_id) WHERE (username like '%$name%') or (status like '%$name%')or (time like '%$name%') GROUP BY o.customer_id";
        $result = $this->executeQuery($sql);
        return $result;
    }
    
    // edit bill with id
    public function getEditCus($id)
    {
        $sql = "SELECT  c.id, c.username, c.address, c.Phone, c.email, c.note, o.customer_id, o.nameProduct, o.quantity, o.price, o.sum, c.status
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
            email = '$email',note = '$note', c.status = '$status' WHERE o.customer_id = $id";
            $result =  $this->executeQuery($sql);
            return $result;
    }

    // delete order 
    public function deleteCus($id)
    {
        $sql = "DELETE customer, orders FROM customer INNER JOIN orders ON orders.customer_id = customer.id WHERE customer.id = $id";
            return $this->executeQuery($sql);
    }
    
}

    