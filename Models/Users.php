<?php
require_once 'Database.php';
class Users extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    //register  
    public function register($username,$address,$birthday,$telephone, $email, $pass,$position,$avatar)
    {
        $sql = "INSERT INTO staff (username,address,birthday, phone, email,password,position, avatar) 
        VALUES ('$username','$address','$birthday','$telephone','$email','$pass','$position','$avatar')";
        return $this->executeQuery($sql);
    }

    // login
    public function login($email, $pass)
    {
      $sql = "SELECT * FROM staff WHERE email = '$email' AND password = '$pass'";
      return $this->executeQuery($sql);
  }

  
    /**
     * Users
     * */ 
    public function getAllListUsers($item_per_page,$offset)
    {
        $sql = "SELECT * FROM staff limit ".$item_per_page." OFFSET ".$offset;
        return $this->executeQuery($sql);
    }

    // get deteil user
    public function DetailUser($id)
    {
        $sql = "SELECT * FROM staff WHERE id = $id";
        return $this->executeQuery($sql);
    }

    // đếm số dòng trong bảng users
    public function getTotalNumUsers($item_per_page,$offset)
    {
        $sql = "SELECT * FROM staff";
        $result = $this->executeQuery($sql);
        $totalRows = $result->num_rows;
        $totalPages = ceil($totalRows/$item_per_page);
        return $totalPages;
    }

    // search users
    public function searchUsers($name)
    {
        $sql = "SELECT * FROM staff WHERE username like '%$name%'";
        return $this->executeQuery($sql);
    }

    // update users
    public function updateUser($id, $username,$address,$birthday,$telephone, $email, $pass,$position,$avatar)
    {
        $sql = "UPDATE staff SET username = '$username', address = '$address', birthday ='$birthday', phone = '$telephone',
        email = '$email', password = '$pass', position = '$position', avatar = '$avatar' WHERE id = $id";
        return $this->executeQuery($sql);
    }

    // delete Users
    public function delUser($id)
    {
        $sql = "DELETE FROM staff WHERE id = $id";
        return $this->executeQuery($sql);
    }
}