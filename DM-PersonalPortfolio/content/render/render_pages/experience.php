<?php

$seo = [
    "title" => "Experience | Denis Marginas",
    "description" => "Experience a captivating journey through my professional work from 2019 to 2023 in this short video. From a captivating intro to web development, photo editing, and video editing, witness my diverse expertise in just under two minutes.",
    "keywords" => "denis marginas experience",
    "slug" => "experience"
];


$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);

$renderer_sections->renderSection('experience-knowledge', "standard");
$renderer_sections->renderSection('categories');
$renderer_sections->renderSection('portfolio-showcase');
$renderer_sections->renderSection('carousel-post-items',"standard");
$renderer_sections->renderSection('web-development-description');


// Function Footer
$renderer_structure->footer();

?>