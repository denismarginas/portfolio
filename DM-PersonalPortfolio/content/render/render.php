<?php

require_once __DIR__ . '/classes/classes-general.php';
require_once __DIR__ . '/classes/class-svg-render.php';
require_once __DIR__ . '/config/config_debug.php';

$pagePath = __DIR__ . '/../pages/';
$pageFiles = glob('render_pages/*.php');

$sectionPath = __DIR__ . '/../../themes/dm-theme/templates-html/';
$sectionFiles = glob('render_sections/*.php');

foreach ($sectionFiles as $sectionFile) {
    $urlPath = URLPath::getUrlPaths()['template'];
    $GLOBALS['urlPath'] = $urlPath;
    $sectionHtmlFileName = basename($sectionFile, '.php') . '.html';
    ob_start();
    $renderer_structure = new RendererStructure();
    $renderer_structure->header();
    include $sectionFile;
    $renderer_structure->footer();
    $sectionOutput = ob_get_clean();
    $sectionFilePath = $sectionPath . $sectionHtmlFileName;
    file_put_contents($sectionFilePath, $sectionOutput);
    $log[] = "Rendered $sectionFile to $sectionFilePath" . PHP_EOL;
}

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
// -- RENDER VIEW --
// Show de debug
@include("render_structure/head.php");
$renderer_sections = new RendererSections();
$renderer_sections->renderSection('debug');
?>
