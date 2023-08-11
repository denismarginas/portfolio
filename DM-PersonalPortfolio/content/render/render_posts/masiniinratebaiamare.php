<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "masiniinratebaiamare",
    "title" => "Masini in Rate Baia Mare",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "Masini in Rate Baia Mare proudly presents a minimalistic online shop created with WordPress, offering a clean and captivating showcase for the business. The products cannot be bought directly, but on the product page there is a button to send a message to the seller. The website's simplicity and user-friendly design allow visitors to easily explore and engage with our content.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.masiniinratebaiamare.ro",
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
    ],
    "web_plugins" => [
        [
            "name" => "WP Bakery",
            "svg" => "wpbakery"
        ],
        [
            "name" => "Contact Form 7",
            "svg" => "ctf7"
        ],
        [
            "name" => "Woocommerce",
            "svg" => "woocommerce"
        ],
        [
            "name" => "Slider Revolution",
            "svg" => "sliderrevolution"
        ]
    ],
    "web_development_project" => "Done",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "06.2020",
        "date_end" => "07.2020"
    ],
    "tags" => [
                "web",
                "media-web"
              ],
    "colors" => [
        "post_color_primary" => "#f81a05",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#ffffff",
        "post_color_text_on_background" => "#ffffff"
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