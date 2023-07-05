<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "visibility" => "enable",
    "post_type" => "portfolio",
    "media_path" => "agramix",
    "title" => "Agramix",
    "logo" => "logo/logo.png",
    "logo_type" => "png",
    "description" => "The online shop for tools, machine parts and agricultural / industrial equipment is made in Prestashop 1.7. The theme on which the site was built has been changed a lot in appearance through HTML, CSS, JS. For products that cannot be ordered, 2 buttons have been created: one to call for the product and another to send an email to request information about the product. The contact form was created by editing TPL, HTML, CSS, and an iframe with a WordPress page with the Contact Form 7 module. The products on the site were imported through a CSV file from the previous site (Wordpress). This site is permanently connected to the eMAG marketplace through a module, in other words it has a feed through API.",
    "categories" => [
                    "Web Development Projects",
                    "Visual Media Projects"
                  ],
    "website_url" => "www.agramix.ro",
    "website_platform" => "Prestashop",
    "website_status" => "Done",
    "media_facebook_url" => "https://www.facebook.com/agramix.mm",
    "media_instagram_url" => "https://www.instagram.com/agramix.ro/",
    "employ" => "Pia Soft Product",
    "date" => "07.2020-01.2021",
    "tags" => [
                "web",
                "media-web",
                "photo",
                "video",
    ],
    "colors" => [
                "post_color_primary" => "#ae0000",
                "post_color_secondary" => "#FFFFFF",
                "post_color_background" => "#ae0000",
                "post_color_text_on_background" => "#FFFFFF"
    ]
];
$post_content = "";
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);
$post_content .= "<h2 id='webdevelopmentmedia' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Media Content</h2>";
$post_content .= renderGalleryWebMedia($post_data);
$post_content .= "<h2 id='visualmediaprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Visual Media Projects</h2>";
$post_content .= renderGalleryMedia($post_data);
$post_content .= renderVideoMedia($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>