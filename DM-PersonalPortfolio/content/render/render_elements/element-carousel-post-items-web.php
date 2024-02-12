<?php
$posts = extractDataPosts(__DIR__ . "/../render_posts/projects/");
usort($posts, "dateStartSortDesc");
?>




<ul class="carousel-list right-slider web-slider">
    <?php
    $nr_item = 1;
    $max_items = 20;

    for ($render_count = 0; $render_count < 2; $render_count++) {
        foreach ($posts as $post) :
            $post_path = pathinfo($post[0], PATHINFO_FILENAME) . ".html";
            $post_data = $post[1];

            if (
              in_array("Web Development Projects", $post[1]["categories"]) &&
              !in_array("Visual Media Projects", $post[1]["categories"]) &&
              !in_array("Miscellaneous Projects", $post[1]["categories"]) &&
              $max_items > $nr_item
            ) :
                ?>

                <li class="carousel-item">
                    <?php if (strtoupper($post_data["colors"]["post_color_background"]) == "#FFFFFF") :
                        $shine_animation = 'data-animation="shine-gray"';
                    else :
                        $shine_animation = 'data-animation="shine"';
                    endif; ?>

                    <a class="dm-post-item-logo" href="<?php echo $post_path; ?>" <?php echo $shine_animation; ?>
                       style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">
                        <?php echo renderLogoPost($post_data, false, false, false); ?>
                        <?php /*
                                $web_image_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/web/home/";
                                $media_image_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/media/";

                                if(file_exists($web_image_path)) :
                                    $get_web_image = getImagesInFolder($web_image_path);
                                    if(!empty( count($get_web_image) > 0 )) :
                                        $web_image = $get_web_image[0];
                                        echo renderImage($web_image_path.$web_image);
                                    endif;
                                endif; */
                        ?>
                    </a>
                </li>

                <?php $nr_item += 1;
            endif;
        endforeach;
        // Reset $nr_item after each loop iteration
        $nr_item = 1;
    }
    ?>

</ul>
