<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$post_data = [
    "post_type" => "portfolio",
    "media_path" => "agromir",
    "title" => "Agromir",
    "logo" => "logo.jpg",
    "logo_type" => "jpg",
    "description" => "The online shop for tools, industrial equipment tires, tractor tires is made in Prestashop 1.7. The products cannot be added to the cart, but there are 3 buttons to contact by phone for the product and 1 button to contact by email. The contact form was created by editing TPL, HTML, CSS, and an iframe with a WordPress page with the Contact Form 7 module. The site has implemented modules from Prestashop Addons such as JoliSearch, Amazing gallery and other modules purchased or adapted free of charge for the site. A button is displayed to contact via Whatsapp for products through a module that has been modified via JS to display various texts at a certain time.",
    "category" => "Website & Media",
    "website_url" => "www.agromir.ro",
    "website_platform" => "Prestashop",
    "website_status" => "Done",
    "media_facebook_url" => "https://www.facebook.com/cauciucuriagricole",
    "media_instagram_url" => "https://www.instagram.com/agromir_insta/",
    "employ" => "Pia Soft Product",
    "date" => "2020-2022",
];
$post_content="<p>CONTENT AGROMIR</p>";

$renderer_sections->renderSection('post', "wrapper-layout", [$post_data, $post_content]);




// Function Footer
$renderer_structure->footer();

?>