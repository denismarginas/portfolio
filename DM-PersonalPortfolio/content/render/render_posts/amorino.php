<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "visibility" => "enable",
    "post_type" => "portfolio",
    "media_path" => "amorino",
    "title" => "Amorino",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "
The website, specializing in selling dresses for girls, is built using Prestashop 1.7. Customers have the option to make payments using their cards through the PayU module. To create the contact form, I customized TPL, HTML, and CSS elements, and integrated an iframe with a WordPress page, utilizing the Contact Form 7 module.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "website_url" => "www.amorino.ro",
    "website_platform" => "Prestashop",
    "website_status" => "Done",
    "employ" => "Pia Soft Product",
    "date" => "03.2020 - 10.2020",
    "tags" => [
                "web",
                "media-web"
              ],
    "colors" => [
        "post_color_primary" => "#ffb8ce",
        "post_color_secondary" => "#222222",
        "post_color_background" => "#ffb8ce",
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