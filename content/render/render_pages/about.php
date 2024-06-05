<?php

$seo = [
    "title" => "About | Denis Marginas",
    "description" => "My name is Denis Ionut Marginas, I'm 25-year-old, and I've been working as a full-stack web developer and photo-video editor since 2019. Before entering the web development field, I worked as a freelance video editor, specializing in editing videos for video games.",
    "keywords" => "denis marginas",
    "slug" => "about"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('about', "standard");



// Function Footer
$renderer_structure->footer();

?>