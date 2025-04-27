<head>
    <?php

    if(!isset($jsonGlobalData)) :
        $jsonGlobalData = getDataJson('data-global-settings', 'data');
    endif;

    $theme_path = $GLOBALS['urlPath'].$jsonGlobalData["themes-path"]."/".$jsonGlobalData["theme-active"]["dir-name"];

    $seo_fields = "";

    foreach ($seoImplicitFields = seoImplicitFields() as $seo_field_implicit) :
        $seo_fields .= $seo_field_implicit;
    endforeach;

    if (isset($seo)) :
        $seo_fields = seoAddInContent($seo, $seo_fields);
    endif;
    echo $seo_fields;

    $renderer = new RendererElements();
    $renderer->renderElement("google-analytics");

    ?>

    <link rel="stylesheet" href="<?php echo $theme_path; ?>/css/style.min.css">
    <script src="<?php echo $theme_path; ?>/js/theme_script.min.js"></script>
</head>

