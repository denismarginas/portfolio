<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "boneamed",
    "title" => "Bonea Med",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "This project involved creating a clinic website with appointment booking functionality. I used the Booked module in a WordPress website. Clients can book appointments with specific doctors, and doctors can access, edit, and add appointments.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.boneamed.ro",
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
            "name" => "Booked",
            "svg" => "booked"
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
        "date_start" => "06.2021",
        "date_end" => "06.2022"
    ],
    "tags" => [
                "web",
                "media-web"
              ],
    "colors" => [
        "post_color_primary" => "#02aeae",
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

$post_content .= "<h2 id='webdevelopmentmedia' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Media Content</h2>";
$post_content .= renderGalleryWebMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>