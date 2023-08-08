<?php

$seo = [
    "title" => "Denis Marginas - Personal Workstation",
    "description" => "Welcome to my personal workstation page! This is the hub of my productivity, where I tackle work projects and pursue personal endeavors.",
    "keywords" => "denis marginas workstation",
    "slug" => "workstation"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('workstation-header');
$renderer_sections->renderSection('workstation-configuration');
$renderer_sections->renderSection('workstation-accessories');
$renderer_sections->renderSection('workstation-video');


// Function Footer
$renderer_structure->footer();

?>