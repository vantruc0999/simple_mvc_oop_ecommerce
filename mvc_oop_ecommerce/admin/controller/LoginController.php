<?php

class LoginController{
    public function index(){
        require_once "view/login.php";
    }

    public function login(){
        require_once "model/Login.php";
        (new Login())->loginProcess($_POST);
    }
}