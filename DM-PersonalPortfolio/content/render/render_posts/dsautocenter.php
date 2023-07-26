<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "dsautocenter",
    "title" => "DS Auto Center",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => renderTextVisualMediaPost("catalog","dsautocenter"),
    "categories" => [
                    "Visual Media Projects"
                  ],
  "media_platforms" => [
    [
      "name" => "Photopea",
      "svg" => "photopea"
    ],
    [
      "name" => "Sony Vegas",
      "svg" => "sv"
    ]
  ],
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "03.2020",
        "date_end" => "03.2020"
    ],
    "tags" => [
                "photo",
                "video"
    ],
    "media_facebook_url" => "https://www.facebook.com/DSAutoCenterBuzau",
    "media_custom" => [
        [
            "title" => "Video: ",
            "url" => "https://www.facebook.com/DSAutoCenterBuzau/videos/554819492317663"
        ],
    ],

    "colors" => [
                "post_color_primary" => "#2f3647",
                "post_color_secondary" => "#ffffff",
                "post_color_background" => "#2f3647",
                "post_color_text_on_background" => "#ffffff"
    ]
];
$post_content = "";
$post_content .= "<h2 id='visualmediaprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Visual Media Projects</h2>";
$post_content .= renderGalleryMedia($post_data);
$post_content .= renderVideoMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>