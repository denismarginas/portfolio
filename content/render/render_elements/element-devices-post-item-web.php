<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(isset($post_data) && !empty($post_data)) :
    $have_web_desktop_image = false;
    $have_web_phone_image = false;
    $data = getDataJson('data-content-personal', 'data')["post-projects"]["img"] ?? [];
    $device_layout_laptop_img = $data["devices"]["post-laptop"] ?? "";
    $device_layout_phone_img = $data["devices"]["post-phone"] ?? "";
    $device_layout_img_path = $GLOBALS['urlPath'];
    $src_current = __DIR__ . "/../../../";


    if( isset($post_data["post_type"]) && isset($post_data["media_path"])) :
        $web_image_path = $GLOBALS['urlPath'] . "content/img/" . $post_data["post_type"] . "/" . $post_data["media_path"] . "/web/home/";
        if (file_exists($src_current.$web_image_path)) :
            $get_web_image = getImagesInFolder($src_current.$web_image_path);
            if (!empty(count($get_web_image) > 0)) :
                $web_image = $get_web_image[0];
                $have_web_desktop_image = true;
            endif;
        endif;
    endif;

    if( isset($post_data["post_type"]) && isset($post_data["media_path"])) :
        $web_phone_image_path = $GLOBALS['urlPath'] . "content/img/" . $post_data["post_type"] . "/" . $post_data["media_path"] . "/web/phone/";
        if (file_exists($src_current.$web_phone_image_path)) :
            $get_web_phone_image = getImagesInFolder($src_current.$web_phone_image_path);
            if (!empty(count($get_web_phone_image) > 0)) :
                $phone_image = $get_web_phone_image[0];
                $have_web_phone_image = true;
            endif;
        endif;
    endif;

    $render_bg_color = '';

    if(isset($post_data["colors"]) && isset($post_data["colors"]["post_color_primary"])) :
        $render_bg_color = 'style="background-color: '.$post_data["colors"]["post_color_primary"].'"';
    endif;

    if (
        $have_web_desktop_image != false &&
        in_array("web", $post_data["tags"])
    ) :
        ?>

        <div class="devices-item-web">
            <div class="dm-post"
               style="--primary-color-post: <?php echo $post_data["colors"]["post_color_primary"]; ?>;">
                <div class="device-layout-laptop">
                    <div class="screen" <?php echo $render_bg_color; ?> >
                        <?php echo  renderImage($web_image_path . $web_image, false, "web-desktop-image"); ?>

                        <?php if(isset($render_bg_color) && !empty($render_bg_color)) : ?>
                            <div class="shadow-color" <?php echo $render_bg_color; ?>></div>
                        <?php endif; ?>
                    </div>
                    <?php echo renderImage($device_layout_img_path . $device_layout_laptop_img, false, "laptop"); ?>
                </div>
                <?php if( $have_web_phone_image ): ?>
                    <div class="device-layout-phone">
                        <div class="screen" <?php echo $render_bg_color; ?> >
                            <?php echo  renderImage($web_phone_image_path . $phone_image, false, "web-phone-image"); ?>

                            <?php if(isset($render_bg_color) && !empty($render_bg_color)) : ?>
                                <div class="shadow-color" <?php echo $render_bg_color; ?>></div>
                            <?php endif; ?>
                        </div>
                        <?php echo renderImage($device_layout_img_path . $device_layout_phone_img, false, "phone"); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>




