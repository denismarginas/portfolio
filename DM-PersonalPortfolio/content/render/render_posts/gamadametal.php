<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "gamadametal",
    "title" => "Gamada Metal",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => renderTextVisualMediaPost("catalog","gamadametal"),
    "categories" => [
                    "Visual Media Projects"
                  ],
    "media_facebook_url" => "https://www.facebook.com/gamadametalsrl",
    "media_platforms" => [
      [
        "name" => "Photopea",
        "svg" => "photopea"
      ]
    ],
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "11.2021",
        "date_end" => "12.2021"
    ],
    "tags" => [
                "photo"
    ],
    "colors" => [
                "post_color_primary" => "#999999",
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
$post_content .= "<h2 id='visualmediaprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Visual Media Projects</h2>";
$post_content .= renderGalleryMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>