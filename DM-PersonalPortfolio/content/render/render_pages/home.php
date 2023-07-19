<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();



$renderer_sections->renderSection('about', "compress");
$renderer_sections->renderSection('categories');
$renderer_sections->renderSection('web_development_experience');
$renderer_sections->renderSection('web_development_description');


// Function Footer
$renderer_structure->footer();

?>