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

function moveTagsToHead($html) {
    preg_match('/<head.*?>/i', $html, $headOpenTag);
    if (!$headOpenTag) {
        $html = preg_replace('/<html.*?>/i', '$0<head></head>', $html);
    }

    $tagsToMove = ['script', 'style', 'title', 'meta', 'link'];

    $movedContent = '';
    foreach ($tagsToMove as $tag) {
        $pattern = '/<('.$tag.').*?<\/\1>/is';
        preg_match_all($pattern, $html, $matches);

        foreach ($matches[0] as $foundTag) {
            $movedContent .= $foundTag . "\n";
            $html = str_replace($foundTag, '', $html);
        }
    }
    $html = preg_replace('/(<head.*?>)/i', '$1' . "\n" . $movedContent, $html);

    return $html;
}

function standardizeAttributeQuotes($html) {
    $pattern = "/=+'([^']+)'/";
    $html = preg_replace($pattern, '="$1"', $html);
    return $html;
}


$pageFiles = glob($pagePath . '*.html');

foreach ($pageFiles as $file) {
    $content = file_get_contents($file);
    $cleanedContent = synthesizeHtml($content);
    $cleanedContent = moveTagsToHead($cleanedContent);
    $cleanedContent = standardizeAttributeQuotes($cleanedContent);
    file_put_contents($file, $cleanedContent);
}
$log[] = "Cleaned HTML code.";

?>