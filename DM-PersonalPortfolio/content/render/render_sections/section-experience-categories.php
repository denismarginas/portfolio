<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}
if(!isset($jsonContactCardsCategories)) {
    $jsonContactCardsCategories = getDataJson('data-content-personal', 'data')["cards-categories"];
}

?>


<section class="dm-experience-categories">
    <container>
        <?php if(isset($jsonContactCardsCategories)) : ?>
            <ul>
                <?php $experience_categories = $jsonContactCardsCategories?>
                <?php foreach ($experience_categories as $experience_category) : ?>

                    <li class="dm-experience-category" data-motion="transition-fade-0" data-duration="0.4s">
                        <div>
                            <?php
                            $experience_category_href = "#";
                            if( $experience_category["type"] == "page" ) :
                                $experience_category_href = $experience_category["page"];
                            else :
                                $experience_category_href = $experience_category["section"];
                            endif;
                            $experience_category["name"];
                            ?>

                            <a href="<?php echo $experience_category_href; ?>" data-motion="transition-fade-0" data-duration="0.6s">
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

                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </container>
</section>