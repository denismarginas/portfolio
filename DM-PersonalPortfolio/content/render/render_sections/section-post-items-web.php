<?php $posts = extractDataPosts( __DIR__ . "/../render_posts/projects/" ); ?>



<section class="dm-posts-list grid-background-animation">
    <container>
        <ul>
            <?php foreach ($posts as $post) : ?>
                <?php
                $post_path = pathinfo($post[0], PATHINFO_FILENAME).".html";
                $post_data = $post[1];
                ?>
                <?php if(  isset($post_data["display"] ) && ( $post_data["display"] == "enable") ) : ?>
                    <?php if( (in_array("Web Development Projects", $post_data["categories"])) && ( !in_array("Miscellaneous Projects", $post_data["categories"])) ) : ?>
                        <li class="dm-post-item dm-post-item-web" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.4s" >
                            <?php if( strtoupper($post_data["colors"]["post_color_background"]) == "#FFFFFF") :
                                $shine_animation = 'data-animation="shine-gray"';
                            else :
                                $shine_animation = 'data-animation="shine"';
                            endif; ?>
                            <a class="dm-post-item-logo" href="<?php echo $post_path; ?>#webdevelopmentprojects" <?php echo $shine_animation; ?>
                               style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">
                                <?php echo renderLogoPost($post_data); ?>
                                <?php
                                $web_image_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/web/home/";
                                if(file_exists($web_image_path)) :
                                    $get_web_image = getImagesInFolder($web_image_path);
                                    if(!empty( count($get_web_image) > 0 )) :
                                        $web_image = $get_web_image[0];
                                        echo renderImage($web_image_path.$web_image);
                                    endif;
                                endif;
                                ?>
                            </a>
                            <div class="dm-post-item-details">
                                <ul class="dm-post-item-categories">
                                    <?php foreach ($post_data["categories"] as $post_category) : ?>
                                        <?php if( $post_category == "Web Development Projects" ) : ?>
                                            <li>
                                                <span><?php echo $post_category;?></span>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="dm-post-item-heading dm-post-web-data">
                                    <a class="dm-post-item-title" href="<?php echo $post_path; ?>#webdevelopmentprojects">
                                        <?php echo $post_data["title"]; ?>
                                    </a>
                                    <?php if (isset($post_data["web_url"]) && !empty($post_data["web_url"])) : ?>
                                        <a class="dm-post-item-website" href="<?php echo addHttps($post_data["web_url"]); ?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('new-tab'); ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (isset($post_data["date"]["date_end"]) && !empty($post_data["date"]["date_end"])) : ?>
                                        <p class="dm-post-item-date">
                                            <?php SVGRenderer::renderSVG('clock'); ?>
                                            <span>Last update: <?php echo $post_data["date"]["date_end"]?></span>
                                        </p>
                                    <?php endif; ?>
                                </div>
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