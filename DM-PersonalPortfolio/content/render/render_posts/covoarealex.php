<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "covoarealex",
    "title" => "Covoare Alex",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "The online shop for different types and models of carpets, is made in Prestashop 1.7 with integrated payment method, via MobilPay. The website's simplicity and user-friendly design allow visitors to easily explore and engage with our content.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.covoarealex.ro",
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
            "name" => "Facebook Pixel Products Feed",
            "svg" => "fbpixelproductsfeed"
        ]
    ],
    "web_development_project" => "Done",
    "media_platforms" => [
      [
        "name" => "Photopea",
        "svg" => "photopea"
      ]
    ],
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "04.2021",
        "date_end" => "11.2021"
    ],
    "tags" => [
                "web",
                "media-web"
              ],
    "colors" => [
        "post_color_primary" => "#ac9280",
        "post_color_secondary" => "#FFFFFF",
        "post_color_background" => "#404040",
        "post_color_text_on_background" => "#FFFFFF"
    ]
];

$seo = [
    "title" => $post_data["title"]." | Denis Marginas",
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


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>