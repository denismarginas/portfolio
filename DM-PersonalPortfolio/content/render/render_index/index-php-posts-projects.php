<?php

$urlPath = URLPath::getUrlPaths()['post'];
$GLOBALS['urlPath'] = $urlPath;

$posts = extractDataPosts( __DIR__ . "/../render_posts/projects/" , "data-posts-projects");
usort($posts, "dateStartPostSortDesc");
usort($posts, "personalTypePostProjectSortAsc");

$jsonPostsData = json_encode($posts, JSON_HEX_APOS);
$targetDirectory = __DIR__ . '/../../../content/json/index/';
$fileExtension ='.json';
$filePath = $targetDirectory . 'index-data-posts-projects'.$fileExtension;


if (!is_dir($targetDirectory)) {
    mkdir($targetDirectory, 0755, true);
}

file_put_contents($filePath, $jsonPostsData);

?>
