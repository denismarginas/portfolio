<?php
$posts = extractDataPosts( __DIR__ . "/../render_posts/" );
$jsonPostsData = json_encode($posts, JSON_HEX_APOS);
$targetDirectory = __DIR__ . '/../../../themes/dm-theme/assets/js/';
$filePath = $targetDirectory . 'content-posts-data-index.js';

$jsContent = "var jsonPostsData = ";
$jsContent .= $jsonPostsData;
$jsContent .= ";";

if (!is_dir($targetDirectory)) {
    mkdir($targetDirectory, 0755, true);
}

file_put_contents($filePath, $jsContent);
?>