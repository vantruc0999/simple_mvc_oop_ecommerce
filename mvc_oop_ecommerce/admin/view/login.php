<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            padding: 10% 30% 30%;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <form id="login_form">
        <h2>Admin login</h2>
        <div class="mb-3">
            <div class="alert alert-danger" role="alert" id="div-error-1" style="display: none">

            </div>
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="Email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#login_form").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "Email": {
                        email: true,
                        required: true,
                    },
                    "Password": {
                        required: true,
                        minlength: 4
                    },
                },
                messages: {
                    "Email": {
                        email: "Vui lòng nhập email hợp lệ",
                        required: "Bắt buộc nhập email",
                    },
                    "Password": {
                        required: "Bắt buộc nhập password",
                        minlength: "Password tối thiểu 4 ký tự"
                    },
                },
                submitHandler: function() {
                    $.ajax({
                        type: "POST",
                        url: "?action=login",
                        data: $('#login_form').serializeArray(),
                        dataType: "html",
                        success: function(response) {
                            if (response !== '1') {
                                $('#div-error-1').text(response);
                                $('#div-error-1').show();
                            } else {
                                alert('Đăng nhập thành công');
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