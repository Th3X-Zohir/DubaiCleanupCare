// public/js/nav.js
console.log('nav.js loaded');
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM fully loaded');
    const menuToggle = document.getElementById('menu-toggle');
    const navMenu = document.getElementById('nav-menu');
    
    console.log('menuToggle:', menuToggle);
    console.log('navMenu:', navMenu);

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', () => {
            console.log('Menu toggle clicked');
            navMenu.classList.toggle('hidden');
            navMenu.classList.toggle('flex');
            navMenu.classList.toggle('flex-col');
            navMenu.classList.toggle('absolute');
            navMenu.classList.toggle('top-20');
            navMenu.classList.toggle('left-0');
            navMenu.classList.toggle('w-full');
            navMenu.classList.toggle('bg-white');
            navMenu.classList.toggle('shadow-lg');
            navMenu.classList.toggle('p-6');
            console.log('Nav classes after toggle:', navMenu.className);
        });
    } else {
        console.error('Menu toggle or nav menu not found');
    }
});