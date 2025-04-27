<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}

$projectPath = __DIR__ . '/../../../';

$pagesDirectory = $projectPath. $jsonGlobalData["theme-active"]["html-render-path"] ?? "content/pages/";
$thumbnailDirectory = $pagesDirectory. '/content/img/thumbnails-pages/';

$pageData = [];

$htmlFiles = scandir($pagesDirectory);

foreach ($htmlFiles as $file) {
    if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'html' && pathinfo($file, PATHINFO_FILENAME) != "404" && pathinfo($file, PATHINFO_FILENAME) != "search") {
        $htmlContent = file_get_contents($pagesDirectory . $file);

        $dom = new DOMDocument();
        @$dom->loadHTML($htmlContent);

        $title = '';
        $metaDescription = '';
        $postType = '';

        $titleElement = $dom->getElementsByTagName('title')->item(0);

        if ($titleElement) {
            $title = $titleElement->nodeValue;
        }

        $metaTags = $dom->getElementsByTagName('meta');
        foreach ($metaTags as $metaTag) {
            if ($metaTag->getAttribute('name') === 'description') {
                $metaDescription = $metaTag->getAttribute('content');
                break;
            }
        }

        $postTypesTag = $dom->getElementsByTagName('meta');
        foreach ($postTypesTag as $metaTag) {
            if ($metaTag->getAttribute('name') === 'post-type') {
                $postType = $metaTag->getAttribute('content');
                break;
            }
        }

        if (empty($title) && empty($metaDescription)) {
            $log[] = "Page doesn't have meta fields: $file";
        }

        $content = '';
        $bodyElement = $dom->getElementsByTagName('body')->item(0);
        extractContent($content, $bodyElement); // Call the function directly

        $content = trim(preg_replace('/\s+/', ' ', $content));

        $defaultImg = '';
        $pageContentElement = $dom->getElementById('page-content');
        if ($pageContentElement) {
            $images = $pageContentElement->getElementsByTagName('img');
            foreach ($images as $image) {
                $src = $image->getAttribute('src');
                if (preg_match('/\.(webp|jpg|png)$/i', $src)) {
                    $defaultImg = $src;
                    break;
                }
            }
        }
        $removeString = stringSeoSiteName();
        $title = removeStringFromTitle($title, $removeString);

        $pageData[] = [
            'page'=> pathinfo($file, PATHINFO_FILENAME).$jsonGlobalData["page-slug-extension"],
            'meta-title' => $title,
            'meta-description' => $metaDescription,
            'post-type' => $postType,
            'content' => $content,
            'default-img' => $defaultImg
        ];

    }
}

function extractContent(&$content, $node) {
    if ($node->nodeType === XML_TEXT_NODE) {
        $content .= $node->textContent . ' ';
    } elseif ($node->nodeType === XML_ELEMENT_NODE && $node->getAttribute('class') !== 'dm-debug') {
        foreach ($node->childNodes as $childNode) {
            extractContent($content, $childNode);
        }
    }
}

function removeStringFromTitle($title, $string) {
    return str_replace($string, '', $title);
}

$jsonContent = json_encode($pageData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

$targetDirectory = __DIR__ . '/../../../content/json/index/';
$fileExtension = '.json';
$filePath = $targetDirectory . 'index-data-pages' . $fileExtension;

if (!is_dir($targetDirectory)) {
    mkdir($targetDirectory, 0755, true);
}

file_put_contents($filePath, $jsonContent);

?>
