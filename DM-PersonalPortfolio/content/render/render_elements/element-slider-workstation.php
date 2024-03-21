<?php
$jsonWorkstationData = getDataJson('data-workstation', 'data');
$path = $jsonWorkstationData["setups"]["setup 1"]["path-img"];
$gallery = $jsonWorkstationData["setups"]["setup 1"]["images"]["full-setup"];
?>


<div class="slideshow">
    <div class="slideshow-container">

        <?php $totalImages = count($gallery); ?>

        <?php foreach ($gallery as $key => $img) : ?>
            <div class="mySlides fade">
                <div class="numbertext"><?php echo ($key + 1) . " / " . $totalImages; ?></div>
                <?php echo renderImage($GLOBALS['urlPath']."content/img/".$path."/".$img, true);?>
            </div>
        <?php endforeach; ?>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    </div>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</div>
