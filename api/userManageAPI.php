<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require '../php_utils/_dbConnect.php';

    // Login logic
    if (isset($_POST['ftype']) && $_POST['ftype'] == 'login' && isset($_POST['login_email']) && isset($_POST['login_pass'])) {
        $email = strip_tags($_POST["login_email"]);
        $password = md5($_POST["login_pass"]);

        $num = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `chs_users` WHERE `email` = '$email' AND `password` = '$password'"));

        if ($num == 1) {
            session_start();

            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $details = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `id`, `name` FROM `chs_users` WHERE `email` = '" . $_SESSION['email'] . "'"));

            $_SESSION['user_id'] = $details['id'];
            $_SESSION['user_name'] = $details['name'];
            $_SESSION['user_type'] = 'user';

            echo "userPanel.php";
            exit;
        } else { //If No then
            echo "Invalid username or password";
        }
    } else if (isset($_POST['ftype']) && $_POST['ftype'] == 'signup' && isset($_POST['signup_name']) && isset($_POST['signup_email']) && isset($_POST['set_pass']) && isset($_POST['cnf_pass'])) {

        //Signup logic
        $name = strip_tags($_POST['signup_name']);
        $email = strip_tags($_POST['signup_email']);

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `chs_users` WHERE `email` = '" . $email . "'")) == 0) {
            if ($_POST['set_pass'] == $_POST['cnf_pass']) {
                $password = md5($_POST['cnf_pass']);


                if (mysqli_query($conn, "INSERT INTO `chs_users` (`name`, `email`, `password`, `status`) VALUES ('$name', '$email', '$password', '1')")) {
                    echo "Registration successful";
                } else {
                    die(mysqli_error($conn));
                }
            } else {
                echo "Passwords doesn't match";
            }
        } else {
            echo "Email already exists";
        }
    } else if (isset($_POST['ftype']) && $_POST['ftype'] == 'adminLogin' && isset($_POST['admin_email']) && isset($_POST['admin_pass'])) {

        // Admin Login Logic

        $email = strip_tags($_POST["admin_email"]);
        $password = md5($_POST["admin_pass"]);

        $num = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `chs_admins` WHERE `email` = '$email' AND `password` = '$password'"));

        if ($num == 1) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $details = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `name` FROM `chs_admins` WHERE `email` = '" . $_SESSION['email'] . "'"));

            $_SESSION['admin_name'] = $details['name'];
            $_SESSION['user_type'] = 'admin';

            echo "adminPanel.php";
            exit;
        } else { //If No then
            echo "Invalid username or password";
        }
    } else {
        echo "Missing fields";
    }
} else {
    echo "index.php";
}
