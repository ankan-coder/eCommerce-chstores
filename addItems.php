<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'partials/_dbconnect.php';
    
    $productName = $_POST['pName'];
    $productPrice = $_POST['pPrice'];
    
    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }else{
        $productName = $_POST['pName'];
        $productPrice = $_POST['pPrice'];
        
        
        $filename = $_FILES["pImage"]["name"];
        $tempname = $_FILES["pImage"]["tmp_name"];

        $imagePath = "productImages/" . $filename;

        move_uploaded_file($tempname, $imagePath);

        $sql_insertproductdetails = "INSERT INTO `products` (`productname`, `productprice`, `image_path`) VALUES ('$productName', '$productPrice', '$imagePath')";
        $result_insertproductdetails = mysqli_query($conn, $sql_insertproductdetails);

        if($result_insertproductdetails){
            $insertProductDetials_result = "Details entered successfully"; 
        }else{
            $insertProductDetails_error =  "Error: ".mysqli_connect_errno();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="css/add.css">
</head>
<body>
    <form action="add.php" method="POST" enctype="multipart/form-data">

        <label for="pName">Product Name</label>
        <input type="text" name="pName" placeholder="Enter Product Name" required>
        <label for="pPrice">Product Price</label>
        <input type="text" name="pPrice" placeholder="Enter Product Price" required>
        <label for="pImage">Product Image</label>
        <input type="file" name="pImage" required>

        <button type="submit" name="submit">Add Product</button>
    </form>

    <h4>
        <?php
            if(isset($insertProductDetials_result)){
                echo $insertProductDetials_result;
            } else if(isset($insertProductDetails_error)){
                echo $insertProductDetails_error;
            }
        ?>
    </h4>

    <button>
        <a href="products.php">Go to Products Page</a>
    </button>
</body>
</html>