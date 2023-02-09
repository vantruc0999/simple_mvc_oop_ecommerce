<?php
require_once "model/Connect.php";
require_once "model/OrderObject.php";
class Order{
    public function getAllOrder(){
        $result = (new Connect())->select("Select od.Quantity, o.*, u.FirstName, u.LastName, p.Price, p.ProductName
        from orders_product od join orders o on od.OrderId = o.OrderId
        join product p on p.ProductId = od.ProductId
        join user u on u.UserId = o.CustomerId 
        group by OrderId
        order by CreatedAt desc
        
        ");
        $arr = [];

        foreach($result as $row){
            $orderObject = new OrderObject($row);
            $arr[] = $orderObject;
        }

        return $arr;
    }
    
    public function findOrderDetail($id){
        $sql = "Select od.Quantity, o.*, u.FirstName, u.LastName, p.Price, p.ProductName
        from orders_product od join orders o on od.OrderId = o.OrderId
        join product p on p.ProductId = od.ProductId
        join user u on u.UserId = o.CustomerId 
        where o.OrderId = '$id'
        ";
        $result = (new Connect())->select($sql);
        $arr = [];

        foreach($result as $row){
            $orderObject = new OrderObject($row);
            $arr[] = $orderObject;
        }

        return $arr;
    }

    public function findOrder($id){
        $sql = "Select * from orders where OrderId = '$id'";
        $result = (new Connect())->select($sql);
        $row = mysqli_fetch_array($result);
        return (new OrderObject($row));
    }

    public function update($params){
        $orderObject = (new OrderObject($params));

        $orderId = $orderObject->getOrderId();
        $nameReceiver = $orderObject->getNameReceiver();
        $phoneReceiver = $orderObject->getPhoneReceiver();
        $address = $orderObject->getAddress();
        $email = $orderObject->getEmail();
        $status = $orderObject->getStatus();

        $sql = "Update orders set NameReceiver='$nameReceiver', PhoneReceiver='$phoneReceiver', Address = '$address', Email = '$email', Status = '$status' where OrderId = '$orderId'";

        (new Connect())->execute($sql);
        
        echo 1;
    }
}