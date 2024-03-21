<?php
$pagesDirectory = __DIR__ . '/../../pages/';

// Create an array to store page data
$pageData = [];

// Get all HTML files in the pages directory
$htmlFiles = scandir($pagesDirectory);

foreach ($htmlFiles as $file) {
    if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'html') {
        $htmlContent = file_get_contents($pagesDirectory . $file);
        // Create a DOMDocument instance and load the HTML content
        $dom = new DOMDocument();
        @$dom->loadHTML($htmlContent);

        $title = '';
        $metaDescription = '';

        // Extract title
        $titleElement = $dom->getElementsByTagName('title')->item(0);
        if ($titleElement) {
            $title = $titleElement->nodeValue;
        }

        // Extract meta description
        $metaTags = $dom->getElementsByTagName('meta');
        foreach ($metaTags as $metaTag) {
            if ($metaTag->getAttribute('name') === 'description') {
                $metaDescription = $metaTag->getAttribute('content');
                break;
            }
        }

        // If both title and meta description are empty, log the message
        if (empty($title) && empty($metaDescription)) {
            $log[] = "Page doesn't have meta fields: $file"; // Append message to the log array
        }

        // Extract main content without HTML tags and with elements having class "dm-debug" ignored
        $content = '';
        $bodyElement = $dom->getElementsByTagName('body')->item(0);
        extractContent($content, $bodyElement); // Call the function directly

        // Remove newline characters and extra spaces
        $content = trim(preg_replace('/\s+/', ' ', $content));

        // Extract the default image
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
