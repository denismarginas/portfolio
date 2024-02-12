<?php

require_once __DIR__ . '/classes/classes-general.php';
require_once __DIR__ . '/classes/class-svg-render.php';
require_once __DIR__ . '/classes/class-video-render.php';
require_once __DIR__ . '/functions/functions.php';
require_once __DIR__ . '/config/config-debug.php';




$htaccessFilePath = __DIR__ . '/../../.htaccess';

if (file_exists($htaccessFilePath)) {
    unlink($htaccessFilePath);
    $log[] = "Deleted existing .htaccess file" . PHP_EOL;
}

// Generate .htaccess file content
$htaccessContent = "

RewriteEngine On

# Redirect to trailing slash if not present
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_URI} !\.(css|js|png|jpg|jpeg|gif)$ [NC]
RewriteRule ^(.*[^/])$ /$1/ [L,R=301]

# Rewrite pretty URLs for pages
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^([^/]+)/?$ $1.html [L]

";

// Write .htaccess content to file
//file_put_contents($htaccessFilePath, $htaccessContent);
$log[] = "Generated .htaccess file" . PHP_EOL;

$pagePath = __DIR__ . '/../pages/';
$pageFiles = glob($pagePath . '*.html');
foreach ($pageFiles as $pageFile) {
    unlink($pageFile);
    $log[] = "Deleted $pageFile" . PHP_EOL;
}
$pageFiles = glob('render_pages/*.php');

foreach ($pageFiles as $pageFile) {
    $urlPath = URLPath::getUrlPaths()['page'];
    $GLOBALS['urlPath'] = $urlPath;
    $pageHtmlFileName = basename($pageFile, '.php') . '.html';
    ob_start();
    include $pageFile;
    $pageOutput = ob_get_clean();
    $pageFilePath = $pagePath . $pageHtmlFileName;
    file_put_contents($pageFilePath, $pageOutput);
    $log[] =  "Rendered $pageFile to $pageFilePath" . PHP_EOL;
}


$postPath = $pagePath;
$postFiles = glob('render_posts/{*.php,*/**.php}', GLOB_BRACE);
$log = [];

foreach ($postFiles as $postFile) {
    try {
        if (!file_exists($postFile)) {
            throw new Exception("File $postFile not found.");
        }

        $urlPath = URLPath::getUrlPaths()['post'];
        $GLOBALS['urlPath'] = $urlPath;

        $postHtmlFileName = basename($postFile, '.php') . '.html';
        ob_start();
        include $postFile;
        $postOutput = ob_get_clean();

        $postFilePath = $postPath . $postHtmlFileName;
        file_put_contents($postFilePath, $postOutput);

        $log[] = "Rendered $postFile to $postFilePath" . PHP_EOL;
    } catch (Exception $e) {
        $log[] = "Error: " . $e->getMessage() . PHP_EOL;
    }
}


// -- RENDER VIEW --

// Show debug
@include("render_structure/head.php");
$renderer_sections = new RendererSections();
$renderer_sections->renderSection('debug');

foreach ($log as $log_item) {
    echo "<p>".$log_item."</p>";
}

// Save Index of Pages
require_once __DIR__ . '/render_index/index-html-pages.php';
require_once __DIR__ . '/render_index/index-php-posts-projects.php';
?>
