<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

$renderPath = $jsonGlobalData["theme-active"]["html-render-path"] ?? "";
$projectPath = __DIR__ . '/../../../';

$log[] ="<div style='color : var( --dm-color-status-primary);'>----- Posts Workstation JSON - Rendering ------</div>";

$postPath = $projectPath. $renderPath;
$postJsonPath = "data-posts-workstations";
$GLOBALS['urlPath'] = getUrlPaths();

$posts = getDataJson($postJsonPath, 'data');

if(count($posts) > 0) {
    foreach ($posts as $post) {
        //$log[] = $post["file"];

        try {
            $postHtmlFileName = $post["file"] . '.html';
            $postHtmlContent = render_post_workstation_template_content($post);
            $postFilePath = $postPath . $postHtmlFileName;
            file_put_contents($postFilePath, $postHtmlContent);

            $log[] =  "Rendered: -- $postHtmlFileName";

        } catch (Exception $e) {
            $log[] = "Error: " . $e->getMessage() . PHP_EOL;
        }
        //break;
    }
} else {
    $log[] = "No posts was found in ". $postPath;
}

function render_post_workstation_template_content($post) {

    // Start output buffering
    ob_start();

    $renderer_structure = new RendererStructure();
    $renderer_sections = new RendererSections();
    $content = "";


    // Render Header
    $seo = getSeoFromCurrentPostProjectData($post);
    $content .= $renderer_structure->header($seo);
    

    // Render Content
    $content .= $renderer_sections->renderSection('workstation-post', "wrapper-layout", ['post_current_data' => $post]);

    // Render Footer
    $content .= $renderer_structure->footer();

    // Get the captured content from output buffer and append it to $content
    $content .= ob_get_clean();

    return $content;
}

?>