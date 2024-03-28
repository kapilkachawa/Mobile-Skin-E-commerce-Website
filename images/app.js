// JavaScript code for handling the shopping cart sidebar
document.addEventListener('DOMContentLoaded', function () {
    const cartButton = document.querySelector('.cart-button');
    const cartSidebar = document.querySelector('.cart-sidebar');
    const closeCartButton = document.querySelector('.close-cart');

    cartButton.addEventListener('click', function () {
        cartSidebar.classList.toggle('open');
    });

    closeCartButton.addEventListener('click', function () {
        cartSidebar.classList.remove('open');
    });
});
