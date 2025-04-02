// Page Loaded
document.addEventListener("DOMContentLoaded", function() {

    function addJavaScriptAttribute() {
        let duration = 0;
        const preloaderElement = document.getElementById('preloader');

        if (preloaderElement) {
            duration = 10;
        }
        setTimeout(() => {
            document.body.setAttribute('java-script', 'true');
        }, duration);
    }
    addJavaScriptAttribute();
    transitions();
    deletePreloaderElement();

    // Navbar Functionality
    var bodySection = document.querySelector("body");
    var navbarToggle = document.querySelector(".dm-navbar-toggle");
    var navbarToggleSection = document.querySelector(".dm-menu");

    if(navbarToggle && navbarToggleSection){
        navbarToggle.addEventListener("click", function() {
            navbarToggle.classList.toggle("active");
            navbarToggleSection.classList.toggle("navbar-active");

            if (bodySection.hasAttribute("data-overlay")) {
                bodySection.removeAttribute("data-overlay");
            } else {
                bodySection.setAttribute("data-overlay", "true");
            }
        });
    }

    // Delete Preloader
    function deletePreloaderElement() {
        const preloaderElement = document.getElementById('preloader');

        setTimeout(() => {
            if (preloaderElement) {
                preloaderElement.remove();
            }
        }, 500);
    }

    // Scroll Gap Fix
    function scrollToTarget(targetId) {
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            const headerHeight = 90; // Adjust this value to match the height of your fixed header
            const offsetTop = targetElement.getBoundingClientRect().top + window.scrollY;

            window.scrollTo({
                top: offsetTop - headerHeight,
                behavior: 'smooth'
            });
        }
    }
    // Progress - Input Range
    const progressInputs = document.querySelectorAll('.progress');

    progressInputs.forEach(progress => {
        progress.addEventListener('input', function() {
            const value = this.value * 100; // Adjust the value to be between 0 and 100
            this.style.background = `linear-gradient(to right, var(--color-range-primary) 0%, var(--color-range-primary) ${value}%, transparent ${value}%, transparent 100%)`;
        });
    });

    // Carousel
    const scrollers = document.querySelectorAll(".scroller");

    if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
        addAnimation();
    }

    function addAnimation() {
        scrollers.forEach((scroller) => {
            scroller.setAttribute("data-animated", true);

            const scrollerInner = scroller.querySelector(".scroller__inner");
            const scrollerContent = Array.from(scrollerInner.children);

            scrollerContent.forEach((item) => {
                const duplicatedItem = item.cloneNode(true);
                duplicatedItem.setAttribute("aria-hidden", true);
                scrollerInner.appendChild(duplicatedItem);
            });
        });
    }

    // Transitions Animations
    function transitions() {
        let duration = 50;
        const preloaderElement = document.getElementById('preloader');

        if (preloaderElement) {
             duration = 300;
        }

        setTimeout(() => {

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
                    const motion = el.getAttribute('data-motion')

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

        }, duration);
    }

    //  Header Scroll Checking
    const header = document.querySelector("header");
    const scrollMargin = 200;

    function handleScroll() {
        if (window.scrollY > scrollMargin) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    }

    window.addEventListener("scroll", handleScroll);

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
            event.preventDefault();

            if (dataLog.style.display === 'none') {
                dataLog.style.display = 'block';
                logClose.style.display = 'block';
            } else {
                dataLog.style.display = 'none';
                logClose.style.display = 'none';
            }
        });
        logClose.addEventListener('click', function(event) {
            event.preventDefault();

            dataLog.style.display = 'none';
            logClose.style.display = 'none';
        });
    }
    var btnRender = document.querySelector('.btn-render');

    if (btnRender !== null) {
        btnRender.addEventListener('click', function(event) {
            var renderUrl = btnRender.getAttribute('data-href');
            event.preventDefault();
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

    // Video Controls
    const videoContainers = document.querySelectorAll(".video-container");

    videoContainers.forEach(videoContainer => {
        const playPauseBtn = videoContainer.querySelector(".play-pause-btn");
        const fullScreenBtn = videoContainer.querySelector(".full-screen-btn");
        const muteBtn = videoContainer.querySelector(".mute-btn");
        const speedBtn = videoContainer.querySelector(".speed-btn");
        const currentTimeElem = videoContainer.querySelector(".current-time");
        const totalTimeElem = videoContainer.querySelector(".total-time");
        const volumeSlider = videoContainer.querySelector(".volume-slider");
        const timelineContainer = videoContainer.querySelector(".timeline-container");
        const video = videoContainer.querySelector("video");
        const controlsContainer = videoContainer.querySelector('.video-controls-container');
        const showPlay = videoContainer.querySelector('.show-play');
        const showPause = videoContainer.querySelector('.show-pause');

        document.addEventListener("keydown", e => {
            const tagName = document.activeElement.tagName.toLowerCase();

            if (tagName === "input") return;

            switch (e.key.toLowerCase()) {
                case " ":
                    if (tagName === "button") return;
                case "k":
                    togglePlay();
                    break;
                case "f":
                    toggleFullScreenMode();
                    break;
                case "t":
                    toggleTheaterMode();
                    break;
                case "i":
                    toggleMiniPlayerMode();
                    break;
                case "m":
                    toggleMute();
                    break
                case "arrowleft":
                case "j":
                    skip(-5);
                    break;
                case "arrowright":
                case "l":
                    skip(5);
                    break;
                case "c":
                    toggleCaptions()
                    break;
            }
        })
        showPause.style.display = 'none';
        let isFirstPlay = true;

        video.addEventListener("play", () => {

            if (isFirstPlay) {
                controlsContainer.style.display = 'block';
                showPlay.style.display = 'none';
                showPause.style.display = 'flex';
                isFirstPlay = false;
            }
        });


        timelineContainer.addEventListener("mousemove", handleTimelineUpdate);
        timelineContainer.addEventListener("mousedown", toggleScrubbing);
        document.addEventListener("mouseup", e => {

            if (isScrubbing) toggleScrubbing(e);
        })
        document.addEventListener("mousemove", e => {

            if (isScrubbing) handleTimelineUpdate(e);
        })
        let isScrubbing = false;
        let wasPaused;

        function toggleScrubbing(e) {
            const rect = timelineContainer.getBoundingClientRect();
            const percent = Math.min(Math.max(0, e.x - rect.x), rect.width) / rect.width;
            isScrubbing = (e.buttons & 1) === 1
            videoContainer.classList.toggle("scrubbing", isScrubbing);

            if (isScrubbing) {
                wasPaused = video.paused;
                video.pause();
            } else {
                video.currentTime = percent * video.duration;
                if (!wasPaused) video.play();
            }
            handleTimelineUpdate(e);
        }

        function handleTimelineUpdate(e) {
            const rect = timelineContainer.getBoundingClientRect();
            const percent = Math.min(Math.max(0, e.x - rect.x), rect.width) / rect.width;
            const previewImgNumber = Math.max(
                1,
                Math.floor((percent * video.duration) / 10)
            );
        }
        speedBtn.addEventListener("click", changePlaybackSpeed);

        function changePlaybackSpeed() {
            let newPlaybackRate = video.playbackRate + 0.25;
            if (newPlaybackRate > 2) newPlaybackRate = 0.25;
            video.playbackRate = newPlaybackRate;
            speedBtn.textContent = `${newPlaybackRate}x`;
        }
        video.addEventListener("loadeddata", () => {
            totalTimeElem.textContent = formatDuration(video.duration);
        })
        video.addEventListener("timeupdate", () => {
            currentTimeElem.textContent = formatDuration(video.currentTime)
            const percent = video.currentTime / video.duration;
            timelineContainer.style.setProperty("--progress-position", percent);
        })
        const leadingZeroFormatter = new Intl.NumberFormat(undefined, {
            minimumIntegerDigits: 2,
        })
        function formatDuration(time) {
            const seconds = Math.floor(time % 60);
            const minutes = Math.floor(time / 60) % 60;
            const hours = Math.floor(time / 3600);

            if (hours === 0) {
                return `${minutes}:${leadingZeroFormatter.format(seconds)}`
            } else {
                return `${hours}:${leadingZeroFormatter.format(
                    minutes
                )}:${leadingZeroFormatter.format(seconds)}`
            }
        }
        function skip(duration) {
            video.currentTime += duration;
        }
        let lastVolume = 0.5;
        volumeSlider.value = lastVolume;

        muteBtn.addEventListener("click", toggleMute);
        volumeSlider.addEventListener("input", e => {
            video.volume = e.target.value;
            video.muted = e.target.value === 0;
            updateSliderBackground();
        });

        function toggleMute() {
            video.muted = !video.muted;

            if (video.muted) {
                lastVolume = video.volume;
                video.volume = 0;
                volumeSlider.value = 0;
                updateSliderBackground();
            } else {
                video.volume = lastVolume;
                volumeSlider.value = lastVolume;
                updateSliderBackground();
            }
        }

        video.addEventListener("volumechange", () => {
            if (!video.muted) {
                lastVolume = video.volume;
            }
            updateSliderBackground();
        });

        function updateSliderBackground() {
            const percentage = (volumeSlider.value / volumeSlider.max) * 100;
            volumeSlider.style.background = `linear-gradient(to right, var(--color-range-primary) ${percentage}%, transparent ${percentage}%)`;
            let volumeLevel;

            if (video.muted || video.volume === 0) {
                volumeSlider.value = 0;
                volumeLevel = "muted";
            } else if (video.volume >= 0.5) {
                volumeLevel = "high";
            } else {
                volumeLevel = "low";
            }

            videoContainer.dataset.volumeLevel = volumeLevel;
        }


        fullScreenBtn.addEventListener("click", toggleFullScreenMode);
        function toggleFullScreenMode() {

            if (document.fullscreenElement == null) {
                videoContainer.requestFullscreen();
            } else {
                document.exitFullscreen();
            }
        }
        document.addEventListener("fullscreenchange", () => {
            videoContainer.classList.toggle("full-screen", document.fullscreenElement)
        })

        playPauseBtn.addEventListener("click", togglePlay);

        video.addEventListener("click", togglePlay);

        showPlay.addEventListener("click", togglePlay);
        showPause.addEventListener("click", togglePlay);

        function togglePlay() {
            if (video.paused) {
                video.play();
                videoContainer.classList.remove("paused");
                const thumbnailImg = videoContainer.querySelector(".thumbnail");

                if (thumbnailImg) {
                    thumbnailImg.style.display = "none";
                }
            } else {
                video.pause();
                videoContainer.classList.add("paused");
            }
        }

        video.addEventListener("play", () => {
            videoContainer.classList.remove("paused");
        });
        video.addEventListener("pause", () => {
            videoContainer.classList.add("paused");
        });
    });

    // **************
    // Pop-Up Function
    function createPopup(content) {
        var popupElement = document.querySelector("#popup");
        if (!popupElement) {
            popupElement = document.createElement("div");
            popupElement.id = "popup";
            popupElement.classList.add("dm-popup");

            var popupContent = document.createElement("div");
            popupContent.classList.add("popup-content");

            animationHidePopup(popupContent, popupElement);

            var closeButton = document.createElement("button");
            closeButton.classList.add("popup-close-button");
            closeButton.innerHTML = "<svg data-svg-type='stroke' width='14' height='14' viewBox='0 0 14 14'><path d='M13 1L1 13M1 1L13 13' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'></path></svg>";

            closeButton.addEventListener("click", function() {
                animationHidePopup(popupContent, popupElement);
                setTimeout(function() {
                    document.body.removeChild(popupElement);
                }, 300);
            });

            let clickedElement = event.target;
            let initialElement = clickedElement;

            let slider = null;
            while (clickedElement) {
                if (clickedElement.parentElement && clickedElement.parentElement.classList.contains('slider-element')) {
                    slider = clickedElement.closest('.slider');
                    if (slider) {
                        break;
                    }
                }

                clickedElement = clickedElement.parentElement;
                if (!clickedElement) {
                    break;
                }
            }


            if (slider) {
                const clonedSlider = slider.cloneNode(true);
                popupContent.appendChild(clonedSlider);

                ['prev', 'next', 'dot-section'].forEach(className => {
                    Array.from(popupContent.getElementsByClassName(className)).forEach(element => element.remove());
                });

                const sliderElements = Array.from(clonedSlider.querySelectorAll('.slider-element'));

                const initialItemIndex = sliderElements.findIndex(el => el.outerHTML.includes(initialElement.outerHTML));

                clonedSlider.querySelectorAll("img").forEach(image => image.removeAttribute("data-popup"));

                const initialIndex = initialItemIndex !== -1 ? initialItemIndex : 0;

                initializeSlider(clonedSlider, initialIndex);
            }

            else if (initialElement && initialElement.hasAttribute('data-slider-item') && initialElement.getAttribute('data-slider-item') === 'true') {
                let sliderItemsQueryAttr = initialElement.getAttribute("data-slider-item-query-attr");
                let sliderItemsQuerySrc = initialElement.getAttribute("data-slider-items-src");

                sliderContainer = initialElement.closest(`[data-slider-container-src="${sliderItemsQuerySrc}"]`);

                if (!sliderContainer) {
                    sliderContainer = initialElement.closest('[data-slider-container-src]');
                }

                if (sliderContainer && sliderItemsQueryAttr) {
                    const sliderElements = Array.from(sliderContainer.querySelectorAll(`[data-slider-item-query-attr=${sliderItemsQueryAttr}]`));

                    slider = renderSlider(sliderElements, showArrows = true, showDots = false, showNumbers = true);

                    if (slider) {
                        slider.setAttribute("data-slider-container-src", sliderItemsQuerySrc);
                        popupContent.appendChild(slider);

                        const sliderElementNodes = Array.from(slider.querySelectorAll('.slider-element'));

                        const initialItemIndex = sliderElementNodes.findIndex(el => el.outerHTML.includes(initialElement.outerHTML));

                        initializeSlider(slider, initialItemIndex !== -1 ? initialItemIndex : 0);
                    }
                }
            }
            else {
                const elementClone = content.cloneNode(true);
                popupContent.appendChild(elementClone);
            }

            popupContent.appendChild(closeButton);
            popupElement.appendChild(popupContent);
            document.body.appendChild(popupElement);

            setTimeout(function() {
                animationShowPopup(popupContent, popupElement);
            }, 1);

            function animationShowPopup(popupContent, popupElement) {
                if (popupContent && popupElement) {
                    popupContent.setAttribute('data-motion', 'transition-fade-1');
                    popupElement.setAttribute('data-motion', 'transition-fade-1');
                }
            }

            function animationHidePopup(popupContent, popupElement) {
                if (popupContent && popupElement) {
                    popupContent.setAttribute('data-motion', 'transition-fade-0');
                    popupElement.setAttribute('data-motion', 'transition-fade-0');
                }
            }

            const popupImages = popupContent.querySelectorAll('img');
            popupImages.forEach(function (imgElement) {
                imgElement.addEventListener("click", function (event) {
                    toggleZoom(imgElement, event);
                });
            });
        }
    }


    // Popup - Zoom Function
    function toggleZoom(imageElement, event) {
        let zoomLevel = parseInt(imageElement.dataset.zoomLevel || 0);
        zoomLevel++;

        const rect = imageElement.getBoundingClientRect();
        const mouseX = event.clientX - rect.left;
        const mouseY = event.clientY - rect.top;

        imageElement.style.transformOrigin = `${(mouseX / rect.width) * 100}% ${(mouseY / rect.height) * 100}%`;

        const imgWidth = imageElement.naturalWidth;
        const imgHeight = imageElement.naturalHeight;
        const sliderElement = imageElement.closest(".slider-element");

        if (zoomLevel === 1) {
            imageElement.style.transform = "scale(1.25)";
        } else if (zoomLevel === 2) {
            imageElement.style.transform = "scale(1.5)";
        } else if (zoomLevel === 3) {
            imageElement.style.transform = "scale(2)";
        } else if (
            zoomLevel === 4 &&
            imgWidth > 1200 &&
            imgHeight > imgWidth * 1.6 &&
            imgHeight > 3000 &&
            sliderElement
        ) {
            sliderElement.classList.add("full-size");
            sliderElement.scrollLeft = (sliderElement.scrollWidth - sliderElement.clientWidth) / 2;

        } else {
            imageElement.style.transform = "scale(1)";
            zoomLevel = 0;

            if (sliderElement) {
                sliderElement.classList.remove("full-size");
            }
        }

        imageElement.dataset.zoomLevel = zoomLevel;
    }

    // Popup - Click Event Listener for Popup Creation (Delegated for all images inside slider)
    document.addEventListener("click", function(event) {
        var target = event.target;

        if (target.getAttribute("data-popup") === "true" || target.closest("[data-popup='true']")) {
            var imgElement = target.tagName.toLowerCase() === "img" ? target : target.querySelector("img");

            if (imgElement) {
                createPopup(imgElement.cloneNode());
            } else {
                createPopup(target.cloneNode(true));
            }
        }
    });

    // **************
    // Slider
    function initializeSlider(slider, startIndex = 0) {
        const slides = slider.querySelectorAll(".slider-element");
        const sliderWrapper = slider.querySelector(".slider-wrapper");
        const sliderContainer = slider.querySelector(".slider-container");
        const slideCount = slides.length;
        const navigation = slider.getAttribute("data-navigation");
        let currentIndex = startIndex;


        sliderWrapper.style.width = "100%";
        sliderContainer.style.width = `${slideCount * 100}%`;

        slides.forEach(slide => {
            slide.style.width = `${100 / slideCount}%`;
        });

        let slideIndex = startIndex;

        function goToSlide(index) {
            if (index < 0) index = slideCount - 1;
            if (index >= slideCount) index = 0;
            slideIndex = index;
            updateSlider();
        }

        function updateSlider() {
            sliderContainer.style.transform = `translateX(-${slideIndex * (100 / slideCount)}%)`;
            updateNumberText();
            updateDots();
            updateActiveSlide();
        }
        function updateActiveSlide() {
            slides.forEach((slide, index) => {
                slide.classList.toggle("active", index === slideIndex);
            });
        }

        function plusSlides(n) {
            goToSlide(slideIndex + n);
        }

        function currentSlide(n) {
            goToSlide(n);
        }

        function updateNumberText() {
            slides.forEach((slide, index) => {
                const numberText = slide.querySelector(".number-text");
                if (numberText) {
                    numberText.innerText = `${index + 1} / ${slideCount}`;
                }
            });
        }

        function updateDots() {
            const dots = slider.querySelectorAll(".dot");
            dots.forEach((dot, index) => {
                dot.classList.toggle("active", index === slideIndex);
            });
        }
        if (navigation === "arrows" || navigation === "arrows dots") {
            renderArrows(slider);
        }

        if (navigation === "dots" || navigation === "arrows dots") {
            renderDots(slider, slides);
        }

        function renderArrows(container) {
            const prevButton = document.createElement("span");
            prevButton.classList.add("prev");
            prevButton.innerHTML = "❮";
            prevButton.addEventListener("click", function () {
                plusSlides(-1);
            });
            container.appendChild(prevButton);

            const nextButton = document.createElement("span");
            nextButton.classList.add("next");
            nextButton.innerHTML = "❯";
            nextButton.addEventListener("click", function () {
                plusSlides(1);
            });
            container.appendChild(nextButton);
        }

        function renderDots(container, slides) {
            const dotSection = document.createElement("div");
            dotSection.classList.add("dot-section");
            slides.forEach((_, i) => {
                const dot = document.createElement("span");
                dot.classList.add("dot");
                if (i === 0) dot.classList.add("active");
                dot.addEventListener("click", function () {
                    currentSlide(i);
                });
                dotSection.appendChild(dot);
            });
            container.appendChild(dotSection);
        }

        goToSlide(startIndex);
    }

    const sliders = document.querySelectorAll(".slider");
    sliders.forEach(function (slider) {
        initializeSlider(slider);
    });

    function renderSlider(elements, showArrows = true, showDots = true, showNumbers = false) {
        if (!elements || !elements.length) return null;

        const navigationClasses = `${showArrows ? 'arrows' : ''}${showDots ? ' dots' : ''}`.trim();

        const slider = document.createElement("div");
        slider.classList.add("slider");
        slider.setAttribute("data-navigation", navigationClasses);

        const sliderWrapper = document.createElement("div");
        sliderWrapper.classList.add("slider-wrapper");

        const sliderContainer = document.createElement("div");
        sliderContainer.classList.add("slider-container");

        elements.forEach((element, index) => {
            const sliderElement = document.createElement("div");
            sliderElement.classList.add("slider-element");

            if (showNumbers) {
                const numberText = document.createElement("div");
                numberText.classList.add("number-text");
                numberText.textContent = `${index + 1} / ${elements.length}`;
                sliderElement.appendChild(numberText);
            }

            sliderElement.appendChild(element.cloneNode(true));
            sliderContainer.appendChild(sliderElement);
        });

        sliderWrapper.appendChild(sliderContainer);
        slider.appendChild(sliderWrapper);

        return slider;
    }

    // **************
    // Blog - See More

    var elements1 = document.querySelectorAll('.dm-blog-post-description-show');
    var elements2 = document.querySelectorAll('.dm-blog-post-section-description-show');

    elements1.forEach(function (element) {
        element.addEventListener('click', function () {
            element.previousElementSibling.classList.remove('see-more');
            element.remove();
        });
    });

    elements2.forEach(function (element) {
        element.addEventListener('click', function () {
            element.previousElementSibling.classList.remove('see-more');
            element.remove();
        });
    });

    // **************
    // Toggle Animation
    function initializeTogglers() {
        document.querySelectorAll('[data-toggle]').forEach(toggler => {
            const targetIds = toggler.getAttribute('aria-controls') ? toggler.getAttribute('aria-controls').split(' ') : [];
            const toggleType = toggler.getAttribute('data-toggle');

            targetIds.forEach(id => {
                const targetElement = document.getElementById(id);
                if (targetElement) {
                    const isExpanded = toggler.getAttribute('aria-expanded') === 'true';
                    targetElement.setAttribute('data-toggle-animation', toggleType);

                    if (isExpanded) {
                        targetElement.setAttribute('data-display', 'show');
                    } else {
                        targetElement.setAttribute('data-display', 'hide');
                    }
                }
            });

            toggler.addEventListener('click', toggleCollapse);
        });
    }

    initializeTogglers();

    const observerToggle = new MutationObserver(mutationsList => {
        mutationsList.forEach(mutation => {
            if (mutation.type === 'childList') {
                initializeTogglers();
            }
        });
    });

    observerToggle.observe(document.body, { childList: true, subtree: true });


    function toggleCollapse(event) {
        event.preventDefault();

        const toggler = event.currentTarget;
        const targetIds = toggler.getAttribute('aria-controls') ? toggler.getAttribute('aria-controls').split(' ') : [];

        const isExpanded = toggler.getAttribute('aria-expanded') === 'true';
        const newExpandedState = String(!isExpanded);

        toggler.setAttribute('aria-expanded', newExpandedState);
        const newDisplayState = newExpandedState === 'true' ? 'show' : 'hide';

        targetIds.forEach(id => {
            const targetElement = document.getElementById(id);
            if (targetElement) {
                targetElement.setAttribute('data-display', newDisplayState);
            } else {
                console.warn(`Element with id "${id}" not found.`);
            }
        });
    }

    // **************
    // Redirect Extension .html on localhost
    if (window.location.hostname === 'localhost') {
        document.querySelectorAll('a[href]').forEach(function (link) {
            let href = link.getAttribute('href');
            if (href.startsWith('#') || href.includes(':')) return;

            const [baseHref, fragment] = href.split('#');
            const lastPart = baseHref.split('/').pop();

            if (!baseHref.endsWith('.html') && !lastPart.includes('.')) {
                fetch(baseHref + '.html')
                    .then(function (htmlResponse) {
                        if (htmlResponse.ok) {
                            link.addEventListener('click', function (event) {
                                event.preventDefault();
                                window.location.href = baseHref + '.html' + (fragment ? `#${fragment}` : '');
                            });
                        } else {
                            return fetch(href);
                        }
                    })
                    .then(function (response) {
                        if (response && response.ok) {
                            link.addEventListener('click', function (event) {
                                event.preventDefault();
                                window.location.href = href;
                            });
                        }
                    })
            }
        });
    }

    // **************
    // Redirect Extension Removal for GitHub Pages (github.io)
    if (window.location.hostname.includes('github.io')) {
        document.querySelectorAll('a[href]').forEach(function (link) {
            let href = link.getAttribute('href');
            let targetBlank = link.getAttribute('target') === '_blank';

            if (href.startsWith('#') || href.includes(':')) return;

            if (href.endsWith('.html')) {
                let newHref = href.replace('.html', '');

                link.addEventListener('click', function (event) {
                    if (event.ctrlKey || event.metaKey || event.button === 1) {
                        return;
                    }

                    event.preventDefault();
                    if (targetBlank) {
                        window.open(newHref, '_blank');
                    } else {
                        window.location.href = newHref;
                    }
                });
            }
        });
    }

    // **************
    // Cookie Notice - functionality
    var cookieNotice = document.getElementById('cookie-notice');

    if (cookieNotice) {
        document.querySelector('#cookie-notice .button-accept').addEventListener('click', function() {
            cookieNotice.setAttribute('data-display', 'hide');
            setTimeout(function() {
                cookieNotice.style.display = 'none';
            }, 300);
            sessionStorage.setItem('cookieAccepted', 'true');
        });

        if (sessionStorage.getItem('cookieAccepted') === 'true') {
            cookieNotice.style.display = 'none';
            cookieNotice.setAttribute('data-display', 'hide');
        }
    }

});



