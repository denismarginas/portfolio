<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(isset($post_data) && !empty($post_data)) :
    $have_photo_content = false;
    $have_video_content = false;
    $device_layout_img_path = $GLOBALS['urlPath'] . "content/img/" ."design-elements" ."/";
    $src_current = __DIR__ . "/../../../";
    $device_layout_tablet_img = "device-layout-tablet.webp";
    $device_layout_tablet_vid = "device-layout-tablet-landscape.webp";

    if( isset($post_data["post_type"]) && isset($post_data["media_path"])) :

        // Get First Photo - from project directories
        $media_image_path = $GLOBALS['urlPath'] . "content/img/" . $post_data["post_type"] . "/" . $post_data["media_path"] . "/media/";

        if (file_exists($src_current . $media_image_path)) :
            $get_media_image = getImagesInFolder($src_current . $media_image_path);
            $dir_image_path = "";

            if (count($get_media_image) === 0) :
                $dirs = getDirectoriesInFolder($src_current . $media_image_path);

                foreach ($dirs as $dir) :
                    $get_media_image = getImagesInFolder($src_current . $media_image_path . $dir . "/");
                    if (count($get_media_image) > 0) :
                        $dir_image_path = $dir . "/";
                        break;
                    endif;
                endforeach;
            endif;

            if (count($get_media_image) > 0) :
                $photo_image = $get_media_image[0];
                $first_img = $media_image_path . $dir_image_path . $photo_image;
                $have_photo_content = true;
            endif;
        endif;

        // Get First Video - from project directories
        $media_video_path = $GLOBALS['urlPath'] . "content/vid/" . $post_data["post_type"] . "/" . $post_data["media_path"] . "/";

        if (file_exists($src_current . $media_video_path)) :
            $get_media_video = getVideosInFolder($src_current . $media_video_path);
            $dir_video_path = "";

            if (count($get_media_video) === 0) :
                $dirs = getDirectoriesInFolder($src_current . $media_video_path);

                foreach ($dirs as $dir) :
                    $get_media_video = getVideosInFolder($src_current . $media_video_path . $dir . "/");
                    if (count($get_media_video) > 0) :
                        $dir_video_path = $dir . "/";
                        break;
                    endif;
                endforeach;
            endif;

            if (count($get_media_video) > 0) :
                $video_file_name = $get_media_video[0];
                $first_vid = $media_video_path . $dir_video_path . $video_file_name;
                $have_video_content = true;
            endif;
        endif;

    endif;

    $render_bg_color = '';

    if(isset($post_data["colors"]) && isset($post_data["colors"]["post_color_primary"])) :
        $render_bg_color = 'style="background-color: '.$post_data["colors"]["post_color_primary"].'"';
    endif;

    if ($have_photo_content != false && in_array("photo", $post_data["tags"]) ) : ?>

        <div class="devices-item-media type-img">
            <div class="dm-post"
               style="--primary-color-post: <?php echo $post_data["colors"]["post_color_primary"]; ?>;">
                <div class="device-layout-tablet">
                    <div class="screen" <?php echo $render_bg_color; ?> >
                        <?php echo  renderImage($first_img, false, "photo-image"); ?>

                        <?php if(isset( $render_bg_color ) && !empty( $render_bg_color )) : ?>
                            <div class="shadow-color" <?php echo $render_bg_color; ?>></div>
                        <?php endif; ?>
                    </div>
                    <?php echo renderImage($device_layout_img_path . $device_layout_tablet_img, false, "tablet"); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($have_video_content != false && in_array("video", $post_data["tags"]) ) : ?>
        <div class="devices-item-media type-vid" >
            <div class="dm-post"
                 style="--primary-color-post: <?php echo $post_data["colors"]["post_color_primary"]; ?>;">
                <div class="device-layout-tablet-landscape">
                    <div class="screen" <?php echo $render_bg_color; ?> >
                        <?php echo SVGRenderer::renderSVG( "play" ); ?>
                        <video src="<?php echo $first_vid; ?>"></video>

                        <?php if(isset( $render_bg_color ) && !empty( $render_bg_color )) : ?>
                            <div class="shadow-color" <?php echo $render_bg_color; ?>></div>
                        <?php endif; ?>
                    </div>
                    <?php echo renderImage($device_layout_img_path . $device_layout_tablet_vid, false, "tablet-landscape"); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>




