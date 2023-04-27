window.onload = function() {
    // Global
    toggleMenu();
    // Shop
    if(document.URL.includes('shop.html')) {
        const sizes = document.querySelector("#div-sizes").querySelectorAll('label');
        addActiveClass(sizes, 'active-size');
    }
    // Single product
    if(document.URL.includes('single-product.html')) {
        const sizes = document.querySelector("#div-sizes").querySelectorAll('label');
        const colors = document.querySelector("#div-colors").querySelectorAll('label');
        addActiveClass(colors, 'active-color');
        addActiveClass(sizes, 'active-size');
        quantity();
    }
    if(document.URL.includes('register.html')) {
        showPassword();
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
    const buttonPlus = document.querySelector('#button-operator-plus');
    const buttonMinus = document.querySelector('#button-operator-minus');
    const buttonResult = document.querySelector('#button-operator-result');
    const quantityMessage = document.querySelector('#quantity-help');

    buttonPlus.addEventListener('click', () => {
        if(buttonResult.value >= 1 && buttonResult.value < 10) {
            buttonResult.value++;
            quantityMessage.textContent = "";
        }
        if(buttonResult.value >= 10) {
            quantityMessage.textContent = "Quantity cannot exceed 10. If you need to order more, please contact the administrator.";
        }
    });
    buttonMinus.addEventListener('click', () => {
        if(buttonResult.value <= 1) {
            quantityMessage.textContent = "Quantity cannot be negative.";
        }
        if(buttonResult.value >= 2) {
            buttonResult.value--;
            quantityMessage.textContent = "";
        }
    });
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