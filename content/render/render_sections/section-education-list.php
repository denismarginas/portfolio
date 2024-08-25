<?php

if(!isset($educations)) :
    $educations = getDataJson('data-items-education','data');
endif;

?>

<section class="dm-education grid-background-animation">
    <container>
        <ul class="compact-list">
            <?php foreach ($educations as $index => $item) : ?>

                <li class="education" data-motion="transition-fade-0" data-duration="0.6s" data-index="<?php echo $index; ?>">
                    <a href="#<?php echo strtolower(str_replace(" ", "-", $item["name"])); ?>" class="logo" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.3s"
                        <?php if( $item["img_bg"] == "dark" ) :
                            echo "data-layout='dark' data-animation='shine'";
                        elseif( $item["img_bg"] == "light" ) :
                            echo "data-layout='light' data-animation='shine-gray'";
                        endif; ?>
                    >
                        <?php echo renderImage($GLOBALS['urlPath'].$item["img"]); ?>
                    </a>
                    <a href="#<?php echo strtolower(str_replace(" ", "-", $item["name"])); ?>" class="name" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.4s">
                        <span>
                            <?php echo $item["name"]; ?>
                        </span>
                    </a>
                </li>

                <?php if ($index < count($educations) - 1): ?>
                    <li class="gap-line"></li>
                <?php endif; ?>

            <?php endforeach; ?>

        </ul>
        <ul class="detailed-list">
            <?php $j = 1; foreach ($educations as $education) : ?>
                <li class="education" id="<?php echo strtolower(str_replace(" ", "-", $education["name"])); ?>" data-motion="transition-fade-0 data-duration="0.6s" data-delay="<?php echo $j*0.02; ?>s">

                    <?php if(isset($education["img"]) && !empty($education["img"])) :  ?>
                        <div class="logo" <?php echo isset($education["img_bg_color"]) ? 'style="background-color:'.$education["img_bg_color"].'"' : ''; ?> data-motion="transition-fade-0" data-duration="1.1s">
                            <?php echo renderImage($GLOBALS['urlPath'].$education["img"], false,false, true, ["data-motion"=>"transition-blur-0", "data-duration"=>"0.5s" ]); ?>
                        </div>
                    <?php endif; ?>

                    <div class="details">

                        <div class="head" data-motion="transition-fade-0" data-duration="0.5s">
                            <?php if(isset($education["name"]) && !empty($education["name"])) :  ?>
                                <h2 class="name" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.9s">
                                    <?php echo $education["name"]; ?>
                                </h2>
                            <?php endif; ?>

                            <?php if(isset($education["dates"]) && !empty($education["dates"])) :  ?>
                                <ul class="dates" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s">
                                    <li>
                                        <?php echo $education["dates"]["date_start"]; ?>
                                    </li>
                                    <li>
                                        <?php echo $education["dates"]["date_end"]; ?>
                                    </li>
                                </ul>
                            <?php endif; ?>

                            <?php if(isset($education["type"]) && !empty($education["type"])) :  ?>
                                <span class="type" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.9s">

                            <?php SVGRenderer::renderSVG('education'); ?>

                            <span>
                                <?php echo $education["type"]; ?>
                            </span>

                        </span>
                            <?php endif; ?>

                            <?php if(isset($education["profession"]) && !empty($education["profession"])) :  ?>
                                <div class="profession-list">
                                    <?php foreach ($education["profession"] as $profession) : ?>
                                        <span class="profession" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.8s">
                                        <?php echo $profession; ?>
                                    </span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="description" data-motion="transition-fade-0" data-duration="0.55s">

                            <?php if(isset($education["description"]["text"]) && !empty($education["description"]["text"])) :  ?>
                                <p class="text" data-motion="transition-fade-0" data-duration="0.7s">
                                    <?php echo $education["description"]["text"]; ?>
                                </p>
                            <?php endif; ?>

                            <?php if(isset($education["description"]["list"]) && !empty($education["description"]["list"])) :  ?>
                                <ul class="list" data-motion="transition-fade-0" data-duration="1.1s">
                                    <?php $i = 1; foreach ($education["description"]["list"] as $attributes) : ?>
                                        <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="<?php echo $i*0.03 + 0.4; ?>s" data-delay="<?php echo $i*0.01; ?>s">

                                            <?php SVGRenderer::renderSVG('chevron-right'); ?>

                                            <span>
                                                <?php echo $attributes; ?>
                                            </span>

                                        </li>

                                    <?php $i++; endforeach; ?>
                                </ul>
                            <?php endif; ?>

                        </div>

                        <ul class="socials" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.8s">
                            <?php if(isset($education["url_web"]) && !empty($education["url_web"])) : ?>
                                <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.6s">
                                    <a href="<?php echo addHttps($education["url_web"]);?>" target="_blank">
                                        <?php SVGRenderer::renderSVG('web'); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="background-shape" data-motion="transition-fade-0" data-duration="0.5s" data-delay="0.5s">
                        <?php SVGRenderer::renderSVG('background-shape-1'); ?>
                    </div>

                </li>

            <?php $j++; endforeach; ?>
        </ul>
    </container>
</section>