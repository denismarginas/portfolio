<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

$cookieNotice = $jsonGlobalData["cookie-notice"] ?? null;
$cookieNoticeDisplay = $cookieNotice["display"] ?? null;

if(isset($cookieNoticeDisplay) == "true") : ?>
    <div id="cookie-notice" class="cookie-notice">

        <?php if(isset($cookieNotice["description-text"])) : ?>
            <p class="text">
                <?php echo $cookieNotice["description-text"]; ?>

                <?php
                $pageLink = '';
                if (isset($cookieNotice["page"]) && isset($cookieNotice["page"]["title"]) && isset($cookieNotice["page"]["slug"])) :
                    $pageLink = '<a class="link" href="' . $cookieNotice["page"]["slug"] . '" target="_blank">' . $cookieNotice["page"]["title"] . '</a>';
                endif;

                if (isset($cookieNotice["page-text"])) :
                    echo sprintf($cookieNotice["page-text"], $pageLink);
                elseif (!empty($pageLink)) :
                    echo $pageLink;
                endif;
                ?>

            </p>
        <?php endif; ?>

        <?php if(isset($cookieNotice["button-text"])) : ?>

            <button class="button-accept" data-button="primary" data-toggle="collapse" aria-controls="cookie-notice" aria-expanded="true">
                <?php SVGRenderer::renderSVG('cookie'); ?>
                <?php echo $cookieNotice["button-text"]; ?>
            </button>

        <?php endif; ?>

    </div>
<?php endif; ?>

