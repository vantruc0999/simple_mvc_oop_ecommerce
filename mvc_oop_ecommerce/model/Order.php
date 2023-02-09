<?php
require_once "model/Connect.php";
require_once "model/OrderObject.php";
class Order{
    public function getAllOrder(){
        $customerId = $_SESSION['userId'];

        $result = (new Connect())->select("Select od.Quantity, o.*, p.Price, p.ProductName, p.Image
        from orders_product od join orders o on od.OrderId = o.OrderId
        join product p on p.ProductId = od.ProductId
        where o.CustomerId = '$customerId'
        order by OrderId desc
        ");
        $arr = [];

        foreach($result as $row){
            $orderObject = new OrderObject($row);
            $arr[] = $orderObject;
        }

        return $arr;
    }
}