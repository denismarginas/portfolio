<?php

$employs = getDataJson('data-empoyee','data');

?>


<section class="dm-employs grid-background-animation">
    <container>
        <ul>
        <?php 
            $employs_list = [];

            foreach ($employs as $employ) {
                if ($employ["display"] == "true") {
                    $employs_list[] = $employ;
                }
            }
            ?>

            <?php if( count($employs_list) > 0 ) : ?>
                <li class="dm-employ-list" data-motion="transition-fade-0 data-duration="0.6s">
                    <?php
                        $total_years = 0;
                        $total_months = 0;
                    ?>
                    <?php foreach ($employs_list as $employ) : ?>
                        <ul data-listing="<?php echo count($employs_list); ?>">
                            <li
                                <?php if( $employ["img_bg"] == "dark" ) :
                                    echo "data-layout='dark' data-animation='shine'";
                                elseif( $employ["img_bg"] == "light" ) :
                                    echo "data-layout='light' data-animation='shine-gray'";
                                endif; ?>
                            >
                                <a href="#<?php echo strtolower(str_replace(" ", "-", $employ["name"])); ?>" class="work-logo" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.3s">
                                    <?php echo renderImage($GLOBALS['urlPath'].$employ["img"]); ?>
                                </a>
                                <a href="#<?php echo strtolower(str_replace(" ", "-", $employ["name"])); ?>" class="company-name" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.4s">
                                    <span>
                                        <?php echo $employ["name"]; ?>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <?php if (strtotime($employ["date_start"]) !== false) :
                            $startDate = DateTime::createFromFormat('d.m.Y', $employ["date_start"]);
                            if (strtotime($employ["date_end"]) !== false) :
                                $endDate = DateTime::createFromFormat('d.m.Y', $employ["date_end"]);
                                continue;
                            elseif (strtotime($employ["date_end"]) == "In progress" or strtotime($employ["date_end"]) == "Working")  :
                                $currentDate = new DateTime();
                                $currentDateFormatted = $currentDate->format('d.m.Y');
                                $endDate = $currentDateFormatted;
                                continue;
                            else :
                                break;
                            endif;

                            $interval = $startDate->diff($endDate);
                            $years = $interval->y;
                            $months = $interval->m;
                            $days = $interval->d;
                            if ($days > 28) :
                                $months++;
                            endif;
                            if( $months > 0 or $years > 0 ):
                                $total_years = $total_years + $years;
                                $total_months = $total_months + $months;
                            endif;
                         endif; ?>
                    <?php endforeach; ?>

                <?php if( ( $total_years > 0) or ( $total_months >  0)) :
                endif; ?>
                <!-- Ocean Animation Start -->

                <div class="ocean" data-motion="transition-fade-0" data-duration="4s" data-delay="0s">
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                </div>

                <!-- Ocean Animation End -->
                </li>
            <?php endif; ?>

            <?php $j = 1; foreach ($employs_list as $employ) : ?>
                <li class="dm-employ" id="<?php echo strtolower(str_replace(" ", "-", $employ["name"])); ?>" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.6s" data-delay="<?php echo $j*0.15; ?>s">
                    <ul>
                        <li class="work-summary"
                            <?php if( $employ["img_bg"] == "dark" ) :
                                    echo "data-layout='dark'";
                            elseif( $employ["img_bg"] == "light" ) :
                                    echo "data-layout='light'";
                            endif; ?>
                            data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1.1s">
                            <div class="work-logo" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1.3s">
                                <?php echo renderImage($GLOBALS['urlPath'].$employ["img"]); ?>
                            </div>
                            <h2 class="company-name" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.9s">
                                <?php echo $employ["name"]; ?>
                            </h2>
                            <ul class="work-dates" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s">
                                <li><?php echo $employ["date_start"]; ?></li>
                                <li><?php echo $employ["date_end"]; ?></li>
                            </ul>
                        </li>
                        <li class="work-details" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.7s">
                            <h3 class="work-function">
                                <span data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s">Work Function:</span>
                                <?php foreach ($employ["function"] as $work_function) : ?>
                                    <span class="function" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.8s">
                                        <?php echo $work_function; ?>
                                    </span>
                                <?php endforeach; ?>
                            </h3>
                            <ul class="work-attributes">
                                <?php $i = 1; foreach ($employ["work_attributes"] as $work_attributes) : ?>
                                    <li class="work-attribute" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="<?php echo $i*0.2; ?>s" data-delay="<?php echo $i*0.12; ?>s">
                                        <?php SVGRenderer::renderSVG('chevron-right'); ?>
                                        <span>
                                            <?php echo $work_attributes; ?>
                                        </span>
                                    </li>
                                <?php $i++; endforeach; ?>
                            </ul>
                            <ul class="work-data">
                                <?php if (strtotime($employ["date_start"]) !== false && strtotime($employ["date_end"]) !== false) :
                                    $startDate = DateTime::createFromFormat('d.m.Y', $employ["date_start"]);
                                    $endDate = DateTime::createFromFormat('d.m.Y', $employ["date_end"]);
                                    $interval = $startDate->diff($endDate);
                                    $years = $interval->y;
                                    $months = $interval->m;
                                    $days = $interval->d;
                                    if ($days > 28) :
                                        $months++;
                                    endif;
                                    if( $months > 0 or $years > 0 ): ?>
                                        <li>
                                            <ul class="work-time" class="work-socials">
                                                <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s" data-delay="0.4s">
                                                    <p>Work Time:</p>
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
                                <?php if(isset($employ["work-time-type"])) : ?>
                                    <li>
                                        <ul class="work-time-type">
                                            <?php foreach ( $employ["work-time-type"] as $work_time_type ) : ?>
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
                                <?php if(isset($employ["work-location-type"])) : ?>
                                    <li>
                                        <ul class="work-location-type">
                                            <?php foreach ( $employ["work-location-type"] as $work_location_type ) : ?>
                                                <li data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1.2s">
                                                    <?php echo $work_location_type; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                   </li>
                                <?php endif; ?>
                            </ul>
                            <ul class="work-socials" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.8s">
                                <?php if(isset($employ["url_web"]) && !empty($employ["url_web"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.6s">
                                        <a href="<?php echo addHttps($employ["url_web"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('web'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(isset($employ["url_facebook"]) && !empty($employ["url_facebook"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.6s">
                                        <a href="<?php echo addHttps($employ["url_facebook"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('socials-facebook'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(isset($employ["url_instagram"]) && !empty($employ["url_instagram"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.6s">
                                        <a href="<?php echo addHttps($employ["url_instagram"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('socials-instagram'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(isset($employ["url_linkedin"]) && !empty($employ["url_linkedin"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.6s">
                                        <a href="<?php echo addHttps($employ["url_linkedin"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('socials-linkedin'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if( isset($employ["url_twitter"]) && !empty($employ["url_twitter"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.6s">
                                        <a href="<?php echo addHttps($employ["url_twitter"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('socials-twitter'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </li>
            <?php $j++; endforeach; ?>
        </ul>
    </container>
</section>