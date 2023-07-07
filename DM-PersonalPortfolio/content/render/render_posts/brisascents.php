
<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
  "visibility" => "enable",
  "post_type" => "portfolio",
  "media_path" => "brisascents",
  "title" => "Brisa Scents",
  "logo" => "logo/logo.png",
  "logo_type" => "png",
  "description" => "I have continued this project from a stage of 20% - 30% done, a WordPress website for perfume and spray sales. User-friendly interface, diverse product collection. Secure transactions, detailed descriptions. Contact page for customer support.",
  "categories" => [
    "Web Development Projects"
  ],
  "website_url" => "www.brisa-scents.ro",
  "website_platform" => "Wordpress",
  "website_status" => "Done",
  "employ" => "Pia Soft Product",
  "date" => "10.2020 - 12.2020",
  "tags" => [
              "web"
  ],
  "colors" => [
    "post_color_primary" => "#f5e39d",
    "post_color_secondary" => "#222222",
    "post_color_background" => "#FFFFFF",
    "post_color_text_on_background" => "#FFFFFF"
  ]
];

$post_content = "";
$post_content .= "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>Web Development Projects</h2>";
$post_content .= renderGalleryWeb($post_data);


$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);


// Function Footer
$renderer_structure->footer();

?>