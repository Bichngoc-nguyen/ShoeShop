<?php
require_once 'Database.php';
class Users extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    //register  
    public function register($username, $email, $pass,$avatar)
    {
        $sql = "INSERT INTO staff (username, email, password, avatar) VALUES ('$username', '$email','$pass','$avatar')";
        return $this->executeQuery($sql);
    }

    // login
    public function login($email, $pass)
    {
      $sql = "SELECT * FROM staff WHERE email = '$email' AND password = '$pass'";
      return $this->executeQuery($sql);
  }
}