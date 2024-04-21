<?php require './assets/constants.php'; ?>
<?php require './php_utils/_dbConnect.php'; ?>
<?php require './Layouts/header.php'; ?>
<?php require './Layouts/navbar.php'; ?>

<div class="container">
    <div class="row p-3 d-flex flex-column">
        <div class="col p-3" id="lif">
            <form id="adminLoginForm">

                <div class="fs-1 text-center">Admin Login</div>

                <input type="hidden" name="ftype" value="adminLogin">

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="admin_email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="admin_pass" required>
                </div>

                <button type="submit" class="btn btn-primary">Log In</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#adminLoginForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'api/userManageAPI.php',
                data: $('#adminLoginForm').serialize(),
                success: function(response) {
                    // Handle success
                    if (response === "Invalid username or password") {
                        alert("Wrong Credentials!");
                    } else if (response === "adminPanel.php") {
                        $('#adminLoginForm')[0].reset();
                        var hostname = window.location.hostname;
                        window.location.href = '//' + hostname + '/chstores/' + response; //Only for localhost
                        // window.location.href = '//' + hostname + '/' + response;  //Applicable once hosted
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