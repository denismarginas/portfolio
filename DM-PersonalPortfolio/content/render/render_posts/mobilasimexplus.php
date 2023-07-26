<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "mobilasimexplus",
    "title" => "Mobila Simex Pluse",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "Mobila Simex Plus proudly presents a minimalistic online shop created with Prestashop 1.7, offering a clean and captivating showcase for the business. The products can be bought in sets or separately. Payment for purchases can be made only by cash on delivery, and confirmation of delivery is made by the merchant.",
    "categories" => [
                    "Web Development Projects",
                    "Visual Media Projects"
                  ],
    "web_url" => "www.mobilasimexplus.ro",
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
    "media_facebook_url" => "https://www.facebook.com/producator.mobila.lemn.masiv",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "11.2019",
        "date_end" => "02.2020"
    ],
    "tags" => [
                "web",
                "media-web"
              ],
    "colors" => [
        "post_color_primary" => "#a07a53",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#a07a53",
        "post_color_text_on_background" => "#ffffff"
    ]
];

$post_content = "";
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);

$post_content .= "<h2 id='visualmediaprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Visual Media Projects</h2>";
$post_content .= renderGalleryMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>