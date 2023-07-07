<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "visibility" => "enable",
    "post_type" => "portfolio",
    "media_path" => "brbhome",
    "title" => "BRB Home",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "This was one of the first websites I created using WordPress. The purpose of the project was to develop a presentation website aimed at promoting furniture services and enabling customers to easily get in touch with the company.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "website_url" => "www.brbhome.ro",
    "website_platform" => "Wordpress",
    "website_status" => "Done",
    "employ" => "Pia Soft Product",
    "date" => "11.2019 - 12.2019",
    "tags" => [
                "web",
                "media-web"
              ],
    "colors" => [
        "post_color_primary" => "#f7992b",
        "post_color_secondary" => "#FFFFFF",
        "post_color_background" => "#FFFFFF",
        "post_color_text_on_background" => "#FFFFFF"
    ]
];

$post_content = "";
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);

$post_content .= "<h2 id='webdevelopmentmedia' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Media Content</h2>";
$post_content .= renderGalleryWebMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>