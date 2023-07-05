<?php
if (!empty($args)) {
    $post_data = $args[0];
    $post_content = $args[1];
}

if (!isset($post_data)) {
    $post_data = [
        "post_type" => "portfolio",
        "media_path" => "post",
        "title" => "Post Title",
        "logo" => "logo.svg",
        "logo_type" => "svg",
        "description" => "This is an example of text description for this post.",
        "category" => "Website / Media",
        "website_url" => "www.website.com",
        "website_platform" => "Wordpress / Prestashop",
        "website_status" => "Undone / Done / In Progress",
        "media_facebook_url" => "https://www.facebook.com/",
        "media_instagram_url" => "https://www.instagram.com/",
        "media_custom_url" => "www.media.com",
        "media_custom_text" => "Media: ",
        "employ" => "Unspecified / In CompanyName",
        "date" => "2023",
        "colors" => [
            "post_color_primary" => "#5d6977",
            "post_color_secondary" => "#1b2431",
            "post_color_background" => "#FFFFFF",
            "post_color_text_on_background" => "#FFFFFF"
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
                        <img src="<?php echo $GLOBALS['urlPath']; ?>content/img/<?php echo $post_data["post_type"];?>/<?php echo $post_data["media_path"];?>/<?php echo $post_data["logo"];?>" width="100" height="100" alt="<?php echo $post_data["title"];?> - Logo">
                    <?php endif; ?>
                
                <?php endif; ?>
                
            </div>
            <div class="post-text" data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.6s">
                <?php if (isset($post_data["title"]) && !empty($post_data["title"])) : ?>
                    <h2 class="post-title"><?php echo $post_data["title"]; ?></h2>
                <?php endif; ?>

                <?php if (isset($post_data["description"]) && !empty($post_data["description"])) : ?>
                    <p class="post-description"><?php echo $post_data["description"]; ?></p>
                <?php endif; ?>

                <?php if (isset($post_data["category"]) && !empty($post_data["category"])) : ?>
                    <div class="post-categories">
                        <?php foreach ($post_data["category"] as $post_category) : ?>
                            <a class="post-category" href="#<?php echo removeSpaceAndLowercase($post_category)?>">
                                <?php echo $post_category; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


                <?php if (isset($post_data["website_url"]) && !empty($post_data["website_url"])) : ?>
                    <p class="post-website">
                        <span>Website: </span>
                        <a href="<?php echo addHttps($post_data["website_url"]); ?>" target="_blank"><?php echo removeHttps($post_data["website_url"]); ?></a>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["website_platform"]) && !empty($post_data["website_platform"])) : ?>
                    <p class="post-website-platform">
                        <span>Platform:</span>
                        <?php echo $post_data["website_platform"]; ?>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["website_status"]) && !empty($post_data["website_status"])) : ?>
                    <p class="post-website-status">
                        <span>Status:</span>
                        <?php echo $post_data["website_status"]; ?>
                    </p>
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

                <?php if (isset($post_data["media_custom_url"]) && !empty($post_data["media_custom_url"])) : ?>
                    <p class="post-media-custom">
                        <span><?php dm_echo($post_data["media_custom_text"]); ?></span>
                        <a href="<?php echo addHttps($post_data["media_custom_url"]); ?>" target="_blank">
                            <?php echo removeHttps($post_data["media_custom_url"]); ?>
                        </a>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["employ"]) && !empty($post_data["employ"])) : ?>
                    <p class="post-employ">
                        <span>Worked at:</span>
                        <?php echo $post_data["employ"]; ?>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["date"]) && !empty($post_data["date"])) : ?>
                    <p class="post-data">
                        <span>Date:</span>
                        <?php echo $post_data["date"]; ?>
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

