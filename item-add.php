<?php require './assets/constants.php'; ?>
<?php require './php_utils/_dbConnect.php'; ?>
<?php require './Layouts/header.php'; ?>
<?php require './Layouts/adminSessionLayer.php'; ?>
<?php require './Layouts/navbar.php'; ?>

<div class="container">
    <div class="display-5 text-center">Add Products</div>
</div>

<div class="container">
    <form id="addItem">
        <input type="hidden" name="ftype" value="addproduct">
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Product Price</label>
            <input type="number" class="form-control" name="product_price" placeholder="Enter Product Price" min="1" required>
        </div>
        <div class="mb-3">
            <label for="Product Image" class="form-label">Product Image</label>
            <input type="file" class="form-control" name="product_image" accept=".jpeg, .jpg, .png" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>

<!-- Ajax Script -->
<script>
    $(document).ready(function() {
        $('#addItem').submit(function(e) {
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
                    if (response === "Product Added Successfully") {
                        alert(response);
                        $('#addItem')[0].reset();
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