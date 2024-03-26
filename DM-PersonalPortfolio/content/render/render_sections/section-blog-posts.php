<?php

$jsonBlogData = getDataJson('data-blog-activity', 'data');

?>

<section class="dm-blog-posts grid-background-animation">
    <container>
        <div class="dm-blog-posts-section">
            <?php $post_nr = 1; ?>
            <?php foreach ($jsonBlogData["blog-posts"] as $post) : ?>

            <div class="dm-blog-post"  id="<?php echo $post_nr; ?>">
                <div class="dm-blog-post-user-data">
                    <div class="dm-blog-post-user-logo">

                        <?php if(isset($jsonBlogData["blog-img-logo"])) :
                            echo renderImage($GLOBALS['urlPath'].$jsonBlogData["blog-img-logo"]);
                        endif; ?>
                    </div>
                    <div class="dm-blog-post-information">

                        <h5 class="dm-blog-post-user-name">
                            <?php if(isset($jsonBlogData["blog-username"])) :
                                echo $jsonBlogData["blog-username"];
                            endif; ?>
                        </h5>

                        <?php if(isset($post["date"])) : ?>
                            <p class="dm-blog-post-date">
                                <?php echo DateTime::createFromFormat('d-m-Y', $post["date"])->format('j F, Y'); ?>
                            </p>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="dm-blog-post-content">

                        <?php if(isset($post["description"])) : ?>
                            <div class="dm-blog-post-content-text<?php if (substr_count($post["description"], "\n") + 1 > 4 || strlen($post["description"]) > 150) : echo " see-more"; endif; ?>">
                                <?php echo nl2br($post["description"]); ?>
                            </div>

                            <?php if (substr_count($post["description"], "\n") + 1 > 4 || strlen($post["description"]) > 150) : ?>
                                <p class="dm-blog-post-description-show">See More</p>
                            <?php endif; ?>

                        <?php endif; ?>


                    <?php if(isset($post["sections"])) :
                        foreach ($post["sections"] as $section) : ?>

                            <?php if(isset($section["section-description"])) : ?>

                                <div class="dm-blog-post-section-text<?php if (substr_count($section["section-description"], "\n") + 1 > 4 || strlen($section["section-description"]) > 150) : echo " see-more"; endif; ?>">
                                    <?php echo $section["section-description"]; ?>
                                </div>

                                <?php if (substr_count($section["section-description"], "\n") + 1 > 4 || strlen($section["section-description"]) > 150) : ?>
                                    <p class="dm-blog-post-section-description-show">See More</p>
                                <?php endif; ?>

                            <?php endif; ?>

                            <?php if(isset($section["buttons"])) : ?>
                                <div class="dm-blog-post-section-buttons">
                                    <?php foreach ($section["buttons"] as $button) : ?>
                                        <?php if( isset($button["link"]) && !empty($button["link"]) ) :
                                            if (strpos($button["link"], 'http') === 0 || strpos($button["link"], 'www') === 0) :
                                                $button_link = $button["link"];
                                            else :
                                                $button_link = $GLOBALS['urlPath'] . $button["link"];
                                            endif; ?>

                                            <a data-button="primary" target="_blank" href=<?php echo $button_link; ?>>

                                                <?php if( isset($button["icon"]) ) :
                                                    SVGRenderer::renderSVG($button["icon"]);
                                                endif; ?>

                                                <?php if( isset($button["text"]) ) : ?>
                                                    <span>
                                                        <?php echo $button["text"]; ?>
                                                    </span>
                                                <?php endif; ?>
                                            </a>

                                        <?php endif;
                                    endforeach; ?>
                                </div>
                            <?php endif;
                        endforeach;
                    endif; ?>

                    <?php if(isset($post["media"])) : ?>
                        <div class="dm-blog-post-content-media">

                            <?php
                            $count_images = 0;
                            $images = [];
                            foreach ($post["media"] as $media) :
                                if($media["type"] == "photo") :
                                    $count_images ++;
                                    $images[] = renderImage($GLOBALS['urlPath'].$media["path"], true);
                                endif;
                            endforeach;
                            if ($count_images >= 2) :
                                echo renderSlider($images, true, false);
                            endif;
                            ?>

                            <?php foreach ($post["media"] as $media) : ?>
                                    <?php if(($count_images < 2) && $media["type"] == "photo") :
                                        echo renderImage($GLOBALS['urlPath'].$media["path"], true);
                                    elseif( $media["type"] == "video" && isset($media["thumbnail"]) ) :
                                        echo renderVideo($GLOBALS['urlPath'].$media["path"],$GLOBALS['urlPath'].$media["thumbnail"]);
                                    elseif( $media["type"] == "video" ) :
                                        echo renderVideo($GLOBALS['urlPath'].$media["path"]);
                                    endif; ?>
                            <?php endforeach; ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>

            <?php $post_nr++; ?>

        <?php endforeach; ?>

        </div>
    </container>
</section>