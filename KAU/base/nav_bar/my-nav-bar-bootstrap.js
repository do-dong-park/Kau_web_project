const toggleBtn = document.querySelector('.my-navbar_toggleBtn');
const menu = document.querySelector('.my-navbar_menu');
const icons = document.querySelector('.my-navbar_icons');

toggleBtn.addEventListener('click', ()=> {
    menu.classList.toggle('active')
    icons.classList.toggle('active')
});