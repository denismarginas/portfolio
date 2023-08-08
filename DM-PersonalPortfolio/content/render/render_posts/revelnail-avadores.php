<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "revelnail-avadores",
    "title" => "Revel Nail - Avadores",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "The online shop for powders, liquids and other nail accessories is made in Prestashop 1.6. On this website, the products are supplied by Revel Nail and sold by Avadores under the name Revel Nail Romania on the Romanian market. It has a shortcut module that has been modified by TPL to display a Facebook login button. Payment can be made with the card through the MobilPay module, which has also been modified by TPL and PHP to deactivate the payment method of this module for some products.",
    "categories" => [
                    "Web Development Projects",
                    "Visual Media Projects"
                  ],
    "web_url" => "www.revelnail.ro",
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
            "name" => "Facebook Pixel Products Feed",
            "svg" => "fbpixelproductsfeed"
        ],
        [
            "name" => "Google Merchant Center Feed",
            "svg" => "googlemerchantcenterfeed"
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
    "media_facebook_url" => "https://www.facebook.com/revelromania",
    "media_instagram_url" => "https://www.instagram.com/revelnailromania1/",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "11.2019",
        "date_end" => "11.2022"
    ],
    "tags" => [
                "web",
                "media-web",
                "content-web",
                "photo",
                "video"
    ],
    "colors" => [
                "post_color_primary" => "#f121a5",
                "post_color_secondary" => "#FFFFFF",
                "post_color_background" => "#f121a5",
                "post_color_text_on_background" => "#FFFFFF"
    ]
];
$seo = [
    "title" => "Denis Marginas - " . $post_data["title"],
    "description" => $post_data["description"],
    "keywords" => $post_data["media_path"],
    "slug" => $post_data["media_path"]
];


$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);

$post_content = "";
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);
$post_content .= renderGalleryWebContent($post_data);

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