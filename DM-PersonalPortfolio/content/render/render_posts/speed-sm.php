<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "speed-sm",
    "title" => "Speed - Satu Mare",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => renderTextVisualMediaPost("catalog","dabo-sm-bm"),
    "categories" => [
                    "Visual Media Projects"
                  ],
    "employ" => "Pia Soft Product",
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
    "media_facebook_url" => "https://www.facebook.com/livrariladomiciliuSatuMare",
    "date" => [
        "date_start" => "01.2020",
        "date_end" => "03.2020"
    ],
    "tags" => [
                "photo",
                "video"
    ],
    "colors" => [
                "post_color_primary" => "#f08119",
                "post_color_secondary" => "#ffffff",
                "post_color_background" => "#f08119",
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