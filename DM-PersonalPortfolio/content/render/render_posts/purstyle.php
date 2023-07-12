<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "purstyle",
    "title" => "Pur Style",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "At this project I had to make some page reworks, fixing errors adding new features like booking and contact form. The new pages I had made with these plugins: Elementor, Contact Form 7 and Booked. Also the content that I have created and changed was made for 2 languages: English and German.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.purstyle.net",
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
            "name" => "Booked",
            "svg" => "booked"
        ]
    ],
    "employ" => "Netex Romania",
    "date" => [
        "date_start" => "11.2022",
        "date_end" => "03.2023"
    ],
    "tags" => [
                "web"
              ],
    "colors" => [
        "post_color_primary" => "#262425",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#262425",
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