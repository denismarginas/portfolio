<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

$renderPath = $jsonGlobalData["theme-active"]["html-render-path"] ?? "";
$projectPath = __DIR__ . '/../../../';

$log[] ="<div style='color : var( --dm-color-status-primary);'>----- Posts Projects JSON - Rendering ------</div>";

$postPath = $projectPath. $renderPath;
$postJsonPath = "data-posts-projects";
$GLOBALS['urlPath'] = getUrlPaths();

$posts = getDataJson($postJsonPath, 'data');

if(count($posts) > 0) {
    foreach ($posts as $post) {
        //$log[] = $post["file"];

        try {
            $postHtmlFileName = $post["file"] . '.html';
            $postHtmlContent = render_post_template_content($post);
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

function render_post_template_content($post) {

    // Start output buffering
    ob_start();

    $renderer_structure = new RendererStructure();
    $renderer_sections = new RendererSections();
    $content = "";

    // Execute the PHP Functions - Start
    $post_data_php_render = $post["post_data"];
    $post_dataString = json_encode($post_data_php_render);
    $post_dataString = executePhpInString($post_dataString);
    $post_data_php_render = json_decode($post_dataString, true);
    $post["post_data"] = $post_data_php_render;

    $post_content = "";

    foreach ($post["post_content"] as $post_content_element) {
        if (is_array($post_content_element) || is_object($post_content_element)) {
            $post_content .= var_export($post_content_element, true);
        } else {
            $post_content .= $post_content_element;
        }
    }

    $post["post_content"] = executePhpInString($post_content, ['post_current_data' => $post["post_data"]]);

    // Render Header
    $seo = getSeoFromCurrentPostProjectData($post_data_php_render);
    $content .= $renderer_structure->header($seo);

    // Render Content
    $content .= $renderer_sections->renderSection('post', "wrapper-layout", [$post["post_data"], $post["post_content"]]);

    // Render Footer
    $content .= $renderer_structure->footer();

    // Get the captured content from output buffer and append it to $content
    $content .= ob_get_clean();

    return $content;
}

?>