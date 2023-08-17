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
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $images = [];

    if (is_dir($path)) {
        $files = scandir($path);

        foreach ($files as $file) {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            if (in_array(strtolower($extension), $imageExtensions)) {
                $images[] = $file;
            }
        }
    } else {
        return $images;
    }

    return $images;
}

function getVideosInFolder($path) {
    $videoExtensions = ['webm', 'mp4', 'avi'];
    $videos = [];

    if (is_dir($path)) {
        $files = scandir($path);

        foreach ($files as $file) {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            if (in_array(strtolower($extension), $videoExtensions)) {
                $videos[] = $file;
            }
        }
    } else {
        return $videos;
    }

    return $videos;
}


function getFilesInFolder($path) {
    $files = [];
    if (is_dir($path)) {
        $items = scandir($path);

        foreach ($items as $item) {
            $item_path = $path . $item;

            if (is_file($item_path)) {
                $files[] = $item;
            }
        }
    } else {
        return $files;
    }

    return $files;
}


function getDirectoriesInFolder($path) {
    $directories = [];
    if (is_dir($path)) {
        $items = scandir($path);

        foreach ($items as $item) {
            $item_path = $path . $item;

            if (is_dir($item_path) && $item !== '.' && $item !== '..') {
                $directories[] = $item;
            }
        }
    } else {
        return $directories;
    }

    return $directories;
}


function countFilesInFolder($folderPath) {
    $fileCount = 0;

    if (is_dir($folderPath)) {
        $files = scandir($folderPath);

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $filePath = $folderPath . '/' . $file;

            if (is_file($filePath)) {
                $fileCount++;
            } elseif (is_dir($filePath)) {
                $fileCount += countFilesInFolder($filePath);
            }
        }
    } else {
        return $fileCount;
    }

    return $fileCount;
}


function listDesign($nr) {
    switch ($nr) {
        case ($nr % 13 === 0):
            return "items-divisible-by-13";
        case ($nr % 7 === 0 && $nr % 3 !== 0):
            return "items-divisible-by-7";
        case ($nr % 6 === 0):
            return "items-divisible-by-6";
        case ($nr % 5 === 0):
            return "items-divisible-by-5";
        case ($nr % 4 === 0):
            return "items-divisible-by-4";
        case ($nr % 3 === 0 && $nr % 7 !== 0):
            return "items-divisible-by-3";
        case ($nr % 2 === 0):
            return "items-divisible-by-2";
        case 1:
            return "items-exactly-1";
        default:
            return "items-default";
    }
}


function renderImage($src, $popup = false, $class = false, $lazyLoad = true) {
    $imageInfo = getimagesize($src);

    $width = $imageInfo[0];
    $height = $imageInfo[1];
    $alt = '';

    $imagePathParts = pathinfo($src);
    if (isset($imagePathParts['filename'])) {
        $alt = 'Image: ' . $imagePathParts['filename'];
    }
    $add_class = "";
    if (isset($class) and !empty($class)) {
      $add_class = 'class="'.$class.'" ';
    }
    $html = '<img '.$add_class.'src="' . $src . '" width="' . $width . '" height="' . $height . '" alt="' . $alt.'"';
    if ($lazyLoad) {
        $html .= ' loading="lazy"';
    }
    if ($popup) {
        $html .= ' data-popup="true"';
    }
    $html .= '>';

    return $html;
}

function renderVideo($src, $thumbnail = NULL, $thumbnail_bg = NULL) {
    $html = '<div class="video-container paused" data-volume-level="high">';

    if(isset($thumbnail) && !empty($thumbnail)) {
      $html .= '<div class="thumbnail"';

      if(isset($thumbnail_bg) && !empty($thumbnail_bg)) {
        $html .= 'style="background-image: url(\'' . $thumbnail_bg . '\')"';

      }
      $html .= '>';
      $html .= renderImage($thumbnail);
      $html .= '</div>';
    }

    $html   .= '<div class="video-controls-container">
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

function removeSpaceAndLowercase($string) {
    $string = str_replace(' ', '', $string);

    // Convert to lowercase
    $string = strtolower($string);

    return $string;
}
function extractDataPosts($post_path) {
    $php_files = getFilesInFolder($post_path);
    $posts = [];

    if (!empty($php_files)) {
        foreach ($php_files as $file) {
            $file_path = $post_path . $file;
            $file_content = file_get_contents($file_path);
            preg_match('/\$post_data\s*=\s*\[(.*?)\];/s', $file_content, $matches);
            if (!empty($matches)) {
                $post_data = eval("return [{$matches[1]}];");
                if($post_data["visibility"] = "enable") {
                    $posts[] =  [ $file, $post_data ];
                }
            } else {
                //$error =  "Unable to extract \$post_data from the file: $file<br><br>";
                //$posts[] =  [ $file, $error ];
            }
        }
    }
    return $posts;
}
function getFirstCharacters($string, $n) {
    return substr($string, 0, $n);
}

// SEO FUNCTIONS START
function seo_fields_implicit() {
    $google_site_verification = "Not set.";
    $url_domain = get_url();
    $seo_fields_implicit_structure = [
        'charset' => '<meta charset="UTF-8">',
        'viewport' => '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
        'title' => '<title>Densi Marginas - Portfolio</title>',
        'description' => '<meta name="description" content="My personal portfolio where are my work projects."/>',
        'keywords' => '<meta name="keywords" content="denismarginas"/>',
        'slug' => '<meta name="slug" content=""/>',
        'google-site-verification' => '<meta name="google-site-verification" content="'.$google_site_verification.'">',
        'robots' => '<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">',
        'canonical' => '<link rel="canonical" href="'.$url_domain.'">',
        'profile' => '<link rel="profile" href="https://gmpg.org/xfn/11">'

    ];
    return $seo_fields_implicit_structure;
}

function seo_add_in_tag($seo_data) {
    $seo_structure = [
        'title' => '<title>%s</title>',
        'description' => '<meta name="description" content="%s"/>',
        'keywords' => '<meta name="keywords" content="%s"/>',
        'slug' => '<meta name="slug" content="%s"/>'
    ];

    $seo_new_structure = [];

    foreach ($seo_data as $seo_field => $value) {
        if (array_key_exists($seo_field, $seo_structure)) {
            $format = $seo_structure[$seo_field];
            $tag = sprintf($format, $value);
            $seo_new_structure[$seo_field] = $tag;
        }
    }

    return $seo_new_structure;
}

function seo_add_in_content($seo_data, $existing_content_html) {
    $new_seo_fields_content = seo_add_in_tag($seo_data);

    if (isset($new_seo_fields_content["title"])) {
        $pattern_title = "/<title>.*<\/title>/i"; // Case-insensitive regex pattern
        $replacement_title = $new_seo_fields_content["title"];
        $existing_content_html = preg_replace($pattern_title, $replacement_title, $existing_content_html);
    }
    if (isset($new_seo_fields_content["description"])) {
        $pattern_description = "/<meta name=\"description\" content=\".*?\"\/>/i";
        $replacement_description = $new_seo_fields_content["description"];
        $existing_content_html = preg_replace($pattern_description, $replacement_description, $existing_content_html);
    }
    if (isset($new_seo_fields_content["keywords"])) {
        $pattern_keywords = "/<meta name=\"keywords\" content=\".*?\"\/>/i";
        $replacement_keywords = $new_seo_fields_content["keywords"];
        $existing_content_html = preg_replace($pattern_keywords, $replacement_keywords, $existing_content_html);
    }
    if (isset($new_seo_fields_content["slug"])) {
        $pattern_slug = "/<meta name=\"slug\" content=\".*?\"\/>/i";
        $replacement_slug = $new_seo_fields_content["slug"];
        $existing_content_html = preg_replace($pattern_slug, $replacement_slug, $existing_content_html);
    }


    return $existing_content_html;
}

function get_url() {
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
    $url.= $_SERVER['HTTP_HOST'];
    $url.= $_SERVER['REQUEST_URI'];

    $url = "http://dm-host.go.ro/personal-portfolio/DM-PersonalPortfolio/";
    return $url;
}
// SEO FUNCTION END

// POSTS START
function dateStartSortDesc($a, $b) {
    $dateA = $a[1]["date"]["date_start"];
    $dateB = $b[1]["date"]["date_start"];

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



// POSTS END

?>