
<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "cafeagano",
    "title" => "Cafea Gano",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "WordPress website created for an online shop specializing in natural supplements and coffee. The shop was made using the Woocommerce module.",
    "categories" => [
        "Web Development Projects"
    ],
    "web_url" => "www.cafeagano.ro",
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
        ],
        [
            "name" => "Woocommerce",
            "svg" => "woocommerce"
        ]
    ],
    "web_development_project" => "Done",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "03.2020",
        "date_end" => "07.2020"
    ],
    "tags" => [
        "web"
    ],
    "colors" => [
        "post_color_primary" => "#6a4f32",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#312114",
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