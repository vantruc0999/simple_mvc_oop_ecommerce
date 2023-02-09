<nav class="navbar navbar-expand-lg bg-light py-3 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><b>Shopping Online</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?controller=cart">Cart</a>
                </li>
                <?php if (isset($_SESSION['userId'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?controller=order_history&action=index">Order History</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><?php echo "Hello " . $_SESSION['username'] ?></a>
                </li>
                <?php } ?>
                <?php if (!isset($_SESSION['userId'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?controller=login&action=index">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?controller=register&action=index">Register</a>
                    </li>
                <?php } ?>
                <?php if (isset($_SESSION['userId'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?controller=logout">Log out</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <p class="nav-link active" aria-current="page"></p>
                </li>

        </div>
    </div>
</nav>