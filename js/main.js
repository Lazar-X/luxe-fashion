window.onload = function() {
    toggleMenu();
    if(document.URL.includes('single-product.html')) {
        quantity();
    }
    if(document.URL.includes('shop.html')) {
        console.log('u shop smo');
        activeSize();
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

// Function for sizes on shop page
function activeSize() {
    const sizeDiv = document.querySelector('#div-sizes');
    const sizes = sizeDiv.querySelectorAll('label');

    sizes.forEach(size => {
        size.addEventListener('click', () => {
            size.classList.toggle('active-size');
        });
    });

    //const labelElements = divElement.querySelectorAll('label');
}