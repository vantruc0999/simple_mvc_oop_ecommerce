<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require_once "partials/_navbar.php"; ?>
    <section id="cart-home" class="pt-5 mt-5 container">
        <h2 class="font-weigth-bold">Order History</h2>
        <hr>
    </section>
    <section id="" class="container">
        <table width="100%" class="table">
            <thead>
                <tr>
                    <th scope="col">Order Id</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (empty($orders))
                    echo "<td colspan='7'> You have not placed any order yet </td>";
                foreach ($orders as $each) {
                ?>
                    <tr>
                        <td><?php echo $each->getOrderId(); ?></td>
                        <td><?php echo $each->getCreatedAt(); ?></td>
                        <td><img src="<?php echo $each->getImage(); ?>" alt="" width="150px"></td>
                        <td><?php echo $each->getProductName(); ?></td>
                        <td><?php echo $each->getPrice(); ?></td>
                        <td><?php echo $each->getQuantity(); ?></td>
                        <td><?php echo $each->getPrice() * $each->getQuantity(); ?></td>
                        <td><?php echo $each->getStatus() ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </section>
    <div class="container  mt-5 py-5">

    </div>

    <?php require_once "partials/_footer.php";
    ?>
</body>

</html>