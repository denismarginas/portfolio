<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "visibility" => "enable",
    "post_type" => "portfolio",
    "media_path" => "boneamed",
    "title" => "AXA Company",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "This project involved creating a clinic website with appointment booking functionality. I used the Booked module in a WordPress website. Clients can book appointments with specific doctors, and doctors can access, edit, and add appointments.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "website_url" => "www.boneamed.ro",
    "website_platform" => "Wordpress",
    "website_status" => "Done",
    "employ" => "Pia Soft Product",
    "date" => "06.2021 - 06.2022",
    "tags" => [
                "web",
                "media-web"
              ],
    "colors" => [
        "post_color_primary" => "#02aeae",
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