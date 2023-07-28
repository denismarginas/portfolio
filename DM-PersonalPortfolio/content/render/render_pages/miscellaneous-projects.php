<?php
$renderer_structure = new RendererStructure();
$renderer_sections = new RendererSections();

// Function Header
$renderer_structure->header();

$categories = ["Web Development Projects", "Visual Media Projects", "Miscellaneous Projects"];


echo '<section class="dm-catalog-categories">
    <container>
        <div>
            <h2 data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.7s" data-delay="0.1s">Miscellaneous Projects</h2>
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
$renderer_sections->renderSection('post-items-miscellaneous');


// Function Footer
$renderer_structure->footer();

?>