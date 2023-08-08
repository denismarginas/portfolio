<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "vseconstruct",
    "title" => "VSE Construct",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => renderTextVisualMediaPost("catalog","vseconstruct"),
    "categories" => [
                    "Visual Media Projects"
                  ],
    "media_platforms" => [
        [
            "name" => "Photopea",
            "svg" => "photopea"
        ]
    ],
    "media_facebook_url" => "https://www.facebook.com/VSEConstruct",
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "04.2022",
        "date_end" => "11.2022"
    ],
    "tags" => [
                "photo",
                "video"
    ],
    "colors" => [
                "post_color_primary" => "#1db783",
                "post_color_secondary" => "#ffffff",
                "post_color_background" => "#1db783",
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
$post_content .= "<h2 id='visualmediaprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Visual Media Projects</h2>";
$post_content .= renderGalleryMedia($post_data);;


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>