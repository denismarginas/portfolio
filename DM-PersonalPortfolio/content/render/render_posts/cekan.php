<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "cekan",
    "title" => "Cekan",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "
Translated Figma web design for the Case Study section on the cekan.ca website, ensuring 99% accuracy in replicating the responsive look across various screen sizes. Utilized HTML and SCSS to implement the page design, using Prepro to compile SCSS into CSS. Managed the code using PhpStorm. Completed the project in 4 days, dedicating 2-4 hours of work each day.",
    "categories" => [
                    "Web Development Projects"
                  ],
    "web_url" => "cekan.ca/case-study/",
    "web_platform" => [
                [
                    "name" => "Wordpress",
                    "svg" => "wordpress"
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
            "name" => "SASS",
            "svg" => "sass"
        ],
        [
            "name" => "JS",
            "svg" => "js"
        ]
    ],
    "web_development_project" => "Undone",
    "employ" => "Freelancer",
    "date" => [
        "date_start" => "25.01.2024",
        "date_end" => "30.02.2024"
    ],
    "tags" => [
                "web",
                "content-web"
              ],
    "colors" => [
        "post_color_primary" => "#31bcd1",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#31bcd1",
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


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>