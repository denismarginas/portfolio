<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$categories = ["Web Development Projects", "Visual Media Projects", "Miscellaneous Projects"];


$renderer_sections->renderSection('categories');
$renderer_sections->renderSection('post-items-media');


// Function Footer
$renderer_structure->footer();

?>