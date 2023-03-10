<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Update category</title>
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
                            <h1 class="mt-4">Update Category</h1>
                            <form id="category-form">
                                <div class="alert alert-danger" role="alert" id="div-error-1" style="display: none">

                                </div>
                                <input type="hidden" name="CategoryId" value="<?php echo $category->getCategoryId(); ?>">
                                <div class="mb-3">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="CategoryName" value="<?php echo $category->getCategoryName() ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="Description" value="<?php echo $category->getCategoryName() ?>"><?php echo $category->getDescription() ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Update</button>
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
            $("#category-form").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "category": {
                        required: true,
                        maxlength: 100
                    },
                    "description": {
                        maxlength: 255
                    }
                },
                messages: {
                    "category": {
                        required: "B???t bu???c nh???p category",
                        maxlength: "H??y nh???p t???i ??a 15 k?? t???",
                    },
                    "description": {
                        maxlength: "Ch??? ???????c nh???p t???i ??a 255 k?? t???",
                    }
                },
                submitHandler: function() {
                    $.ajax({
                        type: "POST",
                        url: "?controller=category&action=update",
                        data: $('#category-form').serializeArray(),
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