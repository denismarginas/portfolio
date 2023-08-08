<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "freymobdesign",
    "title" => "FreyMob Design",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "The online shop for furniture is made in Prestashop 1.6. The site has 3 languages, and 2 currencies. The products on this application cannot be bought, but 2 buttons are provided on the product page: one to contact the distributor with a phone and the other to display the offer request form. Payment for purchases can be made only by cash on delivery, and confirmation of delivery is made by the merchant",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.freymobdesign.ro",
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
    "web_plugins" => [
        [
            "name" => "Facebook Pixel Products Feed",
            "svg" => "fbpixelproductsfeed"
        ]
    ],
    "web_development_project" => "Done",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "10.2020",
        "date_end" => "03.2021"
    ],
    "tags" => [
                "web"
              ],
    "colors" => [
        "post_color_primary" => "#eacb7f",
        "post_color_secondary" => "#1b1b1b1",
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


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>