<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jobs)) :
    $jobs = getDataJson('data-items-jobs','data');
endif;

$theme_path = $GLOBALS['urlPath'] . $jsonGlobalData["themes-path"] . "/" . $jsonGlobalData["theme-active"]["dir-name"];

?>

<?php if(!empty($theme_path)) :  ?>
    <script src="<?php echo $theme_path;?>/js/content-posts-jobs-worktime-calculation.js"></script>
<?php endif; ?>

<section class="dm-jobs grid-background-animation">
    <container>
        <ul>

        <?php 
            $jobs_list = [];
            $show_all_jobs = true;

            foreach ($jobs as $job) :
                if ($job["display"] == "true") :
                    $jobs_list[] = $job;
                else :
                    $show_all_jobs = false;
                endif;
            endforeach;
            ?>

            <?php if( count($jobs_list) > 0 ) : ?>
                <li class="dm-job-list" data-motion="transition-fade-0 data-duration="0.6s">
                    <?php foreach ($jobs_list as $job) : ?>
                        <ul data-listing="<?php echo count($jobs_list); ?>">
                            <li
                                <?php if( $job["img_bg"] == "dark" ) :
                                    echo "data-layout='dark' data-animation='shine'";
                                elseif( $job["img_bg"] == "light" ) :
                                    echo "data-layout='light' data-animation='shine-gray'";
                                endif; ?>
                            >
                                <a href="#<?php echo strtolower(str_replace(" ", "-", $job["name"])); ?>" class="work-logo" data-motion="transition-fade-0 transition-grow-0" data-duration="0.8s">
                                    <?php echo renderImage($GLOBALS['urlPath'].$job["img"]); ?>
                                </a>
                                <a href="#<?php echo strtolower(str_replace(" ", "-", $job["name"])); ?>" class="company-name" data-motion="transition-fade-0" data-duration="1s">
                                    <span>
                                        <?php echo $job["name"]; ?>
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

            <?php $j = 1; foreach ($jobs_list as $job) : ?>

                <li class="dm-job" id="<?php echo strtolower(str_replace(" ", "-", $job["name"])); ?>" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.4s" data-delay="<?php echo $j*0.05; ?>s">
                    <ul>
                        <li class="work-summary"
                            <?php if( $job["img_bg"] == "dark" ) :
                                    echo "data-layout='dark'";
                            elseif( $job["img_bg"] == "light" ) :
                                    echo "data-layout='light'";
                            endif; ?>
                            data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1.1s">
                            <div class="work-logo" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.6s">
                                <?php echo renderImage($GLOBALS['urlPath'].$job["img"]); ?>
                            </div>
                            <h2 class="company-name" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.9s">
                                <?php echo $job["name"]; ?>
                            </h2>
                            <ul class="work-dates" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s">
                                <li><?php echo $job["date_start"]; ?></li>
                                <li><?php echo $job["date_end"]; ?></li>
                            </ul>
                        </li>
                        <li class="work-details" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.7s">
                            <h3 class="work-function">
                                <span data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s">Work Function:</span>
                                <?php foreach ($job["function"] as $work_function) : ?>
                                    <span class="function" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.8s">
                                        <?php echo $work_function; ?>
                                    </span>
                                <?php endforeach; ?>
                            </h3>
                            <ul class="work-attributes">
                                <?php $i = 1; foreach ($job["work_attributes"] as $work_attributes) : ?>
                                    <li class="work-attribute" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="<?php echo $i*0.2; ?>s" data-delay="<?php echo $i*0.06; ?>s">
                                        <?php SVGRenderer::renderSVG('chevron-right'); ?>
                                        <span>
                                            <?php echo $work_attributes; ?>
                                        </span>
                                    </li>
                                <?php $i++; endforeach; ?>
                            </ul>
                            <ul class="work-data">
                                <?php if (strtotime($job["date_start"]) !== false && strtotime($job["date_end"]) !== false) :
                                    $startDate = DateTime::createFromFormat('d.m.Y', $job["date_start"]);
                                    $endDate = DateTime::createFromFormat('d.m.Y', $job["date_end"]);
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
                                                <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1s" data-delay="0.1s">
                                                    <p>Work Time:</p>
                                                </li>
                                                <?php if($years != 0) : ?>
                                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.2s">
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
                                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.3s">
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
                                <?php if(isset($job["work-time-type"])) : ?>
                                    <li>
                                        <ul class="work-time-type">
                                            <?php foreach ( $job["work-time-type"] as $work_time_type ) : ?>
                                                <li data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1.2s">

                                                    <?php if(isset($work_time_type["name"])) : ?>
                                                        <span class="work-name" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.7s">
                                                            <?php echo $work_time_type["name"]; ?>
                                                        </span>
                                                    <?php endif; ?>

                                                    <?php if(isset($work_time_type["hours"])) : ?>
                                                        <span class="work-hours" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.8s">
                                                            <?php echo $work_time_type["hours"]; ?>
                                                        </span>
                                                    <?php endif; ?>

                                                    <?php if(isset($work_time_type["date_start"]) and isset($work_time_type["date_end"])) : ?>
                                                        <ul class="work-dates" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.9s">
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
                                <?php if(isset($job["work-location-type"])) : ?>
                                    <li>
                                        <ul class="work-location-type">
                                            <?php foreach ( $job["work-location-type"] as $work_location_type ) : ?>
                                                <li data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s">
                                                    <?php echo $work_location_type; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                   </li>
                                <?php endif; ?>
                            </ul>
                            <ul class="work-socials" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.8s">
                                <?php if(isset($job["url_web"]) && !empty($job["url_web"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.3s">
                                        <a href="<?php echo addHttps($job["url_web"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('web'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(isset($job["url_facebook"]) && !empty($job["url_facebook"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.3s">
                                        <a href="<?php echo addHttps($job["url_facebook"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('socials-facebook'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(isset($job["url_instagram"]) && !empty($job["url_instagram"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.3s">
                                        <a href="<?php echo addHttps($job["url_instagram"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('socials-instagram'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(isset($job["url_linkedin"]) && !empty($job["url_linkedin"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.3s">
                                        <a href="<?php echo addHttps($job["url_linkedin"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('socials-linkedin'); ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if( isset($job["url_x"]) && !empty($job["url_x"])) : ?>
                                    <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.3s">
                                        <a href="<?php echo addHttps($job["url_x"]);?>" target="_blank">
                                            <?php SVGRenderer::renderSVG('socials-x'); ?>
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

            <?php if(!$show_all_jobs): ?>
                <li class="dm-note" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="1.2s" data-delay="0.2s">
                    <p id="freelancer" style="display:none !important;"></p>
                    <p id="unspecified">Note: Please be aware that this is not an completed list, and there may be additional professional experiences not mentioned here. If you have specific inquiries about my work history or would like more details, feel free to reach out.</p>
                </li>
            <?php  endif; ?>

            <li>
                <?php
                $renderer = new RendererElements();
                $renderer->renderElement('jobs-graph');
                ?>
            </li>

        </ul>
    </container>
</section>