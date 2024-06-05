<?php

$seo = [
    "title" => "Miscellaneous Projects | Denis Marginas",
    "description" => "Category: Miscellaneous Projects. Assortment of non-profit initiatives and personal passion projects, reflecting my diverse range of creative endeavors.",
    "keywords" => "denis marginas miscellaneous projects",
    "slug" => "miscellaneous-projects"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('hero', "compress-waves",
    ["filename" => pathinfo(basename(__FILE__), PATHINFO_FILENAME)]
);
$renderer_sections->renderSection('post-items-miscellaneous');


// Function Footer
$renderer_structure->footer();

?>