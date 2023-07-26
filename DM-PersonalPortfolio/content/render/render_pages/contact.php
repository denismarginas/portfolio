<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();


$renderer_sections->renderSection('contact-data');
$renderer_sections->renderSection('resume-data');
$renderer_sections->renderSection('contact-details');

// Function Footer
$renderer_structure->footer();

?>