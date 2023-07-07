<?php $posts = extractDataPosts( __DIR__ . "/../render_posts/" ); ?>



<section class="dm-posts-list grid-background-animation">
    <container>
        <ul>
            <?php foreach ($posts as $post) : ?>
                <?php
                $post_path = pathinfo($post[0], PATHINFO_FILENAME).".html";
                $post_data = $post[1];
                ?>
                <li class="dm-post-item">
                    <a class="dm-post-item-logo" href="<?php echo $post_path; ?>" data-animation="shine"
                       style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">
                        <?php echo renderLogoPost($post_data); ?>
                    </a>
                    <div class="dm-post-item-details">
                        <ul class="dm-post-item-categories">
                            <?php foreach ($post_data["categories"] as $post_category) : ?>
                                <li>
                                    <span><?php echo $post_category;?></span>
                                </li>
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
            <?php endforeach; ?>
        </ul>
    </container>
</section>