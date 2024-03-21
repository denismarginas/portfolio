<?php

$seo = [
    "title" => "Catalog | Denis Marginas",
    "description" => "Showcase of projects I have created or I was involved, featuring designs and functionality of media content and websites.",
    "keywords" => "denis marginas",
    "slug" => "catalog"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);

$categories = ["Web Development Projects", "Visual Media Projects", "Miscellaneous Projects"];


echo '<section class="dm-catalog-categories">
    <container>
        <div>
            <h2 data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.7s" data-delay="0.1s">Projects</h2>
        </div>
    </container>
    <!-- Ocean Animation Start -->

    <div class="ocean" data-motion="transition-fade-0" data-duration="4s" data-delay="0s">
        <div class="wave" style="margin-top: 65px;"></div>
        <div class="wave" style="margin-top: 70px;"></div>
        <div class="wave" style="margin-top: 80px;"></div>
    </div>

    <!-- Ocean Animation End -->
</section>';

$renderer_sections->renderSection('post-items');

// Function Footer
$renderer_structure->footer();

?>