<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "medicalortovit",
    "title" => "Medical Ortovit",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "When I started working on it, the website was already 60% complete. Website make in WordPress for blog and the sale of medical products and services. The work I made in this project, was the products section (www.ortovit.eu/produse/), I have created over 200 pages, all connected to each other with a friendly interface and an image suggestive of the section.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.ortovit.eu/produse/",
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
            "name" => "WP Bakery",
            "svg" => "wpbakery"
        ]
    ],
    "web_development_project" => "Done",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "07.2021",
        "date_end" => "09.2021"
    ],
    "tags" => [
                "web"
              ],
    "colors" => [
        "post_color_primary" => "#003452",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#003452",
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