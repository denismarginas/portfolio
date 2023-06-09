// Page Loaded
document.addEventListener("DOMContentLoaded", function() {
    // Navbar Function
    var navbarToggle = document.querySelector(".dm-navbar-toggle");
    var navbarToggleSection = document.querySelector(".dm-menu");

    if(navbarToggle && navbarToggleSection){
        navbarToggle.addEventListener("click", function() {
            navbarToggle.classList.toggle("active");
            navbarToggleSection.classList.toggle("navbar-active");
        });
    }

    // Image Absolute Scroll Animation Bottom
    function scrollAnimation(element, minBottom, maxBottom) {
        var scrollPosition = window.scrollY || window.pageYOffset;
        var bottomValue = Math.max(Math.min(-scrollPosition, maxBottom), minBottom);
        element.style.bottom = bottomValue + "px";
    }

    window.onload = function() {
        var scrollElements = document.querySelectorAll('[data-animation="dm-scroll"]');
        if (scrollElements.length > 0) {
            window.addEventListener("scroll", function() {
                scrollElements.forEach(function(element) {
                    if (element.classList.contains('dm-tablet-responsive')) {
                        scrollAnimation(element, -10, 10);
                    } else if (element.classList.contains('dm-phone-responsive')) {
                        scrollAnimation(element, -20, 7);
                    } else {
                        scrollAnimation(element, -300, 0);
                    }
                });
            });
        }
    };

});
  