<?php

$urlPath = URLPath::getUrlPaths()['post'];
$GLOBALS['urlPath'] = $urlPath;

$postPath = __DIR__ . '/../../pages/';
$postFiles = glob('render_posts/{*.php,*/**.php}', GLOB_BRACE);


$log[] ="<div style='color : var( --dm-color-status-primary);'>----- Posts PHP Files Rendering ------</div>";
$log[] = "Pages found (PHP Files): ".count($postFiles);

if(count($postFiles) > 0) {
    foreach ($postFiles as $postFile) {
        try {
            if (!file_exists($postFile)) {
                throw new Exception("File $postFile not found.");
            }
            $postHtmlFileName = basename($postFile, '.php') . '.html';
            ob_start();
            include $postFile;
            $postOutput = ob_get_clean();

            $postFilePath = $postPath . $postHtmlFileName;
            file_put_contents($postFilePath, $postOutput);

            $log[] =  "Rendered: -- $postHtmlFileName";

        } catch (Exception $e) {
            $log[] = "Error: " . $e->getMessage() . PHP_EOL;
        }
    }
} else {
    $log[] = "No php files found in ". $postPath;
}

?>