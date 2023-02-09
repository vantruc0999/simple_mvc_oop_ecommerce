<?php
session_start();

require_once "controller/Controller.php";
require_once "controller/LoginController.php";
require_once "controller/RegisterController.php";
require_once "controller/CartController.php";
require_once "controller/OrderController.php";


//Get controller and action from user 
$controller = $_GET['controller'] ?? 'base';
$action = $_GET['action'] ?? 'index';


//Check if user has logged in or not
if (isset($_SESSION['userId'])) {
    switch ($controller) {
        // If user has logged in and controller are 'base', 'register' or 'login' 
        // route will redirect user to home page. User can not register or login if they has logged in
        case 'base':
        case 'register':
        case 'login':
            (new Controller())->showHomePage();
            break;
        case 'logout':
            (new Controller())->logout();
            break;
        //User can view cart, add cart, update cart quantity, delete cart and check out cart
        case 'cart':
            switch ($action) {
                case 'index':
                    (new CartController())->showCart();
                    break;
                case 'add':
                    (new CartController())->addToCart();
                    break;
                case 'update_quantity':
                    (new CartController())->updateCartQuantity();
                    break;
                case 'delete':
                    (new CartController())->deleteCart();
                    break;
                case 'checkout':
                    (new CartController())->checkOutCart();
                    break;
                default:
                    echo "Wrong action!!!";
            }
            break;
        //User can view order history after checkout
        case 'order_history':
            switch($action){
                case 'index':
                    (new OrderController())->showOrderHistory();
                    break;
                default:
                    echo "Wrong action!!!";
                    break;
            }
            break;
        default:
            echo "Wrong controller!!!";
            break;
    }
} else {
    //User can view product and add (update, delete) product to (from) cart if they have not logged in
    switch ($controller) {
        case 'base':
            (new Controller())->showHomePage();
            break;
        case 'login':
            switch ($action) {
                case 'index':
                    (new LoginController())->showLoginPage();
                    break;
                case 'process':
                    (new LoginController())->doLoginProcess();
                    break;
                default:
                    echo "Wrong action!!!";
                    break;
            }
            break;
        case 'register':
            switch ($action) {
                case 'index':
                    (new RegisterController())->ShowRegisterPage();
                    break;
                case 'process':
                    (new RegisterController())->doRegisterProcess();
                    break;
            }
            break;
        case 'cart':
            switch ($action) {
                case 'index':
                    (new CartController())->showCart();
                    break;
                case 'add':
                    (new CartController())->addToCart();
                    break;
                case 'update_quantity':
                    (new CartController())->updateCartQuantity();
                    break;
                case 'delete':
                    (new CartController())->deleteCart();
                    break;
                case 'checkout':
                    (new CartController())->checkOutCart();
                    break;
                default:
                    echo "Wrong action!!!";
                    break;
            }
            break;
        default:
            echo "Wrong controller";
            break;
    }
}
