<?php

$seo = [
    "title" => "Visual Media Projects | Denis Marginas",
    "description" => "Category: Visual Media Projects. Collection of visually captivating projects showcasing my expertise in graphic design, photo editing, and video production.",
    "keywords" => "denis marginas visual media projects",
    "slug" => "visual-media-projects"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('hero', "compress-waves",
    ["filename" => pathinfo(basename(__FILE__), PATHINFO_FILENAME)]
);

$renderer_sections->renderSection('post-items-media');


// Function Footer
$renderer_structure->footer();

?>