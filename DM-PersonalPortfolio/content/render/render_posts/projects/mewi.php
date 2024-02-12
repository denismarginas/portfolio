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
$post_content .= "I added a search bar to the menu with the Advanced Search and Mega Menu modules. The results of the search are showing live with ajax through the Advanced Search module, which has been modified in its files so that it doesn't display the type of the item found and some elements were translated in Romanian.";
$post_content .=  "</div>";
$post_content .= "<div class='dm-post-image' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>".renderImage( $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/web/maintenance-website/search/web-search.webp", true)."</div>";

$post_content .= "<div class='dm-post-title-description' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>";
$post_content .= "In the section below are HTML and CSS newsletter templates. These were made by receiving images, a DOCX document with the text and links it should contain. Images were uploaded to the site host via FileZilla and cPanel to work globally.";
$post_content .=  "</div>";
$post_content .= renderGalleryWebContent($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>