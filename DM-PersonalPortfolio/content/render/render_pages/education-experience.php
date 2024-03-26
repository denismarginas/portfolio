<?php


$seo = [
    "title" => "Education Experience | Denis Marginas",
    "description" => "Discover my educational journey from high school to university, including courses and diplomas attained along the way.",
    "keywords" => "denis marginas education experience",
    "slug" => "education-experience"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('education-list');


// Function Footer
$renderer_structure->footer();

?>