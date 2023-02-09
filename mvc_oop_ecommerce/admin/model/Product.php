<?php
require_once "model/Connect.php";
require_once "model/ProductObject.php";

class Product
{
    public function getAllProduct()
    {
        $result = (new Connect())->select("SELECT category.CategoryId, CategoryName, product.* 
        from category join product on category.CategoryId = product.CategoryId;");
        $arr = [];

        foreach ($result as $row) {
            $productObject = (new ProductObject($row));
            $arr[] = $productObject;
        }
        return $arr;
    }

    public function create($params, $image)
    {
        $productObject = (new ProductObject($params));
        $productObject->setImage($image['file']['name']);
        $imageName = $productObject->getImage();


        $productName = $productObject->getProductName();
        $price = $productObject->getPrice();
        $description = $productObject->getDescription();
        $categoryId = $productObject->getCategoryId();
        $extension = pathinfo($imageName, PATHINFO_EXTENSION);

        $newImageName = time() . "." . $extension;

        $path = '../images/' . $newImageName;

        move_uploaded_file($image['file']['tmp_name'], $path);

        $imagePath = 'images/' . $newImageName;



        $sql = "INSERT INTO `product`(`ProductName`, `Description`, `Image`, `Price`, `CategoryId`) 
        VALUES ('$productName','$description','$imagePath','$price','$categoryId')";
        (new Connect())->execute($sql);

        echo 1;
    }

    public function find($id)
    {
        $sql = "SELECT category.CategoryId, CategoryName, product.* 
        from category join product on category.CategoryId = product.CategoryId where ProductId = '$id'";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return (new ProductObject($each));
    }

    public function getCategoryNameById($id)
    {
        
    }


    public function update($params, $image)
    {
        $productObject = (new ProductObject($params));

        $productId = $productObject->getProductId();
        $productName = $productObject->getProductName();
        $price = $productObject->getPrice();
        $description = $productObject->getDescription();
        $categoryId = $productObject->getCategoryId();


        if ($image) {
            $productObject->setImage($image['file']['name']);
            $imageName = $productObject->getImage();
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $newImageName = rand() . time() . "." . $extension;

            $path = '../images/' . $newImageName;

            move_uploaded_file($image['file']['tmp_name'], $path);

            $imagePath = 'images/' . $newImageName;

            $sql = "Update product set Image = '$imagePath', productName = '$productName', Price = '$price', Description = '$description', CategoryId = '$categoryId' where ProductId = '$productId'";
        } else {
            $sql = "Update product set productName = '$productName', Price = '$price', Description = '$description', CategoryId = '$categoryId' where ProductId = '$productId'";
        }
        (new Connect())->execute($sql);
        // var_dump($imagePath);

        echo 1;
    }

    public function delete($id)
    {
        (new Connect())->execute("Delete from product where ProductId = '$id'");
    }
}
