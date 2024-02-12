<?php

$post_data = getCurrentPostProjectData(pathinfo(__FILE__, PATHINFO_FILENAME));
$seo = getSeoFromCurrentPostProjectData($post_data);


$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);

$post_content = "";
$post_content .= "<h2 id='visualmediaprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Visual Media Projects</h2>";
$post_content .= renderGalleryMedia($post_data);
$post_content .= renderVideoMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>