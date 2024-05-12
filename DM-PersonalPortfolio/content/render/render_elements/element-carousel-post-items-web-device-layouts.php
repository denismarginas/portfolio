<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}
if(!isset($posts)) {
    $posts = getDataJson('index-data-posts-projects', 'index');
}

usort($posts, "dateStartPostSortDesc");
usort($posts, "personalTypePostProjectSortAsc");

$nr_item = 1;
$max_items = 8;

$device_layout_laptop_img = "device-layout-laptop.webp";
$device_layout_phone_img = "device-layout-phone.webp";

$device_layout_img_path = $GLOBALS['urlPath'] . "content/img/" ."design-elements" ."/";


?>


<?php if(count($posts) >= 1 && !empty($posts)) : ?>
    <div class="scroller" data-direction="left" data-speed="slow">
        <ul class="carousel-list-devices scroller__inner">
            <?php foreach ($posts as $post) :
                $have_web_desktop_image = false;
                $have_web_phone_image = false;

                $post_path = pathinfo($post["file"], PATHINFO_FILENAME) . $jsonGlobalData["page-slug-extension"];
                $post_data = $post["post_data"];

                if( isset($post_data["post_type"]) && isset($post_data["media_path"])) :
                    $web_image_path = $GLOBALS['urlPath'] . "content/img/" . $post_data["post_type"] . "/" . $post_data["media_path"] . "/web/home/";
                    if (file_exists($web_image_path)) :
                        $get_web_image = getImagesInFolder($web_image_path);
                        if (!empty(count($get_web_image) > 0)) :
                            $web_image = $get_web_image[0];
                            $have_web_desktop_image = true;
                        endif;
                    endif;
                endif;

                if( isset($post_data["post_type"]) && isset($post_data["media_path"])) :
                    $web_phone_image_path = $GLOBALS['urlPath'] . "content/img/" . $post_data["post_type"] . "/" . $post_data["media_path"] . "/web/phone/";
                    if (file_exists($web_phone_image_path)) :
                        $get_web_phone_image = getImagesInFolder($web_phone_image_path);
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
                    isset($post["post_data"]["categories"]) &&
                    in_array("Web Development Projects", $post["post_data"]["categories"]) &&
                    !in_array("Visual Media Projects", $post["post_data"]["categories"]) &&
                    !in_array("Miscellaneous Projects", $post["post_data"]["categories"]) &&
                    $have_web_desktop_image != false &&
                    $max_items > $nr_item
                ) :
                    ?>

                    <li class="carousel-item">
                        <a class="dm-post" href="<?php echo $post_path; ?>"
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
                        </a>
                    </li>
                    <?php $nr_item += 1;
                endif;
            endforeach; ?>
        </ul>
    </div>

<?php endif; ?>

