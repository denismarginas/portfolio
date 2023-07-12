<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "woodworkart",
    "title" => "Wood Work Art",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "Website make in WordPress for a company that provide authentic solid wood furniture, in modern or vintage style, hand carved or with CNC, of a high quality that guaranteed to offer you in any space an elegance, refinement and unique character. The site is made in 3 languages.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.woodworkart.eu",
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
        [
            "name" => "Contact Form 7",
            "svg" => "ctf7"
        ]
    ],
    "web_development_project" => "Done",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "10.2019",
        "date_end" => "11.2019"
    ],
    "tags" => [
                "web"
              ],
    "colors" => [
        "post_color_primary" => "#f7992b",
        "post_color_secondary" => "#3b3d42",
        "post_color_background" => "#3b3d42",
        "post_color_text_on_background" => "#ffffff"
    ]
];

$post_content = "";
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>