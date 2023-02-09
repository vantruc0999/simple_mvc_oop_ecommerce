<?php
class RegisterController{
    public function ShowRegisterPage(){
        require_once "view/register.php";
    }

    public function doRegisterProcess(){
        require_once "model/Register.php";
        (new Register())->doRegister($_POST);
    }
}