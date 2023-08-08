<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "amorino",
    "title" => "Amorino",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "
The website, specializing in selling dresses for girls, is built using Prestashop 1.7. Customers have the option to make payments using their cards through the PayU module. To create the contact form, I customized TPL, HTML, and CSS elements, and integrated an iframe with a WordPress page, utilizing the Contact Form 7 module.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.amorino.ro",
    "web_platform" => [
                [
                    "name" => "Prestashop",
                    "svg" => "prestashop"
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
            "name" => "TPL",
            "svg" => "tpl"
        ]
    ],
    "web_development_project" => "Done",
    "media_platforms" => [
      [
        "name" => "Xara Photo & Graphic Designer",
        "svg" => "xaraphoto"
      ],
      [
        "name" => "Paint.net",
        "svg" => "paintnet"
      ],
    ],
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "03.2020",
        "date_end" => "10.2020"
    ],
    "tags" => [
                "web",
                "media-web"
              ],
    "colors" => [
        "post_color_primary" => "#ffb8ce",
        "post_color_secondary" => "#222222",
        "post_color_background" => "#ffb8ce",
        "post_color_text_on_background" => "#FFFFFF"
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