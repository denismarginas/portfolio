<?php

$seo = [
    "title" => "Projects | Denis Marginas",
    "description" => "Showcase of projects I have created or I was involved, featuring designs and functionality of media content and websites.",
    "keywords" => "denis marginas projects",
    "slug" => "projects"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('hero', "compress-waves",
    ["filename" => pathinfo(basename(__FILE__), PATHINFO_FILENAME)]
);
$renderer_sections->renderSection('post-items');


// Function Footer
$renderer_structure->footer();

?>