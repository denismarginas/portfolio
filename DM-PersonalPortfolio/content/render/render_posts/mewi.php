<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "mewi",
    "title" => "Mewi",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "At this Wordpress site, I had to do maintenance, troubleshooting, code changes, plugin updates, and creating HTML & CSS content for the site's Newsletter. Also I made some redesign for few pages with Elementor plugin and changed the theme CSS at some elements. I worked on optimization, where I resize the images from the first page at 2500px with Topaz Gigapixel AI and I have changed on website with a compressed versions.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.mewi.ro",
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
            "name" => "WP Bakery",
            "svg" => "wpbakery"
        ]
    ],
    "employ" => "Netex Romania",
    "date" => [
        "date_start" => "01.2022",
        "date_end" => "03.2023"
    ],
    "tags" => [
                "web",
                "content-web",
              ],
    "colors" => [
        "post_color_primary" => "#018a46",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#018a46",
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

$post_content .= "<div class='dm-post-title-description' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>";
$post_content .= "I added a search bar to the menu with the Advanced Search and Mega Menu modules. The results of the search are showing live with ajax through the Advanced Search module, which has been modified in its files so that it doesn't display the type of the item found and some elements were translated in Romanian.";
$post_content .=  "</div>";
$post_content .= "<div class='dm-post-image' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>".renderImage( $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/web/maintenance-website/search/web-search.webp", true)."</div>";

$post_content .= "<div class='dm-post-title-description' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>";
$post_content .= "In the section below are HTML and CSS newsletter templates. These were made by receiving images, a DOCX document with the text and links it should contain. Images were uploaded to the site host via FileZilla and cPanel to work globally.";
$post_content .=  "</div>";
$post_content .= renderGalleryWebContent($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>