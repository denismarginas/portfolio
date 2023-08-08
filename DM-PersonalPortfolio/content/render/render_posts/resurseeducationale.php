<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "resurseeducationale",
    "title" => "Resurse Educationale",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "Website for school projects, contests, courses and shop was made in WordPress. It have a custom PHP code integrated with 2 modules that which allows uploading files depending on the number of uploads or depending on the subscription. The files accepted by the administrator will be displayed on the site. The number of uploads and subscriptions can be purchased with payment by card. Payment can be made with the card through the EuPlatesc module..",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.resurseprofesori.ro",
    "web_platform" => [
                [
                    "name" => "Wordpress",
                    "svg" => "wordpress"
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
            "name" => "jQuery",
            "svg" => "jquery"
        ]
    ],
    "web_plugins" => [
        [
            "name" => "Elementor Website Builder",
            "svg" => "elementor"
        ],
        [
            "name" => "Contact Form 7",
            "svg" => "ctf7"
        ],
        [
            "name" => "WooCommerce",
            "svg" => "woocommerce"
        ],
        [
            "name" => "PHP Everywhere",
            "svg" => "phpeverywhere"
        ],
        [
            "name" => "WooCommerce Points and Rewards",
            "svg" => "woocommercepointsadnrewards"
        ],
        [
            "name" => "WooCommerce Memberships",
            "svg" => "woocommercememberships"
        ],
        [
            "name" => "EuPlatesc Pay Module",
            "svg" => "euplatesc"
        ]
    ],
    "web_development_project" => "Done",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "09.2020",
        "date_end" => "11.2020"
    ],
    "tags" => [
                "web",
                "content-web"
              ],
    "colors" => [
        "post_color_primary" => "#86bc42",
        "post_color_secondary" => "#FFFFFF",
        "post_color_background" => "#2d3e50",
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



$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>