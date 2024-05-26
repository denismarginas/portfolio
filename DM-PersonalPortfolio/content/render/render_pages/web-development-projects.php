<?php

$seo = [
    "title" => "Web Development Projects | Denis Marginas",
    "description" => "Category: Web Development Projects. Showcase of websites and online shops I have created, featuring engaging designs and seamless functionality.",
    "keywords" => "denis marginas web development projects",
    "slug" => "web-development-projects"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('hero', "compress-waves",
    ["filename" => pathinfo(basename(__FILE__), PATHINFO_FILENAME)]
);

$renderer_sections->renderSection('post-items-web');


// Function Footer
$renderer_structure->footer();

?>