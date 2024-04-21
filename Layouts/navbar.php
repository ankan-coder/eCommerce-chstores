<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a href="./index.php" class="navbar-brand text-warning"><?php echo $project ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user_type'] == 'admin') {
                ?>

                    <!-- Options to show only to the admin -->
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="./item-add.php" style="color: #FEE715;">Add products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="./item-list.php" style="color: #FEE715;">Product List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="./api/logout.php" style="color: #FEE715;">Logout</a>
                    </li>
                <?php
                } else if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user_type'] == 'user') {
                ?>

                    <!-- Options to show only to the user -->
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="./store.php" style="color: #FEE715;">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="./cart.php" style="color: #FEE715;">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="./api/logout.php" style="color: #FEE715;">Logout</a>
                    </li>

                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link text-dark" id="ab" href="./about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" id="al" href="./adminLogin.php">Admin Login</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<script>
    var pageURL = window.location.pathname;

    if (pageURL === '/chstores/about.php') {
        $('#ab').hide();
    } else if (pageURL === '/chstores/adminLogin.php') {
        $('#al').hide();
    }
</script>