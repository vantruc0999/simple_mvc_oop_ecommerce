<?php
class UserController
{
    public function index()
    {
        require_once "model/User.php";
        $users = (new User())->getAllUser();
        require_once "view/user/index.php";
    }

    public function create()
    {
        require_once "view/user/create.php";
    }

    public function store()
    {
        require_once "model/User.php";
        (new User())->create($_POST);
    }

    public function edit()
    {
        $id = $_GET['id'];
        require_once "model/User.php";
        $user = (new User())->find($id);
        require_once "view/user/edit.php";
    }

    public function update()
    {
        require_once "model/User.php";
        (new User())->update($_POST);
    }
}
