<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "petri",
    "title" => "Petri",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "At this project I worked in a team to create a custom theme in Wordpress. My part at this project was to translate content from the Figma project to website elements. I have created blocks, pages with PHP, SCSS, and JSON using:  PhpStorm, GitHub, Prepros, XAMPP. During this project, it was my first time coding PHP using taxonomies, terms, and custom posts within the WordPress environment",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.petri.com",
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
            "name" => "SASS",
            "svg" => "sass"
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
        ]
    ],
    "web_plugins" => [
        [
            "name" => "Gutenberg Website Builder",
            "svg" => "gutenberg"
        ]
    ],
    "web_development_project" => "Undone",
    "employ" => "Enlivy",
    "date" => [
        "date_start" => "05.2023",
        "date_end" => "06.2023"
    ],
    "tags" => [
                "web"
              ],
    "colors" => [
        "post_color_primary" => "#1a4ad9",
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