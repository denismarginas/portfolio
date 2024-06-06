<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jsonDataWorkExperience)) :
    $jsonDataWorkExperience = getDataJson('data-content-personal', 'data')["work-experience"];
endif;

?>

<section class="dm-work-experience grid-background-animation">
    <container>

        <?php if( isset($jsonDataWorkExperience) and !empty($jsonDataWorkExperience)) : ?>

            <ul>
                <li>
                    <h2 data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.3s" data-delay="0s">

                        <?php if( isset($jsonDataWorkExperience["title"]) ): ?>
                            <span>
                                <?php echo $jsonDataWorkExperience["title"]; ?>
                            </span>
                        <?php endif; ?>

                        <?php if( isset($jsonDataWorkExperience["subtitle"]) ): ?>
                            <span>
                                <?php echo $jsonDataWorkExperience["subtitle"]; ?>
                            </span>
                        <?php endif; ?>

                    </h2>

                    <?php if( isset($jsonDataWorkExperience["description"]) ): ?>
                        <p data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.4s" data-delay="0.1s">
                            <?php echo $jsonDataWorkExperience["description"]; ?>
                        </p>
                    <?php endif; ?>

                    <?php if( isset($jsonDataWorkExperience["buttons"]) ): ?>
                        <a data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.4s"
                           href="<?php echo $jsonDataWorkExperience["buttons"][0]["button_page_redirect_slug"].$jsonGlobalData["page-slug-extension"]; ?>"
                           data-button="primary">
                            <?php echo $jsonDataWorkExperience["buttons"][0]["button_text"]; ?>
                        </a>
                    <?php endif; ?>

                </li>
                <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s" data-delay="0.1s">
                    <?php if( isset($jsonDataWorkExperience["img-path"]) && isset($jsonDataWorkExperience["img-preview"]) ):
                        $img_preview = $GLOBALS['urlPath']."content/img/".$jsonDataWorkExperience["img-path"]."/".$jsonDataWorkExperience["img-preview"];
                        echo renderImage($img_preview);
                    endif; ?>
                </li>
            </ul>

        <?php endif; ?>

    </container>
</section>