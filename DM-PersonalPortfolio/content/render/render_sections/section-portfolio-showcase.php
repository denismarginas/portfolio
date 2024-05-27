<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jsonPortfolio)) :
    $jsonPortfolio = getDataJson('data-content-personal', 'data')["portfolio-video-archive"];
endif;

?>

<section class="dm-portfolio-showcase grid-background-animation">
    <container>
        <?php if(isset($jsonPortfolio) && !empty($jsonPortfolio)) : ?>

            <?php foreach ($jsonPortfolio as $video_item) : ?>
                <ul <?php if(isset($video_item["video-data"]["video-color-primary"]) && !empty($video_item["video-data"]["video-color-primary"])) : ?>
                        style="--dm-video-color-primary: <?php echo $video_item["video-data"]["video-color-primary"]; ?>;
                                --color-range-primary: <?php echo $video_item["video-data"]["video-color-primary"]; ?>;
                              ";
                    <?php endif; ?>
                >
                    <li data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.4s" data-delay="0s">
                        <?php echo renderVideo($GLOBALS['urlPath'].'content/vid/'.$video_item["video-path"].$video_item["video"],
                            $GLOBALS['urlPath']."content/img".$video_item["video-thumbnail-path"].$video_item["video-thumbnail"] );
                        ?>
                    </li>
                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.5s" data-delay="0s">
                        <h2 class="video-title" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.7s" data-delay="0s">
                            <?php echo $video_item["video-data"]['title']; ?>
                        </h2>
                        <p class="video-date" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s" data-delay="0.05s">
                            <?php echo $video_item["video-data"]['date']; ?>
                        </p>
                        <p class="video-description" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s" data-delay="0.1s">
                            <?php echo $video_item["video-data"]['short-description']; ?>
                        </p>
                        <?php if(isset($video_item["video-data"]["youtube-button-link"]) && isset($video_item["video-data"]["youtube-button-text"])) : ?>
                            <a class="dm-watch-on-youtube" href="<?php echo $video_item["video-data"]["youtube-button-link"]; ?>" target="_blank" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s" data-delay="0.2s">
                                <?php SVGRenderer::renderSVG($video_item["video-data"]["youtube-button-icon-svg"]); ?>
                                <span>
                                    <?php echo $video_item["video-data"]["youtube-button-text"]; ?>
                                </span>
                            </a>
                        <?php endif; ?>

                        <?php if(isset($video_item["video-data"]["timeline"]) && !empty($video_item["video-data"]["timeline"])) : ?>
                            <div class="video-timeline">
                                <?php if(isset($video_item["video-data"]["timeline"]["text"])) : ?>
                                    <p data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.6s" data-delay="0s">
                                        <?php echo $video_item["video-data"]["timeline"]["text"]; ?>
                                    </p>
                                <?php endif; ?>

                                <?php if(isset($video_item["video-data"]["timeline"]["list"])) : ?>
                                    <ul>
                                        <?php $list_items = $video_item["video-data"]["timeline"]["list"]; ?>

                                        <?php $i = 1; foreach ($list_items as $list_item) : ?>
                                            <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.7s" data-delay="<?php echo $i*0.1; ?>s">
                                                <?php SVGRenderer::renderSVG('chevron-right'); ?>
                                                <span>
                                                    <?php echo $list_item; ?>
                                                </span>
                                            </li>
                                        <?php $i++; endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                            </div>
                        <?php endif; ?>

                    </li>
                </ul>
            <?php endforeach; ?>

        <?php endif; ?>
    </container>
</section>