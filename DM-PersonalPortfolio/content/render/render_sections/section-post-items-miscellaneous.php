<?php
$posts = getDataJson('index-data-posts-projects', 'index');
?>

<section class="dm-posts-list grid-background-animation">
    <container>
        <ul>
            <?php foreach ($posts as $post) : ?>
                <?php
                $post_path = pathinfo($post["file"], PATHINFO_FILENAME).".html";
                $post_data = $post["post_data"];
                ?>
                <?php if( isset($post_data["display"] ) && ( $post_data["display"] == "enable") ) : ?>
                    <?php if( in_array("Miscellaneous Projects", $post_data["categories"]) ) : ?>
                        <li class="dm-post-item" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.4s" >
                            <?php if( strtoupper($post_data["colors"]["post_color_background"]) == "#FFFFFF") :
                                $shine_animation = 'data-animation="shine-gray"';
                            else :
                                $shine_animation = 'data-animation="shine"';
                            endif; ?>
                            <a class="dm-post-item-logo" href="<?php echo $post_path; ?>" <?php echo $shine_animation; ?>
                               style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">
                                <?php echo  renderLogoPost($post_data); ?>
                            </a>
                            <div class="dm-post-item-details">
                                <ul class="dm-post-item-categories">
                                    <?php foreach ($post_data["categories"] as $post_category) : ?>
                                        <?php if( $post_category == "Miscellaneous Projects" ) : ?>
                                            <li>
                                                <span><?php echo $post_category;?></span>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                                <a class="dm-post-item-title" href="<?php echo $post_path; ?>">
                                    <?php echo $post_data["title"]; ?>
                                </a>
                                <p class="dm-post-item-description">
                                    <?php echo getFirstCharacters($post_data["description"], 130); ?>
                                </p>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endif;?>
            <?php endforeach; ?>
        </ul>
    </container>
</section>