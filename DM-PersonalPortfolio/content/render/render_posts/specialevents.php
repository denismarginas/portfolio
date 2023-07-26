<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "specialevents",
    "title" => "Special Events",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => renderTextVisualMediaPost("catalog","specialevents"),
    "categories" => [
                    "Visual Media Projects",
                    "Miscellaneous Projects"
                  ],
    "media_platforms" => [
        [
          "name" => "Photopea",
          "svg" => "photopea"
        ],
        [
          "name" => "Xara Photo & Graphic Designer",
          "svg" => "xaraphoto"
        ],
        [
          "name" => "Paint.net",
          "svg" => "paintnet"
        ],
    ],
    "employ" => "Unspecified",
    "date" => [
        "date_start" => "06.2021",
        "date_end" => "11.2022"
    ],
    "tags" => [
                "photo"
    ],
    "colors" => [
                "post_color_primary" => "#ead7a6",
                "post_color_secondary" => "#000000",
                "post_color_background" => "#ffffff",
                "post_color_text_on_background" => "#ffffff"
    ]
];
$post_content = "";
$post_content .= "<h2 id='visualmediaprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Visual Media Projects</h2>";
$post_content .= renderGalleryMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>