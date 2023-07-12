<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "prismanord",
    "title" => "Prisma Nord",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => renderTextVisualMediaPost("catalog","prismanord"),
    "categories" => [
                    "Visual Media Projects",
                    "Miscellaneous Projects"
                  ],
    "employ" => "Freelancer",
    "date" => [
        "date_start" => "03.2020",
        "date_end" => "03.2020"
    ],
    "tags" => [
                "photo"
    ],
    "media_facebook_url" => "https://www.facebook.com/profile.php?id=100054479439548",
    "media_custom" => [
        [
            "title" => "Banner: ",
            "url" => "https://www.facebook.com/photo/?fbid=103072591371526&set=a.561943758964934"
        ],
    ],

    "colors" => [
                "post_color_primary" => "#eb1e24",
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