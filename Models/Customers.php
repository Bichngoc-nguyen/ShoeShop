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

    // delete order 
    public function deleteCustomer($id)
    {
        $sql = "DELETE orders, customer FROM customer INNER JOIN orders ON orders.customer_id = customer.id WHERE orders.id = $id";
          $result = $this->executeQuery($sql);
          return $result;
    }
}

    