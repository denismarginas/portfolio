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



    // Transitions
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting && entry.intersectionRatio >= 1) {
                const motion = entry.target.getAttribute('data-motion');
                if (motion && motion.includes('0')) {
                    const updatedMotion = motion.replaceAll('0', '1');
                    entry.target.setAttribute('data-motion', updatedMotion);
                    observer.unobserve(entry.target);
                    console.log('Element is fully visible:', entry.target);
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
                console.log('Element is visible in scroll:', el);
            }
        });
    };

    window.addEventListener('scroll', updateVisibleElements);
    window.addEventListener('resize', updateVisibleElements);
    updateVisibleElements();






    const elements = document.querySelectorAll('[data-duration], [data-delay]');
    elements.forEach((element) => {
        const duration = element.getAttribute('data-duration');
        const delay = element.getAttribute('data-delay');
        element.style.setProperty('--duration', duration);
        element.style.setProperty('--delay', delay);
    });


});
  