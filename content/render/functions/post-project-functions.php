<?php

function extractDataPosts($post_path, $json_posts = null) {

    $posts = [];
    $posts_json  = getDataJson($json_posts, 'data');

    if(is_dir($post_path)) {
        $php_files = getFilesInFolder($post_path);
    } else {
        $php_files = null;
    }
    if (!empty($php_files) ) {
        foreach ($php_files as $file) {
            $file_path = $post_path . $file;
            $file_content = file_get_contents($file_path);

            if (strpos($file_content, 'getCurrentPostProjectData') !== false) {

                $filename = $file;

                if (strpos($file, '.') !== false) {
                    list($name, $extension) = explode('.', $file, 2);
                    $filename = $name;
                }

                $post_data = getCurrentPostProjectData($filename, $json_posts);
                $post_dataString = json_encode($post_data);
                $post_dataString = executePhpInString($post_dataString);
                $post_data = json_decode($post_dataString, true);

                if($post_data["visibility"] = "enable" && isset($post_data["exclude_from_search"] ) != "true" ) {
                    $posts[] =  [ $file, $post_data ];
                }

            } else {
                preg_match('/\$post_data\s*=\s*\[(.*?)\];/s', $file_content, $matches);

                if (!empty($matches)) {
                    $post_data = eval("return [{$matches[1]}];");
                    if($post_data["visibility"] = "enable") {
                        $posts[] =  [ $file, $post_data ];
                    }
                } else {
                    $error =  "Unable to extract post data from the file:". $file;
                    //$posts[] =  [ $file, $error ];
                }
            }
        }

    }
    elseif(!empty($posts_json)) {
        foreach ($posts_json as $post) {

            if(!empty($post)) {
                $post_file = $post["file"];
                $post_data = $post["post_data"];

                $post_data_string = json_encode($post_data);
                $post_data_string = executePhpInString($post_data_string);
                $post_data = json_decode($post_data_string, true);


                if($post_data["visibility"] = "enable"  && isset($post_data["exclude_from_search"] ) != "true") {
                    $posts[] =  [ "file" => $post_file, "post_data" => $post_data ];
                }
            }
        }
    }
    return $posts;
}

function dateStartPostSortDesc($a, $b) {
    if(isset( $a["post_data"]["date"]) and isset( $b["post_data"]["date"]) ) {
        $dateA = $a["post_data"]["date"]["date_start"];
        $dateB = $b["post_data"]["date"]["date_start"];

        // Split the date strings into components
        list($monthA, $yearA) = explode(".", $dateA);
        list($monthB, $yearB) = explode(".", $dateB);

        // Convert components to integers for comparison
        $monthA = intval($monthA);
        $yearA = intval($yearA);
        $monthB = intval($monthB);
        $yearB = intval($yearB);

        // Compare years first
        if ($yearA !== $yearB) {
            return $yearB - $yearA; // Compare in reverse order
        }

        // If years are equal, compare months
        return $monthB - $monthA; // Compare in reverse order
    }

}

function personalTypePostProjectSortAsc($a, $b) {
    $aIsPersonal = isset($a['post_data']['project_types']) &&
        is_array($a['post_data']['project_types']) &&
        in_array('personal', $a['post_data']['project_types']);
    $bIsPersonal = isset($b['post_data']['project_types']) &&
        is_array($b['post_data']['project_types']) &&
        in_array('personal', $b['post_data']['project_types']);

    if ($aIsPersonal && !$bIsPersonal) {
        return 1;
    } elseif (!$aIsPersonal && $bIsPersonal) {
        return -1;
    } else {
        return 0;
    }
}


function getCurrentPostProjectData($fileName, $json_posts) {
    if ($fileName !== null) {
        $jsonFile = $json_posts;
        $posts = getDataJson($jsonFile, 'data');

        if ($posts !== null) {
            $matchingPost = null;

            $fileNameLowercase = strtolower($fileName);

            foreach ($posts as $post) {
                if (strtolower($post['file']) == $fileNameLowercase) {
                    $matchingPost = $post;
                    break;
                }
            }

            if ($matchingPost !== null) {
                if (isset($matchingPost["post_data"]) && $matchingPost["post_data"] !== null) {
                    return $matchingPost["post_data"];
                }
                else {
                    echo "There is no data for this file: $fileName";
                    return null;
                }
            } else {
                echo "No matching post found for file: $fileName";
                return null;
            }
        }
    } else {
        return null;
    }
}

function getSeoFromCurrentPostProjectData($postData) {
    $stringSeoSiteName = stringSeoSiteName();
    $indexJson = getDataJson('data-content-personal', 'data')["post-projects"]["index"];

    if ($postData != null) {
        $index = "true";
        if(isset($indexJson)) {
            $index = $indexJson;
        }
        if(isset($postData["index"])) {
            $index = $postData["index"];
        }

        $seo = [
            "title" => $postData["title"].$stringSeoSiteName,
            "description" => $postData["description"],
            "keywords" => $postData["media_path"],
            "slug" => $postData["media_path"],
            "index" => $index
        ];
        return $seo;
    }
}

function renderTitle($title = null) {
    $htmlTemplate = "<h2 id='%s' class='dm-post-title-category' data-motion='transition-fade-0' data-duration='0.7s'>%s</h2>";

    if ($title !== null) {
        $id = removeSpaceAndLowercase($title); // Call the function to remove spaces and convert to lowercase
        return sprintf($htmlTemplate, $id, $title);
    } else {
        $id = removeSpaceAndLowercase("Title"); // Call the function with a default value
        return sprintf($htmlTemplate, $id, "Title");
    }
}

function renderDeviceLayout($type,$post_data, $img, $atr) {
    $html = "";
    $data = getDataJson('data-content-personal', 'data')["post-projects"]["img"] ?? [];


    if($type == "phone" || $type == "desktop") {
        $deviceModel1 = $data["devices"][$type."-model-01"] ?? "";
        $deviceModel2 = $data["devices"][$type."-model-02"] ?? "";
        $deviceModel3 = $data["devices"][$type."-model-03"] ?? "";

        $deviceMode = "";
        $classDevice = "";

        if (isset($post_data["date"]["date_start"]) && !empty($post_data["date"]["date_start"])) {
            preg_match('/\d{4}/', $post_data["date"]["date_start"], $matches);
            $year = $matches[0] ?? null;

            if (
                isset($post_data["project_types"]) &&
                in_array("personal", $post_data["project_types"]) &&
                !in_array("bachelor's thesis", $post_data["project_types"])
            ) {
                $deviceMode = $deviceModel1;
                $classDevice = " ".$type."-model-01";
            }
            elseif ($year) {
                if ($year < 2022 && !empty($deviceModel1)) {
                    $deviceMode = $deviceModel2;
                    $classDevice = " ".$type."-model-02";
                } elseif ($year >= 2022 && !empty($deviceModel3)) {
                    $deviceMode = $deviceModel3;
                    $classDevice = " ".$type."-model-03";
                }
            } else {
                $deviceMode = $deviceModel3;
                $classDevice = " ".$type."-model-03";
            }
        }

        if (!empty($deviceMode)) {
            $device = $GLOBALS['urlPath'].$deviceMode;
            $html .= renderImage($device, false, "device", true);
        }

        $layoutAtr = "cover top";

        if (!empty($img)) {
            $src_current = __DIR__ . "/../../../" . $img;
            if (file_exists($src_current)) {
                $imageInfo = getimagesize($src_current);

                if ($imageInfo !== false) {
                    list($imageWidth, $imageHeight) = $imageInfo;
                    $aspectRatio = $imageWidth / $imageHeight;

                    if ($type == "phone" && $imageWidth >= $imageHeight) {
                        $layoutAtr = "center";
                    } elseif ($type == "desktop" && ($imageHeight > $imageWidth || ($aspectRatio >= 1 && $aspectRatio <= 1.6))) {
                        $layoutAtr = "top";
                    } else {
                        $layoutAtr = ($aspectRatio >= 0.7) ? "center" : "top";
                    }
                    $layoutAtr .= ($aspectRatio <= 0.7) ? " bg-primary fade-under" : " bg-white";
                    $layoutAtr .= " " . round($aspectRatio, 2);
                }
            }
        }

        $html .= "<div class='screen".$classDevice."' layout='".$layoutAtr."'>".
                    renderImage($img, false, "element", true).
                 "</div>";
        $html .= renderImage($img, true, "overlay", true, $atr);

    }
     else {
        $html .= renderImage($img, true, "", true, $atr);
    }


    return "<div class='layout'>".$html."</div>";
}





function renderGalleryWeb($post_data) {
    $gallery_web_content = "<div id='web' class='dm-gallery-web-content' data-motion='transition-fade-0' data-duration='0.5s'>";

    if (!empty($post_data)) {
        $data = getDataJson('data-content-personal', 'data')["post-projects"]["img"];
        $img_texture = $data["background"]["overlay-texture"];
        $bg_item_texture = !empty($img_texture) ? $GLOBALS['urlPath'].$img_texture : "";

        $gallery_path_web = "web";
        $gallery_web_path_current = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$gallery_path_web."/";
        $gallery_web_path = __DIR__ . "/../../../" . $gallery_web_path_current;

        // Home Desktop Gallery
        $gallery_web_home = "home/";
        $home_image = getImagesInFolder($gallery_web_path.$gallery_web_home);

        if (!empty($home_image)) {
            $gallery_web_content .= "<div class='dm-web-home-banner' data-motion='transition-fade-0' data-duration='0.8s'>";
            foreach ($home_image as $image_home) {
                $image_path = $gallery_web_path_current.$gallery_web_home.$image_home;
                $gallery_web_content .= renderImage($image_path, true);
            }
            $gallery_web_content .= "</div>";
        }

        // Desktop Gallery
        $gallery_web_desktop = "desktop/";
        $gallery_web = getImagesInFolder($gallery_web_path.$gallery_web_desktop);

        if (!empty($gallery_web)) {
            $gallery_web_content .= '<ul class="dm-web-gallery" data-slider-container-src="dm-web-post-gallery">';

            foreach ($gallery_web as $image_web) {
                $image_path = $gallery_web_path_current.$gallery_web_desktop.$image_web;
                $gallery_web_content .= '
                    <li class="dm-web-gallery-item gallery-item-web" data-motion="transition-fade-0" data-duration="0.3s">' .
                    '<div class="bg" style="background-image: url(' . $bg_item_texture . ')"></div>'.
                        renderDeviceLayout("desktop", $post_data, $image_path, [
                            "data-slider-item" => "true",
                            "data-slider-items-src" => "dm-web-post-gallery",
                            "data-slider-item-query-attr" => "web-item-img"
                        ]) .
                    '</li>';
            }

            // Phone Gallery
            $gallery_web_phone = "phone/";
            $gallery_phone = getImagesInFolder($gallery_web_path.$gallery_web_phone);

            if (!empty($gallery_phone)) {
                foreach ($gallery_phone as $image_web) {
                    $image_path = $gallery_web_path_current.$gallery_web_phone.$image_web;
                    $gallery_web_content .= '
                        <li class="dm-web-gallery-item gallery-item-phone" data-motion="transition-fade-0" data-duration="0.3s">' .
                        '<div class="bg" style="background-image: url(' . $bg_item_texture . ')"></div>'.
                            renderDeviceLayout("phone", $post_data, $image_path, [
                                "data-slider-item" => "true",
                                "data-slider-items-src" => "dm-web-post-gallery",
                                "data-slider-item-query-attr" => "web-item-img"
                            ]) .
                        '</li>';
                }
            }
            $gallery_web_content .= '</ul>';
        }
    }

    $gallery_web_content .= '</div>';
    return $gallery_web_content;
}


function renderGalleryWebMedia($post_data) {
    $gallery_media_web_content = "<div id='media-web' class='dm-gallery-web-content' data-motion='transition-fade-0' data-duration='0.5s'>";
    $src_current = __DIR__ . "/../../../";

    if(isset($post_data)) {
        $gallery_path_web_dir = "web";
        $gallery_path_dir = "media-website";
        $gallery_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$gallery_path_web_dir."/".$gallery_path_dir."/";
        $gallery = getImagesInFolder($src_current.$gallery_path );
        $dirs = getDirectoriesInFolder($src_current.$gallery_path );

        if( !empty($gallery) ) {
            $gallery_media_web_content .= "<ul class='dm-web-media-gallery' data-list-design='".listDesign(count($gallery))."' 
            data-slider-container-src='dm-gallery-web-content'
            data-motion='transition-fade-0' data-duration='0.8s'>";

            foreach ($gallery as $item) {
                $image_path = $gallery_path.$item;
                $gallery_media_web_content .=  '<li class="dm-web-media-gallery-item" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.3s">' .
                    renderImage($image_path, true, '',true,
                        ["data-slider-item" => "true", "data-slider-items-src" => "dm-gallery-web-content", "data-slider-item-query-attr" => "gallery-web-content-0" ]) .
                    '<div style="background-image: url("' . $image_path . '")"></div></li>';
            }

            $gallery_media_web_content .= "</ul>";
        }
        if( !empty($dirs) ) {
            foreach ($dirs as  $key => $dir) {
                $gallery = getImagesInFolder($src_current.$gallery_path.$dir."/");

                if( !empty($gallery) ) {
                    $gallery_media_web_content .= "<ul class='dm-web-media-gallery' data-list-design='".listDesign(count($gallery))."'  " .
                    "data-slider-container-src='dm-gallery-web-content-$key'";
                    if ( ($dir == "logo") || ($dir == "favicon") ) {
                        $gallery_media_web_content .= "data-list-item='logo'";
                    }
                    $gallery_media_web_content .= " data-motion='transition-fade-0' data-duration='0.8s'>";

                    foreach ($gallery as $item) {
                        $image_path = $gallery_path.$dir."/".$item;
                        $gallery_media_web_content .=  '<li class="dm-web-media-gallery-item" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.3s">' .
                            renderImage($image_path, true, '',true,
                                ["data-slider-item" => "true", "data-slider-items-src" => "dm-gallery-web-content-$key", "data-slider-item-query-attr" => "gallery-web-content-$key" ]) .
                            '<div style="background-image: url("' . $image_path . '")"></div></li>';
                    }

                    $gallery_media_web_content .= "</ul>";
                }
            }
        }
    }

    $gallery_media_web_content .= '</div>';

    return $gallery_media_web_content;
}

function renderGalleryWebContent($post_data) {
    $src_current = __DIR__ . "/../../../";
    $data = getDataJson('data-content-personal', 'data')["post-projects"]["img"];
    $img_texture = $data["background"]["overlay-texture"];
    $bg_item_texture = !empty($img_texture) ? $GLOBALS['urlPath'].$img_texture : "";
    $gallery_web_content = "<div id='web-content' class='dm-gallery-web-content' data-motion='transition-fade-0' data-duration='0.5s'>";

    if(isset($post_data)) {
        $gallery_path_web = "web";
        $gallery_path_web_content = "content-website";
        $gallery_path_web_desktop = "desktop";
        $gallery_path_web_phone = "phone";
        $gallery_web_content_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$gallery_path_web."/".$gallery_path_web_content."/";

        $dirs = getDirectoriesInFolder($src_current.$gallery_web_content_path);
        foreach ($dirs as $key => $dir) {

            $gallery_web_content_desktop = $gallery_web_content_path.$dir."/".$gallery_path_web_desktop."/";
            $gallery_web_content_phone = $gallery_web_content_path.$dir."/".$gallery_path_web_phone."/";

            if (is_dir($src_current.$gallery_web_content_desktop)) {
                $gallery_web = getImagesInFolder($src_current.$gallery_web_content_desktop );
            } else {
                $gallery_web  = [];
            }
            if (is_dir($src_current.$gallery_web_content_phone)) {
                $gallery_phone = getImagesInFolder($src_current.$gallery_web_content_phone );
            } else {
                $gallery_phone  = [];
            }
            $nr_items = count($gallery_web) + count($gallery_phone);
            $gallery_web_content .= '<ul id="content-web" class="dm-web-gallery" data-list-design="'.listDesign($nr_items).'"
            data-slider-container-src="dm-gallery-web-content-'.$key.'">';

            if( !empty($gallery_web) ) {
                foreach ($gallery_web as $image_web) {
                    $image_path = $gallery_web_content_desktop.$image_web;
                    $gallery_web_content .=  '<li class="dm-web-gallery-item gallery-item-web" data-motion="transition-fade-0" data-duration="0.3s">'.
                        '<div class="bg" style="background-image: url(' . $bg_item_texture . ')"></div>'.
                            renderDeviceLayout("desktop", $post_data, $image_path, [
                                "data-slider-item" => "true",
                                "data-slider-items-src" => "dm-gallery-web-content-$key",
                                "data-slider-item-query-attr" => "gallery-web-content-$key"
                            ]) .
                            '</li>';
                }
            }
            if( !empty($gallery_phone) ) {
                foreach ($gallery_phone as $image_web) {
                    $image_path = $gallery_web_content_phone.$image_web;
                    $gallery_web_content .=  '<li class="dm-web-gallery-item gallery-item-phone" data-motion="transition-fade-0" data-duration="0.3s">' .
                        '<div class="bg" style="background-image: url(' . $bg_item_texture . ')"></div>'.
                            renderDeviceLayout("phone", $post_data, $image_path, [
                                "data-slider-item" => "true",
                                "data-slider-items-src" => "dm-gallery-web-content-$key",
                                "data-slider-item-query-attr" => "gallery-web-content-$key"
                            ]) .
                        '</li>';
                }
            }
            $gallery_web_content .= '</ul>';
        }
    }
    $gallery_web_content .= '</div>';

    return $gallery_web_content;
}

function renderGalleryMedia($post_data) {
    $src_current = __DIR__ . "/../../../";
    $gallery_media_content = "<div id='photo' class='dm-gallery-media-content' data-motion='transition-fade-0' data-duration='0.5s'>";

    if(isset($post_data)) {
        $gallery_path_media = "media";
        $gallery_media_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$gallery_path_media."/";
        $gallery_media_path_current = $src_current. $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$gallery_path_media."/";
        $directories = glob($gallery_media_path_current . '*', GLOB_ONLYDIR);

        foreach ($directories as $key => $directory) {
            if (is_dir($directory)) {
                $directoryName = basename($directory);
                $gallery_items = getImagesInFolder($gallery_media_path_current.$directoryName );

                if( !empty($gallery_items ) ) {
                    $gallery_media_content .= "<ul class='dm-media-gallery' data-list-design='".listDesign(count($gallery_items))."'" .
                        "data-slider-container-src='gallery-media-content-$key' >";

                    foreach ($gallery_items as $gallery_item) {
                        $image_path = $gallery_media_path.$directoryName."/".$gallery_item;
                        $gallery_media_content .=  "<li class='dm-media-gallery-item' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.3s'>".
                            renderImage($image_path, true, '',true,
                                ["data-slider-item" => "true", "data-slider-items-src" => "gallery-media-content-$key", "data-slider-item-query-attr" => "gallery-media-content-$key" ]) .
                        "</li>";
                    }
                    $gallery_media_content .= "</ul>";
                }
            }
        }
    }
    $gallery_media_content .= '</div>';
    return $gallery_media_content;
}

function renderVideoMedia($post_data) {
    $src_current = __DIR__ . "/../../../";

    $video_media_content = "<div id='video' class='dm-video-media-content' data-motion='transition-fade-0' data-duration='0.5s'>";

    if(isset($post_data)) {
        $video_media_path = $GLOBALS['urlPath']."content/vid/".$post_data["post_type"]."/".$post_data["media_path"]."/";
        $logo_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$post_data["logo"];
        $thumbnail_bg = $GLOBALS['urlPath']."content/img/thumbnails/workpreview-overlay-thumbnail.webp";
        $video_files = getVideosInFolder($src_current.$video_media_path);

        $directories = glob($src_current.$video_media_path . '*', GLOB_ONLYDIR);
        foreach ($directories as $directory) {
            if (is_dir($directory)) {
                $directoryName = basename($directory);
                $video_items = getVideosInFolder($src_current.$video_media_path.$directoryName );
                if( !empty($video_items ) ) {

                    $video_media_content .= "<ul class='dm-media-video' data-list-design='".listDesign(count($video_items))."'>";

                    foreach ($video_items as $video_item) {
                        $video_path = $video_media_path.$directoryName."/".$video_item;
                        $video_media_content .=  "<li class='dm-media-video-item' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.3s'>".renderVideo($video_path, $logo_path, $thumbnail_bg)."</li>";
                    }
                    $video_media_content .= "</ul>";
                }
            }
        }
        if( !empty($video_files) ) {
            $video_media_content .= "<ul class='dm-media-video' data-list-design='".listDesign(count($video_files))."'>";

            foreach ($video_files as $video_file) {
                $video_path = $video_media_path.$video_file;
                $video_media_content .=  "<li class='dm-media-video-item' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.3s'>".renderVideo($video_path, $logo_path, $thumbnail_bg)."</li>";

            }

            $video_media_content .= "</ul>";
        }

    }

    $video_media_content .= '</div>';
    return $video_media_content;
}

function renderVideoMediaStrict( $videos = []) {
    $html_content = "<div id='video' class='dm-video-media-content' data-motion='transition-fade-0' data-duration='0.5s'>";
    if($videos != null) {
        foreach ($videos as $video) {
            $html_content .= renderVideo($GLOBALS['urlPath']. 'content/vid/'.$video["video-path"],
                $GLOBALS['urlPath']."content/img/".$video["video-thumbnail-path"]
            );
        }
    }
    $html_content .= "</div>";
    return $html_content;
}

function renderWallpaperPost($post_data, $wallpaper_dir = "wallpaper") {
    $wallpaper_content = "";
    if(isset($post_data)) {
        $wallpaper_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$wallpaper_dir."/";
        $wallpaper_items = getImagesInFolder($wallpaper_path );

        if( !empty($wallpaper_items) ) {
            $wallpaper_content .=  "<div class='dm-post-wallpaper'>".renderImage($wallpaper_path.$wallpaper_items[0]);
            $wallpaper_content .= "<div class='dm-post-wallpaper-logo'>".renderLogoPost($post_data)."</div>";
            $wallpaper_content .= "<h1 class='dm-post-heading'>".$post_data["title"]."</h1>";
            $wallpaper_content .= "</div>";
        }
    }
    return $wallpaper_content;
}

function renderLogoPost($post_data, $popup = false, $class = false, $lazyLoad = true) {
    $render_content = "";
    if( ($post_data["logo_type"] == "png") || ($post_data["logo_type"] == "jpg") || ($post_data["logo_type"] == "jpeg") || ($post_data["logo_type"] == "webp")) {
        $path_logo = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["logo_path"]."/".$post_data["logo"];
        $render_content .= renderImage($path_logo, $popup, $class, $lazyLoad);
    }
    return $render_content;
}

function renderTextVisualMediaPost($post_type = null, $media_path = null, $tags = null) {
    $src_current = __DIR__ . "/../../../";
    $media_string = "";
    $img_and_video_text = "";

    if (isset($media_path) and isset($post_type)) {
        $img_path = $src_current.$GLOBALS['urlPath']."content/img/".$post_type."/".$media_path."/media/";
        $vid_path =$src_current.$GLOBALS['urlPath']."content/vid/".$post_type."/".$media_path."/";

        if (file_exists($img_path)) {
            $nr_img = countFilesInFolder($img_path);
        } else {
            $nr_img = 0;
        }

        if (file_exists($vid_path)) {
            $nr_vid = countFilesInFolder($vid_path);
        } else {
            $nr_vid = 0;
        }

        if (($nr_img > 0) || ($nr_vid > 0))  {
            $media_string .= "of ";
        }
        if ($nr_img > 0) {
            $media_string .= $nr_img;
            if ($nr_img > 1) {
                $media_string .= " photos";
            } elseif ($nr_img == 1) {
                $media_string .= " photo";
            }
        }
        if (($nr_img > 0) && ($nr_vid > 0))  {
            $media_string .= " and ";
            $img_and_video_text = " From stunning imagery to engaging videos, each piece is meticulously created to elevate your brand's online presence.";
        }
        if ($nr_vid > 0) {
            $media_string .= $nr_vid;
            if ($nr_vid > 1) {
                $media_string .= " videos";
            } elseif ($nr_vid == 1) {
                $media_string .= " video";
            }
        }
        if (($nr_img == 0) && ($nr_vid == 0))  {
            $media_string .= "content";
        }
        if (isset($tags)) {
            $text = "Experience the artistry behind my meticulously crafted media content for this company. Discover a captivating collection ".$media_string." that showcase my expertise in delivering impactful visuals for social media promotion.".$img_and_video_text." Explore the power of my unique visual creations and unlock the potential to captivate your audience.";
            $text_section = "<p>".$text."</p>";
            $tags = "";
            if ($nr_img > 0) {
                $tags .= '<a class="post-tag" href="#photo">photo</a>';
            }
            if ($nr_vid > 0) {
                $tags .= '<a class="post-tag" href="#video">video</a>';
            }
            if (($nr_img > 0) || ($nr_vid > 0)) {
                $text_section .= '<div class="post-tags" >'.$tags.'</div>';
            }
            return $text_section;
        }
        else {
            $text = "Experience the artistry behind my meticulously crafted media content for this company. Discover a captivating collection ".$media_string." that showcase my expertise in delivering impactful visuals for social media promotion.".$img_and_video_text." Explore the power of my unique visual creations and unlock the potential to captivate your audience.";
            return $text;
        }
    } else {
        $media_string = "photos and videos";
        $img_and_video_text = "From stunning imagery to engaging videos, each piece is meticulously created to elevate your brand's online presence.";
        $text = "Experience the artistry behind my meticulously crafted media content for this company. Discover a captivating collection ".$media_string." that showcase my expertise in delivering impactful visuals for social media promotion.".$img_and_video_text." Explore the power of my unique visual creations and unlock the potential to captivate your audience.";
        return $text;
    }
}

function renderDetailsVisualMediaPost($post_data) {
    $html_content = '';

    if (isset($post_data) && !empty($post_data)) {
        $html_content .= "<div class='dm-post-details-grid'>";
        $html_content .=    "<div class='dm-post-logo-details' data-motion='transition-fade-0' data-duration='0.7s'>".renderImage( $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$post_data["logo"])."</div>";
        $html_content .=    "<div class='dm-post-title-description' data-motion='transition-fade-0' data-duration='0.7s'>";
        $html_content .=         renderTextVisualMediaPost($post_data["post_type"],$post_data["media_path"], "tags");
        $html_content .=    "</div>";
        $html_content .= "</div>";
    }


    return $html_content;
}

function renderSectionWebProject($post_data) {
    $html_content = '';

    if (isset($post_data) && !empty($post_data)) {
        if (in_array('web', $post_data["tags"])) {
            $html_content .= renderTitle('Web Development');
            $html_content .= renderGalleryWeb($post_data);
        }
        if (in_array('content-web', $post_data["tags"])) {
            $html_content .= renderGalleryWebContent($post_data);
        }

        if (in_array('media-web', $post_data["tags"])) {
            $html_content .= renderTitle('Web Media Content');
            $html_content .= renderGalleryWebMedia($post_data);
        }
    }

    return $html_content;
}

function renderSectionMediaProject($post_data, $params = []) {

    $html_content = '';

    if (isset($post_data) && !empty($post_data)) {
        if (in_array('photo', $post_data["tags"]) or in_array('video', $post_data["tags"])) {
            $html_content .= renderTitle('Visual Media');
        }
        if (in_array('Visual Media Projects', $post_data["categories"]) and in_array('Web Development Projects', $post_data["categories"])) {
            $html_content .= renderDetailsVisualMediaPost($post_data);
        }
        if (in_array('photo', $post_data["tags"])) {
            $html_content .= renderGalleryMedia($post_data);
        }
        if (in_array('video', $post_data["tags"])) {

            if (isset($params['videos']) && is_array($params['videos'])) {
                $html_content .= renderVideoMediaStrict($params['videos']);

            } else {
                $html_content .= renderVideoMedia($post_data);
            }
        }
    }
    return $html_content;
}

function renderParagraphBlockProject($text = null, $htmlcontent = '', $style = '') {
    $html_content = '';

    $html_content .= "<div class='dm-post-title-description' data-motion='transition-fade-0' data-duration='0.7s'";
    if (!empty($style)) {
        $html_content .= " style='$style'";
    }
    $html_content .= ">";
    $html_content .= $text;
    if (!empty($htmlcontent)) {
        $html_content .= $htmlcontent;
    }
    $html_content .= "</div>";

    return $html_content;
}


function renderImageBlockProject($post_data, $image_path = null, $image_file_name = null) {
    $html_content = '';

    $html_content .= "<div class='dm-post-image' data-motion='transition-fade-0' data-duration='0.7s' data-delay='0.2s'>";
    $html_content .= renderImage( $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$image_path.$image_file_name, true);
    $html_content .=  "</div>";

    return $html_content;
}

function renderSliderWithImagesOfProject($post_data, $img_array_path_dir) {
    $src_current = __DIR__ . "/../../../";
    $html_content = '<div data-motion="transition-fade-0" data-duration="1.2s">';

    if( $img_array_path_dir != null) {

        $slides_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$img_array_path_dir."/";

        $images = scandir($src_current.$slides_path);
        $images_rendered_array = [];

        foreach ( $images as $image_file ) {
            if ($image_file == '.' || $image_file == '..') {
                continue;
            }
            $images_rendered_array[] = renderImage($slides_path.$image_file, true);
        }
        $html_content .=  renderSlider($images_rendered_array, true, false, true);
        $html_content .= '</div>';
    }


    return $html_content;
}

function renderFeatureHero($post_data) {
    $src_current = __DIR__ . "/../../../";
    $html_content = '';
    $html_content .= '<div class="dm-post-feature-hero" 
                        data-motion="transition-fade-0" data-duration="0.7s" data-delay="0.1s">';

    $img_texture = $GLOBALS['urlPath'].getDataJson('data-content-personal', 'data')["post-projects"]["img"]["background"]["overlay-texture"];
    $html_content .=  '<div class="bg-texture" style="background-image: url("' . $img_texture . '")"></div>';

    ob_start();
    require_once __DIR__ . '/../classes/renderSVG.php';
    require_once __DIR__ . '/../classes/renderStructure.php';

    $img_shape_1 = $GLOBALS['urlPath'].getDataJson('data-content-personal', 'data')["post-projects"]["img"]["background"]["overlay-shape-1"];
    $html_content .=  SVGRenderer::renderSVG( $img_shape_1);

    $img_shape_2 = $GLOBALS['urlPath'].getDataJson('data-content-personal', 'data')["post-projects"]["img"]["background"]["overlay-shape-2"];
    $html_content .=  SVGRenderer::renderSVG( $img_shape_2);

    $renderer = new RendererElements();
    $html_content .= $renderer->renderElement("devices-post-item-web", "", ["post_data" => $post_data]);
    $html_content .= $renderer->renderElement("devices-post-item-media", "", ["post_data" => $post_data]);

    $html_content .= $renderer->renderElement("animation-waves");
    $html_content .= ob_get_clean();

    $html_content .=  "</div>";


    return $html_content;
}