<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "visibility" => "enable",
    "post_type" => "portfolio",
    "media_path" => "ambalajelavplast",
    "title" => "Ambalaje Lavplast",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "The online shop, built on Prestashop 1.7, offers a wide range of products. Customers can conveniently make payments using their cards through the MobilPay module. To create the contact form, I edited TPL, HTML, and CSS, and integrated an iframe with a WordPress page utilizing the Contact Form 7 module.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "website_url" => "www.ambalaje-lavplast.ro",
    "website_platform" => "Prestashop",
    "website_status" => "Done",
    "employ" => "Pia Soft Product",
    "date" => "08.2020-11.2022",
    "tags" => [
                "web",
                "media-web"
              ],
    "colors" => [
        "post_color_primary" => "#2a5778",
        "post_color_secondary" => "#FFFFFF",
        "post_color_background" => "#2a5778",
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