<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

$nr_filters = 0;

if(!isset($jsonFiltersData)) :
    $jsonFiltersData = getDataJson('data-posts-projects-filter-fields', 'data');
    $nr_filters = count($jsonFiltersData);
endif;

$theme_path = $GLOBALS['urlPath'].$jsonGlobalData["themes-path"]."/".$jsonGlobalData["theme-active"]["dir-name"];

?>


<script src="<?php echo $theme_path ;?>/js/content-posts-projects-data-search.js"></script>

<form id="post-list-sort-and-search"
      data-filters-number="<?php echo $nr_filters; ?>"
      data-filters-divisible="<?php echo listDesign($nr_filters); ?>"
      data-motion="transition-fade-0" data-duration="0.8s" data-delay="0.1s">
</form>
