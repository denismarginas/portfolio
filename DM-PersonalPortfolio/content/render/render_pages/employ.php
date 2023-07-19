<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();


$renderer_sections->renderSection('employ-list');



// Function Footer
$renderer_structure->footer();

?>