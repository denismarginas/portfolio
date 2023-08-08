<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "mycreativedesign",
    "title" => "My Creative Design",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => renderTextVisualMediaPost("catalog","mycreativedesign"),
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
    ],
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "12.2019",
        "date_end" => "12.2019"
    ],
    "tags" => [
                "photo"
    ],
    "media_facebook_url" => "https://www.facebook.com/mycreativedesignbymuresanbrod",
    "colors" => [
                "post_color_primary" => "#dedede",
                "post_color_secondary" => "#8c191c",
                "post_color_background" => "#ffffff",
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
$post_content .= renderGalleryMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>