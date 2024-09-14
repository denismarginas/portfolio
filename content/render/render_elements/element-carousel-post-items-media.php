<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($posts)) :
    $posts = getDataJson('index-data-posts-projects', 'index');
endif;

if(!isset($carousel_direction)) :
    $carousel_direction = "right";
endif;

if(!isset($carousel_speed)) :
    $carousel_speed = "slow";
endif;

if(!isset($offset_items)) :
    $offset_items = 0;
endif;

if(!isset($max_items)) :
    $max_items = 12;
endif;

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
                    //!in_array("Web Development Projects", $post["post_data"]["categories"]) &&
                    in_array("Visual Media Projects", $post["post_data"]["categories"]) &&
                    !in_array("Miscellaneous Projects", $post["post_data"]["categories"]) &&
                    $max_items >= $nr_item &&
                    $nr_item > $offset_items
                ) :
                    ?>

                    <li class="carousel-item">
                        <a class="dm-post-item-image" href="<?php echo $post_path; ?>"
                           style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">

                            <?php if (isset($post_data["logo"]) && isset($post_data["logo_path"])) : ?>
                                <?php $logo = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["logo_path"]."/".$post_data["logo"]; ?>

                                <?php if (isset($post_data["logo_type"]) && !empty($post_data["logo_type"]) && $post_data["logo_type"] == "svg") : ?>
                                    <?php SVGRenderer::renderSVG( $post_data["logo"] ); ?>
                                <?php else : ?>
                                    <?php echo renderImage($logo, false, "logo", true, ["alt" => "Post Logo - ".$post_data["title"]]); ?>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if (isset($post_data["thumbnail"]) && isset($post_data["thumbnail_path"])) : ?>
                                <?php $thumbnail = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["thumbnail_path"]."/".$post_data["thumbnail"]; ?>

                                <?php echo renderImage($thumbnail, false, "thumbnail", true, ["alt" => "Post Thumbnail - ".$post_data["title"]]); ?>

                            <?php endif; ?>

                        </a>
                    </li>
                    <?php $nr_item += 1;
                endif;
            endforeach; ?>
        </ul>
    </div>

<?php endif; ?>

