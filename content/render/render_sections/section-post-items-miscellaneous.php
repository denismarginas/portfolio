<?php
$data = getDataJson('data-content-personal', 'data')["post-projects"]["img"] ?? [];

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($posts)) :
    $posts = getDataJson('index-data-posts-projects', 'index');
endif;

if(!isset($device_layout_laptop_img)) :
    $device_layout_laptop_img = $data["devices"]["post-laptop"] ?? "";
endif;

if(!isset($device_layout_phone_img)) :
    $device_layout_phone_img = $data["devices"]["post-phone"] ?? "";
endif;

if(!isset($device_layout_img_path)) :
    $device_layout_img_path = $GLOBALS['urlPath'];
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

                     <?php if( in_array("Miscellaneous Projects", $post_data["categories"]) ) : ?>

                        <?php if (in_array("Web Development Projects", $post_data["categories"]) ) :
                    $have_web_desktop_image = false;
                    $have_web_phone_image = false;

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

                    $add_class = "dm-post-item-web";

                    elseif( in_array("Visual Media Projects", $post_data["categories"]) ) :
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

                        $add_class = "dm-post-item-media";

                    elseif( in_array("Miscellaneous Projects", $post_data["categories"]) ) :
                        $add_class = "";
                    endif; ?>

                            <li class="dm-post-item <?php echo $add_class; ?>" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.4s" >

                            <?php if ( in_array("Web Development Projects", $post_data["categories"]) &&
                                       in_array("Miscellaneous Projects", $post_data["categories"]) &&
                                       $have_web_desktop_image != false) : ?>

                                <a class="dm-post-view" href="<?php echo $post_path; ?>#webdevelopment"
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

                            <?php elseif( in_array("Visual Media Projects", $post_data["categories"]) &&
                                          in_array("Miscellaneous Projects", $post_data["categories"]) &&
                                          isset($first_img)) : ?>

                                <a class="dm-post-view" href="<?php echo $post_path; ?>#visualmedia">
                                    <div class="photo"
                                         style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">

                                        <?php echo renderImage($first_img); ?>

                                        <?php if (isset($post_data["logo"]) && isset($post_data["logo_path"])) : ?>

                                            <div class="logo"
                                                 style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">
                                                <?php echo  renderLogoPost($post_data); ?>
                                            </div>

                                        <?php endif; ?>

                                        <div class="bg-overlay-color"
                                             style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">
                                        </div>

                                    </div>

                                    <?php if (isset($media_texture_image)) :
                                        echo renderImage($media_texture_image, false, "texture");
                                    endif; ?>

                                </a>

                            <?php else: ?>
                                <?php if( strtoupper($post_data["colors"]["post_color_background"]) == "#FFFFFF") :
                                    $shine_animation = 'data-animation="shine-gray"';
                                else :
                                    $shine_animation = 'data-animation="shine"';
                                endif; ?>

                                <a class="dm-post-item-image" href="<?php echo $post_path; ?>#visualmedia" <?php echo $shine_animation; ?>
                                   style="background-color: <?php echo $post_data["colors"]["post_color_background"]; ?>;">

                                    <?php if (isset($post_data["logo"]) && isset($post_data["logo_path"])) :
                                        if (isset($post_data["logo_type"]) && ($post_data["logo_type"] == "svg")) :
                                            SVGRenderer::renderSVG( $post_data["logo"] );
                                        else:
                                            echo renderLogoPost($post_data,false, "logo");
                                        endif;
                                    elseif (isset($post_data["thumbnail"]) && isset($post_data["thumbnail_path"])) :
                                        $thumbnail = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["thumbnail_path"]."/".$post_data["thumbnail"];
                                        echo renderImage($thumbnail,false, "thumbnail");
                                    endif; ?>

                                    <?php if (isset($first_img)) :
                                        echo renderImage($first_img, false,'preview-image');
                                    endif; ?>

                                </a>

                            <?php endif; ?>

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
                                <div class="dm-post-item-heading">
                                    <a class="dm-post-item-title" href="<?php echo $post_path; ?>#webdevelopment">
                                        <?php echo $post_data["title"]; ?>
                                    </a>
                                </div>

                                <p class="dm-post-item-description">
                                    <?php echo getFirstCharacters($post_data["description"], 130); ?>
                                </p>

                            </div>

                        </li>

                        <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </container>
</section>