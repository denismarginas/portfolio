<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "spalatorieautomatabaiamare",
    "title" => "Spalatorie Automata Baia Mare",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => renderTextVisualMediaPost("catalog","spalatorieautomatabaiamare"),
    "categories" => [
                    "Visual Media Projects"
                  ],
    "media_platforms" => [
      [
        "name" => "Photopea",
        "svg" => "photopea"
      ]
    ],
    "employ" => "Pia Soft Product",
    "date" => [
        "date_start" => "06.2022",
        "date_end" => "08.2022"
    ],
    "tags" => [
                "photo"
    ],
    "media_facebook_url" => "https://www.facebook.com/SpalatorieHaineBaiaMareAutomata",

    "colors" => [
                "post_color_primary" => "#1bc1fc",
                "post_color_secondary" => "#18191b",
                "post_color_background" => "#1e3656",
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