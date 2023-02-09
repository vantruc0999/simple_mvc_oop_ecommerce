<?php
session_start();

require_once "controller/Controller.php";
require_once "controller/LoginController.php";
require_once "controller/CategoryController.php";
require_once "controller/ProductController.php";
require_once "controller/OrderController.php";
require_once "controller/UserController.php";

$action = $_GET['action'] ?? 'index';
$controller = $_GET['controller'] ?? 'base';

if (isset($_SESSION['userId'])) {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
        switch ($controller) {
            case 'login':
            case 'base':
                (new Controller())->dashboard();
                break;
            case 'logout':
                (new Controller())->logout();
                break;
            case 'category':
                switch ($action) {
                    case 'index':
                        (new CategoryController())->index();
                        break;
                    case 'create':
                        (new CategoryController())->create();
                        break;
                    case 'store':
                        (new CategoryController())->store();
                        break;
                    case 'edit':
                        (new CategoryController())->edit();
                        break;
                    case 'update':
                        (new CategoryController())->update();
                        break;
                    case 'delete':
                        (new CategoryController())->delete();
                        break;
                    default:
                        echo "Wrong action!!!";
                }
                break;
            case 'product':
                switch ($action) {
                    case 'index':
                        (new ProductController())->index();
                        break;
                    case 'create':
                        (new ProductController())->create();
                        break;
                    case 'store':
                        (new ProductController())->store();
                        break;
                    case 'edit':
                        (new ProductController())->edit();
                        break;
                    case 'update':
                        (new ProductController())->update();
                        break;
                    case 'delete':
                        (new ProductController())->delete();
                        break;
                    default:
                        echo "Wrong action!!!";
                }
                break;
            case 'user':
                switch ($action) {
                    case 'index':
                        (new UserController())->index();
                        break;
                    case 'create':
                        (new UserController())->create();
                        break;
                    case 'store':
                        (new UserController())->store();
                        break;
                    case 'edit':
                        (new UserController())->edit();
                        break;
                    case 'update':
                        (new UserController())->update();
                        break;
                    default:
                        echo "Wrong action!!!";
                }
                break;
            case 'order':
                switch ($action) {
                    case 'index':
                        (new OrderController())->index();
                        break;
                    case 'edit':
                        (new OrderController())->edit();
                        break;
                    case 'update':
                        (new OrderController())->update();
                        break;
                    case 'detail':
                        (new OrderController())->detail();
                        break;
                    default:
                        echo "Wrong action!!!";
                }
                break;
            default:
                echo "Wrong controller!!!";
                break;
        }
    } else
        echo "You are not allowed to access!!!";
} else {
    switch ($controller) {
        case 'base':
        case 'login':
            switch($action){
                case 'index':
                    (new LoginController())->index();
                    break;
                case 'login':
                    (new LoginController())->login();
                    break;
                default:
                    echo "Wrong controller!!!";
                    break;
            }
            break;
        default:
            echo "Wrong controller !!!";
            break;
    }
}
