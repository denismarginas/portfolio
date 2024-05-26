<?php

if(!isset($posts)) {
    $posts = extractDataPosts( __DIR__ . "/../render_posts/projects/" , "data-posts-projects");
}
if(!isset($layout)) {
    $layout = "standard";
}

?>

<section id="dm-carousel-posts" class="dm-carousel-posts-list" data-layout="<?php echo $layout; ?>">
    <container data-motion="transition-fade-0">
        <?php
        $renderer = new RendererElements();

        $elements = [
            ['carousel-post-items-web'],
            ['carousel-post-items-web-device-layouts', "standard"],
            ['carousel-post-items-media']
        ];

        $renderedCount = 0;

        foreach ($elements as $element) :
            if( !isset($element[1]) || isset($element[1]) && $element[1] == $layout ):
                $carousel_direction = ($renderedCount % 2 == 0) ? "right" : "left";
                $renderer->renderElement($element[0], "", ["carousel_direction" => $carousel_direction]);
                $renderedCount++;
            endif;
        endforeach;

        ?>
    </container>
</section>