<?php require './assets/constants.php'; ?>
<?php require './php_utils/_dbConnect.php'; ?>
<?php require './Layouts/header.php'; ?>
<?php require './Layouts/userSessionLayer.php'; ?>
<?php require './Layouts/navbar.php'; ?>

<?php

if (isset($_GET['product'])) {
    $p_id = $_GET['product'];

    $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `chs_products` WHERE `id` = '" . $p_id . "' AND `status` = '1'")) or die(mysqli_error($conn));
} else {
    header("Location: store.php");
    exit;
}

?>

<div class="container text-center display-5"><?php echo $product['product_name']; ?></div>
<div class="container d-flex justify-content-around p-5">
    <img src="<?= htmlspecialchars(str_replace('../', '', $product['product_image']), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo $product['product_name'] ?>">
    <form id="checkoutForm">
        <div class="mb-3">
            <input type="hidden" name="ftype" value="checkoutForm">
            <input type="hidden" name="customer" value="<?php echo $_SESSION['user_id']; ?>">
            <input type="hidden" name="p_id" value="<?php echo $product['id']; ?>">
            <input type="hidden" name="orderTime" value="<?php echo $dateTime; ?>">
            <label class="form-label">Enter Delivery Address</label>
            <input type="text" class="form-control" name="address" placeholder="Delivery Address" required>
        </div>

        <button class="btn btn-primary" type="submit">Place order</button>
    </form>
</div>

<!-- Ajax Script -->
<script>
    $(document).ready(function() {
        $('#checkoutForm').submit(function(e) {
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
                    if (response === "Order Placed Successfully") {
                        alert(response);
                        $('#checkoutForm')[0].reset();
                        window.location.href = "userorder.php";
                    } else {
                        alert(response);
                    }
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