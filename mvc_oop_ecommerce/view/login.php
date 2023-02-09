<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <!-- NAVIGATION -->
    <?php
    require_once "partials/_navbar.php";
    ?>
    <section id=" "  class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Login</h3>
            <hr class="mx-auto">
            <a href="?controller=register">Click here if you do not have an account</a>
        </div>

        <div class="row mx-auto container">
            <form id="login_form">
                <div class="alert alert-danger" role="alert" id="div-error-1" style="display: none">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="Email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="Password">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Login</button>
            </form>


        </div>
    </section>


    <!-- FOOTER -->
    <?php require_once "partials/_footer.php"; ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#login_form").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "Email": {
                        required: true,
                        email: true,
                        maxlength: 50
                    },
                    "Password": {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    "Email": {
                        required: "Bắt buộc nhập email",
                        maxlength: "Hãy nhập tối đa 50 ký tự",
                        email: "Vui lòng nhập email hợp lệ"
                    },
                    "Password": {
                        required: "Bắt buộc nhập password",
                        minlength: "Hãy nhập ít nhất 6 ký tự"
                    }
                },
                submitHandler: function() {
                    $.ajax({
                        type: "POST",
                        url: "?controller=login&action=process",
                        data: $('#login_form').serializeArray(),
                        dataType: "html",
                        success: function(response) {
                            if (response !== '1') {
                                $('#div-error-1').text(response);
                                $('#div-error-1').show();
                            } else {
                                alert('Đăng nhập thành công');
                                location.href = '?controller=base';
                            }
                        }
                    });
                }
            });

        });
    </script>
</body>

</html>