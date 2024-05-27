<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}

$pagesDirectory = __DIR__ . '/../../pages/';
$thumbnailDirectory = __DIR__ . '/../../img/thumbnails-pages/';

// Create an array to store page data
$pageData = [];

// Get all HTML files in the pages directory
$htmlFiles = scandir($pagesDirectory);

foreach ($htmlFiles as $file) {
    if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'html') {
        $htmlContent = file_get_contents($pagesDirectory . $file);

        $dom = new DOMDocument();
        @$dom->loadHTML($htmlContent);

        $title = '';
        $metaDescription = '';

        // Extract title
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


        if (empty($title) && empty($metaDescription)) {
            $log[] = "Page doesn't have meta fields: $file"; // Append message to the log array
        }

        $content = '';
        $bodyElement = $dom->getElementsByTagName('body')->item(0);
        extractContent($content, $bodyElement); // Call the function directly

        // Remove newline characters and extra spaces
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
        $title = removeStringFromTitle($title, " | ".$jsonGlobalData["site-identity"]);
        $pageData[] = [
            'page'=> $file,
            'meta-title' => $title,
            'meta-description' => $metaDescription,
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

// Convert the page data array to JavaScript format
$jsonContent = json_encode($pageData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

$targetDirectory = __DIR__ . '/../../../content/json/index/';
$fileExtension = '.json';
$filePath = $targetDirectory . 'index-data-pages' . $fileExtension;

if (!is_dir($targetDirectory)) {
    mkdir($targetDirectory, 0755, true);
}

file_put_contents($filePath, $jsonContent);

?>
