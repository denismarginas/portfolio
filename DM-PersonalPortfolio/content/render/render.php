<?php
$log = [];
$log[] = "Loading rendering files...";

// render_index - should be used twice before and after content and pages render.
$directories = [
    __DIR__ . '/classes/*.php',
    __DIR__ . '/functions/*.php',
    __DIR__ . '/config/*.php',
    __DIR__ . '/render_index/*.php',
    __DIR__ . '/render_bulk/*.php',
    __DIR__ . '/render_index/*.php',
];

foreach ($directories as $directory) {
    foreach (glob($directory) as $filename) {
        require_once $filename;
    }
}
$log[] = "Loaded rendering files.";

$htaccessFilePath = __DIR__ . '/../../.htaccess';

if (file_exists($htaccessFilePath)) {
    unlink($htaccessFilePath);
    //$log[] = "Deleted existing .htaccess file" . PHP_EOL;
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




$log[] ="<div style='color : var( --dm-color-status-primary);'>----- Json Check ------</div>";

$jsonPath = __DIR__ . '/../json/data/';
$jsonFiles = glob($jsonPath . '*.json');

foreach ($jsonFiles as $jsonFile) {
    if(count($jsonFiles) > 0) {
        $postJsonFileName = basename($jsonFile, '.json');
        $jsonFileData = getDataJson($postJsonFileName, 'data');
        if($jsonFileData == null) {
            $color_json = "var( --dm-color-status-tertiary )";
        }
        else {
            $color_json = "var( --dm-color-status-secondary )";
        }
        $log[] = " <div style='color : ".$color_json.";'> ".$postJsonFileName.":  [ ".substr(json_encode($jsonFileData), 0, 200)."... ] </div>";
    }
    else {
        $log[] = "No json files found in ". $jsonPath;
    }
}





// -- RENDER VIEW --

// Show debug

$seo = [
    "title" => "Render | Denis Marginas",
    "description" => "Rendering all content.",
    "keywords" => "render",
    "slug" => "render"
];

@include("render_structure/head.php");


$renderer_sections = new RendererSections();
$renderer_sections->renderSection('debug');
echo "<section class='dm-debug'>";
echo "<div class='data-log' style='display: block;position: relative; height: 100%;'><ul>";
foreach ($log as $log_item) {
    echo "<li>".$log_item."</li>";
}
echo "</ul></div>";
echo "</section>";

?>
