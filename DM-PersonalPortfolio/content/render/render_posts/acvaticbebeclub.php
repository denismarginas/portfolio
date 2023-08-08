<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "acvaticbebeclub",
    "title" => "Acvatic Bebe Club",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "
A website has been created using WordPress to provide subscriptions for teaching babies and children how to swim. The site features a blog with articles, and nearly all the content on the website is available in two languages: English and Romanian. My work on this project involved editing pages and translating content from Romanian to English using the translated text provided by the client.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.acvaticbebeclub.ro",
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
            "name" => "PHP",
            "svg" => "php"
        ]
    ],
    "web_plugins" => [
        [
            "name" => "Elementor Website Builder",
            "svg" => "elementor"
        ],
        [
            "name" => "Contact Form 7",
            "svg" => "cf7"
        ]
    ],
    "web_development_project" => "Done",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "05.2021",
        "date_end" => "07.2021"
    ],
    "tags" => [
                "web"
              ],
    "colors" => [
        "post_color_primary" => "#ff1796",
        "post_color_secondary" => "#FFFFFF",
        "post_color_background" => "#FFFFFF",
        "post_color_text_on_background" => "#15b1e6"
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