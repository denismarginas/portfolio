<head>
    <?php
    $seo_fields = "";

    foreach ($seo_fields_implicit = seo_fields_implicit() as $seo_field_implicit) :
        $seo_fields .= $seo_field_implicit;
    endforeach;

    if (isset($seo)) :
        $seo_fields = seo_add_in_content($seo, $seo_fields);
        //$seo_fields = implode(" ",seo_add_in_tag($seo));
    endif;
    echo $seo_fields;

    ?>


    <link rel="stylesheet" href="<?php echo $GLOBALS['urlPath']; ?>themes/dm-theme/assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="<?php echo $GLOBALS['urlPath']; ?>content/img/favicon/favicon.ico">
    <script src="<?php echo $GLOBALS['urlPath']; ?>themes/dm-theme/assets/js/theme_script.js"></script>
</head>

