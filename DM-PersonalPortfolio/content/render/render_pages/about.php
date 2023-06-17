<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();



$renderer_sections->renderSection('about', "standard");



// Function Footer
$renderer_structure->footer();

?>