<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Fashion | Homepage</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap include -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Other includes -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
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
        require_once '../includes/footer.php';
    ?>
    
    <!-- Bootstrap include -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>