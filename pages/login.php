<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
?>
<div id="login-section" class="padding-150">
        <div class="container d-flex justify-content-center align-items-center">
            <?php
                if(isset($_SESSION['user'])) {
                    echo '<div style="height: 300px;" class="row d-flex align-items-center">
                        <div class="col-12">
                            <h3 class="text-danger">Oops, it looks like you are already logged in!</h3>
                        </div>
                    </div>';
                }
                else {
                    echo '<div class="row col-lg-8 col-12 d-flex flex-column shadow border p-3">
                <div class="col-12">
                    <h2 class="text-center text-uppercase">Login</h2>
                </div>
                <div class="col-12">
                    <form id="loginForm">
                        <div class="form-group">
                          <label for="loginUsername" class="font-weight-bold">Username:</label>
                          <input type="text" class="form-control" id="loginUsername" placeholder="Enter username">
                          <small id="loginUsernameHelp" class="form-text">Please enter your username</small>
                        </div>
                        <div class="form-group">
                          <label for="loginPassword" class="font-weight-bold">Password:</label>
                          <input type="password" class="form-control" id="loginPassword" placeholder="Enter password">
                          <small id="loginPasswordHelp" class="form-text">Please enter your password</small>
                        </div>
                        <small class="form-text text-muted">Never share your login credentials with anyone.</small>
                        <button type="button" id="loginButton" class="btn mt-3 button">Login</button>
                    </form>
                </div>
                <div class="col-12 mt-2">
                    <p>Dont have an account yet? <a href="register.php" class="font-weight-bold">Register now!</a></p>
                    <p>Did you forget your password? <a href="contact.php" class="font-weight-bold">Contact us!</a></p>
                </div>
                <div id="response">
                            <!-- <small id="contactInformation" class="form-text text-success font-weight-bold"></small> -->
                </div>
            </div>';
                }
            ?>
    </div>
</div>

<?php
    require_once '../includes/footer.php';
?>