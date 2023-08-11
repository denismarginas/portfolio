<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "promotiimars",
    "title" => "Promotii Mars",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "Website make in WordPress for contests and promotions. Most of the contests are created in a custom PHP form. The design of the form and its functionalities are created based on PSD images with the contest. Few pages from menu have JS and CSS animation for user interaction with items. Main plugins used for creating the forms for competitions in this website are Elementor and PHP Everywhere. Over 20 of different forms I had created here with different design and in some cases with different functions.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.promotiimars.ro",
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
            "name" => "jQuery",
            "svg" => "jquery"
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
            "name" => "Elementor Website Builder",
            "svg" => "elementor"
        ]
    ],
    "web_development_project" => "Done",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "03.2020",
        "date_end" => "11.2022"
    ],
    "tags" => [
                "web",
                "content-web"
              ],
    "colors" => [
        "post_color_primary" => "#0100a0",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#0100a0",
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
$post_content .= renderGalleryWebContent($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>