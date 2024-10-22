<?php

if (!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jsonWorkstationList)) :
    $jsonWorkstationList = getDataJson('data-posts-workstations', 'data');
endif;

?>

<section class="dm-workstation-list grid-background-animation">
    <container>
        <ul>
            <?php foreach ($jsonWorkstationList as $workstation ) : ?>

                <li class="dm-workstation-item"
                    <?php if (isset($workstation["style"]) && !empty($workstation["style"])):
                        $styles = '';
                        foreach ($workstation["style"] as $style_key => $style_value) :
                            $styles .= $style_key . ': ' . $style_value . ';';
                        endforeach; ?>
                        style="<?php echo $styles; ?>"
                    <?php else: ?>
                        style="--w-color-primary: var( --dm-color-primary );
                           --w-color-secondary: var( --dm-color-secondary );
                           --w-text-color-on-bg: var( --dm-color-white );
                           --w-title-font:  var( --dm-font-family-secondary );
                           --w-text-font: var( --dm-font-family-primary );"
                    <?php endif; ?>
                  data-motion="transition-fade-0" data-duration="0.8s">

                    <?php
                    $workstationSetupImg = false;
                    $workstationDeviceImg = false;
                    $imgImgPath = $workstation["path_img"]."/" ?? "";
                    $imgMediaPath = $workstation["media_path"]."/" ?? "";
                    $imgPath = "content/img/".$imgImgPath.$imgMediaPath;

                    if (isset($workstation["images"]["full-setup"][0]) && !empty($workstation["images"]["full-setup"][0])):
                        $workstationSetupImg = $workstation["images"]["full-setup"][0];
                    endif;

                    if (isset($workstation["images"]["workstation"][0]) && !empty($workstation["images"]["workstation"][0])):
                        $workstationDeviceImg = $workstation["images"]["workstation"][0];
                    endif;

                    ?>

                    <?php if (isset($workstation["file"]) && !empty($workstation["file"])): ?>
                        <a class="heading" href="<?php echo $workstation["file"].$jsonGlobalData["page-slug-extension"]; ?>">
                    <?php endif; ?>

                        <div class="preview" data-motion="transition-slideInBottom-0" data-duration="0.4s">
                            <div class="primary" data-motion="transition-fade-0 transition-blur-0 transition-slideInBottom-0" data-duration="0.8s" data-delay="0.5s">
                                <?php if($workstationSetupImg) :
                                    echo renderImage($imgPath.$workstationSetupImg);
                                else:
                                    echo SVGRenderer::renderSVG("workstation");
                                endif; ?>
                            </div>

                            <div class="secondary">
                                <?php if($workstationDeviceImg) :
                                    echo  renderImage($imgPath.$workstationDeviceImg);
                                else:
                                    echo SVGRenderer::renderSVG("workstation-desk");
                                endif; ?>
                            </div>



                            <?php if (isset($workstation["status"]) && !empty($workstation["status"])): ?>
                                <div class="status">
                                    <span class="dot <?php echo $workstation["status"]; ?>"></span>
                                    <span><?php echo $workstation["status"]; ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php if (isset($workstation["file"]) && !empty($workstation["file"])): ?>
                        </a>
                    <?php endif; ?>

                    <?php if (isset($workstation["title"]) && !empty($workstation["title"])): ?>
                        <h3 class="title">
                            <?php if (isset($workstation["file"]) && !empty($workstation["file"])): ?>
                                <a class="heading" href="<?php echo $workstation["file"].$jsonGlobalData["page-slug-extension"]; ?>">
                                    <?php echo $workstation["title"]; ?>
                                </a>
                            <?php else: ?>
                                <span class="heading"><?php echo $workstation["title"]; ?></span>
                            <?php endif; ?>
                        </h3>
                    <?php endif; ?>

                </li>

            <?php endforeach; ?>
        </ul>
    </container>
</section>

