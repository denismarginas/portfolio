<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

$renderPath = $jsonGlobalData["theme-active"]["html-render-path"] ?? "";
$projectPath = __DIR__ . '/../../../';

$log[] ="<div style='color : var( --dm-color-status-primary);'>----- Pages Projects JSON - Rendering ------</div>";

$pagePath = $projectPath. $renderPath;
$pageJsonPath = "data-pages";
$GLOBALS['urlPath'] = getUrlPaths();

$pages = getDataJson($pageJsonPath, 'data');

if(count($pages) > 0) {
    foreach ($pages as $page) {
        //$log[] = $page["file"];

        try {
            $pageHtmlFileName = $page["file"] . '.html';
            $pageHtmlContent = render_page_template_content($page);
            $pageFilePath = $pagePath . $pageHtmlFileName;
            file_put_contents($pageFilePath, $pageHtmlContent);

            $log[] =  "Rendered: -- $pageHtmlFileName";

        } catch (Exception $e) {
            $log[] = "Error: " . $e->getMessage() . PHP_EOL;
        }
        //break;
    }
} else {
    $log[] = "No posts was found in ". $pagePath;
}

function render_page_template_content($page) {

    // Start output buffering
    ob_start();

    $renderer_structure = new RendererStructure();
    $renderer_sections = new RendererSections();
    $renderer_elements = new RendererElements();

    $content = "";
    //$page_content = executePhpInString($page_content, ['filename' => $page["file"]]);

    // Render Header
    $seo = getSeoFromCurrentPageData($page['file']);
    $content .= $renderer_structure->header($seo);

    // Render Content
    $page_content = "";

    if (isset($page["content"]) && is_array($page["content"][0])) {
        foreach ($page["content"] as $page_content_element) {

            if (is_array($page_content_element)) {
                $page_content .= call_user_func_array([$renderer_sections, 'renderSection'], $page_content_element);
            } else {
                $page_content .= $renderer_sections->renderSection($page_content_element);
            }
        }
    }

    $content .= $page_content;

    // Render Footer
    $content .= $renderer_structure->footer();


    // Get the captured content from output buffer and append it to $content
    $content .= ob_get_clean();

    return $content;
}

?>