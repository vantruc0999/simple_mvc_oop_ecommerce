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
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit order (Order Status)<strong><?php ?></strong></h1>
                    <form id="order_detail_form">
                        <div class="alert alert-danger" role="alert" id="div-error-1" style="display: none">

                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" value="" name="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">OrderId</label>
                            <input type="text" class="form-control" id="" value="<?php echo $order->getOrderId(); ?>" readonly name="OrderId">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Order Date</label>
                            <input type="text" class="form-control" id="" value="<?php echo $order->getCreatedAt(); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Customer Id</label>
                            <input type="text" class="form-control" id="" value="<?php echo $order->getCustomerId(); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Receiver Name</label>
                            <input type="text" class="form-control" id="" value="<?php echo $order->getNameReceiver(); ?>" name="NameReceiver">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Receiver Phone</label>
                            <input type="text" class="form-control" id="" value="<?php echo $order->getPhoneReceiver(); ?>" name="PhoneReceiver">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Receiver Email</label>
                            <input type="text" class="form-control" id="" value="<?php echo $order->getEmail();  ?>" name="Email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Receiver Address</label>
                            <input type="text" class="form-control" id="" value="<?php echo $order->getAddress();  ?>" name="Address">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="Status" class="form-select">
                                <option value="<?php echo $order->getStatus(); ?>"><?php echo $order->getStatus(); ?></option>
                                <option value="delivering">delivering</option>
                                <option value="canceled">canceled</option>
                                <option value="done">done</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Price</label>
                            <input type="text" class="form-control" id="" value="<?php echo $order->getTotalPrice();  ?>" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                    </form>
                </div>
            </main>
            <?php require_once "partials/_footer.php" ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
    <script src="js/scripts.js"></script>

    <script src="js/datatables-simple-demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#order_detail_form").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "NameReceiver": {
                        required: true,
                        minlength: 6,
                        maxlength: 50
                    },
                    "PhoneReceiver": {
                        required: true,
                        minlength: 10,
                        maxlength: 12
                    },
                    "Email": {
                        email: true,
                        required: true,
                    },
                    "Address": {
                        required: true,
                        maxlength: 255
                    }
                },
                messages: {
                    "NameReceiver": {
                        required: "B???t bu???c ??i???n t??n ng?????i nh???n",
                        minlength: "T??n ng?????i nh???n ??t nh???t 6 k?? t???",
                        maxlength: "T??n ng?????i nh???n t???i ??a 6 k?? t???"
                    },
                    "PhoneReceiver": {
                        required: "B???t bu???c ??i???n s??? ??i???n tho???i",
                        minlength: "S??? ??i???n tho???i ??t nh???t 10 s???",
                        maxlength: "S??? ??i???n tho???i t???i ??a 12 s???"
                    },
                    "Email": {
                        email: "Vui l??ng ??i???n email h???p l???",
                        required: "B???t bu???c ??i???n email ng?????i nh???n",
                    },
                    "Address": {
                        required: "?????a ch??? ng?????i nh???n l?? b???t bu???c",
                        maxlength: "?????a ch??? t???i ??a 255 k?? t???"
                    }
                },
                submitHandler: function() {
                    $.ajax({
                        type: "POST",
                        url: "?controller=order&action=update",
                        data: $('#order_detail_form').serializeArray(),
                        dataType: "html",
                        success: function(response) {
                            if (response !== '1') {
                                $('#div-error-1').text(response);
                                $('#div-error-1').show();
                            } else {
                                alert('C???p nh???t th??nh c??ng');
                                location.reload();
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>