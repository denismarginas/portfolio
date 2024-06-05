<?php

 function generateRedirectHTML() {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');

    $log = [];

    $log[] = $jsonGlobalData["theme-active"]["html-render-path"];

    $frontPage = "home.html";

    if(isset($jsonGlobalData["front-page"]["slug"]) &&
        $jsonGlobalData["page-slug-extension"]
    ) {
        $frontPage = $jsonGlobalData["front-page"]["slug"].$jsonGlobalData["page-slug-extension"];
    }
    if( isset($jsonGlobalData["theme-active"]) &&
        isset($jsonGlobalData["theme-active"]["html-render-path"])
    ) {
        $html = '<!DOCTYPE html>
                    <html>
                    <head>
                      <title>Redirecting...</title>
                      <script>
                        window.location.href = "'.$jsonGlobalData["theme-active"]["html-render-path"].$frontPage.'";
                      </script>
                    </head>
                    <body>
                      <h1>Redirecting...</h1>
                      <p>If you are not redirected, <a href="'.$jsonGlobalData["theme-active"]["html-render-path"].$frontPage.'">click here</a>.</p>
                    </body>
                    </html>';

        $redirectFilePath = __DIR__ . '/../../../index.html';

        if (file_exists($redirectFilePath)) {
            if (unlink($redirectFilePath)) {
                $log[] = "Deleted existing index.html file" . PHP_EOL;
            } else {
                $log[] = "Failed to delete existing index.html file" . PHP_EOL;
            }
        }

        if (file_put_contents($redirectFilePath, $html) !== false) {
            $log[] = "Generated index.html file for redirecting." . PHP_EOL;
        } else {
            $log[] = "Failed to generate index.html file for redirecting." . PHP_EOL;
        }

    } else {
        $log[] = "The HTML file for the redirect was not generated. The conditions were not met." . PHP_EOL;
    }
    return implode(' ',$log);;
}

?>