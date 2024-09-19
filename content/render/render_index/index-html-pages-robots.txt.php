<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}

$projectPath = __DIR__ . '/../../../';

$pagesDirectory = $projectPath . $jsonGlobalData["theme-active"]["html-render-path"] ?? "content/pages/";

$robotsTxtEntries = [];

$htmlFiles = scandir($pagesDirectory);

foreach ($htmlFiles as $file) {
    if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'html' && pathinfo($file, PATHINFO_FILENAME) != "404" && pathinfo($file, PATHINFO_FILENAME) != "search") {
        $htmlContent = file_get_contents($pagesDirectory . $file);

        $dom = new DOMDocument();
        @$dom->loadHTML($htmlContent);

        $metaRobots = '';
        $metaTags = $dom->getElementsByTagName('meta');

        foreach ($metaTags as $metaTag) {
            if ($metaTag->getAttribute('name') === 'robots') {
                $metaRobots = $metaTag->getAttribute('content');
                break;
            }
        }

        if (!empty($metaRobots)) {
            $robotsTxtEntries[] = "User-agent: *\nDisallow: /" . pathinfo($file, PATHINFO_FILENAME) . "\n" . "Crawl-delay: 10\n" . "Allow: /\n" . "Meta-robots: " . $metaRobots . "\n";
        } else {
            $log[] = "Page doesn't have robots meta tag: $file";
        }
    }
}

$robotsTxtContent = implode("\n", $robotsTxtEntries);

$targetDirectory = __DIR__ . '/../../../';
$filePath = $targetDirectory . 'robots.txt';

if (!is_dir($targetDirectory)) {
    mkdir($targetDirectory, 0755, true);
}

file_put_contents($filePath, $robotsTxtContent);

$log[] = "robots.txt file has been created successfully.";

?>
