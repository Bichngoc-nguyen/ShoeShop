<?php
require_once '../../Controllers/Lib/RequestController.php';
class ValidatorController 
{

    public $request;
    public function __construct()
    {
        $request = new RequestController();
        $this->request = $request->getInput();
    }

    // validate newPass
    public function is_newPass()
    {
       if (empty($this->request['newPass'])===false) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$this->request['newPass'])) ? FALSE : TRUE;
       }
    }
}