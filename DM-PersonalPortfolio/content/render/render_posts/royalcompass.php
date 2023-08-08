<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "royalcompass",
    "title" => "Royal Compass",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "At this project I had to make a website for a company that promote sports in nature. This website was not completely finished in terms of the aspects of texts and images on the pages.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "beta.royalcompass.ro",
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
            "name" => "Elementor Website Builder",
            "svg" => "elementor"
        ],
    ],
    "web_development_project" => "Undone",
    "employ" => "Netex Romania",
    "date" => [
        "date_start" => "11.2022",
        "date_end" => "04.2023"
    ],
    "tags" => [
                "web"
              ],
    "colors" => [
        "post_color_primary" => "#0086ef",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#ffffff",
        "post_color_text_on_background" => "#ffffff"
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


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>