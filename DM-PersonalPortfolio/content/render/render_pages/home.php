<?php

$seo = [
    "title" => "Portfolio | Denis Marginas",
    "description" => "My name is Denis Ionut Marginas, I'm 25-year-old, and I've been working as a full-stack web developer and photo-video editor since 2019. Before entering the web development field, I worked as a freelance video editor, specializing in editing videos for video games.",
    "keywords" => "denis marginas",
    "slug" => "home"
];


$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);



$renderer_sections->renderSection('about', "compress");
$renderer_sections->renderSection('categories');
$renderer_sections->renderSection('web_development_experience');
$renderer_sections->renderSection('web_development_description');



// Function Footer
$renderer_structure->footer();

?>