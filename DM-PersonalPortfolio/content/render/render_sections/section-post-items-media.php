<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}
$posts = getDataJson('index-data-posts-projects', 'index');

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
                            <a class="dm-post-item-logo" href="<?php echo $post_path; ?>#visualmediaprojects" <?php echo $shine_animation; ?>
                               style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">
                                <?php echo  renderLogoPost($post_data); ?>
                                <?php
                                $media_image_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/media/";
                                if(file_exists($media_image_path)) :
                                    $dirs = getDirectoriesInFolder($media_image_path);
                                    $get_web_image = [];
                                    $dir_image_path ="";
                                    foreach ($dirs as $dir) :
                                        $get_web_image = getImagesInFolder($media_image_path.$dir."/");
                                        if ( count($get_web_image) > 0) :
                                            $dir_image_path = $dir."/";
                                            break;
                                        endif;
                                    endforeach;
                                    if(!empty( count($get_web_image) > 0 )) :
                                        $web_image = $get_web_image[0];
                                        echo renderImage($media_image_path.$dir_image_path.$web_image);
                                    endif;
                                endif;
                                ?>
                            </a>
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
                                    <a class="dm-post-item-title" href="<?php echo $post_path; ?>#visualmediaprojects">
                                        <?php echo $post_data["title"]; ?>
                                    </a>
                                    <?php if (isset($post_data["date"]) && !empty($post_data["date"])) : ?>
                                        <p class="dm-post-item-date">
                                            <?php SVGRenderer::renderSVG('clock'); ?>
                                            <span><?php echo $post_data["date"]["date_start"]?></span>
                                            <span> - </span>
                                            <span><?php echo $post_data["date"]["date_end"]?></span>
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