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
        var elementRect = element.getBoundingClientRect();
        var viewportHeight = window.innerHeight;
        var minScroll = elementRect.top - (elementRect.height - viewportHeight) + minBottom;
        //var maxScroll = elementRect.top + maxBottom;
        var bottomValue = Math.max(Math.min(scrollPosition - minScroll, maxBottom), minBottom);
        element.style.bottom = bottomValue + "px";
    }
    window.onload = function() {
        var scrollElements = document.querySelectorAll('[data-animation="dm-scroll"]');
        if (scrollElements.length > 0) {
            window.addEventListener("scroll", function() {
                scrollElements.forEach(function(element) {
                    if (element.classList.contains('dm-tablet-responsive')) {
                        scrollAnimation(element, -10, 13);
                    } else if (element.classList.contains('dm-phone-responsive')) {
                        scrollAnimation(element, -20, 10);
                    } else {
                        scrollAnimation(element, -300, 0);
                    }
                });
            });
        }
    };


    // Transitions - Motion Animations
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting && entry.intersectionRatio >= 1) {
                const motion = entry.target.getAttribute('data-motion');
                if (motion && motion.includes('0')) {
                    const updatedMotion = motion.replaceAll('0', '1');
                    entry.target.setAttribute('data-motion', updatedMotion);
                    observer.unobserve(entry.target);
                }
            }
        });
    });
    document.querySelectorAll('[data-motion]').forEach((el) => {
        observer.observe(el);
    });
    const updateVisibleElements = () => {
        const visibleElements = [];
        document.querySelectorAll('[data-motion]').forEach((el) => {
            const rect = el.getBoundingClientRect();
            const isVisible = rect.top < window.innerHeight && rect.bottom >= 0;
            if (isVisible) {
                visibleElements.push(el);
            }
        });

        visibleElements.forEach((el) => {
            const motion = el.getAttribute('data-motion');
            if (motion && motion.includes('0')) {
                const updatedMotion = motion.replaceAll('0', '1');
                el.setAttribute('data-motion', updatedMotion);
                observer.unobserve(el);
            }
        });
    };
    window.addEventListener('scroll', updateVisibleElements);
    window.addEventListener('resize', updateVisibleElements);
    updateVisibleElements();
    const motion_data = document.querySelectorAll('[data-duration], [data-delay]');
    motion_data.forEach((motion_data) => {
        const duration = motion_data.getAttribute('data-duration');
        const delay = motion_data.getAttribute('data-delay');
        motion_data.style.setProperty('--duration', duration);
        motion_data.style.setProperty('--delay', delay);
    });

    // Toggle Theme
    function toggleTheme() {
        var body = document.body;
        var toggle = document.getElementById('toggleTheme');
        var path = document.querySelector('.dm-toggletheme span svg path');

        if (toggle.checked) {
            body.classList.remove('theme-light');
            body.classList.add('theme-dark');
            path.style.transition = '0.3s ease-in-out';
            path.setAttribute('d', 'M15 22.1C11 22.1 7.79999 18.9 7.79999 15C7.79999 11 11 7.79999 15 7.79999C18.9 7.79999 12 10.5 12 15C12 19.5 18.9 22.1 15 22.1Z');
            localStorage.setItem('theme', 'dark');
        } else {
            body.classList.remove('theme-dark');
            body.classList.add('theme-light');
            path.style.transition = '0.3s ease-in-out';
            path.setAttribute('d', 'M15 22.1C11 22.1 7.79999 18.9 7.79999 15C7.79999 11 11 7.79999 15 7.79999C18.9 7.79999 22.1 11 22.1 15C22.1 18.9 18.9 22.1 15 22.1Z');
            localStorage.setItem('theme', 'light');
        }
    }
    var toggle = document.getElementById('toggleTheme');
    if (toggle !== null) {
        var themePreference = localStorage.getItem('theme');
        if (themePreference === 'dark') {
            toggle.checked = true;
            toggleTheme();
        } else {
            toggle.checked = false;
        }
        toggle.addEventListener('change', toggleTheme);
    }


    // Debug
    var btnLog = document.querySelector('.btn-log');
    var dataLog = document.querySelector('.data-log');
    var logClose = document.querySelector('.log-close');
    if (( btnLog !== null ) && (dataLog !== null)) {
        dataLog.style.display = 'none';
        logClose.style.display = 'none';
        btnLog.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            if (dataLog.style.display === 'none') {
                dataLog.style.display = 'block';
                logClose.style.display = 'block';
            } else {
                dataLog.style.display = 'none';
                logClose.style.display = 'none';
            }
        });
        logClose.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            dataLog.style.display = 'none';
            logClose.style.display = 'none';
        });
    }
    var btnRender = document.querySelector('.btn-render');
    if (btnRender !== null) {
        btnRender.addEventListener('click', function(event) {
            var renderUrl = btnRender.getAttribute('data-href');
            event.preventDefault(); // Prevent the default link behavior
            var xhr = new XMLHttpRequest();
            xhr.open('GET', renderUrl, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    location.reload();
                } else {
                }
            };
            xhr.send();
        });
    }

    // Download File
    const downloadButtons = document.querySelectorAll('.downloadButton');
    downloadButtons.forEach(button => {
        button.addEventListener('click', function() {
            const fileUrl = this.dataset.url;
            const link = document.createElement('a');
            link.href = fileUrl;
            link.setAttribute('download', '');
            link.click();
        });
    });

});

//Contact Form
function contact_form_exec() {
    var buttonDiv = document.querySelector('#dm-form-button').parentNode;
    var statusMessageSpan = document.querySelector('#dm-send-status');

    if (!statusMessageSpan) {
        statusMessageSpan = document.createElement('span');
        statusMessageSpan.id = 'dm-send-status';
        statusMessageSpan.textContent = 'There was an error.';
        buttonDiv.appendChild(statusMessageSpan);
    }

    return false;
}




