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
    <!-- Registration -->
    <div id="registration-section" class="padding-150">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row col-lg-8 col-12 d-flex flex-column shadow border p-3">
                <div class="col-12">
                    <h2 class="text-center text-uppercase">Register</h2>
                </div>
                <div class="col-12">
                    <form id="registerForm">
                        <!-- Full name -->
                        <div class="form-group">
                          <label for="registerFullname" class="font-weight-bold">Full Name:</label>
                          <input type="text" class="form-control" id="registerFullname" placeholder="Enter full name">
                          <small id="nameHelp" class="form-text">Example: Lazar Jankovic</small>
                        </div>
                        <!-- Username -->
                        <div class="form-group">
                            <label for="registerUsername" class="font-weight-bold">Username:</label>
                            <input type="text" class="form-control" id="registerUsername" placeholder="Enter username">
                            <small id="usernameHelp" class="form-text">Example: Lazar</small>
                        </div>
                        <!-- Email -->
                        <div class="form-group">
                            <label for="registerEmail" class="font-weight-bold">Email:</label>
                            <input type="text" class="form-control" id="registerEmail" placeholder="Enter email">
                            <small id="emailHelp" class="form-text">Example: luxefashion@gmail.com</small>
                        </div>
                        <!-- Password -->
                        <div class="form-group password-container">
                          <label for="registerPassword" class="font-weight-bold">Password:</label>
                          <input type="password" class="form-control passwords" id="registerPassword" placeholder="Enter password">
                          <i class="fa-solid fa-eye show-password"></i>
                          <small id="passwordHelp" class="form-text">Example: password1</small>
                        </div>
                        <!-- Retype password -->
                        <div class="form-group password-container">
                            <label for="registerRetypePassword" class="font-weight-bold">Retype Password:</label>
                            <input type="password" class="form-control passwords" id="registerRetypePassword" placeholder="Enter password again">
                            <i class="fa-solid fa-eye show-password icon-password"></i>
                            <small id="retypePasswordHelp" class="form-text">Re-enter your password</small>
                        </div>
                        <!-- Gender -->
                        <div class="form-group">
                            <label class="font-weight-bold">Gender:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="registerGender" id="male" value="m">
                                <label class="form-check-label" for="male">
                                  Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="registerGender" id="female" value="f">
                                <label class="form-check-label" for="female">
                                  Female
                                </label>
                            </div>
                            <small id="genderHelp" class="form-text">Please indicate your gender</small>
                        </div>
                        <!-- Phone number -->
                        <div class="form-group">
                            <label for="registerPhone" class="font-weight-bold">Phone: (optional)</label>
                            <input type="text" class="form-control" id="registerPhone" placeholder="Enter phone">
                            <small id="phoneHelp" class="form-text">Example: +381 555 555</small>
                        </div>
                        <small class="form-text text-muted">Please do not share your registration details with anyone else for your own safety and privacy.</small>
                        <button type="button" id="registerButton" class="btn mt-3 button">Register</button>
                        <div id="response">
                            <!-- <small id="contactInformation" class="form-text text-success font-weight-bold"></small> -->
                        </div>
                    </form>
                </div>
                <div class="col-12 mt-2">
                    <p>Already have an account? <a href="login.html" class="font-weight-bold">Login here!</a></p>
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