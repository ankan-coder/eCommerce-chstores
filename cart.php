<?php require './assets/constants.php'; ?>
<?php require './php_utils/_dbConnect.php'; ?>
<?php require './Layouts/header.php'; ?>
<?php require './Layouts/userSessionLayer.php'; ?>
<?php require './Layouts/navbar.php'; ?>

<div class="container">
    <div class="display-5 text-center">Browse Products</div>
</div>

<div class="container">
    <div class="row d-flex flex-wrap">
        <?php

        $result = mysqli_query($conn, "SELECT * FROM `chs_products` WHERE `status` = '1'") or die(mysqli_error($conn));

        if (mysqli_num_rows($result)) {
            while ($product = mysqli_fetch_assoc($result)) {
                echo '
            ?>
            <div class="col-4" style="height: 10rem;">
                <img src="' . $product['product_image'] . '" alt="">
                <div class="fs-1 text-center">' . $product['product_name'] . '</div>
                <div class="fs-1 text-center">' . $product['product_price'] . '</div>
                <button onclick="" class="btn btn-primary">Add to cart</button>
                <button onclick="" class="btn btn-primary">Buy Now</button>
            </div>
            <?php
            ';
            }
        } else {
            echo '
            <div class="container my-5">
                <div class="fs-5 text-center">No Product available</div>
            </div>
            ';
        }
        ?>
    </div>
</div>

<?php require './Layouts/footer.php'; ?>