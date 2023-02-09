<?php
class OrderController
{
    public function index()
    {
        require_once "model/Order.php";
        $orders = (new Order())->getAllOrder();
        require_once "view/order/index.php";
    }

    public function edit()
    {
        $id = $_GET['id'];
        require_once "model/Order.php";
        $order = (new Order())->findOrder($id);
        require_once "view/order/edit.php";
    }

    public function update()
    {
        require_once "model/Order.php";
        (new Order())->update($_POST);
    }

    public function detail()
    {
        $id = $_GET['id'];
        require_once "model/Order.php";
        $order = (new Order())->findOrderDetail($id);
        require_once "view/order/detail.php";
    }
}
