<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jsonCategoriesData)) :
    $jsonCategoriesData = getDataJson('data-posts-projects-categories', 'data');
endif;

if(!isset($jsonJobs)) :
    $jsonJobsData = getDataJson('data-items-jobs', 'data');
endif;

if (!empty($args)) :
    $post_data = $args[0];
    $post_content = $args[1];
endif;

if (!isset($post_data)) :
    $post_data = [
        "post_type" => "catalog",
        "media_path" => "post",
        "title" => "Post Title",
        "logo" => "logo.svg",
        "logo_type" => "svg",
        "description" => "This is an example of text description for this post.",
        "category" => "Website / Media",
        "web_url" => "www.website.com",
        "web_status" => "Undone / Done / In Progress",
        "media_facebook_url" => "https://www.facebook.com/",
        "media_instagram_url" => "https://www.instagram.com/",
        "media_custom" => [
                    [
                        "title" => "Media 1: ",
                        "url" => "#media1"
                    ],
                    [
                        "title" => "Media 2: ",
                        "url" => "#media2"
                    ]
        ],
        "employer" => "Unspecified / In CompanyName",
        "colors" => [
            "post_color_primary" => "#5d6977",
            "post_color_secondary" => "#1b2431",
            "post_color_background" => "#1b2431",
            "post_color_text_on_background" => "#ffffff"
        ]
    ];
endif;
?>

<?php if (isset($post_data["colors"]) && !empty($post_data["colors"])) : ?>
    <style>
        /* Custom Design for Posts */
        :root {
        <?php foreach ($post_data["colors"] as $name => $value) :
            echo "--".$name . ": " . $value . ";\n";
        endforeach; ?>
        }
    </style>
<?php endif; ?>

<section class="dm-post grid-background-animation">

    <?php

    if(isset($post_current_data) and !empty($post_current_data)) {
        $post_content .= "<p> post_current_data: " . print_r($post_current_data, true) . "</p>";
    }
    ?>

    <container>

        <div class="post-content">
            <?php if (isset($post_content)) :
                echo $post_content;
             endif; ?>
        </div>

        <aside class="post-data">


            <?php if (isset($post_data["logo"]) && isset($post_data["logo_path"])) : ?>
                <?php $logo = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["logo_path"]."/".$post_data["logo"]; ?>

                <div class="post-image post-logo" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.4s">
                    <?php if (isset($post_data["logo_type"]) && !empty($post_data["logo_type"]) && $post_data["logo_type"] == "svg") : ?>
                        <?php SVGRenderer::renderSVG( $post_data["logo"] ); ?>
                    <?php else : ?>
                        <?php echo renderImage($logo, false, false, true, ["alt" => "Post Logo - ".$post_data["title"]],); ?>
                    <?php endif; ?>
                </div>

            <?php endif; ?>

            <?php if (isset($post_data["thumbnail"]) && isset($post_data["thumbnail_path"])) : ?>
                <?php $thumbnail = $GLOBALS['urlPath']."content/img/".$post_data["post_type"]."/".$post_data["thumbnail_path"]."/".$post_data["thumbnail"]; ?>

                <div class="post-image post-thumbnail" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.4s">
                    <?php echo renderImage($thumbnail, false, false, true, ["alt" => "Post Thumbnail - ".$post_data["title"]]); ?>
                    <?php echo renderImage($thumbnail, false, "overlay", true, ["alt" => "Post Thumbnail Overlay"]); ?>
                </div>

            <?php endif; ?>

            <div class="post-text" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.6s">
                <?php if (isset($post_data["title"]) && !empty($post_data["title"])) : ?>
                    <h2 class="post-title"><?php echo $post_data["title"]; ?></h2>
                <?php endif; ?>

                <?php if (isset($post_data["description"]) && !empty($post_data["description"])) : ?>
                    <p class="post-description">
                        <?php echo executePhpInString($post_data["description"]); ?>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["categories"]) && !empty($post_data["categories"])) : ?>
                    <div class="post-categories">
                        <?php foreach ( $post_data["categories"] as $post_category ) : ?>
                            <?php if( $post_category == "Miscellaneous Projects" ) : ?>
                                <span class="post-category">
                                    <?php echo $post_category; ?>
                                </span>
                            <?php else: ?>
                                <?php
                                $post_category_slug = changeSpaceWithHyphenAndLowercase($post_category);
                                foreach ($jsonCategoriesData["categories"] as $category) :
                                if ($category["name"] === $post_category) :
                                    $post_category_slug = $category["slug"];
                                    break;
                                endif;
                                endforeach; ?>
                                <a class="post-category" href="<?php echo $post_category_slug.$jsonGlobalData["page-slug-extension"]; ?>">

                                    <?php echo $post_category; ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($post_data["web_url"]) && !empty($post_data["web_url"])) : ?>
                    <p class="post-website">

                        <span>
                            <?php SVGRenderer::renderSVG('web'); ?>
                            <span>Website: </span>
                        </span>

                        <a href="<?php echo addHttps($post_data["web_url"]); ?>" target="_blank">
                            <?php echo removeHttps($post_data["web_url"]); ?>
                        </a>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["web_platform"]) && !empty($post_data["web_platform"])) : ?>
                    <p class="post-website-platform">
                        <span>Platform:</span>
                        <?php for ( $i = 0; $i<count($post_data["web_platform"]); $i++ ) :
                            echo $post_data["web_platform"][$i]["name"];
                            if( $i < count($post_data["web_platform"]) - 1 ) :
                                echo ", ";
                            endif;
                        endfor; ?>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["web_technology"]) && !empty($post_data["web_technology"])) : ?>
                    <p class="post-website-technology">
                        <span>Technology: </span>
                        <?php for ( $i = 0; $i<count($post_data["web_technology"]); $i++ ) :
                            echo $post_data["web_technology"][$i]["name"];
                            if( $i < count($post_data["web_technology"]) - 1 ) :
                                echo ", ";
                            endif;
                        endfor; ?>
                    </p>
                <?php endif; ?>
                <?php if (isset($post_data["web_plugins"]) && !empty($post_data["web_plugins"])) : ?>
                    <p class="post-website-modules">
                        <span>Modules:</span>
                        <?php for ( $i = 0; $i<count($post_data["web_plugins"]); $i++ ) :
                            echo $post_data["web_plugins"][$i]["name"];
                            if( $i < count($post_data["web_plugins"]) - 1 ) :
                                echo ", ";
                            endif;
                        endfor; ?>
                    </p>
                <?php endif; ?>

                <?php
                $icons_list = [];
                if (isset($post_data["web_platform"]) && is_array($post_data["web_platform"])) {
                  $icons_list = array_merge($icons_list, $post_data["web_platform"]);
                }
                if (isset($post_data["web_technology"]) && is_array($post_data["web_technology"])) {
                  $icons_list = array_merge($icons_list, $post_data["web_technology"]);
                }
                if (isset($post_data["web_plugins"]) && is_array($post_data["web_plugins"])) {
                  $icons_list = array_merge($icons_list, $post_data["web_plugins"]);
                }
                ?>
                <?php if (count($icons_list) > 0) : ?>

                    <ul class="post-website-icons">
                        <?php foreach ($icons_list as $icon) : ?>
                          <?php if (isset($icon["svg"]) && SVGRenderer::hasIcon($icon["svg"])) : ?>
                              <li>
                                 <?php SVGRenderer::renderSVG($icon["svg"]); ?>
                               </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>

                <?php endif; ?>

                <?php if (isset($post_data["project_collaboration"]) && !empty($post_data["project_collaboration"])) : ?>
                    <p class="post-custom-field-text">
                        <span>Project Collaboration:</span>
                        <?php for ( $i = 0; $i<count($post_data["project_collaboration"]); $i++ ) :
                            echo $post_data["project_collaboration"][$i];
                            if( $i < count($post_data["project_collaboration"]) - 1 ) :
                                echo ", ";
                            endif;
                        endfor; ?>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["web_project_status"]) && !empty($post_data["web_project_status"])) : ?>
                    <div class="post-website-status">
                        <span class="label">Web Project Status:</span>
                        <span class="status <?php echo strtolower($post_data["web_project_status"]); ?>">
                            <?php echo $post_data["web_project_status"]; ?>
                        </span>

                    </div>
                <?php endif; ?>

                <?php if (isset($post_data["media_facebook_url"]) && !empty($post_data["media_facebook_url"])) : ?>
                    <p class="post-media-facebook">
                        <a href="<?php echo addHttps($post_data["media_facebook_url"]); ?>" target="_blank">
                            <?php SVGRenderer::renderSVG('socials-facebook'); ?>
                        </a>
                        <span>Facebook: </span>
                        <a href="<?php echo addHttps($post_data["media_facebook_url"]); ?>" target="_blank">
                            <?php echo removeHttps($post_data["media_facebook_url"]); ?>
                        </a>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["media_instagram_url"]) && !empty($post_data["media_instagram_url"])) : ?>
                    <p class="post-media-instagram">
                        <a href="<?php echo addHttps($post_data["media_instagram_url"]); ?>" target="_blank">
                            <?php SVGRenderer::renderSVG('socials-instagram'); ?>
                        </a>
                        <span>Instagram: </span>
                        <a href="<?php echo addHttps($post_data["media_instagram_url"]); ?>" target="_blank">
                            <?php echo removeHttps($post_data["media_instagram_url"]); ?>
                        </a>
                    </p>
                <?php endif; ?>

              <?php if (isset($post_data["media_youtube_url"]) && !empty($post_data["media_youtube_url"])) : ?>
                <p class="post-media-facebook">
                  <a href="<?php echo addHttps($post_data["media_youtube_url"]); ?>" target="_blank">
                    <?php SVGRenderer::renderSVG('socials-youtube'); ?>
                  </a>
                  <span>YouTube: </span>
                  <a href="<?php echo addHttps($post_data["media_youtube_url"]); ?>" target="_blank">
                    <?php echo removeHttps($post_data["media_youtube_url"]); ?>
                  </a>
                </p>
              <?php endif; ?>

                <?php if (isset($post_data["media_custom"]) && !empty($post_data["media_custom"])) : ?>
                    <ul class="post-media-custom">
                        <?php foreach ($post_data["media_custom"] as $media_custom) : ?>
                            <li>
                                <?php SVGRenderer::renderSVG('chevron-right'); ?>
                                <span><?php checkEcho($media_custom["title"]); ?></span>
                                <a href="<?php echo addHttps($media_custom["url"]); ?>" target="_blank">
                                    <?php echo removeHttps($media_custom["url"]); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>


                <?php if (isset($post_data["media_platforms"]) && !empty($post_data["media_platforms"]) && ( count($post_data["media_platforms"]) > 0)) : ?>
                    <p class="post-media-platforms">
                      <span>Media Platforms:</span>
                      <?php for ( $i = 0; $i<count($post_data["media_platforms"]); $i++ ) :
                        echo $post_data["media_platforms"][$i]["name"];
                        if( $i < count($post_data["media_platforms"]) - 1 ) :
                          echo ", ";
                        endif;
                      endfor; ?>
                    </p>
                      <ul class="post-media-icons">
                          <?php foreach ($post_data["media_platforms"] as $icon) : ?>
                              <?php if (isset($icon["svg"]) && SVGRenderer::hasIcon($icon["svg"])) : ?>
                                  <li>
                                      <?php SVGRenderer::renderSVG($icon["svg"]); ?>
                                  </li>
                              <?php endif; ?>
                          <?php endforeach; ?>
                      </ul>
                  <?php endif; ?>

                <?php if (isset($post_data["project_types"]) && !empty($post_data["project_types"])) : ?>
                    <div class="post-categories">
                        <?php foreach ( $post_data["project_types"] as $post_type ) : ?>
                                <span class="post-tag">
                                    <?php echo $post_type; ?>
                                </span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($post_data["employer"]) && !empty($post_data["employer"])) : ?>
                    <div class="post-employ">
                        <?php if ($post_data["employer"] == "Freelancer") : ?>

                            <span>Worked as:</span>

                            <a href="denismarginas<?php echo $jsonGlobalData["page-slug-extension"]; ?>" target="_blank">
                                <?php echo $post_data["employer"]; ?>
                            </a>
                        <?php else : ?>

                            <span>Worked at:</span>

                            <a href="employee-experience<?php echo $jsonGlobalData["page-slug-extension"]; ?>#<?php echo strtolower(str_replace(" ", "-", $post_data["employer"])); ?>" target="_blank">
                                <?php echo $post_data["employer"]; ?>
                            </a>

                        <?php
                        if (isset($jsonJobsData)) :
                            foreach ($jsonJobsData as $job) :
                                if (strtolower($job["name"]) == strtolower($post_data["employer"]) && isset($job["img"]) && isset($job["display"]) && $job["display"] == "true") :
                                    ?>
                                    <div class="work-logo <?php echo isset($job["img_bg"]) ? $job["img_bg"] : ''; ?>" >
                                        <?php echo renderImage($GLOBALS['urlPath'].$job["img"], false, false, true); ?>
                                    </div>
                                <?php
                                endif;
                            endforeach;
                        endif;
                        ?>


                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($post_data["date"]) && !empty($post_data["date"])) : ?>
                    <p class="post-data">
                        <span>Date:</span>
                        <?php echo $post_data["date"]["date_start"]; ?>
                        <?php echo " - "; ?>
                        <?php echo $post_data["date"]["date_end"]; ?>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["tags"]) && !empty($post_data["tags"])) : ?>
                    <div class="post-tags">
                        <?php foreach ($post_data["tags"] as $post_tag) : ?>
                            <a class="post-tag" href="#<?php echo removeSpaceAndLowercase($post_tag)?>">
                                <?php echo $post_tag; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </aside>
    </container>
</section>

