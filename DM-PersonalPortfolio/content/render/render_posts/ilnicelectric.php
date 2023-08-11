<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "ilnicelectric",
    "title" => "Ilnic Electric",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "Ilnic Electric proudly presents a minimalistic website created with WordPress, offering a clean and captivating showcase for the business. The website's simplicity and user-friendly design allow visitors to easily explore and engage with our content.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.ilnic.ro",
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
            "name" => "Slider Revolution",
            "svg" => "sliderrevolution"
        ]
    ],
    "web_development_project" => "Done",
    "media_platforms" => [
      [
        "name" => "Photopea",
        "svg" => "photopea"
      ]
    ],
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "01.2022",
        "date_end" => "02.2022"
    ],
    "tags" => [
                "web",
                "media-web"
              ],
    "colors" => [
        "post_color_primary" => "#130091",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#00183e",
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