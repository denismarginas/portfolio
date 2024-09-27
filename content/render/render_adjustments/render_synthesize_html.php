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

    $existingTags = [];
    foreach ($tagsToMove as $tag) {
        preg_match_all('/<'.$tag.'.*?<\/'.$tag.'>/is', $html, $matches);
        foreach ($matches[0] as $foundTag) {
            $existingTags[] = strip_tags($foundTag); // Store tag content for comparison
        }
    }

    foreach ($tagsToMove as $tag) {
        $pattern = '/<'.$tag.'.*?<\/'.$tag.'>/is';
        preg_match_all($pattern, $html, $matches);

        foreach ($matches[0] as $foundTag) {
            $tagContent = strip_tags($foundTag);

            if (!in_array($tagContent, $existingTags)) {
                $movedContent .= $foundTag . "\n";
                $html = str_replace($foundTag, '', $html);
            }
        }
    }

    $html = preg_replace('/(<head.*?>)/i', '$1' . "\n" . $movedContent, $html);

    return $html;
}


function standardizeAttributeQuotes($html) {
    $pattern = '/(\w+)\s*=\s*["\']([^"\']+)["\']/';
    $html = preg_replace($pattern, '$1="$2"', $html);
    return $html;
}
function standardizeBackgroundImageUrls($html) {
    $html = html_entity_decode($html);
    $pattern = '/background-image:\s*url\(\s*[\'"]?([^\'"()]+)[\'"]?\s*\)/';
    $replacement = 'background-image: url(\'$1\')';
    $html = preg_replace($pattern, $replacement, $html);

    return $html;
}




$pageFiles = glob($pagePath . '*.html');

foreach ($pageFiles as $file) {
    $content = file_get_contents($file);
    $cleanedContent = synthesizeHtml($content);
    $cleanedContent = moveTagsToHead($cleanedContent);
    $cleanedContent = standardizeAttributeQuotes($cleanedContent);
    $cleanedContent = standardizeBackgroundImageUrls($cleanedContent);
    file_put_contents($file, $cleanedContent);
}
$log[] = "Cleaned HTML code.";

?>