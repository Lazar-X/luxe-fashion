window.onload = function() {
    quantity();
    toggleMenu();
}

// Function for navigation
function toggleMenu() {
    const toggle = document.querySelector('#toggle-button');
    const navbar = document.querySelector('#menu');
    console.log(navbar);

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