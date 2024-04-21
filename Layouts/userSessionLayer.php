<?php

session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true && $_SESSION['user_type'] != 'user') {
    header("location: index.php");
    exit;
}
