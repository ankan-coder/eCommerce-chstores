<?php require './assets/constants.php'; ?>
<?php require './php_utils/_dbConnect.php'; ?>
<?php require './Layouts/header.php'; ?>
<?php require './Layouts/navbar.php'; ?>

<div class="container">
    <div class="row p-3 d-flex flex-column">
        <div class="col p-3" id="lif">
            <form id="loginForm">

                <div class="fs-1 text-center">Login</div>

                <input type="hidden" name="ftype" value="login">

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="login_email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="login_pass">
                </div>

                <div class="mb-3">
                    <a class="text-primary" onclick="showSU()" style="cursor: pointer;">Don't have an account? Create now!</a>
                </div>

                <input type="submit" name="btn" class="btn btn-primary" value="Login" />
            </form>
        </div>

        <div class="col p-3 d-none" id="suf">
            <form id="signupForm">

                <div class="fs-1 text-center">Signup</div>

                <input type="hidden" name="ftype" value="signup">

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="signup_name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="signup_email" required>
                    <div class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <div class="mb-3">
                    <label for="set_pass" class="form-label">Choose Password</label>
                    <input type="password" class="form-control" name="set_pass" required>
                </div>

                <div class="mb-3">
                    <label for="cnf_pass" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="cnf_pass" required>
                </div>

                <div class="mb-3">
                    <a class="text-primary" onclick="showLI()" style="cursor: pointer;">Already have an account? Login!</a>
                </div>

                <input type="submit" name="btn" class="btn btn-primary" value="Signup" />
            </form>
        </div>
    </div>
</div>
<script>
    function showSU() {
        $('#lif').addClass('d-none')
        $('#suf').removeClass('d-none')
    }

    function showLI() {
        $('#suf').addClass('d-none')
        $('#lif').removeClass('d-none')
    }

    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'api/userManageAPI.php',
                data: $('#loginForm').serialize(),
                success: function(response) {
                    // Handle success
                    if (response === "Invalid username or password") {
                        alert("Wrong Credentials!");
                    } else if (response === "userPanel.php") {
                        $('#loginForm')[0].reset();
                        var hostname = window.location.hostname;
                        window.location.href = '//' + hostname + '/chstores/' + response;  //Only for localhost
                        // window.location.href = '//' + hostname + '/' + response;  //Applicable once hosted
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    alert(xhr.responseText);
                }
            });
        });

        $('#signupForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'api/userManageAPI.php',
                data: $('#signupForm').serialize(),
                success: function(response) {
                    // Handle success
                    alert(response);
                    $('#signupForm')[0].reset();
                    window.location.reload();
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