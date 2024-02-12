<?php

$post_data = getCurrentPostProjectData(pathinfo(__FILE__, PATHINFO_FILENAME));
$seo = getSeoFromCurrentPostProjectData($post_data);


$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);

$post_content = "";
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);

$post_content .= "<div class='dm-post-title-description' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>";
$post_content .= "Redirect of the domain alpin57lux.com to vreaualpin.ro";
$post_content .=  "</div>";
$post_content .= "<div class='dm-post-image' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>".renderImage( $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/web/maintenance-website/alpinlux57/desktop/web-redirect.webp", true)."</div>";



$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>