<?php

require_once "model/Connect.php";
require_once "model/CategoryObject.php";

class Category{
    public function getAllCategory(){
        $result = (new Connect())->select("Select * from category");
        $arr = [];

        foreach($result as $row){
            $cateObject = (new CategoryObject($row));
            $arr[] = $cateObject;
        }

        return $arr;
    }

    public function create($params){
        $categoryObject = (new CategoryObject($params));
        $description = $categoryObject->getDescription();
        $categoryName = $categoryObject->getCategoryName();
        $sql = "Insert into category(CategoryName, Description) values ('$categoryName', '$description')";
        (new Connect())->execute($sql);
        echo 1;
    }

    public function find($id){
        $sql = "Select * from category where CategoryId = '$id'";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return (new CategoryObject($each));
    }

    public function update($params){
        $categoryObject = (new CategoryObject($params));
        $id = $categoryObject->getCategoryId();
        $description = $categoryObject->getDescription();
        $categoryName = $categoryObject->getCategoryName();
        $sql = "Update category set CategoryName = '$categoryName', Description = '$description' where CategoryId = '$id'";
        (new Connect())->execute($sql);
    }

    public function delete($id){
        (new Connect())->execute("Delete from category where CategoryId = '$id'");
    }
}