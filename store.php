<?php require './assets/constants.php'; ?>
<?php require './php_utils/_dbConnect.php'; ?>
<?php require './Layouts/header.php'; ?>
<?php require './Layouts/userSessionLayer.php'; ?>
<?php require './Layouts/navbar.php'; ?>

<div class="container">
    <div class="display-5 text-center">Browse Products</div>
</div>

<div class="container p-4">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM `chs_products` WHERE `status` = '1'") or die(mysqli_error($conn));
        if (mysqli_num_rows($result)) {
            while ($product = mysqli_fetch_assoc($result)) {
        ?>
                <div class="col">
                    <div class="card h-100 border p-3 d-flex flex-column justify-content-around">
                        <img class="card-img-top img-fluid" src="<?= htmlspecialchars(str_replace('../', '', $product['product_image']), ENT_QUOTES, 'UTF-8'); ?>" alt="<?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="card-body">
                            <h5 class="card-title fs-5 text-center"><?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8'); ?></h5>
                            <p class="card-text fs-6 text-center">Price: <?= htmlspecialchars($product['product_price'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <div class="d-flex justify-content-around">
                                <form id="addToCart" action="add_to_cart.php" method="post">
                                    <input type="hidden" name="p_id" value="<?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="p_id" value="<?= htmlspecialchars($_SESSION['user_id'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <button type="submit" class="btn btn-primary">Add to cart</button>
                                </form>
                                <button onclick="window.location.href = 'checkout.php?product=<?= htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8'); ?>'" class="btn btn-primary">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>


            <?php
            }
        } else {
            ?>

            <div class="container my-5">
                <div class="fs-5 text-center">No Product available</div>
            </div>
            ';

        <?php
        }
        ?>
    </div>
</div>

<!-- Ajax Script -->
<script>
    $(document).ready(function() {
        $('#addToCart').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Create a FormData object
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: 'api/productManageAPI.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle success
                    alert(response);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    alert(xhr.responseText);
                }
            });
        });
    });
</script>

<?php require './Layouts/footer.php'; ?>