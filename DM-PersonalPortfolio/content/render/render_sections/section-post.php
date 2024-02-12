<?php
if (!empty($args)) {
    $post_data = $args[0];
    $post_content = $args[1];
}

if (!isset($post_data)) {
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
        "employ" => "Unspecified / In CompanyName",
        "colors" => [
            "post_color_primary" => "#5d6977",
            "post_color_secondary" => "#1b2431",
            "post_color_background" => "#ffffff",
            "post_color_text_on_background" => "#ffffff"
        ]
    ];
}
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
    //echo renderWallpaperPost($post_data);
    ?>

    <container>
        <div class="post-content">
            <?php if (isset($post_content)) :
                echo $post_content;
             endif; ?>
        </div>
        <aside class="post-data">
            <div class="post-logo" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.4s">
                <?php if (isset($post_data["logo_type"]) && !empty($post_data["logo_type"])) : ?>
                
                    <?php if ( $post_data["logo_type"] == "svg" ) : ?>
                        <?php SVGRenderer::renderSVG( $post_data["logo"] ); ?>
                    <?php elseif( ($post_data["logo_type"] == "png") || ($post_data["logo_type"] == "jpg") || $post_data["logo_type"] == "jpeg") : ?>
                        <img src="<?php echo $GLOBALS['urlPath']; ?>content/img/<?php echo $post_data["post_type"];?>/<?php echo $post_data["media_path"];?>/<?php echo $post_data["logo"]; ?>" width="100" height="100" alt="<?php echo $post_data["title"];?> - Logo">
                    <?php endif; ?>
                
                <?php endif; ?>
                
            </div>
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
                                <a class="post-category" href="#<?php echo removeSpaceAndLowercase($post_category)?>">
                                    <?php echo $post_category; ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


                <?php if (isset($post_data["web_url"]) && !empty($post_data["web_url"])) : ?>
                    <p class="post-website">
                        <span>Website: </span>
                        <a href="<?php echo addHttps($post_data["web_url"]); ?>" target="_blank"><?php echo removeHttps($post_data["web_url"]); ?></a>
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

                <?php if (isset($post_data["web_languages"]) && !empty($post_data["web_languages"])) : ?>
                    <p class="post-website-languages">
                        <span>Languages:</span>
                        <?php for ( $i = 0; $i<count($post_data["web_languages"]); $i++ ) :
                            echo $post_data["web_languages"][$i]["name"];
                            if( $i < count($post_data["web_languages"]) - 1 ) :
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

                <?php if (isset($post_data["web_development_project"]) && !empty($post_data["web_development_project"])) : ?>
                    <p class="post-website-status">
                        <span>Website Development:</span>
                        <?php echo $post_data["web_development_project"]; ?>
                    </p>
                <?php endif; ?>

                <?php
                $icons_list = [];
                if (isset($post_data["web_platform"]) && is_array($post_data["web_platform"])) {
                  $icons_list = array_merge($icons_list, $post_data["web_platform"]);
                }
                if (isset($post_data["web_languages"]) && is_array($post_data["web_languages"])) {
                  $icons_list = array_merge($icons_list, $post_data["web_languages"]);
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
                                <span><?php dm_echo($media_custom["title"]); ?></span>
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

                <?php if (isset($post_data["employ"]) && !empty($post_data["employ"])) : ?>
                    <p class="post-employ">
                        <?php if ($post_data["employ"] == "Freelancer") : ?>

                            <span>Worked as:</span>

                            <a href="denismarginas.html" target="_blank">
                                <?php echo $post_data["employ"]; ?>
                            </a>
                        <?php else : ?>

                            <span>Worked at:</span>

                            <a href="employee-experience.html#<?php echo strtolower(str_replace(" ", "-", $post_data["employ"])); ?>" target="_blank">
                                <?php echo $post_data["employ"]; ?>
                            </a>

                        <?php endif; ?>
                    </p>
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

