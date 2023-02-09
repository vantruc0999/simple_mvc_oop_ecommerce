<?php
class CartController{
    public function showCart(){
        require_once "model/Cart.php";
        $cart = (new Cart());
        require_once "view/cart/index.php";
    }

    public function addToCart(){
        require_once "model/Cart.php";
        (new Cart())->add();
    }

    public function updateCartQuantity(){
        require_once "model/Cart.php";
        (new Cart())->updateQuantity();
    }

    public function deleteCart(){
        require_once "model/Cart.php";
        (new Cart())->delete();
    }    

    public function checkOutCart(){
        require_once "model/Cart.php";
        (new Cart())->checkOut($_POST);
    }
}