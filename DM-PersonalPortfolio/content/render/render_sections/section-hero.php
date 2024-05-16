<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}
if(!isset($jsonGlobalSeo)) {
    $jsonGlobalSeo = getDataJson('data-seo', 'data');
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
if(!isset($layout)) {
    $layout = "standard";
}
$renderer = new RendererElements();
isset($filename) ? $renderer->renderElement('hero', $layout, getDataHero($filename)) : $renderer->renderElement('hero');

?>