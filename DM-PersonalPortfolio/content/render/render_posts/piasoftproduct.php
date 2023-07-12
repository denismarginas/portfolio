<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "piasoftproduct",
    "title" => "Pia Soft Product",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "This is a company's presentation site, and is made in Wordpress with modules such as Elementor and Contact Form 7. Also the redesign logo was made by me to. The photo elements was edited in Photopea. At this website I didn't make all the pages, and all the SEO optimization. Here I work with colleague on this websites and on many more. I was hired first time at this small company in 2019 October, we were 2 workers at the beginning only, but the only part where we work together was just on SEO optimization and on the error checking at websites. After approximate 1 year and half from the point I worked there, only me remained as an employee. In total I worked 3 years and 1 month at this company over 30 websites in Wordpress and Prestashop, and over 2000 foto-video media for promotions.",
    "categories" => [
        "Web Development Projects",
        "Visual Media Projects"
    ],
    "web_url" => "www.piasoftproduct.com",
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
    "media_facebook_url" => "www.facebook.com/piasoftproduct",
    "media_youtube_url" => "www.youtube.com/channel/UCtTxge0ZhOW3jVxsXzBaJJg",
    "media_instagram_url" => "www.instagram.com/piasoftproduct/",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "10.2019",
        "date_end" => "11.2022"
    ],
    "tags" => [
                "web",
                "media-web",
                "photo",
                "video"
    ],
    "colors" => [
        "post_color_primary" => "#ffcc00",
        "post_color_secondary" => "#212121",
        "post_color_background" => "#212121",
        "post_color_text_on_background" => "#FFFFFF"
    ]
];

$post_content = "";
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);
$post_content .= "<h2 id='webdevelopmentmedia' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Media Content</h2>";
$post_content .= renderGalleryWebMedia($post_data);
$post_content .= "<h2 id='visualmediaprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Visual Media Projects</h2>";
$post_content .= "<div class='dm-post-details-grid'>";
$post_content .= "<div class='dm-post-logo-details' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>".renderImage( $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$post_data["logo"])."</div>";
$post_content .= "<div class='dm-post-title-description' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>";
$post_content .= renderTextVisualMediaPost($post_data["post_type"],$post_data["media_path"], "tags");
$post_content .=  "</div>";
$post_content .= "</div>";
$post_content .= renderGalleryMedia($post_data);
$post_content .= renderVideoMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>