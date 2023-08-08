<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "agramix",
    "title" => "Agramix",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "The online shop for tools, machine parts, agricultural and industrial equipment is made in Prestashop 1.7. The theme on which the site was built has been changed a lot in appearance through HTML, CSS, JS. For products that cannot be ordered, 2 buttons have been created: one to call for the product and another to send an email to request information about the product. The contact form was created by editing TPL, HTML, CSS, and an iframe with a WordPress page with the Contact Form 7 module. The products on the site were imported through a CSV file from the previous site (Wordpress). This site is permanently connected to the eMAG marketplace through a module, in other words it has a feed through API.",
    "categories" => [
                    "Web Development Projects",
                    "Visual Media Projects"
                  ],
    "web_url" => "www.agramix.ro",
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
            "name" => "Joli Search - advanced visual search",
            "svg" => "jolisearch"
        ],
        [
            "name" => "Cron Jobs",
            "svg" => "cronjobs"
        ],
        [
            "name" => "eMAG Marketplace PrestaShop Integration by Zitec",
            "svg" => "emagmkp"
        ],
        [
            "name" => "MobilPay",
            "svg" => "mobilpay"
        ],
        [
            "name" => "FAN Courier",
            "svg" => "fancourier"
        ],
        [
            "name" => "Facebook Pixel Products Feed",
            "svg" => "fbpixelproductsfeed"
        ]
    ],
    "web_development_project" => "Done",
    "media_facebook_url" => "https://www.facebook.com/agramix.mm",
    "media_instagram_url" => "https://www.instagram.com/agramix.ro/",
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
    ],
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "07.2020",
        "date_end" => "12.2021"
    ],
    "tags" => [
                "web",
                "media-web",
                "photo",
                "video"
    ],
    "colors" => [
                "post_color_primary" => "#ae0000",
                "post_color_secondary" => "#FFFFFF",
                "post_color_background" => "#ae0000",
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