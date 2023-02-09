<?php
class LoginController{
    public function showLoginPage(){
        require_once "view/login.php";
    }

    public function doLoginProcess(){
        require_once "model/Login.php";
        (new Login())->doLogin($_POST);
        
    }
}