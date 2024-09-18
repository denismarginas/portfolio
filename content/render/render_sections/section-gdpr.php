<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jsonGDPR)) :
    $jsonGDPR = getDataJson('data-content-personal', 'data')["privacy-policy"];
endif;


?>

<section class="dm-gdpr grid-background-animation">
    <container>
        <?php if(isset($jsonGDPR)) : ?>

            <?php if(isset($jsonGDPR["title"])) : ?>
                <h2>
                    <?php echo $jsonGDPR["title"]; ?>
                </h2>
            <?php endif; ?>

            <?php if(isset($jsonGDPR["content"])) : ?>
                <?php foreach ($jsonGDPR["content"] as $content) : ?>

                    <?php if(isset($content["subtitle"])) : ?>
                        <h3>
                            <?php echo $content["subtitle"]; ?>
                        </h3>
                    <?php endif; ?>

                    <?php if(isset($content["text"])) : ?>
                        <p>
                            <?php echo $content["text"]; ?>
                        </p>
                    <?php endif; ?>

                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
    </container>
</section>
