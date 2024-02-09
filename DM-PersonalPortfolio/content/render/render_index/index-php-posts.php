<?php
$posts = extractDataPosts( __DIR__ . "/../render_posts/" );
$jsonPostsData = json_encode($posts, JSON_HEX_APOS);
$targetDirectory = __DIR__ . '/../../../content/json/index/';
$fileExtension ='.json';
$filePath = $targetDirectory . 'index-data-posts'.$fileExtension;


if (!is_dir($targetDirectory)) {
    mkdir($targetDirectory, 0755, true);
}

file_put_contents($filePath, $jsonPostsData);
?>
