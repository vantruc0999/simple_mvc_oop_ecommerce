<?php
class OrderController{
    public function showOrderHistory(){
        require_once "model/Order.php";
        $orders = (new Order())->getAllOrder();
        require_once "view/order_history/index.php";
    }
}