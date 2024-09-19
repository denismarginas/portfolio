<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}

$projectPath = __DIR__ . '/../../../';

$pagesDirectory = $projectPath . ($jsonGlobalData["theme-active"]["html-render-path"] ?? "content/pages/");
$baseURL = $jsonGlobalData["url"] ?? 'https://localhost.com/';
$pageSlugExtension = $jsonGlobalData["page-slug-extension"] ?? ''; // Fallback to empty string

// Initialize XML Document
$xml = new DOMDocument('1.0', 'UTF-8');
$urlset = $xml->createElement('urlset');
$urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
$xml->appendChild($urlset);


$htmlFiles = scandir($pagesDirectory);

foreach ($htmlFiles as $file) {
    if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'html' && pathinfo($file, PATHINFO_FILENAME) != "404" && pathinfo($file, PATHINFO_FILENAME) != "search") {

        $htmlContent = file_get_contents($pagesDirectory . $file);

        $dom = new DOMDocument();
        @$dom->loadHTML($htmlContent);

        $metaTags = $dom->getElementsByTagName('meta');
        $includeInSitemap = false;

        foreach ($metaTags as $metaTag) {
            if ($metaTag->getAttribute('name') === 'robots') {
                $robotsContent = $metaTag->getAttribute('content');

                if (strpos(strtolower($robotsContent), 'noindex') === false) {
                    $includeInSitemap = true; // Include the page if it's not "noindex"
                }
                break;
            }
        }

        if ($includeInSitemap) {
            $urlElement = $xml->createElement('url');

            $loc = $xml->createElement('loc', $baseURL . pathinfo($file, PATHINFO_FILENAME) . $pageSlugExtension);
            $urlElement->appendChild($loc);

            $fileLastModified = date('Y-m-d', filemtime($pagesDirectory . $file));
            $lastmod = $xml->createElement('lastmod', $fileLastModified);
            $urlElement->appendChild($lastmod);


            $changefreq = $xml->createElement('changefreq', 'weekly');
            $urlElement->appendChild($changefreq);



            $priorityValue = '0.5';
            if (strpos($baseURL . pathinfo($file, PATHINFO_FILENAME), 'index') !== false) {
                $priorityValue = '1';
            } elseif (strpos($baseURL . pathinfo($file, PATHINFO_FILENAME), 'home') !== false) {
                $priorityValue = '0.8';
            } elseif (strpos($baseURL . pathinfo($file, PATHINFO_FILENAME), 'about') !== false) {
                $priorityValue = '0.7';
            } elseif (strpos($baseURL . pathinfo($file, PATHINFO_FILENAME), 'policy') !== false) {
                $priorityValue = '0.0';
            }

            $priority = $xml->createElement('priority', $priorityValue);
            $urlElement->appendChild($priority);

            $urlset->appendChild($urlElement);
            $urlset->appendChild($urlElement);
        }
    }
}

$targetDirectory = $projectPath . 'content/xml/';
$filePath = $targetDirectory . 'sitemap.xml';

if (!is_dir($targetDirectory)) {
    mkdir($targetDirectory, 0755, true);
}

$xml->formatOutput = true;
$xml->save($filePath);

$log[] = "Sitemap has been created successfully.";

?>
