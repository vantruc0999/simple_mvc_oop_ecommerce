<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User management</title>
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
                    <ol class="breadcrumb mb-4">
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Add new user</h1>
                            <form id="user-form">
                                <div class="alert alert-danger" role="alert" id="div-error-1" style="display: none">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="FirstName">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="LastName">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="Email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone number</label>
                                    <input type="number" class="form-control" name="PhoneNumber">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="first_password" id="first_password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Re-enter Password</label>
                                    <input type="password" class="form-control" name="Password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="Address"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Add</button>
                            </form>
                        </div>
                    </ol>
                </div>
            </main>
            <?php require_once "partials/_footer.php" ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#user-form").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "FirstName": {
                        required: true,
                        maxlength: 50
                    },
                    "LastName": {
                        required: true,
                        maxlength: 50,
                    },
                    "first_password": {
                        required: true,
                        minlength: 4,
                    },
                    "Password": {
                        equalTo: "#first_password",
                        required: true,
                        minlength: 4,
                    },
                    "Email": {
                        required: true,
                        email: true,
                    },
                    "Phone":{
                        maxlength: 12,
                    },
                    "Address": {
                        maxlength: 255
                    }
                },
                messages: {
                    "FirstName": {
                        required: "Bắt buộc nhập first name",
                        maxlength: "First Name không quá 50 ký tự"
                    },
                    "LastName": {
                        required: "Bắt buộc nhập last name",
                        maxlength: "Last Name không quá 50 ký tự",
                    },
                    "first_password": {
                        minlength: "Password phải trên 3 ký tự",
                        required: "Password không được để trống",
                    },
                    "Password": {
                        equalTo: "Password phải trùng nhau",
                        required: "Password không được để trống",
                        minlength: "Password phải trên 3 ký tự",
                    },
                    "Email": {
                        required: "Bắt buộc nhập email",
                        email: "Email không hợp lệ",
                    },
                    "Phone":{
                        maxlength: "Số điện thoại không quá 12 ký tự",
                    },
                    "Address": {
                        maxlength: "Địa chỉ không quá 255 ký tự"
                    }
                },
                submitHandler: function() {
                    $.ajax({
                        type: "POST",
                        url: "?controller=user&action=store",
                        data: $('#user-form').serializeArray(),
                        dataType: "html",
                        success: function(response) {
                            if (response !== '1') {
                                $('#div-error-1').text(response);
                                $('#div-error-1').show();
                            } else {
                                alert('Thêm thành công');
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