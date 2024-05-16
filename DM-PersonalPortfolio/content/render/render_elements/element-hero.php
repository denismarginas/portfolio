<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}

if(!isset($hero_title)) {
    $hero_title = "Title";
}
if(!isset($hero_bg_img_path)) {
    $hero_bg_img_path = "placeholder";
}
if(!isset($hero_bg_img)) {
    $hero_bg_img = "img-placeholder.webp";
}

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

    <h2 data-motion="transition-fade-0 transition-blur-0 transition-slideInBottom-0" data-duration="0.5s" data-delay="0.2s">
        <?php echo $hero_title; ?>
    </h2>

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

</div>

