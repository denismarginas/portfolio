<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jsonGlobalSeo)) :
    $jsonGlobalSeo = getDataJson('data-seo', 'data');
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

$renderer = new RendererElements();
isset($filename) ? $renderer->renderElement('hero', $layout, getDataHero($filename)) : $renderer->renderElement('hero');

?>