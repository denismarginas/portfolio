<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jsonContactCardsCategories)) :
    $jsonContactCardsCategories = getDataJson('data-content-personal', 'data')["cards-categories"];
endif;

?>

<ul class="dm-experience-categories">
    <?php if(isset($jsonContactCardsCategories)) : ?>
        <?php $experience_categories = $jsonContactCardsCategories; ?>
        <?php $i = 1; foreach ($experience_categories as $experience_category) : ?>

            <li class="dm-experience-category" data-motion="transition-fade-0" data-duration="0.7s" data-delay="<?php echo $i*0.1; ?>s">
                <div>
                    <?php
                    $experience_category_href = "#";
                    if( $experience_category["type"] == "page" ) :
                        $experience_category_href = $experience_category["page"].$jsonGlobalData["page-slug-extension"];
                    else :
                        $experience_category_href = $experience_category["section"];
                    endif;
                    $experience_category["name"];
                    ?>

                    <a href="<?php echo $experience_category_href; ?>">
                        <div>
                            <?php SVGRenderer::renderSVG( $experience_category["svg"]); ?>
                        </div>
                        <span>
                                    <?php echo $experience_category["name"]; ?>
                                </span>
                        <?php echo renderImage($GLOBALS['urlPath']."content/img".$experience_category["background-img-path"].$experience_category["background-img"]);?>
                    </a>

                </div>
            </li>

        <?php $i++; endforeach; ?>
    <?php endif; ?>
</ul>