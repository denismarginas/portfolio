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

                if($post_data["visibility"] = "enable") {
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


                if($post_data["visibility"] = "enable") {
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
    $aIsPersonal = in_array('personal', $a['post_data']['project_types']);
    $bIsPersonal = in_array('personal', $b['post_data']['project_types']);

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
    If ($postData != null) {
        $seo = [
            "title" => $postData["title"]." | Denis Marginas",
            "description" => $postData["description"],
            "keywords" => $postData["media_path"],
            "slug" => $postData["media_path"]
        ];
        return $seo;
    }
}


function renderTitle($title = null) {
    $htmlTemplate = "<h2 id='webdevelopmentprojects' class='dm-post-title-category' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>%s</h2>";

    if ($title !== null) {
        return sprintf($htmlTemplate, $title);
    } else {
        return sprintf($htmlTemplate, "Title");
    }
}


function renderGalleryWeb($post_data) {
    $gallery_web_content = "<div id='web' class='dm-gallery-web-content' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.5s'>";

    if(isset($post_data)) {
        $gallery_path_web = "web";
        $gallery_path_web_banner = "home";
        $gallery_path_web_desktop = "desktop";
        $gallery_path_web_phone = "phone";
        $gallery_web_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$gallery_path_web."/";

        $gallery_web_home = $gallery_web_path.$gallery_path_web_banner."/";
        $home_image = getImagesInFolder($gallery_web_home );
        if( !empty($home_image) ) {
            $gallery_web_content .= "<div class='dm-web-home-banner' data-motion='transition-fade-0' data-duration='0.8s'>";
            foreach ($home_image as $image_home) {
                $image_path = $gallery_web_home.$image_home;
                $gallery_web_content .=  renderImage($image_path, true);
            }
            $gallery_web_content .= "</div>";
        }

        $gallery_web_desktop = $gallery_web_path.$gallery_path_web_desktop."/";
        $gallery_web = getImagesInFolder($gallery_web_desktop );
        if( !empty($gallery_web) ) {
            $gallery_web_content .= '<ul class="dm-web-gallery">';
            foreach ($gallery_web as $image_web) {
                $image_path = $gallery_web_desktop.$image_web;
                $gallery_web_content .=  "<li class='dm-web-gallery-item gallery-item-web' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.3s'>".renderImage($image_path, true)."<div style='background-image: url(\"".$image_path."\")'></div></li>";
            }
            $gallery_web_phone = $gallery_web_path.$gallery_path_web_phone."/";
            $gallery_phone = getImagesInFolder($gallery_web_phone );
            if( !empty($gallery_phone) ) {
                foreach ($gallery_phone as $image_web) {
                    $image_path = $gallery_web_phone.$image_web;
                    $gallery_web_content .=  "<li class='dm-web-gallery-item gallery-item-phone' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.3s'>".renderImage($image_path, true)."<div style='background-image: url(\"".$image_path."\")'></div></li>";
                }
            }
            $gallery_web_content .= '</ul>';
        }
    }
    $gallery_web_content .= '</div>';

    return $gallery_web_content;
}

function renderGalleryWebMedia($post_data) {
    $gallery_media_web_content = "<div id='media-web' class='dm-gallery-web-content' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.5s'>";

    if(isset($post_data)) {
        $gallery_path_web_dir = "web";
        $gallery_path_dir = "media-website";
        $gallery_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$gallery_path_web_dir."/".$gallery_path_dir."/";
        $gallery = getImagesInFolder($gallery_path );
        $dirs = getDirectoriesInFolder($gallery_path );

        if( !empty($gallery) ) {
            $gallery_media_web_content .= "<ul class='dm-web-media-gallery' data-list-design='".listDesign(count($gallery))."' data-motion='transition-fade-0' data-duration='0.8s'>";

            foreach ($gallery as $item) {
                $image_path = $gallery_path.$item;
                $gallery_media_web_content .=  "<li class='dm-web-media-gallery-item' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.3s'>".renderImage($image_path, true)."<div style='background-image: url(\"".$image_path."\")'></div></li>";
            }

            $gallery_media_web_content .= "</ul>";
        }
        if( !empty($dirs) ) {
            foreach ($dirs as $dir) {
                $gallery = getImagesInFolder($gallery_path.$dir."/");

                if( !empty($gallery) ) {
                    $gallery_media_web_content .= "<ul class='dm-web-media-gallery' data-list-design='".listDesign(count($gallery))."'  ";
                    if ( ($dir == "logo") || ($dir == "favicon") ) {
                        $gallery_media_web_content .= "data-list-item='logo'";
                    }
                    $gallery_media_web_content .= " data-motion='transition-fade-0' data-duration='0.8s'>";

                    foreach ($gallery as $item) {
                        $image_path = $gallery_path.$dir."/".$item;
                        $gallery_media_web_content .=  "<li class='dm-web-media-gallery-item' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.3s'>".renderImage($image_path, true)."<div style='background-image: url(\"".$image_path."\")'></div></li>";
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
    $gallery_web_content = "<div id='web' class='dm-gallery-web-content' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.5s'>";

    if(isset($post_data)) {
        $gallery_path_web = "web";
        $gallery_path_web_content = "content-website";
        $gallery_path_web_desktop = "desktop";
        $gallery_path_web_phone = "phone";
        $gallery_web_content_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$gallery_path_web."/".$gallery_path_web_content."/";

        $dirs = getDirectoriesInFolder($gallery_web_content_path);
        foreach ($dirs as $dir) {

            $gallery_web_content_desktop = $gallery_web_content_path.$dir."/".$gallery_path_web_desktop."/";
            $gallery_web_content_phone = $gallery_web_content_path.$dir."/".$gallery_path_web_phone."/";
            if (is_dir($gallery_web_content_desktop)) {
                $gallery_web = getImagesInFolder($gallery_web_content_desktop );
            } else {
                $gallery_web  = [];
            }
            if (is_dir($gallery_web_content_phone)) {
                $gallery_phone = getImagesInFolder($gallery_web_content_phone );
            } else {
                $gallery_phone  = [];
            }
            $nr_items = count($gallery_web) + count($gallery_phone);
            $gallery_web_content .= '<ul id="content-web" class="dm-web-gallery" data-list-design="'.listDesign($nr_items).'">';
            if( !empty($gallery_web) ) {
                foreach ($gallery_web as $image_web) {
                    $image_path = $gallery_web_content_desktop.$image_web;
                    $gallery_web_content .=  "<li class='dm-web-gallery-item gallery-item-web' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.3s'>".renderImage($image_path, true)."<div style='background-image: url(\"".$image_path."\")'></div></li>";
                }
            }
            if( !empty($gallery_phone) ) {
                foreach ($gallery_phone as $image_web) {
                    $image_path = $gallery_web_content_phone.$image_web;
                    $gallery_web_content .=  "<li class='dm-web-gallery-item gallery-item-phone' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.3s'>".renderImage($image_path, true)."<div style='background-image: url(\"".$image_path."\")'></div></li>";
                }
            }
            $gallery_web_content .= '</ul>';
        }
    }
    $gallery_web_content .= '</div>';

    return $gallery_web_content;
}

function renderGalleryMedia($post_data) {
    $gallery_media_content = "<div id='photo' class='dm-gallery-media-content' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.5s'>";

    if(isset($post_data)) {
        $gallery_path_media = "media";
        $gallery_media_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$gallery_path_media."/";
        $directories = glob($gallery_media_path . '*', GLOB_ONLYDIR);

        foreach ($directories as $directory) {
            if (is_dir($directory)) {
                $directoryName = basename($directory);
                $gallery_items = getImagesInFolder($gallery_media_path.$directoryName );

                if( !empty($gallery_items ) ) {
                    $gallery_media_content .= "<ul class='dm-media-gallery' data-list-design='".listDesign(count($gallery_items))."'>";

                    foreach ($gallery_items as $gallery_item) {
                        $image_path = $gallery_media_path.$directoryName."/".$gallery_item;
                        $gallery_media_content .=  "<li class='dm-media-gallery-item' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.3s'>".renderImage($image_path, true)."</li>";
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
    $video_media_content = "<div id='video' class='dm-video-media-content' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.5s'>";

    if(isset($post_data)) {
        $video_media_path = $GLOBALS['urlPath']."content/vid/".$post_data["post_type"]."/".$post_data["media_path"]."/";
        $logo_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$post_data["logo"];
        $thumbnail_bg = $GLOBALS['urlPath']."content/img/thumbnails/workpreview-overlay-thumbnail.webp";
        $video_files = getVideosInFolder($video_media_path);

        $directories = glob($video_media_path . '*', GLOB_ONLYDIR);
        foreach ($directories as $directory) {
            if (is_dir($directory)) {
                $directoryName = basename($directory);
                $video_items = getVideosInFolder($video_media_path.$directoryName );
                if( !empty($video_items ) ) {

                    $video_media_content .= "<ul class='dm-media-video' data-list-design='".listDesign(count($video_items))."'>";

                    foreach ($video_items as $video_item) {
                        $video_path = $video_media_path.$directoryName."/".$video_item;
                        $video_media_content .=  "<li class='dm-media-video-item' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.3s'>".renderVideo($video_path,$logo_path, $thumbnail_bg)."</li>";
                    }
                    $video_media_content .= "</ul>";
                }
            }
        }
        if( !empty($video_files) ) {
            $video_media_content .= "<ul class='dm-media-video' data-list-design='".listDesign(count($video_files))."'>";

            foreach ($video_files as $video_file) {
                $video_path = $video_media_path.$video_file;
                $video_media_content .=  "<li class='dm-media-video-item' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.3s'>".renderVideo($video_path,$logo_path, $thumbnail_bg)."</li>";

            }

            $video_media_content .= "</ul>";
        }

    }

    $video_media_content .= '</div>';
    return $video_media_content;
}
function renderVideoMediaStrict( $videos = []) {
    $html_content = "<div id='video' class='dm-video-media-content' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.5s'>";
    if($videos != null) {
        foreach ($videos as $video) {
            $html_content .= renderVideo(MediaPath::getUrlPaths()['page'] . 'content/vid/'.$video["video-path"],
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
        $path_logo = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$post_data["logo"];
        $render_content .= renderImage($path_logo, $popup, $class, $lazyLoad);
    }
    return $render_content;
}

function renderTextVisualMediaPost($post_type = null, $media_path = null, $tags = null) {
    $media_string = "";
    $img_and_video_text = "";

    if (isset($media_path) and isset($post_type)) {
        $img_path = $GLOBALS['urlPath']."content/img/".$post_type."/".$media_path."/media/";
        $vid_path = $GLOBALS['urlPath']."content/vid/".$post_type."/".$media_path."/";

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
        $html_content .=    "<div class='dm-post-logo-details' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>".renderImage( $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$post_data["logo"])."</div>";
        $html_content .=    "<div class='dm-post-title-description' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>";
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
            $html_content .= renderTitle('Web Development Projects');
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
            $html_content .= renderTitle('Visual Media Projects');
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
function renderParagraphBlockProject($text = null) {
    $html_content = '';

    $html_content .= "<div class='dm-post-title-description' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>";
    $html_content .= $text;
    $html_content .=  "</div>";

    return $html_content;
}
function renderImageBlockProject($post_data ,$image_path = null, $image_file_name = null) {
    $html_content = '';

    $html_content .= "<div class='dm-post-image' data-motion='transition-fade-0 transition-slideInRight-0' data-duration='0.7s'>";
    $html_content .= renderImage( $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$image_path.$image_file_name, true);
    $html_content .=  "</div>";

    return $html_content;
}