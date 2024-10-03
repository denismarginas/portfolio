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
                <li class="text">
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
                <li class="projects-previews" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s" data-delay="0s">
                    <?php if( isset($jsonDataWorkExperience["images"]) && !empty($jsonDataWorkExperience["images"]) ):
                        $images = $jsonDataWorkExperience["images"];
                        $screen_img = $images["screen"];
                        $cards_list_img = $images["cards"];
                    endif; ?>

                    <?php if( isset($cards_list_img) && !empty($cards_list_img) ): ?>
                        <div class="cards-container">
                            <?php $nr = 1; $delay_card = 0.30; foreach ($cards_list_img as $card) :
                                if( isset($card["img-path"]) && isset($card["img-preview"]) ):
                                    $img_card = $GLOBALS['urlPath']."content/img/".$card["img-path"]."/".$card["img-preview"];
                                    echo renderImage($img_card, false, "card-".$nr, true, ["data-motion" => "transition-fade-0 transition-slideInLeft-0", "data-duration" => "1s", "data-delay" => $nr*$delay_card."s"]);
                                endif;
                            $nr++; endforeach;
                            ?>
                            <?php if($nr > 2) : ?>
                                <div class="bg" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="<?php echo $nr*$delay_card +0.1; ?>s"></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if( isset($screen_img["img-path"]) && isset($screen_img["img-preview"]) ): ?>
                        <div class="screen-container" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.1s">
                            <?php $img_preview = $GLOBALS['urlPath']."content/img/".$screen_img["img-path"]."/".$screen_img["img-preview"];
                            echo renderImage($img_preview); ?>
                        </div>
                    <?php endif; ?>
                </li>
            </ul>

        <?php endif; ?>

    </container>
</section>