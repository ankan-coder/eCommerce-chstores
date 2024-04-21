<?php

session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true && $_SESSION['user_type'] != 'admin') {
    header("location: index.php");
    exit;
}
