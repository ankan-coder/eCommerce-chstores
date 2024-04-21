<?php require './assets/constants.php'; ?>
<?php require './php_utils/_dbConnect.php'; ?>
<?php require './Layouts/header.php'; ?>
<?php require './Layouts/adminSessionLayer.php'; ?>
<?php require './Layouts/navbar.php'; ?>

<div class="container">
    Welcome <?php echo $_SESSION['admin_name']; ?>
</div>

<?php require './Layouts/footer.php'; ?>