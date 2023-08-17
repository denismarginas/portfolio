<?php
$posts = extractDataPosts(__DIR__ . "/../render_posts/");
usort($posts, "dateStartSortDesc");
?>



<section class="dm-carousel-posts-list">
    <container data-motion="transition-fade-0">
        <?php
        $renderer = new RendererElements();
        $renderer->renderElement('carousel-post-items-web');
        $renderer->renderElement('carousel-post-items-media');
        ?>
    </container>
</section>