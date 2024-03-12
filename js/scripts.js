const navbar = document.getElementById("navbar");
const navbarToggle = navbar.querySelector(".navbar-toggle");

function openMobileNavbar() {
  navbar.classList.add("opened");
  navbarToggle.setAttribute("aria-expanded", "true");
}

function closeMobileNavbar() {
  navbar.classList.remove("opened");
  navbarToggle.setAttribute("aria-expanded", "false");
}

navbarToggle.addEventListener("click", () => {
  if (navbar.classList.contains("opened")) {
    closeMobileNavbar();
  } else {
    openMobileNavbar();
  }
});

const navbarMenu = navbar.querySelector("#navbar-menu");
const navbarLinksContainer = navbar.querySelector(".navbar-links");

navbarLinksContainer.addEventListener("click", (clickEvent) => {
  clickEvent.stopPropagation();
});

navbarMenu.addEventListener("click", closeMobileNavbar);

function confirmDelete() {
  if (confirm('Are you sure you want to delete this?') == true) {
    // user clicked OK so execute the link
    return true;
  }
  else {
    // user clicked Cancel so stop execution
    return false;
  }
}

function togglePassword() {
  let pwInput = document.getElementById('password');
  let img = document.getElementById('showHide');

  if (pwInput.type == 'password') {
    pwInput.type = 'text';
    img.src = 'img/hide.png';
  }
  else {
    pwInput.type = 'password';
    img.src = 'img/show.png';
  }
}

function comparePasswords() {
  let password = document.getElementById('password').value;
  let confirm = document.getElementById('confirm').value;
  let pwErr = document.getElementById('pwErr');

  if (password != confirm) {
    pwErr.innerText = 'Passwords do not match';
    return false;
  }
  else {
    pwErr.innerText = '';
    return true;
  }
}
