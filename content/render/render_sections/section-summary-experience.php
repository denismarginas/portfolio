<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($postsSummary)) :
    $postsSummary = getDataJson('data-posts-summary-projects', 'data');
endif;

$src_current = __DIR__ . "/../../../";

?>


<section class="dm-summary-experience grid-background-animation" style="
    --dm-color-primary: #454545 !important;
    --dm-color-secondary: #232323; !important;
    --dm-video-color-secondary: #232323 !important;
    --dm-video-color-primary: #ffffff !important;
    --color-range-primary: #ffffff !important;">

    <?php

    $renderer = new RendererElements();
    $renderer->renderElement('hero', "compress-squares", getDataHero( "summary-experience"));

    ?>
    <div class="dm-experience-section" data-motion="transition-fade-0" data-duration="1s">
        <container>
            <ul class="dm-list">
                <?php foreach ($postsSummary as $post) : ?>
                    <li class="dm-card-summary-project">

                        <?php if( isset($post["category"]) ) : ?>
                            <span class="category">
                                <?php echo $post["category"]; ?>
                            </span>
                        <?php endif; ?>

                        <?php if( isset($post["title"]) ) : ?>
                            <h4 class="title">
                                <?php echo $post["title"]; ?>
                            </h4>
                        <?php endif; ?>

                        <?php if( isset($post["img-thumbnail"]) && isset($post["img-path"]) ) : ?>
                            <div class="image">
                                <?php if(!empty($post["img-thumbnail"])) : ?>
                                    <?php echo renderImage("content/img/".$post["img-path"]."/".$post["img-thumbnail"]); ?>
                                <?php else: ?>
                                    <?php echo renderImage("content/img/placeholder/img-placeholder.webp"); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if( isset($post["content"]) ) : ?>
                            <div class="content">
                                <?php foreach ($post["content"] as $contentItem) :

                                    if( str_contains($contentItem, '<?php') ) :
                                        echo executePhpInString($contentItem);
                                    else:
                                        echo $contentItem;
                                    endif;

                                endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </li>
                <?php endforeach; ?>
            </ul>
        </container>
    </div>
</section>

