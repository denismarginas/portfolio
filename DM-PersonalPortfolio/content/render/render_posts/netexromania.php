<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "netexromania",
    "title" => "Netex Romania",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "At this site, I had to do maintenance, fixing back-end bugs, PHP files from theme files, troubleshooting, code changes, plugin updates, and banners. Here was my second job, working at this company and even at it's website. I was hired on 2021 December, and most of my part was to work at few websites, maintenance most of the time, and most important project was the redesing of the ReifenDirekt websites.",
    "categories" => [
                    "Web Development Projects",
                    "Visual Media Projects"
                  ],
    "web_url" => "www.netex.ro",
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
    "media_facebook_url" => "https://www.facebook.com/netex.ro",
    "employ" => "Netex Romania",
    "date" => [
        "date_start" => "12.2021",
        "date_end" => "04.2023"
    ],
    "tags" => [
                "web",
                "photo",
              ],
    "colors" => [
        "post_color_primary" => "#ed1c24",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#ffffff",
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