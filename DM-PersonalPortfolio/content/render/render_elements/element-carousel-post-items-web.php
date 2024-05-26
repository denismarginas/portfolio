<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}
if(!isset($posts)) {
    $posts = getDataJson('index-data-posts-projects', 'index');
}
if(!isset($carousel_direction)) {
    $carousel_direction = "right";
}
if(!isset($carousel_speed)) {
    $carousel_speed = "slow";
}
if(!isset($offset_items)) {
    $offset_items = 0;
}
if(!isset($max_items)) {
    $max_items = 12;
}

usort($posts, "dateStartPostSortDesc");
usort($posts, "personalTypePostProjectSortAsc");

?>


<?php if(count($posts) >= 1 && !empty($posts)) : ?>
    <div class="scroller" data-direction="<?php echo $carousel_direction ?>" data-speed="<?php echo $carousel_speed ?>" data-motion="transition-fade-0">
        <ul class="carousel-list scroller__inner">
            <?php
            $nr_item = 1;

            foreach ($posts as $post) :
                $post_path = pathinfo($post["file"], PATHINFO_FILENAME) . $jsonGlobalData["page-slug-extension"];
                $post_data = $post["post_data"];

                if (
                    isset($post["post_data"]["categories"]) &&
                    in_array("Web Development Projects", $post["post_data"]["categories"]) &&
                    !in_array("Visual Media Projects", $post["post_data"]["categories"]) &&
                    !in_array("Miscellaneous Projects", $post["post_data"]["categories"]) &&
                    $max_items > $nr_item &&
                    $nr_item > $offset_items
                ) :
                    ?>

                    <li class="carousel-item">

                        <a class="dm-post-item-logo" href="<?php echo $post_path; ?>"
                           style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">
                            <?php echo  renderLogoPost($post_data, false, false, false); ?>

                        </a>
                    </li>
                    <?php $nr_item += 1;
                endif;
            endforeach; ?>
        </ul>
    </div>

<?php endif; ?>

