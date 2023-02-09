<?php
class Controller{
    public function showHomePage(){
        //call Product.php to use function of Product object
        require_once "model/Product.php";
        $products = (new Product())->getAllProduct();
        require_once "view/index.php";
    }

    public function logout(){
        unset($_SESSION['userId']);
        unset($_SESSION['username']);
        unset($_SESSION['admin']);
        header("location: ?controller=base");
    }
}