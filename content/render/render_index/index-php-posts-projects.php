<?php



if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

$renderPath = $jsonGlobalData["theme-active"]["html-render-path"] ?? "content/pages/";
$projectPath = __DIR__ . '/../../../';

$GLOBALS['urlPath'] = getUrlPaths();

$posts = extractDataPosts( __DIR__ . "/../render_posts/projects/" , "data-posts-projects");

if(empty($posts)) {
    echo "<br>Projects data is empty.</br>";
    echo "<br>Render Path: ' ".$renderPath." '.</br>";
    //print_r($posts);
}

usort($posts, "dateStartPostSortDesc");
usort($posts, "personalTypePostProjectSortAsc");

$jsonPostsData = json_encode($posts, JSON_HEX_APOS);
$targetDirectory = $projectPath.'/content/json/index/';
$fileExtension ='.json';
$filePath = $targetDirectory . 'index-data-posts-projects'.$fileExtension;

if (!is_dir($targetDirectory)) {
    mkdir($targetDirectory, 0755, true);
}

file_put_contents($filePath, $jsonPostsData);

?>
