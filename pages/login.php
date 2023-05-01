<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
    require_once '../includes/navigation.php';
?>
    <!-- Login -->
    <div id="login-section" class="padding-150">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row col-lg-8 col-12 d-flex flex-column shadow border p-3">
                <div class="col-12">
                    <h2 class="text-center text-uppercase">Login</h2>
                </div>
                <div class="col-12">
                    <form id="loginForm">
                        <div class="form-group">
                          <label for="loginUsername" class="font-weight-bold">Username:</label>
                          <input type="text" class="form-control" id="loginUsername" placeholder="Enter username">
                          <small id="loginUsernameHelp" class="form-text">Example: Lazar</small>
                        </div>
                        <div class="form-group">
                          <label for="loginPassword" class="font-weight-bold">Password:</label>
                          <input type="password" class="form-control" id="loginPassword" placeholder="Enter password">
                          <small id="loginPasswordHelp" class="form-text">Example: yourpassword1</small>
                        </div>
                        <small class="form-text text-muted">Never share your login credentials with anyone.</small>
                        <button type="button" id="loginButton" class="btn mt-3 button">Login</button>
                        <div id="response">
                            <!-- <small id="contactInformation" class="form-text text-success font-weight-bold"></small> -->
                        </div>
                        <div id="result">

                        </div>
                    </form>
                </div>
                <div class="col-12 mt-2">
                    <p>Don't have an account yet? <a href="register.html" class="font-weight-bold">Register now!</a></p>
                    <p>Did you forget your password? <a href="contact.html" class="font-weight-bold">Contact us!</a></p>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once '../includes/services.php';
    require_once '../includes/footer.php';
?>