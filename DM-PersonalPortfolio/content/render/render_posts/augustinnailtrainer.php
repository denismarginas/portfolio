<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "augustinnailtrainer",
    "title" => "Augustin Nail Trainer",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => renderTextVisualMediaPost("catalog","augustinnailtrainer"),
    "categories" => [
                    "Visual Media Projects",
                    "Miscellaneous Projects"
                  ],
    "media_facebook_url" => "https://www.facebook.com/augustin.andradaandreea",
    "media_platforms" => [
      [
        "name" => "Photopea",
        "svg" => "photopea"
      ]
    ],
    "employ" => "Freelancer",
    "date" => [
        "date_start" => "01.2023",
        "date_end" => "02.2023"
    ],
    "tags" => [
                "photo"
    ],
    "colors" => [
                "post_color_primary" => "#d65c43",
                "post_color_secondary" => "#ffffff",
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