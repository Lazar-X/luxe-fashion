<?php
    session_start();
    require_once '../includes/head.php';
    require_once '../includes/header.php';
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
                        <!-- First name -->
                        <div class="form-group">
                          <label for="registerFirstName" class="font-weight-bold">First Name:</label>
                          <input type="text" class="form-control" id="registerFirstName" placeholder="Enter first name">
                          <small id="firstNameHelp" class="form-text">Example: Lazar</small>
                        </div>
                        <!-- Last name -->
                        <div class="form-group">
                          <label for="registerLastName" class="font-weight-bold">Last Name:</label>
                          <input type="text" class="form-control" id="registerLastName" placeholder="Enter last name">
                          <small id="lastNameHelp" class="form-text">Example: Jankovic</small>
                        </div>
                        <!-- Username -->
                        <div class="form-group">
                            <label for="registerUsername" class="font-weight-bold">Username:</label>
                            <input type="text" class="form-control" id="registerUsername" placeholder="Enter username">
                            <small id="usernameHelp" class="form-text">Example: LazarJ</small>
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
                                <input class="form-check-input" type="radio" name="registerGender" id="male" value="1">
                                <label class="form-check-label" for="male">
                                  Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="registerGender" id="female" value="2">
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
                        <div id="verification-code">
                            
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
    require_once '../includes/services.php';
    require_once '../includes/footer.php';
?>