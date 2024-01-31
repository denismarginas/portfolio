<?php

define("DEBUG", false);

define("LOG", true);
if (defined('LOG') && LOG === true) {
    global $log;
    $log = [];
}

?>
