<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

$theme_path = $GLOBALS['urlPath'].$jsonGlobalData["themes-path"]."/".$jsonGlobalData["theme-active"]["dir-name"];

?>


<script src="<?php echo $theme_path ;?>/js/content-posts-projects-data-search.js"></script>

<form id="post-list-sort-and-search" data-motion="transition-fade-0" data-duration="0.8s" data-delay="0.1s">
</form>
