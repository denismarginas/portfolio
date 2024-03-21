<?php
$posts = getDataJson('index-data-posts-projects', 'index');

$nr_item = 1;
$max_items = 10;
?>


<?php if(count($posts) >= 1) : ?>

    <ul class="carousel-list left-slider media-slider" style="min-width: calc((<?php echo $max_items ?> * var(--dm-spacing-tertiary)) + (<?php echo $max_items ?> * 200px ) );">
        <?php
        for ($render_count = 0; $render_count < 2; $render_count++) {
            foreach ($posts as $post) :
                $post_path = pathinfo($post["file"], PATHINFO_FILENAME) . ".html";
                $post_data = $post["post_data"];

                if (
                    isset($post["post_data"]["categories"]) &&
                    !in_array("Web Development Projects", $post["post_data"]["categories"]) &&
                    in_array("Visual Media Projects", $post["post_data"]["categories"]) &&
                    !in_array("Miscellaneous Projects", $post["post_data"]["categories"]) &&
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
                            <?php echo  renderLogoPost($post_data, false, false, false); ?>

                        </a>
                    </li>

                    <?php $nr_item += 1;
                endif;
            endforeach;

            $nr_item = 1;
        }
        ?>
    </ul>

<?php endif; ?>

