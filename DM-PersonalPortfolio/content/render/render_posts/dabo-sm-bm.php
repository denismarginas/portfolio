<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "dabo-sm-bm",
    "title" => "Dabo - SM & BM",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => 'Here is my media content for the promotion of Dabo Satu Mare & Dabo Baia Mare during the pandemic, which took place in 2020.'.renderTextVisualMediaPost("catalog","dabo-sm-bm"),
    "categories" => [
                    "Visual Media Projects"
                  ],
    "media_platforms" => [
      [
        "name" => "Xara Photo & Graphic Designer",
        "svg" => "xaraphoto"
      ],
      [
        "name" => "Paint.net",
        "svg" => "paintnet"
      ],
      [
        "name" => "Sony Vegas",
        "svg" => "sv"
      ]
    ],
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "03.2020",
        "date_end" => "05.2020"
    ],
    "tags" => [
                "photo",
                "video"
    ],
    "colors" => [
                "post_color_primary" => "#f08119",
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
$post_content .= renderVideoMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>