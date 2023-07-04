const menu = document.querySelector('#menu_icon');
const navLinks = document.querySelector('#nav_toggle');
if (menu) {
  menu.addEventListener('click', () => {
    navLinks.classList.toggle('mobile_nav');
  });
}