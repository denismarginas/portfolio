<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "tndc",
    "title" => "Tndc",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "In collaboration with TNDC, I developed two website pages, each dedicated to a promotional campaign for Snickers and Orbit (promotiiorbit.ro and promotiiorbit.ro/choco). These pages feature custom PHP form scripts enabling users to register in a database by submitting participant data and an image of the product invoice. The PHP form is time-restricted, allowing customers to participate only during the promotion period. After the promotion concludes, the form is automatically disabled, and I manually update the pages with the winners. For design, I utilized Elementor as the page builder, complemented by custom CSS, HTML, and JS codes to enhance the overall user experience.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "promotiiorbit.ro",
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
    "employ" => "Freelancer",
    "date" => [
        "date_start" => "18.08.2023",
        "date_end" => "17.09.2023"
    ],
    "tags" => [
                "web",
                "content-web"
              ],
    "colors" => [
        "post_color_primary" => "#18b1e7",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#ffffff",
        "post_color_text_on_background" => "#231f20"
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