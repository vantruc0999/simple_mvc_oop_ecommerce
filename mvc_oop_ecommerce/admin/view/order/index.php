<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Order Management</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php
    ?>
    <?php require_once "partials/_nav.php" ?>
    <div id="layoutSidenav">
        <?php require_once "partials/_sidebar.php" ?>
        <div class="container">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Order</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Customer Id</th>
                                    <th scope="col">Receiver Name</th>
                                    <th scope="col">Receiver Email</th>
                                    <th scope="col">Receiver Phone</th>
                                    <th scope="col">Receiver Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $key => $each) { ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $each->getOrderId() ?></td>
                                        <td><?php echo $each->getCreatedAt() ?></td>
                                        <td><?php echo $each->getCustomerId() ?></td>
                                        <td><?php echo $each->getNameReceiver() ?></td>
                                        <td><?php echo $each->getEmail(); ?></td>
                                        <td><?php echo $each->getPhoneReceiver(); ?></td>
                                        <td><?php echo $each->getAddress(); ?></td>
                                        <td><?php echo $each->getStatus() ?></td>
                                        <td><?php echo $each->getTotalPrice() ?></td>
                                        <td>
                                            <a href="?controller=order&action=detail&id=<?php echo $each->getOrderId(); ?>" class="btn btn-primary">Detail</a>
                                            <a href="?controller=order&action=edit&id=<?php echo $each->getOrderId(); ?>" class="btn btn-success">Edit</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </main>
                <?php require_once "partials/_footer.php" ?>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>