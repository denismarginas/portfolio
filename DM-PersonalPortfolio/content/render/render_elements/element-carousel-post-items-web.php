<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}
if(!isset($posts)) {
    $posts = getDataJson('index-data-posts-projects', 'index');
}

usort($posts, "dateStartPostSortDesc");
usort($posts, "personalTypePostProjectSortAsc");

$nr_item = 1;
$max_items = 12;
?>


<?php if(count($posts) >= 1 && !empty($posts)) : ?>
    <div class="scroller" data-direction="right" data-speed="slow">
        <ul class="carousel-list scroller__inner">
            <?php
            foreach ($posts as $post) :
                $post_path = pathinfo($post["file"], PATHINFO_FILENAME) . $jsonGlobalData["page-slug-extension"];
                $post_data = $post["post_data"];

                if (
                    isset($post["post_data"]["categories"]) &&
                    in_array("Web Development Projects", $post["post_data"]["categories"]) &&
                    !in_array("Visual Media Projects", $post["post_data"]["categories"]) &&
                    !in_array("Miscellaneous Projects", $post["post_data"]["categories"]) &&
                    $max_items > $nr_item
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

