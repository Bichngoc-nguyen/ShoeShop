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
        // page hiện tại
        $this->current_page = (empty($_GET['page'])===false)?$_GET['page']:1;
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
                header('location: index.php');
            }else{
                echo "Đăng nhập thất bại";
            }
        }
    }

    // register
    public function register()
    {
        if ((empty($this->request['username']) && empty($this->request['address'])&& empty($this->request['birthday']) 
        && empty($this->request['telephone'])&& empty($this->request['email']) && empty($this->request['password']) 
        && empty($this->request['position']) && empty($this->request['avatar'])) === false) {
            $file = $this->uploadFIle();
            $admin = new Users();
            $create = $admin->register($this->request['username'],$this->request['address'],$this->request['birthday'],$this->request['telephone']
            ,$this->request['email'], md5($this->request['password']),$this->request['position'],$file);
            if ($create) {
                header('location: login.php');
            }else{
                throw new Exception("Đăng ki thất bại");
            }
        }
        else{
            header('location: register.php');
        }
    }

    
    /**
     * Users
     * */ 
    // list giày Users 
    public function getAllListUsers()
    {
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page - 1)* $item_per_page;
        $Users = new Users();
        $getList = $Users->getAllListUsers($item_per_page,$offset);
        $value=[];
        while ($rows = $getList->fetch_assoc()) {
            $Users=1;
            $value[] = $rows;
            $Users++;
        }if (empty($value)) {
            $value = [];
        }
        return $value;
    }
    
    // get user with id
    public function DetailUser($id)
    {
       $users = new Users();
       $getDetail = $users->DetailUser($id);
       while ($row =  $getDetail->fetch_assoc()) {
           $value[] = $row;
       }
       return $value;
    }
    /**
     * Phân trang (pagination)
     * */ 
    //phân trang btn prev
    public function getBtnPrevUsers()
    {
        $pagination = '';
        $btnPage = 0;
        if (isset($_GET['page']) && isset($_GET['list'])) {
            $item_per_page = $_GET['list'];
            $pageId = $_GET['page'];
            if ($pageId > 1) {
                $btnPage = $pageId - 1;
                $pagination = "<a href=?list=".$item_per_page."&page=".$btnPage." class='pagination'>Prev</a>";
            }
        }else{
            $pagination = '';
        }
        return $pagination;
    }

    //phân trang btn next
    public function getBtnNextUsers()
    {
        $pagination = '';
        $btnPage = 0;
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page -1) * $item_per_page;
        $Users = new Users();
        $totalNum = $Users->getTotalNumUsers($item_per_page,$offset);
        if (isset($_GET['page']) && isset($_GET['list'])) {
            $item_per_page = $_GET['list'];
            $pageId = $_GET['page'];
            if ($pageId == 1 || $pageId < $totalNum) {
                $btnPage = $pageId + 1;
                $pagination = "<a href=?list=".$item_per_page."&page=".$btnPage." class='pagination'>Next</a>";
            }elseif ($pageId == $totalNum ) {
				$pagination = "";
			}
        }else{
            $pagination = '<a href=?list='.$item_per_page.'&page=1 class="pagination"">Next</a>';
        }
        return $pagination;
    }

    // list num btn
    public function getNumPageUsers()
    {
        $pagination = '';
        $item_per_page = (empty($_GET['list'])===false?$_GET['list']:8);
        $offset = ($this->current_page -1)* $item_per_page;
        $Users = new Users();
        $totalNum = $Users->getTotalNumUsers($item_per_page,$offset);
        $num = 1;
        for($num = 1; $num <= $totalNum; $num++) {
            $pagination .= "<a class='pagination' href=?list=".$item_per_page."&page=".$num.">".$num."</a>";
        }
        return $pagination;
    }
    // search users
    public function searchUsers()
    {
        $search = '';
        if (empty($this->request['name'])===false) {
            $Users = new Users();
            $search = $Users->searchUsers($this->request['name']);
            return $search;
        }else{
            return $this->getAllListUsers();
        }
        return $search;
    }
    // end pagination

    // kiểm tra upload file(imge)
    public function checkUploadFile()
    {
        if (isset($_FILES['avatar'])) {
            if ($_FILES['avatar']['error'] > 0) {
                echo "upload file error";
            }else{
                move_uploaded_file($_FILES['avatar']['tmp_name'], '../../public/upload/' . $_FILES['avatar']['name']);
                $file =  $_FILES['avatar']['name'];
            }
        }
        return $file;
    }

    //create user
    public function createUsers()
    {
        if ((empty($this->request['username']) && empty($this->request['address'])&& empty($this->request['birthday']) 
        && empty($this->request['telephone'])&& empty($this->request['email']) && empty($this->request['password']) 
        && empty($this->request['position']) && empty($this->request['avatar'])) === false) {
            $file = $this->uploadFIle();
            $admin = new Users();
            $create = $admin->register($this->request['username'],$this->request['address'],$this->request['birthday'],$this->request['telephone']
            ,$this->request['email'], md5($this->request['password']),$this->request['position'],$file);
            if ($create) {
                header('location: listUsers.php');
            }else{
                throw new Exception("Đăng ki thất bại");
            }
        }
    }

    // update users
    public function updateUser()
    {
       if ((empty($this->request['name']) && empty($this->request['address'])&& empty($this->request['birthday'])
       && empty($this->request['phone'])&& empty($this->request['email']) && empty($this->request['password'])
       && empty($this->request['position'])&& empty($this->request['avatar']))===false) {
          $file = $this->checkUploadFile();
          $users = new Users();
          $update = $users->updateUser($this->request['id'], $this->request['name'], $this->request['address'], $this->request['birthday'],
          $this->request['phone'], $this->request['email'], $this->request['password'],
           $this->request['position'], $file);
           if ($update) {
               header("location: listUsers.php");
           }
       }
    }

    // delete user
    public function delUser($id)
    {
        $users = new Users();
        $delUser = $users->delUser($id);
        if ($delUser) {
            header("location: listUsers.php");
        }
    }

    // remember account
    public function postEmail()
    {
        if (empty($this->request['email'])===false) {
            $_SESSION['email'] = $this->request['email'];   
            $users = new Users();
            $postEmail = $users->postEmail($this->request['email']);
            if ($postEmail) {
                $value = [];
                while ($rows = $postEmail->fetch_assoc()) {
                    $value[] = $rows;
                }
                if (empty($value) === false) {
                    header("location: UpdateAccount.php");
                }else{
                    echo "<script> alert('email bạn nhập không đúng') </script>";
                }
            }
        }
    }

    // change password
    public function postPassword()
    {
        if(isset($_SESSION['email'])){
            $value = $_SESSION['email'];
        }
        $newPass = $this->request['newPass'];
        $confirmPass = $this->request['confirmPass'];
       if (((empty($value)) && (empty($newPass)) && (empty($confirmPass)))===false) {
           if ((preg_match("/^[0-9A-Za-z]{8,15}$/",$newPass)) && 
           (preg_match("/^[0-9A-Za-z]{8,15}$/",$confirmPass)) == true) {
            if ($newPass == $confirmPass) {
                $users = new Users();
                $postPassword = $users->postPassword($value, $newPass, $confirmPass);
                if ($postPassword) {
                    header("location: login.php");
                }
            }else{
                echo "<script> alert('Mật khẩu bạn nhập không trùng') </script>";
            }
           }else{
              echo "<i class='error'>".$this->getError()."</i>";
           }
          
       }
    }

    // error password
    public function getError()
    {
        $error = "Mật khẩu bạn nhập ít nhất phải 8 kí tự";
        return $error;
    }
    // end Users
}

