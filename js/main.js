window.onload = function() {
    const toggle = document.querySelector('#toggle-button');
    const navbar = document.querySelector('#menu');
    console.log(navbar);

    toggle.addEventListener('click', () => {
        navbar.classList.toggle('active');
        toggle.classList.toggle('active');
    });
}