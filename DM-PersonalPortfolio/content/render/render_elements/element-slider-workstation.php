<div class="slideshow">
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/pc_setup_1.webp", true);?>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/pc_setup_2.webp", true);?>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/pc_setup_3.webp", true);?>
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>
