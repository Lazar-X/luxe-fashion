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
    // Register
    if(document.URL.includes('register.html')) {
        showPassword();
    }
    // Cart
    if(document.URL.includes('cart.html')) {
        quantity();
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

// Function to validate contact data
function contactValidation() {
    $(document).on('click', '#contactButton', function() {
        let name = $('#nameContact');
        let email = $('#emailContact');
        let message = $('#messageContact');

        let regexName = /^[A-Z][a-z]{2,19}( [A-Z][a-z]{2,19})*$/;
        let regexEmail = /^([a-zA-Z0-9._%+-]{1,64})@([a-zA-Z0-9.-]+)\.([a-zA-Z]{2,})$/;
        let regexMessage = /^[A-Z][\w\s\d.,!?-]{9,49}$/i;

        let errorCounter = 0;

        if(!regexName.test($(name).value())) {
            errorCounter++;
            $('#nameHelp').addClass('text-danger');
        }
        else {
            $('#nameHelp').removeClass('text-danger');
        }

        if(!regexEmail.test($(email).value())) {
            errorCounter++;
            $('#emailHelp').addClass('text-danger');
        }
        else {
            $('#emailHelp').removeClass('text-danger');
        }

        if(!regexMessage.test($(message).value())) {
            errorCounter++;
            $('#message').addClass('text-danger');
        }
        else {
            $('#message').removeClass('text-danger');
        }

        // if(errorCounter == 0) {
        //     let contactData = [
        //         'name': $(name).val(),
        //         'email': $(email).val(),
        //         'message': $(message).val()
        //     ];

        //     $.ajax({
        //         url: 'contact_handler.php',
        //         method: 'post',
        //         dataType: 'json',
        //         success: function(result) {
        //             console.log(result);
        //         },
        //         error: function(xhr) {
        //             console.log(xhr);
        //         }
        //     });
        // }

    });
}