<?php

function dm_echo($var) {
    if (isset($var) && !empty($var)) {
        echo $var;
    }
}

function addHttps($url) {
    if (!empty($url) && strpos($url, 'https://') !== 0) {
        $url = 'https://' . $url;
    }
    return $url;
}

function removeHttps($url) {
    if (!empty($url) && strpos($url, 'https://') === 0) {
        $url = substr($url, 8);
    }
    return $url;
}

function getImagesInFolder($path) {
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp']; // Add more extensions if needed
    $images = [];

    $files = scandir($path);

    foreach ($files as $file) {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        if (in_array(strtolower($extension), $imageExtensions)) {
            $images[] = $file;
        }
    }

    return $images;
}

function getVideosInFolder($path) {
    $videoExtensions = ['webp', 'mp4', 'avi']; // Add more extensions if needed
    $videos = [];

    $files = scandir($path);

    foreach ($files as $file) {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        if (in_array(strtolower($extension), $videoExtensions)) {
            $videos[] = $file;
        }
    }

    return $videos;
}

function renderImage($src, $popup = false) {
    $imageInfo = getimagesize($src);

    $width = $imageInfo[0];
    $height = $imageInfo[1];
    $alt = '';

    $imagePathParts = pathinfo($src);
    if (isset($imagePathParts['filename'])) {
        $alt = 'Image: ' . $imagePathParts['filename'];
    }

    $html = '<img src="' . $src . '" width="' . $width . '" height="' . $height . '" alt="' . $alt . '" loading="lazy"';
    if ($popup) {
        $html .= ' data-popup="true"';
    }
    $html .= '>';

    return $html;
}

function renderVideo($src) {
    $html = '<div class="video-container paused" data-volume-level="high">
                <img class="thumbnail-img">
                <div class="video-controls-container">
                  <div class="timeline-container">
                    <div class="timeline">
                        <div class="thumb-indicator"></div>
                    </div>
                  </div>
                  <div class="controls">
                    <button class="play-pause-btn">
                      <svg class="play-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M8,5.14V19.14L19,12.14L8,5.14Z" />
                      </svg>
                      <svg class="pause-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M14,19H18V5H14M6,19H10V5H6V19Z" />
                      </svg>
                    </button>
                    <div class="volume-container">
                      <button class="mute-btn">
                        <svg class="volume-high-icon" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M14,3.23V5.29C16.89,6.15 19,8.83 19,12C19,15.17 16.89,17.84 14,18.7V20.77C18,19.86 21,16.28 21,12C21,7.72 18,4.14 14,3.23M16.5,12C16.5,10.23 15.5,8.71 14,7.97V16C15.5,15.29 16.5,13.76 16.5,12M3,9V15H7L12,20V4L7,9H3Z" />
                        </svg>
                        <svg class="volume-low-icon" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M5,9V15H9L14,20V4L9,9M18.5,12C18.5,10.23 17.5,8.71 16,7.97V16C17.5,15.29 18.5,13.76 18.5,12Z" />
                        </svg>
                        <svg class="volume-muted-icon" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M12,4L9.91,6.09L12,8.18M4.27,3L3,4.27L7.73,9H3V15H7L12,20V13.27L16.25,17.53C15.58,18.04 14.83,18.46 14,18.7V20.77C15.38,20.45 16.63,19.82 17.68,18.96L19.73,21L21,19.73L12,10.73M19,12C19,12.94 18.8,13.82 18.46,14.64L19.97,16.15C20.62,14.91 21,13.5 21,12C21,7.72 18,4.14 14,3.23V5.29C16.89,6.15 19,8.83 19,12M16.5,12C16.5,10.23 15.5,8.71 14,7.97V10.18L16.45,12.63C16.5,12.43 16.5,12.21 16.5,12Z" />
                        </svg>
                      </button>
                      <input class="volume-slider" type="range" min="0" max="1" step="any" value="1">
                    </div>
                    <div class="duration-container">
                      <div class="current-time">0:00</div>
                      /
                      <div class="total-time"></div>
                    </div>
                    <button class="speed-btn wide-btn">
                      1x
                    </button>
                    <button class="full-screen-btn">
                      <svg class="open" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/>
                      </svg>
                      <svg class="close" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M5 16h3v3h2v-5H5v2zm3-8H5v2h5V5H8v3zm6 11h2v-3h3v-2h-5v5zm2-11V5h-2v5h5V8h-3z"/>
                      </svg>
                    </button>
                  </div>
                </div>
                <video src="'.$src.'">
                </video>
              </div>';
    return $html;
}


function renderGalleryWeb($post_data) {
    $gallery_web_content = "<div id='web' class='dm-gallery-web-content'>";

    if(isset($post_data)) {
        $gallery_path_web = "web";
        $gallery_path_web_banner = "home";
        $gallery_path_web_desktop = "desktop";
        $gallery_path_web_phone = "phone";
        $gallery_web_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$gallery_path_web."/";

        $gallery_web_home = $gallery_web_path.$gallery_path_web_banner."/";
        $home_image = getImagesInFolder($gallery_web_home );
        if( !empty($home_image) ) {
            $gallery_web_content .= "<div class='dm-web-home-banner'>";
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
                $gallery_web_content .=  "<li class='dm-web-gallery-item gallery-item-web'>".renderImage($image_path, true)."<div style='background-image: url(\"".$image_path."\")'></div></li>";
            }
            $gallery_web_phone = $gallery_web_path.$gallery_path_web_phone."/";
            $gallery_phone = getImagesInFolder($gallery_web_phone );
            if( !empty($gallery_phone) ) {
                foreach ($gallery_phone as $image_web) {
                    $image_path = $gallery_web_phone.$image_web;
                    $gallery_web_content .=  "<li class='dm-web-gallery-item gallery-item-phone'>".renderImage($image_path, true)."<div style='background-image: url(\"".$image_path."\")'></div></li>";
                }
            }
            $gallery_web_content .= '</ul>';
        }
    }
    $gallery_web_content .= '</div>';

    return $gallery_web_content;
}
function renderGalleryMedia($post_data) {
    $gallery_media_content = "<div id='photo' class='dm-gallery-media-content'>";

    if(isset($post_data)) {
        $gallery_path_media = "media";
        $gallery_media_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$gallery_path_media."/";

        $directories = glob($gallery_media_path . '*', GLOB_ONLYDIR);
        foreach ($directories as $directory) {
            if (is_dir($directory)) {
                $directoryName = basename($directory);
                $gallery_items = getImagesInFolder($gallery_media_path.$directoryName );

                if( !empty($gallery_items) ) {
                    $gallery_media_content .= "<ul class='dm-media-gallery'>";

                    foreach ($gallery_items as $gallery_item) {
                        $image_path = $gallery_media_path.$directoryName."/".$gallery_item;
                        $gallery_media_content .=  "<li class='dm-media-gallery-item'>".renderImage($image_path, true)."</li>";
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
    $video_media_content = "<div id='video' class='dm-video-media-content'>";

    if(isset($post_data)) {

        $video_media_path = $GLOBALS['urlPath']."content/vid/".$post_data["post_type"]."/".$post_data["media_path"]."/";
        $video_files = getVideosInFolder($video_media_path);

        if( !empty($video_files) ) {
            $video_media_content .= "<ul class='dm-media-video'>";

            foreach ($video_files as $video_file) {
                $video_path = $video_media_path.$video_file;
                $video_media_content .=  "<li class='dm-media-video-item'>".renderVideo($video_path)."</li>";

            }
            $video_media_content .= "</ul>";
        }

    }

    $video_media_content .= '</div>';
    return $video_media_content;
}
function renderWallpaperPost($post_data) {
    $wallpaper_content = "";
    if(isset($post_data)) {
        $wallpaper_dir = "wallpaper";
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
function renderLogoPost($post_data) {
    $render_content = "";
    if( ($post_data["logo_type"] == "png") || ($post_data["logo_type"] == "jpg") || ($post_data["logo_type"] == "jpeg") || ($post_data["logo_type"] == "webp")) {
        $path_logo = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$post_data["logo"];
        $render_content .= renderImage($path_logo);
    }
    return $render_content;
}

function removeSpaceAndLowercase($string) {
    // Remove spaces between characters
    $string = str_replace(' ', '', $string);

    // Convert to lowercase
    $string = strtolower($string);

    return $string;
}


?>