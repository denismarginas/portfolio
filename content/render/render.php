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
    __DIR__ . '/render_adjustments/*.php'
];

foreach ($directories as $directory) {
    foreach (glob($directory) as $filename) {
        require_once $filename;
    }
}
$log[] .= "Loaded rendering files.";
$log[] = "<div style='color: var(--dm-color-status-primary);'>----- Json Check ------</div>";
$jsonPath = __DIR__ . '/../json/data/';
$jsonFiles = glob($jsonPath . '*.json');

if (!$jsonFiles || count($jsonFiles) === 0) {
    $log[] = "No json files found in " . $jsonPath;
} else {
    foreach ($jsonFiles as $jsonFile) {

        $postJsonFileName = basename($jsonFile, '.json');
        $jsonFileData = getDataJson($postJsonFileName, 'data');

        if ($jsonFileData === null) {
            $color_json = "var(--dm-color-status-tertiary)";
            $preview = "null";
        } else {
            $color_json = "var(--dm-color-status-secondary)";
            $preview = substr(json_encode($jsonFileData), 0, 100) . "...";
        }

        $log[] = "<div style='color: {$color_json};'>
            {$postJsonFileName}: [ {$preview} ]
        </div>";
    }
}


// -- RENDER VIEW START --

$seo = [
    "title" => "Render Project | Denis Marginas",
    "description" => "Rendering all content.",
    "keywords" => "render",
    "slug" => "render",
    "favicon" => "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAArBAMAAAATc2zzAAAAAXNSR0IB2cksfwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAB5QTFRFAAAANDxJREhOjG1mXkxLt5eRREdNPUJL1dbhcmNkMML7UgAAAAp0Uk5TAPwV/Pz8XbP/mZ/7Yp4AAAGOSURBVHicbZI7T8MwFIWtDJ0xRO2agmjVEa7DY6xiUWYiD93S8uhKQCL8AaTMRQz9t5zrR+IWPCWfnM/HJ1cIrKSWUg5lobTWb6JbA1C5kYXWczns8ZTxKiVslqNsD49qi/WoCjRZWXXK6lSvO8wnNu5EXVwGPLEOnFgQUb7MDtUFGayAWf3RNLtmt2O89WqO526R/AA/RA7/5Tmwl48jPGNL1cU7DlnzILe4K4jlVyG17Io4C/L4RMiVJsp8IUGNVw289ep1j5/A7zJXSN+xmBGVi8yqhzFGRJW5QnoqEmNKVQkZp3a1lOpI1P/gi1fbSOye5KacVwe34SSGFi7gXm78OHy935RIvokUXpMNyzs8wA9V679VwXHNb3YAq4AfSXElB78heSflh3YVyQcFBtHliuUzbPbPgyg52g5fOvmLXTUGP5wzdqMpczXHUxpSTf3EoiM8LcIdTllen7QoGmN/F7Ab+/svY3BF2nZF2OSMS+C+TSv/bA1vv+27t8mfW2w3ZYRZfrNsebsf+l9eLnH1OI1NtQAAAABJRU5ErkJggg==",
    "index" => "false"
];

echo '<head>';
$seo_fields = "";

foreach ($seoImplicitFields = seoImplicitFields() as $seo_field_implicit):
    $seo_fields .= $seo_field_implicit;
endforeach;

if (isset($seo)):
    $seo_fields = seoAddInContent($seo, $seo_fields);
endif;
echo $seo_fields;

echo '<link rel="stylesheet" href="../../themes/dm-theme-01/css/style.min.css">';
echo '</head>';

$renderer_sections = new RendererSections();
$renderer_sections->renderSection('debug');
echo "<section class='dm-debug'>";
echo "<div class='data-log' style='display: block;position: relative; height: 100%;'><ul>";
foreach ($log as $log_item) {
    echo "<li>" . $log_item . "</li>";
}
echo "</ul></div>";
echo "</section>";

// -- RENDER VIEW END --

?>