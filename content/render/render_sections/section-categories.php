<?php

if(!isset($categoriesData)) :
    $categoriesData = getDataJson('data-categories', 'data');
endif;

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

?>

<section class="dm-catalog-categories">
    <container>
        <div>
            <h2 data-motion="transition-fade-0 transition-slideInTop-0">
                <?php echo $categoriesData["title"]; ?>
            </h2>
            <?php if( isset($categoriesData["categories"]) && !empty($categoriesData["categories"])) : ?>
                <ul>
                    <?php foreach ($categoriesData["categories"] as $category) : ?>
                        <li data-motion="transition-fade-0 transition-slideInTop-0" data-duration="0.5s" data-delay="0.2s">
                            <div class="category-card">

                                <?php if( isset($categoriesData["overlay-img"]) && isset($categoriesData["overlay-img-path"]) ) :
                                    echo renderImage($GLOBALS['urlPath']."content/img/".$categoriesData["overlay-img-path"]."/".$categoriesData["overlay-img"]);
                                endif; ?>

                                <?php if( isset($category["img"]) && isset($categoriesData["img-path"]) ) :
                                    echo renderImage($GLOBALS['urlPath']."content/img/".$categoriesData["img-path"]."/".$category["img"]);
                                endif; ?>

                                <span>

                                    <?php if( isset($category["svg-icon"]) && !empty($category["svg-icon"]) ) : ?>

                                      <a href="<?php echo $category["slug"].$jsonGlobalData["page-slug-extension"];?>">
                                          <?php SVGRenderer::renderSVG($category["svg-icon"]); ?>
                                      </a>

                                    <?php endif; ?>

                                </span>
                                <div>
                                    <?php if( isset($category["name"]) && !empty($category["name"]) ) : ?>
                                        <a href="<?php echo $category["slug"].$jsonGlobalData["page-slug-extension"];?>">
                                            <?php echo $category["name"]; ?>
                                        </a>
                                    <?php endif; ?>

                                    <p>
                                        <?php if( isset($category["short-description"]) && !empty($category["short-description"]) ) : ?>
                                            <span>
                                                <?php echo $category["short-description"]; ?>
                                           </span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        </div>
    </container>

    <?php
        $renderer = new RendererElements();
        $renderer->renderElement("animation-waves");
    ?>

</section>