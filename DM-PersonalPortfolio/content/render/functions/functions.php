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
function renderImage($src) {
    $imageInfo = getimagesize($src);

    $width = $imageInfo[0];
    $height = $imageInfo[1];
    $alt = '';

    $imagePathParts = pathinfo($src);
    if (isset($imagePathParts['filename'])) {
        $alt = 'Image: ' . $imagePathParts['filename'];
    }

    $html = '<img src="' . $src . '" width="' . $width . '" height="' . $height . '" alt="' . $alt . '">';

    return $html;
}


function renderGalleryWeb($post_data) {
    $gallery_web_content = "";

    if(isset($post_data)) {
        $gallery_path_web = "web";
        $gallery_path_web_banner = "home";
        $gallery_path_web_desktop = "desktop";
        $gallery_path_web_phone = "phone";
        $gallery_web_path = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["media_path"]."/".$gallery_path_web."/".$gallery_path_web_desktop."/";
        $gallery_web = getImagesInFolder($gallery_web_path );

        if( !empty($gallery_web) ) {
            $gallery_web_content .= '<div class="dm-web-gallery">';
            foreach ($gallery_web as $image_web) {
                $image_path = $gallery_web_path.$image_web;
                $gallery_web_content .=  renderImage($image_path);
            }
            $gallery_web_content .= '</div>';
        }
    }
    return $gallery_web_content;
}


?>