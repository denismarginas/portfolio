<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($posts)) :
    $posts = getDataJson('index-data-posts-projects', 'index');
endif;

$src_current = __DIR__ . "/../../../";

?>

<section class="dm-posts-list grid-background-animation">
    <container>
        <ul>
            <?php foreach ($posts as $post) : ?>

                <?php
                $post_path = pathinfo($post["file"], PATHINFO_FILENAME).$jsonGlobalData["page-slug-extension"];
                $post_data = $post["post_data"];
                ?>

                <?php if(isset($post_data["display"] ) && $post_data["display"] == "enable" && isset($post_data["exclude_from_search"] ) != "true" ) : ?>

                    <?php if( (in_array("Visual Media Projects", $post_data["categories"])) && ( !in_array("Miscellaneous Projects", $post_data["categories"])) ) : ?>

                        <li class="dm-post-item dm-post-item-media" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.4s" >

                            <?php if( strtoupper($post_data["colors"]["post_color_background"]) == "#FFFFFF") :
                                $shine_animation = 'data-animation="shine-gray"';
                            else :
                                $shine_animation = 'data-animation="shine"';
                            endif; ?>

                            <?php
                            $media_image_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/media/";
                            $media_texture_image = $GLOBALS['urlPath']."content/img/design-elements/overlay-texture-paper.webp";

                            if(file_exists($src_current.$media_image_path)) :
                                $dirs = getDirectoriesInFolder($src_current.$media_image_path);
                                $get_web_image = [];
                                $dir_image_path ="";

                                foreach ($dirs as $dir) :
                                    $get_web_image = getImagesInFolder($src_current.$media_image_path.$dir."/");
                                    if ( count($get_web_image) > 0) :
                                        $dir_image_path = $dir."/";
                                        break;
                                    endif;
                                endforeach;

                                if(!empty( count($get_web_image) > 0 )) :
                                    $web_image = $get_web_image[0];
                                    $first_img = $media_image_path.$dir_image_path.$web_image;
                                endif;

                            endif;
                            ?>

                            <?php if(isset($first_img)) : ?>

                                <a class="dm-post-view" href="<?php echo $post_path; ?>#visualmedia">
                                    <div class="photo"
                                         style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">
                                        <?php echo renderImage($first_img); ?>

                                        <div class="logo"
                                             style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">
                                            <?php echo  renderLogoPost($post_data); ?>
                                        </div>

                                        <div class="bg-overlay-color"
                                             style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">
                                        </div>

                                    </div>

                                    <?php if (isset($media_texture_image)) :
                                        echo renderImage($media_texture_image, false, "texture");
                                    endif; ?>

                                </a>

                            <?php else: ?>

                                <a class="dm-post-item-logo" href="<?php echo $post_path; ?>#visualmedia" <?php echo $shine_animation; ?>
                                   style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">

                                    <?php echo  renderLogoPost($post_data); ?>

                                    <?php if (isset($first_img)) :
                                        echo renderImage($first_img);
                                    endif; ?>

                                </a>

                            <?php endif; ?>

                            <div class="dm-post-item-details">
                                <ul class="dm-post-item-categories">
                                    <?php foreach ($post_data["categories"] as $post_category) : ?>
                                        <?php if( $post_category == "Visual Media Projects" ) : ?>
                                            <li>
                                                <span><?php echo $post_category;?></span>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="dm-post-item-heading">
                                    <a class="dm-post-item-title" href="<?php echo $post_path; ?>#visualmedia">
                                        <?php echo $post_data["title"]; ?>
                                    </a>
                                    <?php if (isset($post_data["date"]) && !empty($post_data["date"])) : ?>
                                        <p class="dm-post-item-date">
                                            <?php SVGRenderer::renderSVG('clock'); ?>
                                            <span>
                                                <?php echo extractYearFromDateString($post_data["date"]["date_end"]); ?>
                                            </span>
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