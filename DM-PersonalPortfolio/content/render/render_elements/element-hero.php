<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($hero_title)) :
    $hero_title = "Title";
endif;

if(!isset($hero_bg_img_path)) :
    $hero_bg_img_path = "placeholder";
endif;

if(!isset($hero_bg_img)) :
    $hero_bg_img = "img-placeholder.webp";
endif;

if(!isset($layout)) :
    $layout = "standard";
endif;

?>

<div class="dm-hero-block"

    <?php if(isset($layout) && !empty($layout)) : ?>
        data-layout="<?php echo $layout; ?>"
    <?php endif; ?>

     data-motion="transition-fade-0" data-duration="0.3s" data-delay="0s">

    <?php if(isset($hero_bg_img_path) && isset($hero_bg_img)) : ?>
        <div class="dm-hero-bg" data-motion="transition-blur-0" data-duration="0.3s" data-delay="0"
        style="background-image: url('<?php echo $GLOBALS['urlPath'] . "content/img/" . $hero_bg_img_path . "/" . $hero_bg_img; ?>');">
        </div>
    <?php endif; ?>

    <?php if(isset($hero_title) and !empty($hero_title)): ?>
        <h2 data-motion="transition-fade-0 transition-blur-0 transition-slideInBottom-0" data-duration="0.5s" data-delay="0.2s">
            <?php echo $hero_title; ?>
        </h2>
    <?php endif;?>

    <?php if(isset($hero_description) and !empty($hero_description)): ?>
        <p data-motion="transition-fade-0 transition-blur-0 transition-slideInBottom-0" data-duration="0.6s" data-delay="0.25s">
            <?php echo $hero_description; ?>
        </p>
    <?php endif;?>


    <?php if($layout == "compress-squares") : ?>
        <!-- Circle Animation Start -->
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <!-- Circle Animation End -->
    <?php endif; ?>

    <?php if($layout == "compress-waves") : ?>
        <!-- Ocean Animation Start -->

        <div class="ocean" data-motion="transition-fade-0" data-duration="4s" data-delay="0s">
            <div class="wave" style="margin-top: 65px;"></div>
            <div class="wave" style="margin-top: 70px;"></div>
            <div class="wave" style="margin-top: 80px;"></div>
        </div>

        <!-- Ocean Animation End -->
    <?php endif; ?>

</div>

