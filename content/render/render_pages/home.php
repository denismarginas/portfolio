<?php

$seo = getSeoFromCurrentPageData(pathinfo(basename(__FILE__), PATHINFO_FILENAME));

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('about', "compress");
$renderer_sections->renderSection('categories');
$renderer_sections->renderSection('work-experience');
$renderer_sections->renderSection('carousel-post-items', "compress");


// Function Footer
$renderer_structure->footer();

?>