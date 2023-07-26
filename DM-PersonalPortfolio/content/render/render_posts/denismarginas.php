<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "display" => "enable",
    "post_type" => "catalog",
    "media_path" => "denismarginas",
    "title" => "Denis Marginas",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "Simple portfolio website is made with Google Site. ".renderTextVisualMediaPost("catalog","denismarginas"),
    "categories" => [
                    "Web Development Projects",
                    "Visual Media Projects",
                    "Miscellaneous Projects"
                  ],
    "web_url" => "sites.google.com/view/denis-marginas",
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
          "name" => "After Effects",
          "svg" => "ae"
        ],
    ],
    "media_facebook_url" => "https://www.facebook.com/denismarginas09",
    "media_youtube_url" => "https://www.youtube.com/channel/UCZGb7hnkyawMgnSO9T-rnnQ",
    "media_custom" => [
        [
            "title" => "Google Form: ",
            "url" => " https://forms.gle/vTHeLVkc1TwXCxBJA"
        ],
        [
            "title" => "Linkedin: ",
            "url" => "www.linkedin.com/in/denismarginas09"
        ],
        [
            "title" => "Google Site: ",
            "url" => "https://sites.google.com/view/denis-marginas/portfolio"
        ],
        [
            "title" => "Resume English: ",
            "url" => "https://drive.google.com/file/d/1-RYU6uYovCR_LT48nD7CZ1sa6xQ8QJh_/view?fbclid=IwAR2uM1bsxIRykbxASFEuRVHECNNLfcty7zcoMquzH4ctG912jSLQ0UEfR4M"
        ],
        [
            "title" => "Resume Romanian: ",
            "url" => "https://drive.google.com/file/d/1_gPqX2MgLJD7bYCgZ977GHX25pVC_ihz/view?fbclid=IwAR31XhWoDXsDa543gAtcJDrJd0zJIh72zpp35YQeHHTw8mbjnFVwyo9ueng"
        ]
    ],
    "date" => [
        "date_start" => "06.2020",
        "date_end" => "07.2023"
    ],
    "tags" => [
                "web",
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
$post_content = "";
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);
$post_content .= "<h2 id='webdevelopmentmedia' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Media Content</h2>";
$post_content .= renderGalleryWebMedia($post_data);

$post_content .= "<h2 id='visualmediaprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Visual Media Projects</h2>";
$post_content .= "<div class='dm-post-details-grid'>";
$post_content .= "<div class='dm-post-logo-details' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>".renderImage( $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$post_data["logo"])."</div>";
$post_content .= "<div class='dm-post-title-description' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>";
$post_content .= renderTextVisualMediaPost($post_data["post_type"],$post_data["media_path"], "tags");
$post_content .=  "</div>";
$post_content .= "</div>";
$post_content .= renderGalleryMedia($post_data);
$post_content .= "<div id='video' class='dm-video-media-content' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.5s'>";
$post_content .= renderVideo(MediaPath::getUrlPaths()['page'] . 'content/vid/personal-portfolio/personal-portfolio.mp4',
                        $GLOBALS['urlPath']."content/img/thumbnails/personal-portfolio.webp"
);
$post_content .= renderVideo(MediaPath::getUrlPaths()['page'] . 'content/vid/personal-workstation/desktop-setup.mp4',
  $GLOBALS['urlPath']."content/img/thumbnails/desktop-setup.webp"
);
$post_content .= "</div>";


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>