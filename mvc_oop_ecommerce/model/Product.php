<?php
require_once "model/Connect.php";
require_once "model/ProductObject.php";

class Product
{
    public function getAllProduct()
    {
        $result = (new Connect())->select("SELECT * from product");
        $arr = [];

        foreach ($result as $row) {
            $productObject = (new ProductObject($row));
            $arr[] = $productObject;
        }
        return $arr;
    }
}
