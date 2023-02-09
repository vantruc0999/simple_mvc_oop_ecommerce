<?php
class Controller
{
    public function dashboard()
    {
        require_once "view/dashboard.php";
    }
    public function logout()
    {
        unset($_SESSION['userId']);
        unset($_SESSION['username']);
        unset($_SESSION['admin']);
        header("location: ?controller=login&action=index");
    }
}
