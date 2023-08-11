<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "reifendirekt",
    "title" => "Reifen Direkt",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "For this project, I had to make HTML static pages. I got previews for a redesign of pages in zeplin format and with them, I make the pages in HTML format. Here I use Node.js, SCSS, JavaScript, jQuery, Bootstrap 5. Also, some pages required the interaction and functionalities that were implemented with jQuery. I had meets with back-end team, where we were discussing the necessary changes to the temples that I had to make at few cases.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "www.reifendirekt.de",
    "web_platform" => [
                [
                    "name" => "NodeJS",
                    "svg" => "nodejs"
                ]
    ],
    "web_languages" => [
        [
            "name" => "HTML",
            "svg" => "html"
        ],
        [
            "name" => "CSS",
            "svg" => "css"
        ],
        [
            "name" => "SCSS",
            "svg" => "scss"
        ],
        [
            "name" => "JS",
            "svg" => "js"
        ],
        [
            "name" => "Bootstrap",
            "svg" => "bootstrap"
        ],
        [
            "name" => "jQuery",
            "svg" => "jquery"
        ],
    ],
    "web_development_project" => "Done",
    "employ" => "Netex Romania",
    "date" => [
        "date_start" => "12.2021",
        "date_end" => "07.2022"
    ],
    "tags" => [
                "web",
                "content-web"
              ],
    "colors" => [
        "post_color_primary" => "#3c7fb5",
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
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);
$post_content .= renderGalleryWebContent($post_data);
$post_content .= renderVideoMedia($post_data);

$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>