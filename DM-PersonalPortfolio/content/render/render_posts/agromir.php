<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "post_type" => "portfolio",
    "media_path" => "agromir",
    "title" => "Agromir",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "The online shop for tools, industrial equipment tires, tractor tires is made in Prestashop 1.7. The products cannot be added to the cart, but there are 3 buttons to contact by phone for the product and 1 button to contact by email. The contact form was created by editing TPL, HTML, CSS, and an iframe with a WordPress page with the Contact Form 7 module. The site has implemented modules from Prestashop Addons such as JoliSearch, Amazing gallery and other modules purchased or adapted free of charge for the site. A button is displayed to contact via Whatsapp for products through a module that has been modified via JS to display various texts at a certain time.",
    "category" => [
                    "Web Development Projects",
                    "Visual Media Projects"
                  ],
    "website_url" => "www.agromir.ro",
    "website_platform" => "Prestashop",
    "website_status" => "Done",
    "media_facebook_url" => "https://www.facebook.com/cauciucuriagricole",
    "media_instagram_url" => "https://www.instagram.com/agromir_insta/",
    "employ" => "Pia Soft Product",
    "date" => "2020-2022",
    "tags" => [
                "web",
                "photo",
                "video",
              ],
    "colors" => [
        "post_color_primary" => "#72b334",
        "post_color_secondary" => "#FFFFFF",
        "post_color_background" => "#183243",
        "post_color_text_on_background" => "#FFFFFF"
    ]
];
$post_content = "";
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);

$post_content .= "<h2 id='visualmediaprojects' class='dm-post-title-category'>Visual Media Projects</h2>";
$post_content .= renderGalleryMedia($post_data);
$post_content .= renderVideoMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>