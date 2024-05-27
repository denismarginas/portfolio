<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jsonContactData)) :
    $jsonContactData = getDataJson('data-content-personal', 'data')["contact"]["data"];
endif;

?>

<section class="dm-contact-data grid-background-animation">
    <container>
        <ul>
            <?php if(isset($jsonContactData["img"])) : ?>
            <li>
                <div class="dm-person-circle-card" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s">
                    <span>
                        <div>
                            <span class="circle-background"></span>
                            <?php echo renderImage($GLOBALS['urlPath']."content/img".$jsonContactData["img-path"].$jsonContactData["img"]);?>
                        </div>
                    </span>
                </div>
            </li>
            <?php endif; ?>

            <li>
                <h2 data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.5s">
                    <?php echo $jsonContactData["title"]; ?>
                </h2>

                <?php $contact_text_list = $jsonContactData["text"];?>

                <?php foreach ($contact_text_list as $contact_text_item) : ?>
                    <p data-motion="transition-fade-0 transition-slideInLeft-0">
                        <?php echo $contact_text_item; ?>
                    </p>
                <?php  endforeach; ?>

                <?php if(isset($jsonContactData["contacts"])) : ?>
                    <ul>
                        <?php $contacts_list = $jsonContactData["contacts"];?>
                        <?php $i = 1; foreach ($contacts_list as $contact_item) : ?>

                            <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="<?php echo 0.6 + (0.1 * $i); ?>s">

                                <?php SVGRenderer::renderSVG('chevron-right'); ?>

                                <span>
                                <b><?php echo $contact_item["label"]; ?></b>

                                <?php if(isset($contact_item["link"])) : ?>
                                    <a href="<?php echo $contact_item["link"]; ?>">
                                        <?php echo $contact_item["value"]; ?>
                                    </a>
                                <?php else : ?>
                                    <span><?php echo $contact_item["value"]; ?></span>
                                <?php endif; ?>
                            </span>
                                <?php if(isset($contact_item["warning-text"])) : ?>
                                    <div class="dm-warning-data">
                                        <p>
                                            <?php echo $contact_item["warning-text"]; ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </li>
                            <?php $i++; endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        </ul>
    </container>
</section>