<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "lavmag",
    "title" => "Lavmag",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "The online shop for a wide range of products is built using Prestashop 1.7. All products are regularly updated and uploaded through a feed sourced from another store. To accomplish this, I developed custom PHP scripts from scratch to handle various feed actions. These scripts efficiently open the CSV feed, create categories, brands, and products, as well as upload and update product data, including prices. Notably, the prices of the products are adjusted with a higher percentage compared to the values received from the feed. During the latest update, this store successfully managed over 4000 products. Customers can conveniently make payments using their cards through the MobilPay module. To create the contact form, I edited TPL, HTML, and CSS, and integrated an iframe with a WordPress page utilizing the Contact Form 7 module.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.lavmag.ro",
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
            "name" => "Cron Jobs",
            "svg" => "cronjobs"
        ],
        [
            "name" => "MobilPay",
            "svg" => "mobilpay"
        ],
        [
            "name" => "Facebook Pixel Products Feed",
            "svg" => "fbpixelproductsfeed"
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
        "date_start" => "07.2020",
        "date_end" => "09.2020"
    ],
    "tags" => [
                "web",
                "media-web"
              ],
    "colors" => [
        "post_color_primary" => "#d41a22",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#8c0f14",
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