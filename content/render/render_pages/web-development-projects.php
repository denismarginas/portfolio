<?php

$seo = getSeoFromCurrentPageData(pathinfo(basename(__FILE__), PATHINFO_FILENAME));

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);


$renderer_sections->renderSection('hero', "compress-waves",
    ["filename" => pathinfo(basename(__FILE__), PATHINFO_FILENAME)]
);
$renderer_sections->renderSection('post-items-web');


// Function Footer
$renderer_structure->footer();

?>