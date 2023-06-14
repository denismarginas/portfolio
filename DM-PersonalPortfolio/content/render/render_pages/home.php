<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();



$renderer_sections->section_about();
$renderer_sections->section_categories();
$renderer_sections->section_web_development_experience();
$renderer_sections->section_web_development_description();



// Function Footer
$renderer_structure->footer();

?>