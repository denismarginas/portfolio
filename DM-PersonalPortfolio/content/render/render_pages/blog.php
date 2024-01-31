<?php

$seo = [
    "title" => "Blog | Denis Marginas",
    "description" => "Dive into the world of a full-stack web developer and skilled photo-video editor. Explore the intersection of web development and visual storytelling on Denis Ionut Marginas's insightful blog",
    "keywords" => "denis marginas blog",
    "slug" => "blog"
];


$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);



$renderer_sections->renderSection('blog-header');
$renderer_sections->renderSection('blog-posts');



// Function Footer
$renderer_structure->footer();

?>