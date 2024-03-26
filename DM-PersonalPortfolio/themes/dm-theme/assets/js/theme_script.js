// Page Loaded
document.addEventListener("DOMContentLoaded", function() {

    function addJavaScriptAttribute() {
        document.body.setAttribute('java-script', 'true');
    }
    addJavaScriptAttribute();
    transitions();

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

    function transitions() {
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


        }, 50);
    }


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
            const tagName = document.activeElement.tagName.toLowerCase()
            if (tagName === "input") return
            switch (e.key.toLowerCase()) {
                case " ":
                    if (tagName === "button") return
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
        muteBtn.addEventListener("click", toggleMute);
        volumeSlider.addEventListener("input", e => {
            video.volume = e.target.value;
            video.muted = e.target.value === 0;
        })
        function toggleMute() {
            video.muted = !video.muted;
        }
        video.addEventListener("volumechange", () => {
            volumeSlider.value = video.volume;
            let volumeLevel;
            if (video.muted || video.volume === 0) {
                volumeSlider.value = 0
                volumeLevel = "muted";
            } else if (video.volume >= 0.5) {
                volumeLevel = "high";
            } else {
                volumeLevel = "low";
            }

            videoContainer.dataset.volumeLevel = volumeLevel;
        })
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
        video.addEventListener("touchend", () => {togglePlay();});

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
    // Pop-Up
    function createPopup(content) {
        var popupElement = document.querySelector("#popup");
        if (!popupElement) {
            popupElement = document.createElement("div");
            popupElement.id = "popup";
            popupElement.classList.add("dm-popup");

            var popupContent = document.createElement("div");
            popupContent.classList.add("popup-content");

            var closeButton = document.createElement("button");
            closeButton.classList.add("popup-close-button");
            closeButton.textContent = "Close";
            closeButton.addEventListener("click", function() {
                document.body.removeChild(popupElement);
            });

            popupContent.appendChild(content);
            popupContent.appendChild(closeButton);
            popupElement.appendChild(popupContent);
            document.body.appendChild(popupElement);

            content.addEventListener("click", function() {
                toggleZoom(this);
            });
        }
    }
    var zoomLevel = 0;

    function toggleZoom(imageElement) {
        zoomLevel++;
        if (zoomLevel === 1) {
            imageElement.style.transform = "scale(1.5)";
        } else if (zoomLevel === 2) {
            imageElement.style.transform = "scale(2)";
        } else if (zoomLevel === 3) {
            imageElement.style.transform = "scale(3)";
        } else {
            imageElement.style.transform = "scale(1)";
            zoomLevel = 0;
        }
    }



    document.addEventListener("click", function(event) {
        var target = event.target;
        if (target.getAttribute("data-popup") === "true") {
            if (target.tagName.toLowerCase() === "img") {
                createPopup(target.cloneNode());
            } else {
                var imgElement = target.querySelector("img");
                if (imgElement) {
                    createPopup(imgElement.cloneNode());
                } else {
                    createPopup(target.cloneNode(true));
                }
            }
        }
    });
    
    // **************
    // Slider
    const sliders = document.querySelectorAll('.slider');
    sliders.forEach(function(slider) {
        let slideIndex = 1;
        const navigation = slider.getAttribute('data-navigation');
        const slides = slider.querySelectorAll('.slider-element');

        if (navigation === 'arrows' || navigation === 'arrows dots') {
            renderArrows(slider);
            let arrows = true;
        } else  {
            let arrows = false;
        }
        if (navigation === 'dots' || navigation === 'arrows dots') {
            renderDots(slider, slides);
            let dots = true;
        } else  {
            let dots = false;
        }

        showSlides(slider, slideIndex);

        function showSlides(container, n) {
            let i;
            let slidesItems = slider.querySelectorAll(".slider-element");
            let dots = slider.querySelectorAll(".dot");

            if (slidesItems.length === 0) {
                return;
            }

            if (n > slidesItems.length) {
                slideIndex = 1;
            } else if (n < 1) {
                slideIndex = slidesItems.length;
            } else {
                slideIndex = n;
            }

            for (i = 0; i < slidesItems.length; i++) {
                slidesItems[i].style.display = "none";
            }

            for (i = 0; i < dots.length; i++) {
                dots[i].classList.remove("active");
            }

            slidesItems[slideIndex - 1].style.display = "block";

            if (dots === true) {
                dots[slideIndex - 1].classList.add("active");
            }
        }

        function plusSlides(n, sliderIndex) {
            showSlides(sliders[sliderIndex], slideIndex + n);
        }

        function currentSlide(n, sliderIndex) {
            showSlides(sliders[sliderIndex], n);
        }

        function renderArrows(container) {
            const prevButton = document.createElement('a');
            prevButton.classList.add('prev');
            prevButton.innerHTML = '❮';
            prevButton.addEventListener('click', function() {
                plusSlides(-1);
            });
            container.appendChild(prevButton);

            const nextButton = document.createElement('a');
            nextButton.classList.add('next');
            nextButton.innerHTML = '❯';
            nextButton.addEventListener('click', function() {
                plusSlides(1);
            });
            container.appendChild(nextButton);
        }

        function renderDots(container, slides) {
            const dotSection = document.createElement('div');
            dotSection.classList.add('dot-section');
            for (let i = 0; i < slides.length; i++) {
                const dot = document.createElement('span');
                dot.classList.add('dot');
                dot.addEventListener('click', function() {
                    currentSlide(i + 1);
                });
                dotSection.appendChild(dot);
            }
            container.appendChild(dotSection);
        }
    });



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






});


//Contact Form
function contact_form_exec() {
    var buttonDiv = document.querySelector('#dm-form-button').parentNode;
    var statusMessageSpan = document.querySelector('#dm-send-status');

    if (!statusMessageSpan) {
        statusMessageSpan = document.createElement('span');
        statusMessageSpan.id = 'dm-send-status';
        statusMessageSpan.innerHTML = 'The form is inactive. Use the <a target="_blank" href="https://forms.gle/vTHeLVkc1TwXCxBJA"><b>Google Form:</b> forms.gle/vTHeLVkc1TwXCxBJA</a>';
        buttonDiv.appendChild(statusMessageSpan);
    }
    return false;
}


