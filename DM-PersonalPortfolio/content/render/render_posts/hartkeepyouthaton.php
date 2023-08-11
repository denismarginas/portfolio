<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "hartkeepyouthaton",
    "title" => "HART - Keep your hat on",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => renderTextVisualMediaPost("catalog","hartkeepyouthaton"),
    "categories" => [
                    "Visual Media Projects"
                  ],
    "media_facebook_url" => "https://www.facebook.com/atelieruldepalarii",
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
        "date_start" => "02.2020",
        "date_end" => "02.2020"
    ],
    "tags" => [
                "video"
    ],
    "colors" => [
                "post_color_primary" => "#f1d199",
                "post_color_secondary" => "#1b1b1b",
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
$post_content .= renderVideoMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>