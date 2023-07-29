<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();



$renderer_sections->renderSection('experience-knowledge', "compress");
$renderer_sections->renderSection('summary-experience');

// Function Footer
$renderer_structure->footer();

?>