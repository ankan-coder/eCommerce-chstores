<?php

require '../php_utils/_dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['ftype']) && $_POST['ftype'] == 'addproduct') {
        require '../php_utils/_dbConnect.php';

        $ProductName = $_POST['product_name'];
        $ProductPrice = $_POST['product_price'];

        $filename = $_FILES["product_image"]["name"];
        $tempname = $_FILES["product_image"]["tmp_name"];

        $productImage = "../productImages/" . $filename;

        if (move_uploaded_file($tempname, $productImage)) {
            if (mysqli_query($conn, "INSERT INTO `chs_products` (`product_name`, `product_price`, `product_image`, `status`) VALUES ('" . $ProductName . "', '" . $ProductPrice . "', '" . $productImage . "', '1')")) {
                echo "Product Added Successfully";
            } else {
                echo "Error uploading file :" . mysqli_error($conn);
            }
        } else {
            echo "Error uploading photo";
        }
    } else if (isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['ftype']) && $_POST['ftype'] == 'addtocart') {

        // Add to cart
    } else if (isset($_POST['ftype']) && isset($_POST['customer']) && isset($_POST['p_id']) && isset($_POST['orderTime']) && isset($_POST['address']) && isset($_POST['ftype']) && $_POST['ftype'] == 'checkoutForm') {

        // Place order
        $cust_id = $_POST['customer'];
        $p_id = $_POST['p_id'];
        $orderTime = $_POST['orderTime'];
        $address = $_POST['address'];

        // $orderExixts = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `chs_orders` WHERE `` = '', `` = '', ``= '', `` = ''"));

        if (mysqli_query($conn, "INSERT INTO `chs_orders` (`cust_id`, `p_id`, `orderTime`, `address`, `delivered`) VALUES ('" . $cust_id . "', '" . $p_id . "', '" . $orderTime . "', '" . $address . "', '0')")) {
            echo "Order Placed Successfully";
        } else {
            echo "Error occured" . mysqli_error($conn);
        }
    } else {
        echo 'Fields Missing';
    }
}
