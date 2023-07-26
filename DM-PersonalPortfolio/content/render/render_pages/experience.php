<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$renderer_sections->renderSection('experience-knowledge', "standard");
$renderer_sections->renderSection('categories');
$renderer_sections->renderSection('portfolio-showcase');



// Function Footer
$renderer_structure->footer();

?>