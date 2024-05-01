
<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}
if(!isset($jsonDataResume)) {
    $jsonDataResume = getDataJson('data-content-personal', 'data')["contact"]["resume"];
}

?>

<section class="dm-resume-data">
    <?php if(isset($jsonDataResume) && !empty($jsonDataResume)) : ?>
        <container>
            <ul>
                <li>
                    <ul>
                        <?php $cv_list = $jsonDataResume["cv-list"]; ?>

                        <?php $i = 1; foreach ($cv_list as $cv_item) : ?>
                            <li class="resume-card" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.<?php echo 1 + $i; ?>s">
                                <div>
                                    <?php if(isset($cv_item['thumbnail'])) : ?>
                                        <span>
                                        <?php if(isset($cv_item['image'])) : ?>
                                            <div class="cv-image-view">
                                                <?php echo renderImage($GLOBALS['urlPath'].$cv_item['image'], 1); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php echo renderImage($GLOBALS['urlPath'] . $cv_item['thumbnail']); ?>
                                        <?php SVGRenderer::renderSVG('resume'); ?>
                                    </span>
                                    <?php endif; ?>

                                    <div>
                                        <?php if(isset($cv_item['pdf']) && isset($cv_item['name'])) : ?>
                                            <a href="<?php echo $GLOBALS['urlPath'] . $cv_item['pdf']; ?>" target="_blank"><?php echo $cv_item['name']; ?></a>
                                        <?php endif; ?>

                                        <?php if(isset($cv_item['description'])) : ?>
                                            <span><?php echo $cv_item['description']; ?></span>
                                        <?php endif; ?>

                                        <?php if(isset($cv_item['date'])) : ?>
                                            <span><?php echo $cv_item['date']; ?></span>
                                        <?php endif; ?>

                                        <?php if(isset($cv_item['pdf'])) : ?>
                                            <button data-button="success" class="downloadButton" data-url="<?php echo $GLOBALS['urlPath'] . $cv_item['pdf']; ?>">
                                                <?php echo$jsonDataResume["download-button-text"]; ?>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                            <?php $i++; endforeach; ?>
                    </ul>
                </li>
                <li>
                    <div>
                        <?php echo renderImage($GLOBALS['urlPath']."content/img".$jsonDataResume["img-path"].$jsonDataResume["img"], false, false, true, ['data-motion' => 'transition-fade-0 transition-slideInLeft-0']); ?>

                    </div>
                    <div>
                        <?php $text_list = $jsonDataResume["text-list"]; ?>

                        <?php $i = 1; foreach ($text_list as $text_item) : ?>
                            <p data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.<?php echo 1 + $i; ?>s"><?php echo $text_item; ?></p>
                        <?php $i++; endforeach; ?>
                    </div>
                </li>
            </ul>
        </container>
    <?php endif; ?>

</section>
