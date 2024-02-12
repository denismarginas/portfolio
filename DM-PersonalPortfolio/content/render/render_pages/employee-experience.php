<?php


$seo = [
    "title" => "Employee Experience | Denis Marginas",
    "description" => "Explore my professional journey through my employ experience, where I showcase a chronological record of my employment history. Discover insights into my roles, responsibilities, and significant contributions at various companies, along with dates and key attributes.",
    "keywords" => "denis marginas employee experience",
    "slug" => "employee-experience"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('job-list');


// Function Footer
$renderer_structure->footer();

?>