<?php

$seo = getSeoFromCurrentPageData(pathinfo(basename(__FILE__), PATHINFO_FILENAME));

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('experience-knowledge', "standard");
$renderer_sections->renderSection('categories');
$renderer_sections->renderSection('portfolio-showcase');
$renderer_sections->renderSection('carousel-post-items',"standard");
$renderer_sections->renderSection('web-development-description');


// Function Footer
$renderer_structure->footer();

?>