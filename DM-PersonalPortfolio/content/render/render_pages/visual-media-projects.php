<?php

$seo = [
    "title" => "Visual Media Projects | Denis Marginas",
    "description" => "Category: Visual Media Projects. Collection of visually captivating projects showcasing my expertise in graphic design, photo editing, and video production.",
    "keywords" => "denis marginas visual media projects",
    "slug" => "visual-media-projects"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);

$categories = ["Web Development Projects", "Visual Media Projects", "Miscellaneous Projects"];


echo '<section class="dm-catalog-categories">
    <container>
        <div>
            <h2 data-motion="transition-fade-0" data-delay="0.1s">Visual Media Projects</h2>
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

$renderer_sections->renderSection('post-items-media');


// Function Footer
$renderer_structure->footer();

?>