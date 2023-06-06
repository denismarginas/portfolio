// Navbar Function
document.addEventListener("DOMContentLoaded", function() {
    var navbarToggle = document.querySelector(".dm-navbar-toggle");
    var navbarToggleSection = document.querySelector(".dm-menu");

    navbarToggle.addEventListener("click", function() {
      navbarToggle.classList.toggle("active");
      navbarToggleSection.classList.toggle("navbar-active");
    });
});
  