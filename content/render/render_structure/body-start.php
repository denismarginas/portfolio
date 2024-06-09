<?php 

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

?>


<div id="page-content">

    <?php if( isset($jsonGlobalData["theme-active"]["preloader"]) &&
              $jsonGlobalData["theme-active"]["preloader"] == "true") :

              $renderer = new RendererElements();
              $renderer->renderElement("animation-preloader");
    endif; ?>
