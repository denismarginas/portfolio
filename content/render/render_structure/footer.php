<?php

$renderer_sections = new RendererSections();
$renderer_sections->renderSection('debug');

$jsonGlobalData = getDataJson('data-global-settings', 'data');
$jsonCategoriesData = getDataJson('data-posts-projects-categories', 'data');
$jsonSocialsData = getDataJson('data-content-personal', 'data')["socials"]["visual-list"];

?>

<footer id="footer">
    <section>
        <?php $footer_blocks = $jsonGlobalData["theme-active"]["footer"]; ?>

        <?php if( isset($footer_blocks["block-1"]) ) : ?>

            <div class="<?php echo $footer_blocks["block-1"]["class"] ?? "block"; ?>" data-motion="transition-fade-0" data-duration="0.5s">

                <?php if( isset($footer_blocks["block-1"]["title"]) ) : ?>
                    <h5>
                        <?php echo $footer_blocks["block-1"]["title"]; ?>
                    </h5>
                <?php endif; ?>

                <?php if( isset($footer_blocks["block-1"]["list"]) ) : ?>
                    <ul>

                        <?php foreach ($footer_blocks["block-1"]["list"] as $key => $item) : ?>
                            <li>
                                <?php

                                if( isset($item["slug"])) :
                                    $item_url = $item["slug"].$jsonGlobalData["page-slug-extension"];
                                else:
                                    $item_url = $item["url"] ?? "";
                                endif;

                                ?>
                                <a href="<?php echo $item_url ?? "#"; ?>" target="_blank">


                                    <?php SVGRenderer::renderSVG('chevron-right'); ?>

                                    <?php if( isset($item["icon"]) ) :
                                        SVGRenderer::renderSVG($item["icon"]);
                                    endif; ?>

                                    <?php if( isset($item["text"]) ) : ?>
                                        <span>
                                            <?php echo $item["text"]; ?>
                                        </span>
                                    <?php endif; ?>

                                </a>
                            </li>
                        <?php endforeach; ?>

                    </ul>

                <?php endif; ?>

            </div>
        <?php endif; ?>

        <?php if( isset($footer_blocks["block-2"]) ) : ?>

            <div class="<?php echo $footer_blocks["block-2"]["class"] ?? "block"; ?>" data-motion="transition-fade-0" data-duration="0.5s">

                <?php if( isset($footer_blocks["block-2"]["title"]) ) : ?>
                    <h5>
                        <?php echo $footer_blocks["block-2"]["title"]; ?>
                    </h5>
                <?php endif; ?>

                <?php
                $list = [];

                if (isset($footer_blocks["block-2"]["list"]) && is_array($footer_blocks["block-2"]["list"])) :
                    $list = $footer_blocks["block-2"]["list"];

                elseif (isset($footer_blocks["block-2"]["list"]) &&
                    is_string($footer_blocks["block-2"]["list"]) &&
                    (
                        $footer_blocks["block-2"]["list"] == "projects" ||
                        $footer_blocks["block-2"]["list"] == "categories"
                    )) :

                    if (isset($jsonCategoriesData["categories"]) && !empty($jsonCategoriesData["categories"])) :
                        $list = $jsonCategoriesData["categories"];
                    endif;

                endif; ?>

                <ul>
                    <?php foreach ($list as $key => $item) : ?>
                        <li>

                            <?php

                            if( isset($item["slug"])) :
                                $item_url = $item["slug"].$jsonGlobalData["page-slug-extension"];
                            else:
                                $item_url = $item["url"] ?? "";
                            endif;
                            ?>

                            <a href="<?php echo $item_url ?? "#"; ?>" target="_blank">

                                <?php SVGRenderer::renderSVG('chevron-right'); ?>

                                <?php if( isset($item["icon"]) ) :
                                    SVGRenderer::renderSVG($item["icon"]);
                                endif; ?>

                                <?php if( isset($item["text"]) ) : ?>
                                    <span>
                                        <?php echo $item["text"]; ?>
                                    </span>
                                <?php endif; ?>

                                <?php if( isset($item["name"]) ) : ?>
                                    <span>
                                        <?php echo $item["name"]; ?>
                                    </span>
                                <?php endif; ?>
                            </a>

                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>

        <?php endif; ?>

        <?php if( isset($footer_blocks["block-3"]) ) : ?>

            <div class="<?php echo $footer_blocks["block-3"]["class"] ?? "block"; ?>" data-motion="transition-fade-0" data-duration="0.5s">

                <?php if( isset($footer_blocks["block-3"]["title"]) ) : ?>
                    <h5>
                        <?php echo $footer_blocks["block-3"]["title"]; ?>
                    </h5>
                <?php endif; ?>

                <?php
                $list = [];

                if (isset($footer_blocks["block-3"]["list"]) && is_array($footer_blocks["block-3"]["list"])) :
                    $list = $footer_blocks["block-3"]["list"];

                elseif (isset($footer_blocks["block-3"]["list"]) &&
                    is_string($footer_blocks["block-3"]["list"]) &&
                    (
                        $footer_blocks["block-3"]["list"] == "socials"
                    )) :

                    if (isset($jsonSocialsData) && !empty($jsonSocialsData)) :
                        $list = $jsonSocialsData;
                    endif;

                endif; ?>

                <div class="dm-socials-list" data-socials="circle-light-2">
                    <?php foreach ($list as $key => $item) : ?>
                        <a href="<?php echo $item['url'] ?? "#"; ?>" target="_blank">

                            <?php if( isset($item["icon"]) ) :
                                SVGRenderer::renderSVG($item["icon"]);
                            endif; ?>

                        </a>
                    <?php endforeach; ?>
                </div>

            </div>

        <?php endif; ?>

        <?php if( isset($footer_blocks["block-4"]) ) : ?>

            <div class="<?php echo $footer_blocks["block-4"]["class"] ?? "block"; ?>" data-motion="transition-fade-0" data-duration="0.5s">

                <?php $list = [];

                if (isset($footer_blocks["block-4"]["list"]) && is_array($footer_blocks["block-4"]["list"])) :
                    $list = $footer_blocks["block-4"]["list"];
                endif; ?>

                <?php foreach ($list as $key => $item) : ?>
                    <span>

                        <?php if( !empty($item) ) :
                            echo executePhpInString($item);
                        endif; ?>

                    </span>
                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </section>
</footer>
</body>
</html>