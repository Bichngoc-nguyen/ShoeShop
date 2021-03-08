<?php
require_once '../../Controllers/Lib/RequestController.php';
require_once '../../Models/Users.php';
class AdminController 
{
    public $request;
	// public $current_page;
    public function __construct()
    {
        $request = new RequestController();
        $this->request = $request->getInput();
    }

    // upload file
    public function uploadFIle()
    {
        if ($_FILES['avatar']) {
            if ($_FILES['avatar']['error']>0) {
                echo "upload file error";
            }else{
             move_uploaded_file($_FILES['avatar']['tmp_name'], '../../public/upload/'.$_FILES['avatar']['name']);
            $file = $_FILES['avatar']['name'];
        }
    }
        return $file;
    }

    // login
    public function login()
    {
        if ((empty($this->request['email'])&& empty($this->request['password'])) === false) {
            $admin = new Users();
            $login = $admin->login($this->request['email'], $this->request['password']);
            if ($login) {
                header('location: sneakers/listSneakers.php');
            }else{
                echo "Đăng nhập thất bại";
            }
        }
    }

    // register
    public function register()
    {
        if ((empty($this->request['username']) && empty($this->request['email']) && empty($this->request['password']) && empty($this->request['avatar'])) === false) {
            $file = $this->uploadFIle();
            $admin = new Users();
            $create = $admin->register($this->request['username'],$this->request['email'], $this->request['password'],$file);
            if ($create) {
                header('location: login.php');
            }else{
                throw new Exception("Đăng ki thất bại");
            }
        }
    }

}

