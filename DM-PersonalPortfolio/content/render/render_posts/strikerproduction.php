<?php


$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "strikerproduction",
    "title" => "Striker Production",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "Main activity of the Striker Production is the video editing at different video games and real life footage. In addition to creating my own video-photo content, I organize video editing contests with sponsors and I collaborate with clients on various projects. Simple portfolio website is made with Google Site. ".renderTextVisualMediaPost("catalog","strikerproduction"),
    "categories" => [
                    "Web Development Projects",
                    "Visual Media Projects",
                    "Miscellaneous Projects"
                  ],
    "web_url" => "sites.google.com/view/strikerproduction/",
    "web_platform" => [
        [
            "name" => "Google Site",
            "svg" => "googlesite"
        ]
    ],
    "web_development_project" => "Done",
    "media_platforms" => [
      [
        "name" => "Photopea",
        "svg" => "photopea"
      ],
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
      ],
      [
        "name" => "Blender",
        "svg" => "blender"
      ],
      [
        "name" => "After Effects",
        "svg" => "ae"
      ],
    ],
    "media_facebook_url" => "https://www.facebook.com/strikerproduction",
    "media_instagram_url" => "https://www.instagram.com/strikerprod09/",
    "media_youtube_url" => "https://www.youtube.com/c/striker09/",
    "media_custom" => [
        [
            "title" => "Google Form: ",
            "url" => "https://forms.gle/XzfTBkvepUoUte2b9"
        ],
        [
            "title" => "Discord: ",
            "url" => "https://discord.gg/b9YQecx"
        ],
        [
            "title" => "Google Site: ",
            "url" => "https://sites.google.com/view/strikerproduction/"
        ],
        [
            "title" => "Steam: ",
            "url" => "https://steamcommunity.com/groups/strikelounge"
        ]
    ],
    "date" => [
        "date_start" => "09.2016",
        "date_end" => "12.2022"
    ],
    "tags" => [
                "web",
                'content-web',
                "photo",
                "video"
    ],
    "colors" => [
        "post_color_primary" => "#5d6977",
        "post_color_secondary" => "#ffffff",
        "post_color_background" => "#5d6977",
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
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);
$post_content .= renderGalleryWebContent($post_data);

$post_content .= "<h2 id='visualmediaprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Visual Media Projects</h2>";
$post_content .= "<div class='dm-post-details-grid'>";
$post_content .= "<div class='dm-post-logo-details' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>".renderImage( $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$post_data["logo"])."</div>";
$post_content .= "<div class='dm-post-title-description' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>";
$post_content .= renderTextVisualMediaPost($post_data["post_type"],$post_data["media_path"], "tags");
$post_content .=  "</div>";
$post_content .= "</div>";
$post_content .= renderGalleryMedia($post_data);
$post_content .= renderVideoMedia($post_data);



$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>