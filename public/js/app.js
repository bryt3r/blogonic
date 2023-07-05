const menu = document.querySelector('#menu_icon');
const navLinks = document.querySelector('#nav_toggle');
if (menu) {
  menu.addEventListener('click', () => {
    navLinks.classList.toggle('mobile_nav');
  });
}



// Get the modal
const modal = document.querySelector("#modal");

// Get the button that opens the modal
const openBtn = document.querySelector("#modal_open_btn");

// Get the <span> element that closes the modal
const closeBtn = document.querySelector("#modal_close_btn");

function openModal() {
  if (modal) {
    // When the user clicks on the button, open the modal
    openBtn.addEventListener('click', () => {
      modal.style.display = "block";
    });
  }
}


function closeModal() {
  if (modal) {
    closeBtn.addEventListener('click', () => {
      modal.style.display = "none";
    });
  }
}


openModal();

closeModal();
