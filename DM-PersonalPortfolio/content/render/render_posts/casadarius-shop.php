<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "casadarius-shop",
    "title" => "Casa Darius",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "The online shop for furniture is made in Prestashop 1.7 with integrated payment method, via MobilPay. The products cannot be added to the cart, but there are buttons to contact via phone for the specific store location. It have more than 30 new products with around 8-10 edited photos, products added in an empty room with pot decorations. ",
    "categories" => [
        "Web Development Projects",
        "Visual Media Projects"
    ],
    "web_url" => "www.casadarius.ro",
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
            "name" => "Magic Zoom Plus",
            "svg" => "magiczoomplus"
        ],
        [
            "name" => "Cron Jobs",
            "svg" => "cronjobs"
        ],
        [
            "name" => "Facebook Pixel Products Feed",
            "svg" => "fbpixelproductsfeed"
        ]
    ],
    "web_development_project" => "Done",
    "media_platforms" => [
        [
            "name" => "Photopea",
            "svg" => "photopea"
        ],
        [
            "name" => "Xara Photo & Graphic Designer",
            "svg" => "xaraphoto"
        ],
        [
            "name" => "Paint.net",
            "svg" => "paintnet"
        ],
      [
        "name" => "Sony Vegas",
        "svg" => "sv"
      ],
      [
        "name" => "After Effects",
        "svg" => "ae"
      ],
    ],
    "media_facebook_url" => "https://www.facebook.com/casadariuscluj/",
    "media_instagram_url" => "https://www.instagram.com/casadariusturda/",
    "media_custom" => [
        [
            "title" => "Facebook 1: ",
            "url" => "https://www.facebook.com/CanapeleTurda/"
        ],
        [
            "title" => "Facebook 2: ",
            "url" => "https://www.instagram.com/casadariusturda/"
        ],
        [
            "title" => "Instagram 1: ",
            "url" => "https://www.instagram.com/casadariusturda/"
        ],
        [
            "title" => "Instagram 2: ",
            "url" => "https://www.instagram.com/casadariusludus/"
        ]
    ],
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "07.2020",
        "date_end" => "11.2022"
    ],
    "tags" => [
                "web",
                "media-web",
                "photo",
                "video"
              ],
    "colors" => [
        "post_color_primary" => "#ccb06a",
        "post_color_secondary" => "#1b1b1b",
        "post_color_background" => "#ccb06a",
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