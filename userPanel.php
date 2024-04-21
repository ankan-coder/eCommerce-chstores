<?php require './assets/constants.php'; ?>
<?php require './php_utils/_dbConnect.php'; ?>
<?php require './Layouts/header.php'; ?>
<?php require './Layouts/userSessionLayer.php'; ?>
<?php require './Layouts/navbar.php'; ?>

<div class="container">
    Welcome <?php echo $_SESSION['user_name']; ?>
</div>

<?php require './Layouts/footer.php'; ?>