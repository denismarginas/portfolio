<?php

$seo = [
    "title" => "Summary Work Experience | Denis Marginas",
    "description" => "Experience a captivating journey through my professional work from 2019 to 2023 in this short resume of projects.",
    "keywords" => "denis marginas summary experience",
    "slug" => "summary-experience"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);

$renderer_sections->renderSection('summary-experience');

// Function Footer
$renderer_structure->footer();

?>