<?php

$posts = getDataJson('index-data-posts-projects', 'index');

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}

$search_and_sort_bar = true;

?>




<section class="dm-posts-list grid-background-animation">
    <container>
        <?php if(isset($search_and_sort_bar) ) :
            $renderer = new RendererElements();
            $renderer->renderElement('post-search-bar');
        endif; ?>

        <ul id="post-list">
            <?php foreach ($posts as $post) : ?>
                <?php
                $post_path = pathinfo($post["file"], PATHINFO_FILENAME).$jsonGlobalData["page-slug-extension"];
                $post_data = $post["post_data"];
                ?>
                <?php if( isset($post_data["display"] ) && $post_data["display"] == "enable" && isset($post_data["exclude_from_search"] ) != "true" ) : ?>
                    <li class="dm-post-item dm-post-item-media" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.4s" >
                        <?php if( strtoupper($post_data["colors"]["post_color_background"]) == "#FFFFFF") :
                            $shine_animation = 'data-animation="shine-gray"';
                        else :
                            $shine_animation = 'data-animation="shine"';
                        endif; ?>
                        <a class="dm-post-item-logo" href="<?php echo $post_path; ?>" <?php echo $shine_animation; ?>
                           style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">
                            <?php echo  renderLogoPost($post_data); ?>
                            <?php
                            $web_image_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/web/home/";
                            $media_image_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/media/";

                            if(file_exists($web_image_path)) :
                                $get_web_image = getImagesInFolder($web_image_path);
                                if(!empty( count($get_web_image) > 0 )) :
                                    $web_image = $get_web_image[0];
                                    echo renderImage($web_image_path.$web_image);
                                endif;
                            elseif (file_exists($media_image_path)) :
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
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </container>
</section>