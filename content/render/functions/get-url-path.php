<?php

function getUrlPaths() {

    $jsonGlobalData = getDataJson('data-global-settings', 'data');

    if( isset($jsonGlobalData["theme"]) && isset($jsonGlobalData["theme"]["url-path"]) ) {
        $urlPaths = $jsonGlobalData["theme-active"]["url-path"];
    }
    else {
        $urlPaths = "";
    }

    return $urlPaths;
}

?>