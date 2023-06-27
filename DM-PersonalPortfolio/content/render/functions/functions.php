<?php

function dm_echo($var) {
    if (isset($var) && !empty($var)) {
        echo $var;
    }
}

function addHttps($url) {
    if (!empty($url) && strpos($url, 'https://') !== 0) {
        $url = 'https://' . $url;
    }
    return $url;
}

function removeHttps($url) {
    if (!empty($url) && strpos($url, 'https://') === 0) {
        $url = substr($url, 8);
    }
    return $url;
}


?>