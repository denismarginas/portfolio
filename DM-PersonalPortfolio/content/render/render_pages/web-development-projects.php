<?php

$seo = [
    "title" => "Web Development Projects | Denis Marginas",
    "description" => "Category: Web Development Projects. Showcase of websites and online shops I have created, featuring engaging designs and seamless functionality.",
    "keywords" => "denis marginas web development projects",
    "slug" => "web-development-projects"
];

$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header($seo);

$categories = ["Web Development Projects", "Visual Media Projects", "Miscellaneous Projects"];


echo '<section class="dm-catalog-categories">
    <container>
        <div>
            <h2 data-motion="transition-fade-0" data-duration="0.7s" data-delay="0.1s">Web Development Projects</h2>
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

$renderer_sections->renderSection('post-items-web');


// Function Footer
$renderer_structure->footer();

?>