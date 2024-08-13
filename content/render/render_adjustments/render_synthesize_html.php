<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

$renderPath = $jsonGlobalData["theme-active"]["html-render-path"] ?? "content/pages/";
$projectPath = __DIR__ . '/../../../';

$GLOBALS['urlPath'] = getUrlPaths();

$pagePath = $projectPath. $renderPath;
$pageFiles = glob($pagePath . '*.html');

function synthesizeHtml($html) {
    $html = preg_replace('/\s+/', ' ', $html);
    $html = preg_replace('/>\s+</', '><', $html);
    $html = str_replace("\n", '', $html);
    $html = trim($html);

    return $html;
}

$pageFiles = glob($pagePath . '*.html');

foreach ($pageFiles as $file) {
    $content = file_get_contents($file);
    $cleanedContent = synthesizeHtml($content);
    file_put_contents($file, $cleanedContent);

    //echo "Cleaned file: $file\n";
}
?>