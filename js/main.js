window.onload = function() {
    // Global
    toggleMenu();

    // Index
    if(document.URL.includes('index.php')) {

    }
    if(document.URL.includes('test.php')) {
        testValidation();
    }
    // Shop
    if(document.URL.includes('shop.php')) {
        const colors = document.querySelector('#collapseColors').querySelectorAll('label');
        toggleActiveClass(colors, 'active-color');
        triggerFilterProducts();
        addToCart();
    }
    // About us
    if(document.URL.includes('about-us.php')) {
        
    }
    // Contact
    if(document.URL.includes('contact.php')) {
        contactValidation();
    }
    // Single product
    if(document.URL.includes('single-product.php')) {
        const sizes = document.querySelector("#div-sizes").querySelectorAll('label');
        addActiveClass(sizes, 'active-size');
        quantity();
        addToCart();
    }
    // Login
    if(document.URL.includes('login.php')) {
        loginValidation();
        verificationValidation();
    }
    // Register
    if(document.URL.includes('register.php')) {
        showPassword();
        registerValidation();
    }
    // Cart
    if(document.URL.includes('cart.php')) {
        quantity();
        updateQuantity();
    }
    // Checkout
    if(document.URL.includes('checkout.php')) {
        checkoutValidation();
    }
    // Vote
    if(document.URL.includes('poll.php')) {
        voteValidation();
    }
    // User
    if(document.URL.includes('user.php')) {
        updateUserData();
    }
    // Admin
    if(document.URL.includes('admin.php')) {
        insertProduct();
        insertSizes();
        insertPrices();
        deleteProduct();
    }
}

// Function for navigation
function toggleMenu() {
    const toggle = document.querySelector('#toggle-button');
    const navbar = document.querySelector('#menu');

    toggle.addEventListener('click', () => {
        navbar.classList.toggle('active');
        toggle.classList.toggle('active');
    });
}

// Function for quantity on single-product page
function quantity() {
    const buttonPlus = document.querySelectorAll('.button-operator-plus');
    const buttonMinus = document.querySelectorAll('.button-operator-minus');
    const buttonResult = document.querySelectorAll('.button-operator-result');
    const quantityMessage = document.querySelectorAll('.quantity-help');

    for (let i = 0; i < buttonPlus.length; i++) {
        buttonPlus[i].addEventListener('click', () => {
            if(buttonResult[i].value >= 1 && buttonResult[i].value < 10) {
                buttonResult[i].value++;
                quantityMessage[i].textContent = "";
            }
            if(buttonResult[i].value >= 10) {
                quantityMessage[i].textContent = "Quantity cannot exceed 10. If you need to order more, please contact the administrator.";
            }
        });

        buttonMinus[i].addEventListener('click', () => {
            if(buttonResult[i].value <= 1) {
                quantityMessage[i].textContent = "Quantity cannot be negative.";
            }
            if(buttonResult[i].value >= 2) {
                buttonResult[i].value--;
                quantityMessage[i].textContent = "";
            }
        });
    }
}

// Function for adding active classes
function addActiveClass(elements, className) {
    elements.forEach(element => {
        element.addEventListener('click', () => {
            elements.forEach(otherElement => {
                otherElement.classList.remove(className);
            });
            element.classList.add(className);
        });
    });
}

function toggleActiveClass(elements, className) {
    elements.forEach(element => {
        element.addEventListener('click', () => {
            element.classList.toggle(className);
        });
    });
}

// Function to toggle password visibility
function showPassword() {
    const passwords = document.querySelectorAll(".passwords");
    const iconPassword = document.querySelectorAll('.show-password');
    console.log(iconPassword, passwords);
    for(let i = 0; i < iconPassword.length; i++) {
        iconPassword[i].addEventListener('click', () => {
            if (passwords[i].type === "password") {
                passwords[i].type = "text";
                iconPassword[i].classList.add('active-show-password');
              } else {
                passwords[i].type = "password";
                iconPassword[i].classList.remove('active-show-password');
              }
        });
    }
}

// Function to clear form elements when its done
function clearFrom(arrayElements, formElement) {
    arrayElements.forEach(element => {
        element.removeClass('border-success');
    });
    formElement[0].reset();
    // messageElement.text(messageText).fadeIn().delay(3000).fadeOut();
    // , messageElement, messageText
}

// Function to send data with ajax
function ajaxCallBack(file, method, data, result) {
    $.ajax({
        url: '../logic/' + file + '.php',
        method: method,
        data: data,
        dataType: 'json',
        success: result,
        error: function(xhr) {
            console.log(xhr);
            if(xhr.status == 401) {
                $('#response').html(`<small id="responseInformation" class="form-text text-danger font-weight-bold">${xhr.responseJSON.message}</small>`);
            }
            if(xhr.status == 422) {
                $('#response').html(`<small id="responseInformation" class="form-text text-danger font-weight-bold">${xhr.responseJSON.message}</small>`);
            }
            if(xhr.status == 409) {
                $('#response').html(`<small id="responseInformation" class="form-text text-danger font-weight-bold">${xhr.responseJSON.message}</small>`);
            }
            if(xhr.status == 500) {
                $('#response').html(`<small id="responseInformation" class="form-text text-danger font-weight-bold">${xhr.responseJSON.message}</small>`);
            }
        }
    });
}

// Function to validate contact data
function contactValidation() {
    let name = $('#contactName');
    let email = $('#contactEmail');
    let message = $('#contactMessage');

    let nameHelp = $('#contactNameHelp');
    let emailHelp = $('#contactEmailHelp');
    let messageHelp = $('#contactMessageHelp');

    let regexName = /^[A-Z][a-z]{2,19}( [A-Z][a-z]{2,19})*$/;
    let regexEmail = /^([a-zA-Z0-9._%+-]{1,64})@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})$/;
    let regexMessage = /^[A-Z][\w\s\d.,!?-]{9,149}$/i;

    let errorCounter = 0;

    // Initial check
    if(!regexName.test($(name).val())) {
        errorCounter++;
    }
    if(!regexEmail.test($(email).val())) {
        errorCounter++;
    }
    if(!regexMessage.test($(message).val())) {
        errorCounter++;
    }

    function checkContactName() {
        if(!regexName.test($(name).val())) {
            errorCounter++;
            nameHelp.addClass('text-danger');
            nameHelp.text('Please enter a valid name. Example: Lazar');
            name.addClass('border-danger');
        }
        else {
            nameHelp.removeClass('text-danger');
            nameHelp.text('');
            name.removeClass('border-danger');
            name.addClass('border-success');
        }
    }

    function checkContactEmail() {
        if(!regexEmail.test($(email).val())) {
            errorCounter++;
            emailHelp.addClass('text-danger');
            emailHelp.text('Please enter a valid email address. Example: luxefashion@gmail.com');
            email.addClass('border-danger');
        }
        else {
            emailHelp.removeClass('text-danger');
            emailHelp.text('');
            email.removeClass('border-danger');
            email.addClass('border-success');
        }
    }

    function checkContactMessage() {
        if(!regexMessage.test($(message).val())) {
            errorCounter++;
            messageHelp.addClass('text-danger');
            messageHelp.text('Please enter a valid message. Between 10 and 150 characters long.');
            message.addClass('border-danger');
        }
        else {
            messageHelp.removeClass('text-danger');
            messageHelp.text('');
            message.removeClass('border-danger');
            message.addClass('border-success');
        }
    }

    name.on('focusout', function() {
        checkContactName();
    });
    email.on('focusout', function() {
        checkContactEmail();
    });
    message.on('focusout', function() {
        checkContactMessage();
    });

    $(document).on('click', '#contactButton', function() {
        errorCounter = 0;
        checkContactName();
        checkContactEmail();
        checkContactMessage();

        if(errorCounter == 0) {
            let arrayElements = [name, email, message];
            let formElement = $('#contactForm');
            
            let data = {
                'name': name.val(),
                'email': email.val(),
                'message': message.val(),
                'button': true
            };

            ajaxCallBack('contactForm', 'post', data, function(result) {
                $('#response').html(`<small id="responseInformation" class="form-text text-success font-weight-bold">${result.message}</small>`).fadeIn().delay(3000).fadeOut();
                clearFrom(arrayElements, formElement);
            });
        }

        errorCounter = 0;
    });
}

// Function to validate login data
function loginValidation() {
    let username = $('#loginUsername');
    let password = $('#loginPassword');
    let usernameHelp = $('#loginUsernameHelp');
    let passwordHelp = $('#loginPasswordHelp');

    let regexUsername = /^[a-zA-Z0-9]{3,16}$/;
    let regexPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$/;

    let errorCounter = 0;

    // Initial check
    if(!regexUsername.test($(username).val())) {
        errorCounter++;
    }
    if(!regexPassword.test($(password).val())) {
        errorCounter++;
    }

    function checkLoginUsername() {
        if(!regexUsername.test($(username).val())) {
            errorCounter++;
            usernameHelp.addClass('text-danger');
            usernameHelp.text('Please enter a valid username.');
            username.addClass('border-danger');
        }
        else {
            usernameHelp.removeClass('text-danger');
            usernameHelp.text('');
            username.removeClass('border-danger');
            username.addClass('border-success');
        }
    }

    function checkLoginPassword() {
        if(!regexPassword.test($(password).val())) {
            errorCounter++;
            passwordHelp.addClass('text-danger');
            passwordHelp.text('Please enter a valid password.');
            password.addClass('border-danger');
        }
        else {
            passwordHelp.removeClass('text-danger');
            passwordHelp.text('');
            password.removeClass('border-danger');
            password.addClass('border-success');
        }
    }

    username.on('focusout', function() {
        checkLoginUsername();
    });
    password.on('focusout', function() {
        checkLoginPassword();
    });

    $(document).on('click', '#loginButton', function() {
        errorCounter = 0;
        checkLoginUsername();
        checkLoginPassword();

        if(errorCounter == 0) {
            let arrayElements = [username, password];
            let formElement = $('#loginForm');
            
            let data = {
                'username': username.val(),
                'password': password.val(),
                'button': true
            };

            ajaxCallBack('loginForm', 'post', data, function(result) {
                if(result.message == 'not verified') {
                    $('#response').html(`<div id="verificationForm">
                    <div class="form-group">
                    <label for="verificationCode" class="font-weight-bold my-2">Sorry, it looks like you haven't entered your verification code yet. Please enter your code in the designated field to complete the verification process and gain access to your account.</label>
                    <input type="text" class="form-control" id="verificationCode" placeholder="Enter verification code">
                    <small id="verificationCodeHelp" class="form-text">Please enter your verification code</small>
                  </div>
                  <button type="button" id="verificationButton" class="btn mt-3 button">Verify</button>
                  </div>`);
                }
                else {
                    $('#response').html(`<small id="responseInformation" class="form-text text-success font-weight-bold">${result.message}</small>`).fadeIn().delay(3000).fadeOut();
                    window.setTimeout(function() {
                        window.location = 'index.php';
                    }, 3000);
                    clearFrom(arrayElements, formElement);
                }
            });
        }

        errorCounter = 0;
    });
}

// Function to validate verify data
function verificationValidation() {
    $(document).on('click', '#verificationButton', function() {
        let verificationCode = $('#verificationCode');
        let verificationCodeHelp = $('#verificationCodeHelp');
        let username = $('#loginUsername');
        let password = $('#loginPassword');

        let regexCode = /^\d{5}$/;
        let regexUsername = /^[a-zA-Z0-9]{3,16}$/;
        let regexPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$/;

        errorCounter = 0;


        if(!regexUsername.test($(username).val())) {
            errorCounter++;
        }
        if(!regexPassword.test($(password).val())) {
            errorCounter++;
        }
        if(!regexCode.test($(verificationCode).val())) {
            errorCounter++;
            $(verificationCodeHelp).addClass('text-danger');
            $(verificationCodeHelp).text('Please enter a valid verification code.');
            $(verificationCode).addClass('border-danger');
        }

        console.log(errorCounter);

        if(errorCounter == 0) {
            let data = {
                'username': username.val(),
                'password': password.val(),
                'verificationCode': verificationCode.val(),
                'button': true
            };
            console.log(data);

            ajaxCallBack('verificationForm', 'post', data, function(result) {
                $('#response').html(`<small id="responseInformation" class="form-text text-success font-weight-bold">${result.message}</small>`).fadeIn().delay(3000).fadeOut();
                window.setTimeout(function() {
                    window.location = 'index.php';
                }, 3000);
            });
        }
    });
}

// Function to validate register data
function registerValidation() {
    let firstName = $('#registerFirstName');
    let lastName = $('#registerLastName');
    let username = $('#registerUsername');
    let email = $('#registerEmail');
    let password = $('#registerPassword');
    let retypePassword = $('#registerRetypePassword');
    let gender = $('input[name="registerGender"]');
    let phone = $('#registerPhone');

    let firstNameHelp = $('#firstNameHelp');
    let lastNameHelp = $('#lastNameHelp');
    let usernameHelp = $('#usernameHelp');
    let emailHelp = $('#emailHelp');
    let passwordHelp= $('#passwordHelp');
    let retypePasswordHelp = $('#retypePasswordHelp');
    let genderHelp = $('#genderHelp');
    let phoneHelp = $('#phoneHelp');

    let regexName = /^[A-Z][a-z]{2,19}( [A-Z][a-z]{2,19})*$/;
    let regexUsername = /^[a-zA-Z0-9]{3,16}$/;
    let regexEmail = /^([a-zA-Z0-9._%+-]{1,64})@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})$/;
    let regexPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$/;
    let regexPhone = /^\+(?:[0-9].?){6,14}[0-9]$/;

    let errorCounter = 0;

    if(!regexName.test($(firstName).val())) {
        errorCounter++;
    }
    if(!regexName.test($(lastName).val())) {
        errorCounter++;
    }
    if(!regexUsername.test($(username).val())) {
        errorCounter++;
    }
    if(!regexEmail.test($(email).val())) {
        errorCounter++;
    }
    if(!regexPassword.test($(password).val())) {
        errorCounter++;
    }
    if($(retypePassword).val() !== $(password).val()) {
        errorCounter++;
    }
    if($(gender).length == 0) {
        errorCounter++;
    }
    if($(phone).val() !== '') {
        if(!regexPhone.test($(phone).val())) {
            errorCounter++;
        }
    }
    

    function checkRegisterFirstName() {
        if(!regexName.test($(firstName).val())) {
            errorCounter++;
            firstNameHelp.addClass('text-danger');
            firstNameHelp.text('Please enter a valid name. Example: Lazar');
            firstName.addClass('border-danger');
        }
        else {
            firstNameHelp.removeClass('text-danger');
            firstNameHelp.text('');
            firstName.removeClass('border-danger');
            firstName.addClass('border-success');
        }
    }

    function checkRegisterLastName() {
        if(!regexName.test($(lastName).val())) {
            errorCounter++;
            lastNameHelp.addClass('text-danger');
            lastNameHelp.text('Please enter a valid name. Example: Jankovic');
            lastName.addClass('border-danger');
        }
        else {
            lastNameHelp.removeClass('text-danger');
            lastNameHelp.text('');
            lastName.removeClass('border-danger');
            lastName.addClass('border-success');
        }
    }

    function checkRegisterUsername() {
        if(!regexUsername.test($(username).val())) {
            errorCounter++;
            usernameHelp.addClass('text-danger');
            usernameHelp.text('Please enter a valid username. Example: LazarJ');
            username.addClass('border-danger');
        }
        else {
            usernameHelp.removeClass('text-danger');
            usernameHelp.text('');
            username.removeClass('border-danger');
            username.addClass('border-success');
        }
    }

    function checkRegisterEmail() {
        if(!regexEmail.test($(email).val())) {
            errorCounter++;
            emailHelp.addClass('text-danger');
            emailHelp.text('Please enter a valid email address. Example: luxefashion@gmail.com');
            email.addClass('border-danger');
        }
        else {
            emailHelp.removeClass('text-danger');
            emailHelp.text('');
            email.removeClass('border-danger');
            email.addClass('border-success');
        }
    }

    function checkRegisterPassword() {
        if(!regexPassword.test($(password).val())) {
            errorCounter++;
            passwordHelp.addClass('text-danger');
            passwordHelp.text('Please enter a valid password. Example: password1');
            password.addClass('border-danger');
        }
        else {
            passwordHelp.removeClass('text-danger');
            passwordHelp.text('');
            password.removeClass('border-danger');
            password.addClass('border-success');
        }
    }

    function checkRegisterRetypePassword() {
        if($(retypePassword).val() !== $(password).val()) {
            errorCounter++;
            retypePasswordHelp.addClass('text-danger');
            retypePasswordHelp.text('The password should be exactly the same as the one you entered above.');
            retypePassword.addClass('border-danger');
        }
        else {
            retypePasswordHelp.removeClass('text-danger');
            retypePasswordHelp.text('');
            retypePassword.removeClass('border-danger');
            retypePassword.addClass('border-success');
        }
    }

    function checkRegisterGender() {
        if($('input[name="registerGender"]:checked').length === 0) {
            errorCounter++;
            genderHelp.addClass('text-danger');
            genderHelp.text('Please select your gender from the options provided above.');
        }
        else {
            genderHelp.removeClass('text-danger');
            genderHelp.text('');
        }
    }

    function checkRegisterPhone() {
        if($(phone).val() !== '') {
            if(!regexPhone.test($(phone).val())) {
                errorCounter++;
                phoneHelp.addClass('text-danger');
                phoneHelp.text('Please enter a valid phone number. Example: +381 555 555');
                phone.addClass('border-danger');
            }
            else {
                phoneHelp.removeClass('text-danger');
                phoneHelp.text('');
                phone.removeClass('border-danger');
                phone.addClass('border-success');
            }
        }
    }

    firstName.on('focusout', function() {
        checkRegisterFirstName();
    });
    lastName.on('focusout', function() {
        checkRegisterLastName();
    });
    username.on('focusout', function() {
        checkRegisterUsername();
    });
    email.on('focusout', function() {
        checkRegisterEmail();
    });
    password.on('focusout', function() {
        checkRegisterPassword();
        checkRegisterRetypePassword();
    });
    retypePassword.on('focusout', function() {
        checkRegisterRetypePassword();
    });
    gender.on('focusout', function() {
        checkRegisterGender();
    });
    phone.on('focusout', function() {
        checkRegisterPhone();
    });

    $(document).on('click', '#registerButton', function() {
        errorCounter = 0;
        checkRegisterFirstName();
        checkRegisterLastName();
        checkRegisterUsername();
        checkRegisterEmail();
        checkRegisterPassword();
        checkRegisterRetypePassword();
        checkRegisterGender();
        checkRegisterPhone();

        if(errorCounter == 0) {
            let arrayElements = [firstName, lastName, username, email, password, retypePassword, gender, phone];
            let formElement = $('#registerForm');

            let data = {
                'firstName': firstName.val(),
                'lastName': lastName.val(),
                'username': username.val(),
                'email': email.val(),
                'password': password.val(),
                'retypePassword': retypePassword.val(),
                'gender': $('input[name="registerGender"]:checked').val(),
                'phone': phone.val(),
                'button': true
            };

            ajaxCallBack('registerForm', 'post', data, function(result) {
                $('#verification-code').html(`<small id="responseInformation" class="form-text text-success font-weight-bold"><span class="h4">${result.verificationCode}</span></small>`);
                $('#response').html(`<small id="responseInformation" class="form-text text-success font-weight-bold">${result.message}</small>`).fadeIn().delay(3000).fadeOut();
                clearFrom(arrayElements, formElement);
            });
        }

        errorCounter = 0;
    });
}

// Function to validate checkout data
function checkoutValidation() {
    let name = $('#checkoutName');
    let email = $('#checkoutEmail');
    let phone = $('#checkoutPhone');
    let country = $('#checkoutCountry');
    let address = $('#checkoutAddress');
    let postcode = $('#checkoutPostcode');
    let price = $('#summary');
    let userId = $('#userId');

    let nameHelp = $('#nameHelp');
    let emailHelp = $('#emailHelp');
    let phoneHelp = $('#phoneHelp');
    let countryHelp = $('#countryHelp');
    let addressHelp = $('#addressHelp');
    let postcodeHelp = $('#postcodeHelp');

    let regexName = /^[A-Z][a-z]{2,19}( [A-Z][a-z]{2,19})*$/;
    let regexEmail = /^([a-zA-Z0-9._%+-]{1,64})@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})$/;
    let regexPhone = /^\+(?:[0-9].?){6,14}[0-9]$/;
    let regexAddress = /^[\w\s.,'-]{5,50}$/i;
    let regexPostcode = /^[a-zA-Z0-9\s-]{3,12}$/;

    let errorCounter = 0;

    if(!regexName.test($(name).val())) {
        errorCounter++;
    }
    if(!regexEmail.test($(email).val())) {
        errorCounter++;
    }
    if(!regexPhone.test($(phone).val())) {
        errorCounter++;
    }
    if($(country).val() == "0") {
        errorCounter++;
    }
    if(!regexAddress.test($(address).val())) {
        errorCounter++;
    }
    if(!regexPostcode.test($(postcode).val())) {
        errorCounter++;
    }

    function checkCheckoutName() {
        if(!regexName.test($(name).val())) {
            errorCounter++;
            nameHelp.addClass('text-danger');
            nameHelp.text('Please enter a valid name. Example: Lazar Jankovic');
            name.addClass('border-danger');
        }
        else {
            nameHelp.removeClass('text-danger');
            nameHelp.text('');
            name.removeClass('border-danger');
            name.addClass('border-success');
        }
    }

    function checkCheckoutEmail() {
        if(!regexEmail.test($(email).val())) {
            errorCounter++;
            emailHelp.addClass('text-danger');
            emailHelp.text('Please enter a valid email address. Example: luxefashion@gmail.com');
            email.addClass('border-danger');
        }
        else {
            emailHelp.removeClass('text-danger');
            emailHelp.text('');
            email.removeClass('border-danger');
            email.addClass('border-success');
        }
    }

    function checkCheckoutPhone() {
        if(!regexPhone.test($(phone).val())) {
            errorCounter++;
            phoneHelp.addClass('text-danger');
            phoneHelp.text('Please enter a valid phone number. Example: +381 555 555');
            phone.addClass('border-danger');
        }
        else {
            phoneHelp.removeClass('text-danger');
            phoneHelp.text('');
            phone.removeClass('border-danger');
            phone.addClass('border-success');
        }
    }

    function checkCheckoutCountry() {
        if($(country).val() == "0") {
            errorCounter++;
            countryHelp.addClass('text-danger');
            countryHelp.text('Please select your country from the options provided above.');
            country.addClass('border-danger');
        }
        else {
            countryHelp.removeClass('text-danger');
            countryHelp.text('');
            country.removeClass('border-danger');
            country.addClass('border-success');
        }
    }

    function checkCheckoutAddress() {
        if(!regexAddress.test($(address).val())) {
            errorCounter++;
            addressHelp.addClass('text-danger');
            addressHelp.text('Please enter a valid address. Example: Belgrade, Street 22');
            address.addClass('border-danger');
        }
        else {
            addressHelp.removeClass('text-danger');
            addressHelp.text('');
            address.removeClass('border-danger');
            address.addClass('border-success');
        }
    }

    function checkCheckoutPostcode() {
        if(!regexPostcode.test($(postcode).val())) {
            errorCounter++;
            postcodeHelp.addClass('text-danger');
            postcodeHelp.text('Please enter a valid postcode. Example: 11500');
            postcode.addClass('border-danger');
        }
        else {
            postcodeHelp.removeClass('text-danger');
            postcodeHelp.text('');
            postcode.removeClass('border-danger');
            postcode.addClass('border-success');
        }
    }

    name.on('focusout', function() {
        checkCheckoutName();
    });
    email.on('focusout', function() {
        checkCheckoutEmail();
    });
    phone.on('focusout', function() {
        checkCheckoutPhone();
    });
    country.on('focusout', function() {
        checkCheckoutCountry();
    });
    address.on('focusout', function() {
        checkCheckoutAddress();
    });
    postcode.on('focusout', function() {
        checkCheckoutPostcode();
    });

    $(document).on('click', '#checkoutButton', function() {
        errorCounter = 0;
        checkCheckoutName();
        checkCheckoutEmail();
        checkCheckoutPhone();
        checkCheckoutCountry();
        checkCheckoutAddress();
        checkCheckoutPostcode();

        if(errorCounter == 0) {
            let arrayElements = [name, email, phone, country, address, postcode];
            let formElement = $('#checkoutForm');
            
            let data = {
                'name': name.val(),
                'email': email.val(),
                'phone': phone.val(),
                'countryId': country.val(),
                'address': address.val(),
                'postcode': postcode.val(),
                'price': price.text(),
                'userId': userId.val(),
                'button': true
            };

            ajaxCallBack('checkoutForm', 'post', data, function(result) {
                $('#response').html(`<small id="responseInformation" class="form-text text-success font-weight-bold">${result.message}</small>`).fadeIn().delay(3000).fadeOut();
                clearFrom(arrayElements, formElement);
            });        
        }

        errorCounter = 0;
    });
}

// Function to validate vote data
function voteValidation() {
    $(document).on('click', '#voteButton', function() {
        let poll = $('input[name="poll"]:checked');
        let voteHelp = $('#voteHelp');
        let userId = $('#userId');
        let questionId = $('#questionId');

        let regexId = /^\d+$/;

        errorCounter = 0;
        
        if($(poll).length === 0) {
            errorCounter++;
            voteHelp.addClass('text-danger');
            voteHelp.text('Please select your gender from the options provided above.');
        }
        if(!regexId.test($(userId).val())) {
            voteHelp.addClass('text-danger');
            voteHelp.text('User ID is not valid.');
        }
        if(!regexId.test($(questionId).val())) {
            voteHelp.addClass('text-danger');
            voteHelp.text('Question ID is not valid.');
        }

        if(errorCounter == 0) {
            let data = {
                'pollAnswerId': poll.val(),
                'pollUserId': userId.val(),
                'pollQuestionId': questionId.val(),
                'button': true
            };
            console.log(data);

            ajaxCallBack('pollForm', 'post', data, function(result) {
                $('#response').html(`<small id="responseInformation" class="form-text text-success font-weight-bold">${result.message}</small>`).fadeIn().delay(3000).fadeOut();
                window.setTimeout(function() {
                    window.location = 'index.php';
                }, 3000);
            });
        }
    });
}

// Function to update user data
function updateUserData() {
    let firstName = $('#updateFirstName');
    let lastName = $('#updateLastName');
    let firstNameHelp = $('#updateFirstNameHelp');
    let lastNameHelp = $('#updateLastNameHelp');
    let userId = $('#userId');
    let regexId = /^\d+$/;
    let regexName = /^[A-Z][a-z]{2,19}( [A-Z][a-z]{2,19})*$/;

    let errorCounter = 0;

    if(!regexName.test($(firstName).val())) {
        errorCounter++;
    }
    if(!regexName.test($(lastName).val())) {
        errorCounter++;
    }
    if(!regexId.test($(userId).val())) {
        voteHelp.addClass('text-danger');
        voteHelp.text('User ID is not valid.');
    }
    
    function checkRegisterFirstName() {
        if(!regexName.test($(firstName).val())) {
            errorCounter++;
            firstNameHelp.addClass('text-danger');
            firstNameHelp.text('Please enter a valid name. Example: Lazar');
            firstName.addClass('border-danger');
        }
        else {
            firstNameHelp.removeClass('text-danger');
            firstNameHelp.text('');
            firstName.removeClass('border-danger');
            firstName.addClass('border-success');
        }
    }

    function checkRegisterLastName() {
        if(!regexName.test($(lastName).val())) {
            errorCounter++;
            lastNameHelp.addClass('text-danger');
            lastNameHelp.text('Please enter a valid name. Example: Jankovic');
            lastName.addClass('border-danger');
        }
        else {
            lastNameHelp.removeClass('text-danger');
            lastNameHelp.text('');
            lastName.removeClass('border-danger');
            lastName.addClass('border-success');
        }
    }

    firstName.on('focusout', function() {
        checkRegisterFirstName();
    });
    lastName.on('focusout', function() {
        checkRegisterLastName();
    });

    $(document).on('click', '#updateUserDataButton', function() {
        errorCounter = 0;
        checkRegisterFirstName();
        checkRegisterLastName();

        if(errorCounter == 0) {
            let data = {
                'firstName': firstName.val(),
                'lastName': lastName.val(),
                'userId': userId.val(), 
                'button': true
            };

            ajaxCallBack('userDataForm', 'post', data, function(result) {
                $('#response').html(`<small id="responseInformation" class="form-text text-success font-weight-bold">${result.message}</small>`).fadeIn().delay(3000).fadeOut();
                window.setTimeout(function() {
                    window.location = 'user.php';
                }, 3000);
            });
        }

        errorCounter = 0;
    });
}

function selectFilterElements() {
    let selectedCategories = [];
    let allCategories = [];
    let selectedBrands = [];
    let allBrands = [];
    let selectedColors = [];
    let allColors = [];
    let selectedGender = [];
    let allGenders = [];
    let selectedDiscounts = [];
    let allDiscounts = [];

    // categories
    $('input[name="categories"]').each(function(el) {
        allCategories.push(parseInt($(this).val()));
    });
    $('input[name="categories"]:checked').each(function(el) {
        selectedCategories.push(parseInt($(this).val()));
    });

    // brands
    $('input[name="brands"]').each(function(el) {
        allBrands.push(parseInt($(this).val()));
    });
    $('input[name="brands"]:checked').each(function(el) {
        selectedBrands.push(parseInt($(this).val()));
    });

    // sizes
    $('input[name="colors"]').each(function(el) {
        allColors.push(parseInt($(this).val()));
    });
    $('input[name="colors"]:checked').each(function(el) {
        selectedColors.push(parseInt($(this).val()));
    });

    // discount
    $('input[name="discount"]').each(function(el) {
        allDiscounts.push(0);
    });
    $('input[name="discount"]:checked').each(function(el) {
        selectedDiscounts.push(parseInt($(this).val()));
    });

    // genders
    $('input[name="gender"]').each(function(el) {
        allGenders.push(parseInt($(this).val()));
    });
    $('input[name="gender"]:checked').each(function(el) {
        selectedGender.push(parseInt($(this).val()));
    });

    var arr = {
        selectedCategories: selectedCategories, 
        allCategories: allCategories, 
        selectedBrands: selectedBrands, 
        allBrands: allBrands,
        selectedColors: selectedColors,
        allColors: allColors,
        selectedGender: selectedGender,
        allGenders: allGenders,
        selectedDiscounts: selectedDiscounts,
        allDiscounts: allDiscounts
    }
    return arr;
}

function clearFilterElements() {
    $('input[type=checkbox]').each(function() { 
        this.checked = false; 
    });
    $('#collapseColors').find('label').removeClass('active-color');
    $('input[type=radio]').each(function() { 
        this.checked = false; 
    });
    $('input[type=text]').each(function() {
        $(this).val('');
    });
    $('#sort').prop('selectedIndex', 0);
}

function filterProducts() {
    let arr = selectFilterElements();
    let selectedCategories = arr['selectedCategories'];
    let allCategories = arr['allCategories'];
    let selectedBrands = arr['selectedBrands'];
    let allBrands = arr['allBrands'];
    let selectedColors = arr['selectedColors'];
    let allColors = arr['allColors'];
    let selectedGenders = arr['selectedGender'];
    let allGenders = arr['allGenders'];
    let allDiscounts = arr['allDiscounts'];
    let selectedDiscounts = arr['selectedDiscounts'];

    if(selectedCategories.length == 0) {
        selectedCategories = allCategories;
    }
    if(selectedBrands.length == 0) {
        selectedBrands = allBrands;
    }
    if(selectedGenders.length == 0) {
        selectedGenders = allGenders;
    }
    if(selectedColors.length == 0) {
        selectedColors = allColors;
    }
    if(selectedDiscounts.length == 0) {
        selectedDiscounts = allDiscounts;
    }

    let search = $('#search').val();
    let sort = $('#sort')[0].selectedIndex;

    data = {};
    
    data = {
            'categoryIds': selectedCategories,
            'brandIds': selectedBrands,
            'colorIds': selectedColors,
            'genderIds': selectedGenders,
            'discountIds': selectedDiscounts,
            'search': search,
            'sort': sort
    };

    ajaxCallBack('filterProducts', 'POST', data, function(result) {
        console.log(result);
        let html = showProducts(result[0], result[1], result[2]);
        $('#productsResult').html(html);
    });
}

function triggerFilterProducts() {
    console.log('trigger');
    $(document).on('change', '#collapseCategories', function() {
        filterProducts();
        console.log('triger na kat');
    });
    $(document).on('change', '#collapseBrands', function() {
        filterProducts();
        console.log('triger na brand');
    });
    $(document).on('change', '#collapseDiscount', function() {
        filterProducts();
        console.log('triger na discount');
    });
    $(document).on('change', '#collapseColors', function() {
        filterProducts();
        console.log('triger na colors');
    });
    $(document).on('change', '#collapseGender', function() {
        filterProducts();
        console.log('triger na gender');
    });
    $(document).on('change', '#sort', function() {
        filterProducts();
        console.log('triger na sort');
    });
    $(document).on('input', '#search', function() {
        filterProducts();
        console.log('triger na search');
    });
    $(document).on('click', '#clear', function() {
        console.log('kliknuto na clear');
        clearFilterElements();
        let arr = selectFilterElements();
        let allCategories = arr['allCategories'];
        let allBrands = arr['allBrands'];
        let allColors = arr['allColors'];
        let allGenders = arr['allGenders'];
        let allDiscounts = arr['allDiscounts'];
        let search = '';
        let sort = 0;

        data = {
            'clearButton': true,
            'categoryIds': allCategories,
            'brandIds': allBrands,
            'colorIds': allColors,
            'genderIds': allGenders,
            'discountIds': allDiscounts,
            'search': search,
            'sort': sort
        };

        ajaxCallBack('filterProducts', 'POST', data, function(result) {
            console.log('pozvan ajax');
            console.log(result);
            let html = showProducts(result[0], result[1], result[2]);
            $('#productsResult').html(html);
        });
    });
}

function showProducts(products, ratingValues, productIds) {
    let html = '';
    if(products.length == 0) {
        html += '<div class="col-12 d-flex justify-content-center align-items-center py-3"><p>There are no products for the selected criteria.</p></div>';
    }
    else {
        for(let product of products) {
            html += `<!-- Product -->
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="product m-1 p-md-3 p-1">
                    <div style="background-image:url(../images/products/${product.product_image}.png);" class="product-image">
                        <div class="overlay-product-image">
                            <div class="product-icons">
                                <!-- Modal add to cart icon -->
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#add-to-cart" title="Add To Cart"><i class="fa-solid fa-cart-shopping"></i></a>
                                <a href="single-product.php?product_id=${product.product_id}" data-toggle="tooltip" title="View Product"><i class="fa-solid fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-text">
                        <h3 class="my-2">${product.product_name}</h3>
                        <p class="stars">`;
                            let htmlStars = '';
                            const productIndex = productIds.indexOf(product.product_id);
                            if(productIndex !== -1) {
                                const ratingValue = ratingValues[productIndex];
                                if(ratingValue == 0) {
                                    for(let i = 0; i < 5; i++) {
                                        htmlStars += '<i class="fa-solid fa-star"></i> ';
                                    }
                                }
                                for(let j = 0; j < ratingValue; j++) {
                                        htmlStars += '<i class="fa-solid fa-star star-filled"></i> ';
                                }
                            }
                        html += htmlStars;
                        html += `
                        </p>`;
                        if(product.price_old != null) {
                            html += `<p class="price-text-old mr-2">$${product.price_old}</p>`;
                        }
                        else {
                            html += `<p class="price-text-old mr-2"></p>`;
                        }
                        html += `
                        <p class="price-text-new">$${product.price_new}</p>
                    </div>
                </div>
                <!-- Modal Add To Cart -->
                <div class="product-add-to-cart">
                    <div class="modal fade" id="add-to-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Notification</h5>
                                    <button type="button" class="close button-close-modal" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Product added to cart successfully!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                                    <a href="cart.html" class="btn go-to-cart">Go To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
        }
    }
    return html;
}

function insertProduct() {
    let productName = $('#productName');
    let productDescription = $('#productDescription');
    let productImage = $('#productImage');
    let productNameHelp = $('#productNameHelp');
    let productImageHelp = $('#productImageHelp');
    let productDescriptionHelp = $('#productDescriptionHelp');

    let regexText = /^[a-zA-Z]{1,50}$/;
    let regexDesc = /^[a-zA-Z0-9\s\.,-]{0,500}$/;
    $(document).on('click', '#addProductButton', function() {
        errorCounter = 0;
        if(!regexText.test($(productName).val())) {
            errorCounter++;
            productNameHelp.text('Max length: 50');
        }
        if(!regexText.test($(productImage).val())) {
            errorCounter++;
            productImageHelp.text('Max length: 50');
        }
        if(!regexDesc.test($(productDescription).val())) {
            errorCounter++;
            productDescriptionHelp.text('Max length: 500');
        }

        let categoryId = $('#category').val();
        let brandId = $('#brand').val();
        let colorId = $('#color').val();
        let genderId = $('#gender').val();

        if(errorCounter == 0) {
            let data = {
                'productName': productName.val(),
                'productImage': productImage.val(),
                'productDescription': productDescription.val(),
                'categoryId': categoryId,
                'brandId': brandId,
                'colorId': colorId,
                'genderId': genderId,
                'button': true
            };
    
            ajaxCallBack('addProduct', 'post', data, function(result) {
                $('#response').html(`<small id="responseInformation" class="form-text text-success font-weight-bold">${result.message}</small>`).fadeIn().delay(3000).fadeOut();
            });
        }
        else {
            console.log(errorCounter);
        }
    });
}

function insertSizes() {
    $(document).on('click', '#addSizesButton', function() {
        let productId = $('#product').val();
        let sizeIds = [];
        let sizesHelp = $('#sizesHelp');

        $('input[name="sizes"]:checked').each(function(el) {
            sizeIds.push(parseInt($(this).val()));
        });

        let errorCounter = 0;
        
        if(sizeIds.length == 0) {
            errorCounter++;
            sizesHelp.addClass('text-danger');
        }

        if(errorCounter == 0) {
            let data = {
                'productId': productId,
                'sizeIds': sizeIds,
                'button': true
            };
    
            ajaxCallBack('addSizes', 'post', data, function(result) {
                $('#responseSizes').html(`<small id="responseInformation" class="form-text text-success font-weight-bold">${result.message}</small>`).fadeIn().delay(3000).fadeOut();
            });
        }
        else {
            console.log(errorCounter);
        }
    });
}

function insertPrices() {
    $(document).on('click', '#addPricesButton', function() {
        let productId = $('#productPriceId').val();
        let productPriceNew = $('#productPriceNew');
        let productPriceNewHelp = $('#productPriceNewHelp');
        let productPriceOld = $('#productPriceOld');

        let regexPrice = /^\d+(?:\.\d{1,2})?$/;

        let errorCounter = 0;

        console.log(productId);

        if(!regexPrice.test($(productPriceNew).val())) {
            errorCounter++;
            productPriceNewHelp.text('Example: 30.99');
            productPriceNewHelp.addClass('text-danger');
        }

        if(errorCounter == 0) {
            let data = {
                'productId': productId,
                'productPriceNew': productPriceNew.val(),
                'productPriceOld': productPriceOld.val(),
                'button': true
            };

            ajaxCallBack('addPrices', 'post', data, function(result) {
                $('#responsePrices').html(`<small id="responseInformation" class="form-text text-success font-weight-bold">${result.message}</small>`).fadeIn().delay(3000).fadeOut();
            });
        }
        else {
            console.log(errorCounter);
        }
    });
}

function deleteProduct() {
    $(document).on('click', '#deleteProductButton', function() {
        let productId = $('#productDeleteId').val();
        let data = {
            'productId': productId,
            'button': true
        };

        ajaxCallBack('deleteProduct', 'post', data, function(result) {
            $('#responseDelete').html(`<small id="responseInformation" class="form-text text-success font-weight-bold">${result.message}</small>`).fadeIn().delay(3000).fadeOut();
        });
    });
}

function addToCart() {
    $(document).on('click', '#addToCartButton', function() {
        let userId = $('#userId').val();
        let productId = $('#productId').val();
        let quantity = $('#quantity').val();
        let size = $('input[name=sizes]:checked').val();

        let errorCounter = 0;

        if(typeof size === 'undefined') {
            errorCounter++;
            $('#sizeHelp').text('You need to select size!');
        }
        if(typeof userId === 'undefined') {
            errorCounter++;
            $('#addToCartHelp').text('You need to be logged in!');
        }

        console.log(userId);

        if(errorCounter == 0) {
            let data = {
                'userId': userId,
                'productId': productId,
                'quantity': quantity,
                'size': size,
                'button': true
            };

            ajaxCallBack('addToCart', 'post', data, function(result) {
                console.log('pozvao se');
                $('#add-to-cart').modal("show");
            });
        }

        else {
            console.log(errorCounter);
        }
    });  
}

// Function to update quantity
function updateQuantity() {
    const buttonResult = document.querySelectorAll(".button-operator-result");
    const buttonPlus = document.querySelectorAll(".button-operator-plus");
    const buttonMinus = document.querySelectorAll(".button-operator-minus");
    const prices = document.querySelectorAll(".price-text-new");
    let userId = $('#userId').val();
    let productId = $('#productId').val();
    for (let i = 0; i < buttonPlus.length; i++) {
        let newQuantity = parseInt(buttonResult[i].value);
        buttonPlus[i].addEventListener("click", () => {
            if(newQuantity < 10) {
                newQuantity++;
                buttonResult[i].value = newQuantity;
                let data = {
                    'userId': userId,
                    'productId': productId,
                    'quantity': buttonResult[i].value,
                    'price': prices[i].textContent,
                    'button': true
                };
    
                ajaxCallBack('updateQuantity', 'post', data, function(result) {
                    $('#summary').text(result);
                });
            }
        });

        buttonMinus[i].addEventListener("click", () => {
            if(newQuantity > 1) {
                newQuantity--;
                buttonResult[i].value = newQuantity;
                let data = {
                    'userId': userId,
                    'productId': productId,
                    'quantity': buttonResult[i].value,
                    'price': prices[i].textContent,
                    'button': true
                };
    
                ajaxCallBack('updateQuantity', 'post', data, function(result) {
                    $('#summary').text(result);
                });
            }
        });
    }
}