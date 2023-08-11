<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "carconcordia",
    "title" => "Concordia",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "Concordia proudly presents a website created with WordPress, offering a clean and captivating showcase for the business. The website's simplicity and user-friendly design allow visitors to easily explore and engage with our content.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.carconcordia.ro",
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
            "name" => "GoodLayers Page Builder",
            "svg" => "gdlr"
        ],
        [
            "name" => "Contact Form 7",
            "svg" => "ctf7"
        ],
        [
            "name" => "Slider Revolution",
            "svg" => "sliderrevolution"
        ],
    ],
    "website_status" => "Done",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "06.2021",
        "date_end" => "06.2021"
    ],
    "tags" => [
                "web"
              ],
    "colors" => [
        "post_color_primary" => "#ba2a2a",
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


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>