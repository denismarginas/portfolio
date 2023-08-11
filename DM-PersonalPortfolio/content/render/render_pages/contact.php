<?php

$seo = [
    "title" => "Contact | Denis Marginas",
    "description" => "You can reach me by phone on WhatsApp or through my personal email address. Contact details are provided in the section below.",
    "keywords" => "denis marginas contact",
    "slug" => "contact"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('contact-data');
$renderer_sections->renderSection('resume-data');
$renderer_sections->renderSection('contact-details');

// Function Footer
$renderer_structure->footer();

?>