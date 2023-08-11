<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "cadredidactice",
    "title" => "Centrul de Resurse Educationale",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "Centrul de Resurse Educationale proudly presents a minimalistic website created with WordPress, offering a clean and captivating showcase for the business. The purpose of this application is for users to be able to send pdf documents (magazines and books) to be uploaded to the site in the respective section, or they can choose to sign up for projects (such as contests) dedicated to teachers with different dates, including pdf files. The files that are sent to the site are saved in the hosting. The website's simplicity and user-friendly design allow visitors to easily explore and engage with our content.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.cadredidactice.ro",
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
        "date_start" => "03.2020",
        "date_end" => "11.2022"
    ],
    "tags" => [
                "web",
                "content-web"
              ],
    "colors" => [
        "post_color_primary" => "#203d5b",
        "post_color_secondary" => "#FFFFFF",
        "post_color_background" => "#203d5b",
        "post_color_text_on_background" => "#FFFFFF"
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