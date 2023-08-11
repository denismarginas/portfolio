<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "vreaualpin",
    "title" => "Vreau Alpin",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "I made several significant changes to this site as web design enhancements, content editor, and the addition of new functionalities. These updates included creating a redirect from the secondary site alpin57lux.com to the online store, implementing filters for approximately 100 products, modifying the CSS/HTML of the theme to improve element display, and resolving various errors on the site, such as fixing the popup-close functionality. Additionally, I added an employment form, implemented a zoom-in feature for the product slider, and addressed numerous other improvements and fixes.  ",
    "categories" => [
                    "Web Development Projects",
                    "Miscellaneous Projects"
                  ],
    "web_url" => "www.vreaualpin.ro",
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
    ],
    "web_development_project" => "Done",
    "employ" => "Freelancer",
    "date" => [
        "date_start" => "05.2023",
        "date_end" => "07.2023"
    ],
    "tags" => [
                "web"
              ],
    "colors" => [
        "post_color_primary" => "#00aad7",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#ffffff",
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

$post_content .= "<div class='dm-post-title-description' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>";
$post_content .= "Redirect of the domain alpin57lux.com to vreaualpin.ro";
$post_content .=  "</div>";
$post_content .= "<div class='dm-post-image' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>".renderImage( $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/web/maintenance-website/alpinlux57/desktop/web-redirect.webp", true)."</div>";



$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>