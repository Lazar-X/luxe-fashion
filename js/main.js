window.onload = function() {
    // Global
    toggleMenu();
    // Index
    if(document.URL.includes('index.html')) {

    }
    // Shop
    if(document.URL.includes('shop.html')) {
        const sizes = document.querySelector("#div-sizes").querySelectorAll('label');
        addActiveClass(sizes, 'active-size');
    }
    // About us
    if(document.URL.includes('about-us.html')) {
        
    }
    // Contact
    if(document.URL.includes('contact.html')) {
        contactValidation();
    }
    // Single product
    if(document.URL.includes('single-product.html')) {
        const sizes = document.querySelector("#div-sizes").querySelectorAll('label');
        const colors = document.querySelector("#div-colors").querySelectorAll('label');
        addActiveClass(colors, 'active-color');
        addActiveClass(sizes, 'active-size');
        quantity();
    }
    // Login
    if(document.URL.includes('login.html')) {
        loginValidation();
    }
    // Register
    if(document.URL.includes('register.html')) {
        showPassword();
        registerValidation();
    }
    // Cart
    if(document.URL.includes('cart.html')) {
        quantity();
    }
    // Checkout
    if(document.URL.includes('checkout.html')) {
        checkoutValidation();
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
function clearFrom(arrayElements, formElement, messageElement, messageText) {
    arrayElements.forEach(element => {
        element.removeClass('border-success');
    });
    formElement[0].reset();
    messageElement.text(messageText).fadeIn().delay(3000).fadeOut();
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
    let regexMessage = /^[A-Z][\w\s\d.,!?-]{9,49}$/i;

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
            nameHelp.text('Not good!');
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
            emailHelp.text('Not good!');
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
            messageHelp.text('Not good!');
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
            let messageElement = $('#contactInformation');
            let messageText = 'Your message has been sent!';
            clearFrom(arrayElements, formElement, messageElement, messageText);

            // validation done, continue

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

    console.log(errorCounter);

    function checkLoginUsername() {
        if(!regexUsername.test($(username).val())) {
            errorCounter++;
            usernameHelp.addClass('text-danger');
            usernameHelp.text('Not good');
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
            passwordHelp.text('Not good');
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
            let messageElement = $('#loginInformation');
            let messageText = 'Login successful! Redirecting to homepage...';
            clearFrom(arrayElements, formElement, messageElement, messageText);

            // validation done, continue

        }

        errorCounter = 0;
    });
}

// Function to validate register data
function registerValidation() {
    let name = $('#registerFullname');
    let username = $('#registerUsername');
    let email = $('#registerEmail');
    let password = $('#registerPassword');
    let retypePassword = $('#registerRetypePassword');
    let gender = $('input[name="registerGender"]');
    let phone = $('#registerPhone');

    let nameHelp = $('#nameHelp');
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

    if(!regexName.test($(name).val())) {
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
    if(!regexPhone.test($(phone).val())) {
        errorCounter++;
    }

    function checkRegisterName() {
        if(!regexName.test($(name).val())) {
            errorCounter++;
            nameHelp.addClass('text-danger');
            nameHelp.text('Not good');
            name.addClass('border-danger');
        }
        else {
            nameHelp.removeClass('text-danger');
            nameHelp.text('');
            name.removeClass('border-danger');
            name.addClass('border-success');
        }
    }

    function checkRegisterUsername() {
        if(!regexUsername.test($(username).val())) {
            errorCounter++;
            usernameHelp.addClass('text-danger');
            usernameHelp.text('Not good');
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
            emailHelp.text('Not good');
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
            passwordHelp.text('Not good');
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
            retypePasswordHelp.text('Not good');
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
            genderHelp.text('Not good');
        }
        else {
            genderHelp.removeClass('text-danger');
            genderHelp.text('');
        }
    }

    function checkRegisterPhone() {
        if(!regexPhone.test($(phone).val())) {
            errorCounter++;
            phoneHelp.addClass('text-danger');
            phoneHelp.text('Not good');
            phone.addClass('border-danger');
        }
        else {
            phoneHelp.removeClass('text-danger');
            phoneHelp.text('');
            phone.removeClass('border-danger');
            phone.addClass('border-success');
        }
    }

    name.on('focusout', function() {
        checkRegisterName();
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
        checkRegisterName();
        checkRegisterUsername();
        checkRegisterEmail();
        checkRegisterPassword();
        checkRegisterRetypePassword();
        checkRegisterGender();
        checkRegisterPhone();

        if(errorCounter == 0) {
            let arrayElements = [name, username, email, password, retypePassword, gender, phone];
            let formElement = $('#registerForm');
            let messageElement = $('#registerInformation');
            let messageText = 'Your account has been successfully created. Follow the instructions to activate your account. Redirecting to login page...';
            clearFrom(arrayElements, formElement, messageElement, messageText);

            // validation done, continue

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
            nameHelp.text('Not good');
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
            emailHelp.text('Not good');
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
            phoneHelp.text('Not good');
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
            countryHelp.text('Not good');
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
            addressHelp.text('Not good');
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
            postcodeHelp.text('Not good');
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
            let messageElement = $('#checkoutInformation');
            let messageText = 'Your order has been successfully placed. Thank you for shopping with us.';
            clearFrom(arrayElements, formElement, messageElement, messageText);

            // validation done, continue

        }

        errorCounter = 0;
    });
}