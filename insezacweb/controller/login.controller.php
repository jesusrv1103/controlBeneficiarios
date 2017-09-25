<?php
require_once 'model/login.php';

class LoginController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Login();
    }
    
    public function Index(){
       require_once 'view/login.php';
    }
    
    public function Acceder(){
        //Tu codigo...

        require_once 'view/header.php';
        require_once 'view/blankpanel.php';
        require_once 'view/footer.php';
    }
}