<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "ceramicevo",
    "title" => "Ceramic & Stone Evolutione",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "Evolutione proudly presents a minimalistic online shop created with Prestashop 1.6, offering a clean and captivating showcase for the business. The customers can't buy the products, but with the intended buttons on the product page, they can contact the supplier via phone or with the product ask form. The website's simplicity and user-friendly design allow visitors to easily explore and engage with our content.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.ceramicevo.ro",
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
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "05.2020",
        "date_end" => "07.2020"
    ],
    "tags" => [
                "web",
                "media-web"
              ],
    "colors" => [
        "post_color_primary" => "#ffae01",
        "post_color_secondary" => "#1b1b1b1",
        "post_color_background" => "#ffae01",
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