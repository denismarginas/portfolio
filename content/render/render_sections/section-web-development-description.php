<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jsonDataWebDevExperience)) :
    $jsonDataWebDevExperience = getDataJson('data-content-personal', 'data')["work-experience"]["web-development-section"];
endif;

?>

<section class="dm-web-development-description">
    <container>
        <?php if( isset($jsonDataWebDevExperience) and !empty($jsonDataWebDevExperience)) : ?>

            <ul>
                <?php

                $text_list = $jsonDataWebDevExperience["text-list"];
                $img_path = $jsonDataWebDevExperience["img-path"];
                $img_laptop = $jsonDataWebDevExperience["img-list"]["img-laptop"];
                $img_tablet = $jsonDataWebDevExperience["img-list"]["img-tablet"];
                $img_phone = $jsonDataWebDevExperience["img-list"]["img-phone"];

                if( isset($text_list)) :

                    $middle = (int) (count($text_list) / 2);

                    foreach ($text_list as $key => $item) : ?>

                        <?php if( $key == $middle ): ?>
                            <li>
                                <section class="dm-web-responsive" data-motion="transition-fade-0">
                                    <?php

                                    if (isset($img_path) && isset($img_laptop) ) :
                                        $img_laptop = $GLOBALS['urlPath']."content/img/".$img_path."/".$img_laptop;
                                        echo renderImage($img_laptop, false,"dm-laptop-responsive");
                                    endif;

                                    if (isset($img_path) && isset($img_tablet) ) :
                                        $img_tablet = $GLOBALS['urlPath']."content/img/".$img_path."/".$img_tablet;
                                        echo renderImage($img_tablet, false,"dm-tablet-responsive");
                                    endif;

                                    if (isset($img_path) && isset($img_phone) ) :
                                        $img_phone = $GLOBALS['urlPath']."content/img/".$img_path."/".$img_phone;
                                        echo renderImage($img_phone, false,"dm-phone-responsive");
                                    endif;

                                    ?>
                                </section>
                            </li>
                        <?php endif; ?>

                        <?php if(( $key == 0 ) || ( $key == $middle )): ?>
                            <li>
                        <?php endif; ?>

                        <div class="dm-description-item">

                            <?php if( isset($item["title"]) ): ?>
                                <h3 data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.3s" data-delay="<?php echo $key*0.05; ?>s">
                                    <?php echo $item["title"]; ?>
                                </h3>
                            <?php endif; ?>

                            <?php if( isset($item["description"]) ): ?>
                                <p data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.3s" data-delay="<?php echo $key*0.1; ?>s">
                                    <?php echo $item["description"]; ?>
                                </p>
                            <?php endif; ?>

                        </div>

                        <?php if(( $key == $middle ) || ( $key == count($text_list) - 1 )): ?>
                            </li">
                        <?php endif; ?>

                    <?php endforeach;
                endif; ?>
            </ul>

        <?php endif; ?>

    </container>
    <?php

    $renderer = new RendererElements();
    $renderer->renderElement("animation-blurred-lines");

    ?>
</section>