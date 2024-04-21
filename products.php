<?php
include 'partials/_dbconnect.php';

$productList = array(); // Initialize an empty array to store all products

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $sql = "SELECT * FROM `products`";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die('Error running the query' . mysqli_error($conn));
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            // Store each product data in the $productList array
            $productList[] = array(
                'sno' => htmlspecialchars($row['sno']),
                'image_path' => htmlspecialchars($row['image_path']),
                'productname' => htmlspecialchars($row['productname']),
                'productprice' => htmlspecialchars($row['productprice'])
            );
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showroom</title>

    <link rel="stylesheet" href="css/products.css">
</head>

<body>
    <!-- <a href="logout.php">Logout</a> -->
    <a href="add.php">Add Products</a>

    <ul class="container">
        <?php foreach ($productList as $product) : ?>
            <li class="product">
                <div class="productImage">
                    <?php echo '<img src="' . $product['image_path'] . '" alt="Product Price">'; ?>
                </div>
                <div class="productName">
                    Name: <?php echo $product['productname']; ?>
                </div>
                <div class="productPrice">
                    Price: <?php echo $product['productprice']; ?>
                </div>
                <a class="btn" id="button" href="order.php?sno=<?= $product['sno']; ?>">Buy Now</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>