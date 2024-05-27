<?php

$urlPath = URLPath::getUrlPaths()['page'];
$GLOBALS['urlPath'] = $urlPath;

$pagePath = __DIR__ . '/../../pages/';
$pageFiles = glob($pagePath . '*.html');

foreach ($pageFiles as $pageFile) {
    unlink($pageFile);
    //$log[] = "Deleted $pageFile" . PHP_EOL;
}

$log[] ="Deleted all html files.";
$pageFiles = glob('render_pages/*.php');

$log[] ="<div style='color : var( --dm-color-status-primary);'>----- Pages PHP Files Rendering ------</div>";

$log[] = "Pages found (PHP Files): ".count($pageFiles);


if(count($pageFiles) > 0) {
    foreach ($pageFiles as $pageFile) {
        try {
            $pageHtmlFileName = basename($pageFile, '.php') . '.html';
            ob_start();
            include $pageFile;
            $pageOutput = ob_get_clean();
            $pageFilePath = $pagePath . $pageHtmlFileName;
            file_put_contents($pageFilePath, $pageOutput);

            $log[] =  "Rendered: -- $pageHtmlFileName";

        } catch (Exception $e) {
            $log[] = "Error: " . $e->getMessage() . PHP_EOL;
        }
    }
} else {
    $log[] = "No php files found in ". $pagePath;
}


?>