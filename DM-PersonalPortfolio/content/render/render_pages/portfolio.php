<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();


$renderer_sections->renderSection('categories');
$renderer_sections->renderSection('post-items');


// Function Footer
$renderer_structure->footer();

?>