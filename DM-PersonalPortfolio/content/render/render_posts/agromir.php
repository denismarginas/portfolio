<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "agromir",
    "title" => "Agromir",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "The online shop for tools, industrial equipment tires, tractor tires is made in Prestashop 1.7. The products cannot be added to the cart, but there are 3 buttons to contact by phone for the product and 1 button to contact by email. The contact form was created by editing TPL, HTML, CSS, and an iframe with a WordPress page with the Contact Form 7 module. The site has implemented modules from Prestashop Addons such as JoliSearch, Amazing gallery and other modules purchased or adapted free of charge for the site. A button is displayed to contact via Whatsapp for products through a module that has been modified via JS to display various texts at a certain time.",
    "categories" => [
                    "Web Development Projects",
                    "Visual Media Projects"
                  ],
    "web_url" => "www.agromir.ro",
    "web_platform" => [
                [
                    "name" => "Prestashop",
                    "svg" => "prestashop"
                ]
    ],
    "web_languages" => [
        [
            "name" => "HTML",
            "svg" => "html"
        ],
        [
            "name" => "CSS",
            "svg" => "css"
        ],
        [
            "name" => "JS",
            "svg" => "js"
        ],
        [
            "name" => "SQL",
            "svg" => "sql"
        ],
		[
            "name" => "PHP",
            "svg" => "php"
        ],
        [
            "name" => "TPL",
            "svg" => "tpl"
        ]
    ],
    "web_plugins" => [
        [
            "name" => "Creative Elements - Elementor Website Builder",
            "svg" => "elementor"
        ],
        [
            "name" => "ETS Contact Form 7",
            "svg" => "ctf7"
        ],
        [
            "name" => "Pretty URLs",
            "svg" => "prettyurls"
        ],
        [
            "name" => "Joli Search - advanced visual search",
            "svg" => "jolisearch"
        ],
        [
            "name" => "Facebook Pixel Products Feed",
            "svg" => "fbpixelproductsfeed"
        ],
        [
            "name" => "Google Merchant Center Feed",
            "svg" => "googlemerchantcenterfeed"
        ]
    ],
    "web_development_project" => "Done",
    "media_facebook_url" => "https://www.facebook.com/cauciucuriagricole",
    "media_instagram_url" => "https://www.instagram.com/agromir_insta/",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "02.2020",
        "date_end" => "11.2022"
    ],
    "tags" => [
                "web",
                "media-web",
                "photo",
                "video"
    ],
    "colors" => [
                "post_color_primary" => "#72b334",
                "post_color_secondary" => "#FFFFFF",
                "post_color_background" => "#183243",
                "post_color_text_on_background" => "#FFFFFF"
    ]
];
$post_content = "";
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);
$post_content .= "<h2 id='webdevelopmentmedia' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Media Content</h2>";
$post_content .= renderGalleryWebMedia($post_data);

$post_content .= "<h2 id='visualmediaprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Visual Media Projects</h2>";
$post_content .= "<div class='dm-post-details-grid'>";
$post_content .= "<div class='dm-post-logo-details' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>".renderImage( $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$post_data["logo"])."</div>";
$post_content .= "<div class='dm-post-title-description' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>";
$post_content .= renderTextVisualMediaPost($post_data["post_type"],$post_data["media_path"], "tags");
$post_content .=  "</div>";
$post_content .= "</div>";
$post_content .= renderGalleryMedia($post_data);
$post_content .= renderVideoMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>