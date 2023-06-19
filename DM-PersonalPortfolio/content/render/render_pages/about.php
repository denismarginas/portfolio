<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();



$renderer_sections->renderSection('about', "standard");
$renderer_sections->renderSection('portfolio-showcase');


// Function Footer
$renderer_structure->footer();

?>