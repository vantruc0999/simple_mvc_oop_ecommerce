<?php
require_once "model/Connect.php";
require_once "model/CartObject.php";
require_once "model/OrderObject.php";

class Cart
{
    public function showCart()
    {
        if (isset($_COOKIE['shopping_cart'])) {
            $arr = [];
            $cart = json_decode($_COOKIE['shopping_cart'], true);
            //Push CartObject into an array
            foreach ($cart as $row) {
                //'$row' is an array which contains product information (name, price, image, description)
                //constructor of CartObject will receive $row as an argument
                $cartObject = new CartObject($row);
                $arr[] = $cartObject;
            }
            //array of cart object, each object is a product information
            return $arr;
        }
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            //Jquery will get product id from list of product (homepage), and we use $_GET to get it 
            $id = $_GET['id'];

            //Find product on database using id (productId) and get product information from database
            $res = (new Connect())->select("Select * from product where ProductId = '$id'");
            $product = mysqli_fetch_array($res);

            //Check whether '$_COOKIE["shopping_cart"]' exist, if not we create an array 
            if (isset($_COOKIE["shopping_cart"])) {
                //Because the value of $_COOKIE is a json string so we decode it to array
                $cart_data = json_decode($_COOKIE["shopping_cart"], true);
            } else {
                $cart_data = array();
            }

            //Given a list values of ProducId
            $item_id_list = array_column($cart_data, 'ProductId');

            //Check if product exists in cart or not
            if (in_array($id, $item_id_list)) {
                //If product exists, the quantity of product will increase
                foreach ($cart_data as $keys => $values) {
                    if ($cart_data[$keys]["ProductId"] == $id) {
                        $cart_data[$keys]["Quantity"]++;
                    }
                }
                //If product doesn't exist we will create new product information in cart
            } else {
                $item_array = array(
                    'Image' => $product["Image"],
                    'ProductId' =>  $id,
                    'ProductName' => $product['ProductName'],
                    'Price' => $product["Price"],
                    'Description' => $product["Description"],
                    'Quantity' => 1
                );
                //Push all product information in cart into an array
                $cart_data[] = $item_array;
            }

            //The value of cookie is string so we have to encode the array
            $item_data = json_encode($cart_data);
            setcookie('shopping_cart', $item_data, time() + (86400 * 30));
            echo 1;
        } else
            echo 0;
    }

    public function updateQuantity()
    {
        //Get product id and type (if type == 0 quantity will decrease, otherwise quantitiy will increase if type == 1)
        $id = $_GET['id'];
        $type = $_GET['type'];

        if (isset($_COOKIE["shopping_cart"])) {
            $cart_data = json_decode($_COOKIE["shopping_cart"], true);

            if ($type == 1) {
                foreach ($cart_data as $keys => $values) {
                    if ($cart_data[$keys]["ProductId"] == $id) {
                        $cart_data[$keys]["Quantity"]++;
                    }
                }
            } else {
                foreach ($cart_data as $keys => $values) {
                    //If product quantity < 1 we will remove it from cart
                    if ($cart_data[$keys]["ProductId"] == $id) {
                        if ($cart_data[$keys]["Quantity"] > 1)
                            $cart_data[$keys]["Quantity"]--;
                        else
                            array_splice($cart_data, $keys, 1);
                    }
                }
            }

            $item_data = json_encode($cart_data);
            setcookie('shopping_cart', $item_data, time() + (86400 * 30));
            echo 1;
        }
    }

    public function delete()
    {
        $id = $_GET['id'];

        if (isset($_COOKIE["shopping_cart"])) {
            $cart_data = json_decode($_COOKIE["shopping_cart"], true);


            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["ProductId"] == $id) {
                    array_splice($cart_data, $keys, 1);
                }
            }

            $item_data = json_encode($cart_data);
            setcookie('shopping_cart', $item_data, time() + (86400 * 30));
            echo 1;
        }
    }

    public function checkOut($params)
    {
        if (isset($_COOKIE['shopping_cart']))
            $cart = json_decode($_COOKIE['shopping_cart'], true);

        if (!isset($_SESSION['userId'])) {
            echo 2;
        } else if (empty($cart)) {
            echo 3;
        } else {
            $orderObject = new OrderObject($params);
            //$params is an array of $_POST values from name receiver form
            $address = $orderObject->getAddress();
            $email = $orderObject->getEmail();
            $nameReceiver = $orderObject->getNameReceiver();
            $phoneReceiver = $orderObject->getPhoneReceiver();
            $status = 'pending';
            $createdAt = date("Y-m-d H:i:s");
            $totalPrice = $this->totalCart();

            $customerId = $_SESSION['userId'];

            //Insert values into orders in database
            (new Connect())->execute("INSERT INTO `orders`( `Address`, `Email`, `NameReceiver`, `CustomerId`, `PhoneReceiver`, `Status`, `TotalPrice`, `CreatedAt`) 
            VALUES ('$address','$email','$nameReceiver','$customerId','$phoneReceiver','$status','$totalPrice','$createdAt')");

            //create a variable to get information from cart
            $cart_data = $this->showCart();

            //Select the latest orderId (maxOrderId) which we have inserted to database (order on line 153) 
            $result = (new Connect())->select("Select max(OrderId) from orders where CustomerId = '$customerId'");
            $orderId = mysqli_fetch_array($result)['max(OrderId)'];

            //Each order may have many products so we will insert productId and and quantity of its into orders_product table in database
            foreach ($cart_data as $item) {
                $quantity = $item->getQuantity();
                $productId = $item->getProductId();

                (new Connect())->execute("INSERT INTO `orders_product`(`OrderId`, `ProductId`, `Quantity`) 
                VALUES ('$orderId','$productId','$quantity')");
            }

            $cart = json_encode($cart);
            setcookie("shopping_cart", $cart, time() - (86400 * 30));
            echo 1;
        }
    }

    public function totalCart()
    {
        $total = 0;
        if (isset($_COOKIE['shopping_cart'])) {
            $cart = json_decode($_COOKIE['shopping_cart'], true);
            foreach ($cart as $row) {
                $cartObject = new CartObject($row);
                $total += $cartObject->getTotalPriceEachProduct();
            }
        }
        return $total;
    }
}
