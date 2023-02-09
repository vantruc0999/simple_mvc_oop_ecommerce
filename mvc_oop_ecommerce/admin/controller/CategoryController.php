<?php
class CategoryController{
    public function index(){
        require_once "model/Category.php";
        $categories = (new Category())->getAllCategory();
        require_once "view/category/index.php";
    }

    public function create(){
        require_once "view/category/create.php";
    }

    public function store(){
        require_once "model/Category.php";
        (new Category())->create($_POST);
        
    }

    public function edit(){
        $id = $_GET['id'];
        require_once "model/Category.php";
        $category = (new Category())->find($id);
        require_once "view/category/edit.php";
    }

    public function update(){
        require_once "model/Category.php";
        (new Category())->update($_POST);
        echo 1;
    }

    public function delete(){
        $id = $_GET['id'];
        require_once "model/Category.php";
        (new Category())->delete($id);
        header("Location: ?controller=category&action=index");
    }
}