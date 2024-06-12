<?php

if(!isset($educations)) :
    $educations = getDataJson('data-items-education','data');
endif;

?>

<section class="dm-jobs grid-background-animation">
    <container>
        <ul>
        <?php
            $educations_list = [];
            $show_all_educations = true;

            foreach ($educations as $education) :
                if ($education["display"] == "true") :
                    $educations_list[] = $education;
                else :
                    $show_all_educations = false;
                endif;
            endforeach;
            ?>

            <?php if( count($educations_list) > 0 ) : ?>
                <li class="dm-job-list" data-motion="transition-fade-0 data-duration="0.6s">
                    <?php foreach ($educations_list as $education) : ?>
                        <ul data-listing="<?php echo count($educations_list); ?>"
                            <?php echo isset($education["img_bg_color"]) ? 'style="background-color:'.$education["img_bg_color"].';border-width: 0px;"' : ''; ?>
                        >
                            <li
                                <?php if( $education["img_bg"] == "dark" ) :
                                    echo "data-layout='dark' data-animation='shine'";
                                elseif( $education["img_bg"] == "light" ) :
                                    echo "data-layout='light' data-animation='shine-gray'";
                                endif; ?>
                            >
                                <a href="#<?php echo strtolower(str_replace(" ", "-", $education["name"])); ?>" class="work-logo" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.3s">
                                    <?php echo renderImage($GLOBALS['urlPath'].$education["img"]); ?>
                                </a>
                                <a href="#<?php echo strtolower(str_replace(" ", "-", $education["name"])); ?>" class="company-name" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.4s">
                                    <span>
                                        <?php echo $education["name"]; ?>
                                    </span>
                                </a>
                            </li>
                        </ul>

                    <?php endforeach; ?>

                <?php
                $renderer = new RendererElements();
                $renderer->renderElement("animation-waves");
                ?>

                </li>
            <?php endif; ?>

            <?php $j = 1; foreach ($educations_list as $education) : ?>

                <li class="dm-job" id="<?php echo strtolower(str_replace(" ", "-", $education["name"])); ?>" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.6s" data-delay="<?php echo $j*0.10; ?>s">
                    <ul>
                        <li class="work-summary"

                            <?php if( $education["img_bg"] == "dark" ) :
                                    echo "data-layout='dark'";
                            elseif( $education["img_bg"] == "light" ) :
                                    echo "data-layout='light'";
                            endif; ?>

                            data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1.1s">

                            <div class="work-logo" <?php echo isset($education["img_bg_color"]) ? 'style="background-color:'.$education["img_bg_color"].'"' : ''; ?> data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1.3s">
                                <?php echo renderImage($GLOBALS['urlPath'].$education["img"]); ?>
                            </div>
                            <h2 class="company-name" style="font-family: var(--dm-font-family-primary);" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.9s">
                                <?php echo $education["name"]; ?>
                            </h2>
                            <ul class="work-dates" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s">
                                <li>
                                    <?php echo $education["date_start"]; ?>
                                </li>
                                <li>
                                    <?php echo $education["date_end"]; ?>
                                </li>
                            </ul>

                        </li>
                        <li class="work-details" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.7s">

                            <h3 class="work-function">
                                <span data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s">Profession:</span>
                                <?php foreach ($education["profession"] as $profession) : ?>
                                    <span class="function" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.8s">
                                        <?php echo $profession; ?>
                                    </span>
                                <?php endforeach; ?>
                            </h3>

                            <ul class="work-attributes">
                                <?php $i = 1; foreach ($education["attributes"]["list"] as $attributes) : ?>
                                    <li class="work-attribute" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="<?php echo $i*0.2; ?>s" data-delay="<?php echo $i*0.12; ?>s">
                                        <?php SVGRenderer::renderSVG('chevron-right'); ?>
                                        <span>
                                            <?php echo $attributes; ?>
                                        </span>
                                    </li>
                                <?php $i++; endforeach; ?>
                            </ul>

                            <ul class="work-data">
                                <?php if (strtotime($education["date_start"]) !== false && strtotime($education["date_end"]) !== false) :
                                    $startDate = DateTime::createFromFormat('d.m.Y', $education["date_start"]);
                                    $endDate = DateTime::createFromFormat('d.m.Y', $education["date_end"]);
                                    $interval = $startDate->diff($endDate);
                                    $years = $interval->y;
                                    $months = $interval->m;
                                    $days = $interval->d;

                                    if ($days > 28) :
                                        $months++;
                                    endif;

                                    if ($months > 6) :
                                        $months = 0;
                                        $years++;
                                    endif;

                                    if( $months > 0 or $years > 0 ): ?>
                                        <li>
                                            <ul class="work-time" class="work-socials">
                                                <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s" data-delay="0.4s">
                                                    <p>Timeline:</p>
                                                </li>
                                                <?php if($years != 0) : ?>
                                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.6s">
                                                        <?php
                                                        echo "<span class='nr-circle years-nr'>".$years."</span>";

                                                        if($years> 1) :
                                                            echo "<span class='time-text'>Years</span>";
                                                        else:
                                                            echo "<span class='time-text'>Year</span>";
                                                        endif;
                                                        ?>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if($months != 0) : ?>
                                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.7s">
                                                        <?php
                                                        echo "<span class='nr-circle months-nr'>".$months."</span>";

                                                        if($months> 1) :
                                                            echo "<span class='time-text'>Months</span>";
                                                        else:
                                                            echo "<span class='time-text'>Month</span>";
                                                        endif;
                                                        ?>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if(isset($education["work-time-type"])) : ?>
                                    <li>
                                        <ul class="work-time-type">
                                            <?php foreach ( $education["work-time-type"] as $work_time_type ) : ?>
                                                <li data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1.2s">

                                                    <?php if(isset($work_time_type["name"])) : ?>
                                                        <span class="work-name" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1.3s">
                                                            <?php echo $work_time_type["name"]; ?>
                                                        </span>
                                                    <?php endif; ?>

                                                    <?php if(isset($work_time_type["hours"])) : ?>
                                                        <span class="work-hours" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1.4s">
                                                            <?php echo $work_time_type["hours"]; ?>
                                                        </span>
                                                    <?php endif; ?>

                                                    <?php if(isset($work_time_type["date_start"]) and isset($work_time_type["date_end"])) : ?>
                                                        <ul class="work-dates" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1.5s">
                                                            <li><?php echo $work_time_type["date_start"]; ?></li>
                                                            <li> - </li>
                                                            <li><?php echo $work_time_type["date_end"]; ?></li>
                                                        </ul>
                                                    <?php endif; ?>

                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                                <?php if(isset($education["work-location-type"])) : ?>
                                    <li>
                                        <ul class="work-location-type">
                                            <?php foreach ( $education["work-location-type"] as $work_location_type ) : ?>
                                                <li data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1.2s">
                                                    <?php echo $work_location_type; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                   </li>
                                <?php endif; ?>
                            </ul>
                            <ul class="work-socials" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.8s">
                                <?php if(isset($education["url_web"]) && !empty($education["url_web"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.6s">
                                        <a href="<?php echo addHttps($education["url_web"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('web'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(isset($education["url_facebook"]) && !empty($education["url_facebook"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.6s">
                                        <a href="<?php echo addHttps($education["url_facebook"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('socials-facebook'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(isset($education["url_instagram"]) && !empty($education["url_instagram"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.6s">
                                        <a href="<?php echo addHttps($education["url_instagram"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('socials-instagram'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(isset($education["url_linkedin"]) && !empty($education["url_linkedin"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.6s">
                                        <a href="<?php echo addHttps($education["url_linkedin"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('socials-linkedin'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if( isset($education["url_twitter"]) && !empty($education["url_twitter"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.6s">
                                        <a href="<?php echo addHttps($education["url_twitter"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('socials-twitter'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php if($j>5):
                            $j = 5;
                        else:
                            $j++;
                endif; ?>

            <?php endforeach; ?>

            <?php if(!$show_all_educations): ?>
                <li class="dm-note" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.6s">
                    <p id="freelancer" style="display:none !important;"></p>
                    <p id="unspecified">Note: Please be aware that this is not an completed list, and there may be additional education experiences not mentioned here.</p>
                </li>
            <?php endif; ?>

        </ul>
    </container>
</section>