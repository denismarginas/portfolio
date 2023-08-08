<?php

$seo = [
    "title" => "Denis Marginas - Search",
    "description" => "Search items in the website.",
    "keywords" => "denis marginas",
    "slug" => "search"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);




// Function Footer
$renderer_structure->footer();

?>