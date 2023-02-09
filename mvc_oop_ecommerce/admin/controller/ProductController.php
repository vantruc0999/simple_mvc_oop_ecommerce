<?php
class ProductController
{
    public function index()
    {
        require_once "model/Product.php";
        $products = (new Product())->getAllProduct();
        // var_dump($products[0]->getCategoryName());
        require_once "view/product/index.php";
    }

    public function create()
    {
        require_once "model/Category.php";
        $categories = (new Category())->getAllCategory();
        require_once "view/product/create.php";
    }

    public function store()
    {
        $image = $_FILES;
        require_once "model/Product.php";
        (new Product())->create($_POST, $image);
    }

    public function edit()
    {
        $id = $_GET['id'];
        require_once "model/Category.php";
        $categories = (new Category())->getAllCategory();
        require_once "model/Product.php";
        $product = (new Product())->find($id);
        require_once "view/product/edit.php";
    }

    public function update()
    {
        $image = $_FILES;
        require_once "model/Product.php";
        (new Product())->update($_POST, $image);
    }

    public function delete()
    {
        $id = $_GET['id'];
        require_once "model/Product.php";
        (new Product())->delete($id);
        header("Location: ?controller=product&action=index");
    }
}
