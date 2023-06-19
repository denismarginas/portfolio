<?php

define("DEBUG", true);

define("LOG", true);
if (defined('LOG') && LOG === true) {
    global $log;
    $log = [];
}

?>
