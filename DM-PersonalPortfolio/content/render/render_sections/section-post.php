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
    ];
}
?>
<section class="dm-post">
    <container>
        <div class="post-content">
            <?php if (isset($post_content)) :
                echo $post_content;
             endif; ?>
        </div>
        <aside class="post-data">
            <div class="post-logo">
                <?php if (isset($post_data["logo_type"]) && !empty($post_data["logo_type"])) : ?>
                
                    <?php if ( $post_data["logo_type"] == "svg" ) : ?>
                        <?php SVGRenderer::renderSVG( $post_data["logo"] ); ?>
                    <?php elseif( ($post_data["logo_type"] == "png") || ($post_data["logo_type"] == "jpg") || $post_data["logo_type"] == "jpeg") : ?>
                        <img src="<?php echo $GLOBALS['urlPath']; ?>content/img/<?php echo $post_data["post_type"];?>/<?php echo $post_data["media_path"];?>/<?php echo $post_data["logo"];?>" width="100" height="100" alt="<?php echo $post_data["title"];?> - Logo">
                    <?php endif; ?>
                
                <?php endif; ?>
                
            </div>
            <div class="post-text">
                <?php if (isset($post_data["title"]) && !empty($post_data["title"])) : ?>
                    <h2><?php echo $post_data["title"]; ?></h2>
                <?php endif; ?>

                <?php if (isset($post_data["description"]) && !empty($post_data["description"])) : ?>
                    <p><?php echo $post_data["description"]; ?></p>
                <?php endif; ?>

                <?php if (isset($post_data["website_url"]) && !empty($post_data["website_url"])) : ?>
                    <p>
                        <span>Website: </span>
                        <a href="<?php echo addHttps($post_data["website_url"]); ?>" target="_blank"><?php echo removeHttps($post_data["website_url"]); ?></a>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["website_platform"]) && !empty($post_data["website_platform"])) : ?>
                    <p>Platform: <?php echo $post_data["website_platform"]; ?></p>
                <?php endif; ?>

                <?php if (isset($post_data["website_status"]) && !empty($post_data["website_status"])) : ?>
                    <p>Status: <?php echo $post_data["website_status"]; ?></p>
                <?php endif; ?>

                <?php if (isset($post_data["media_facebook_url"]) && !empty($post_data["media_facebook_url"])) : ?>
                    <p>
                        <span>Facebook: </span>
                        <a href="<?php echo addHttps($post_data["media_facebook_url"]); ?>"><?php echo removeHttps($post_data["media_facebook_url"]); ?></a>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["media_instagram_url"]) && !empty($post_data["media_instagram_url"])) : ?>
                    <p>
                        <span>Instagram: </span>
                        <a href="<?php echo addHttps($post_data["media_instagram_url"]); ?>"><?php echo removeHttps($post_data["media_instagram_url"]); ?></a>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["media_custom_url"]) && !empty($post_data["media_custom_url"])) : ?>
                    <p>
                        <span><?php dm_echo($post_data["media_custom_text"]); ?></span>
                        <a href="<?php echo addHttps($post_data["media_custom_url"]); ?>"><?php echo removeHttps($post_data["media_custom_url"]); ?></a>
                    </p>
                <?php endif; ?>

                <?php if (isset($post_data["employ"]) && !empty($post_data["employ"])) : ?>
                    <p>Worked at: <?php echo $post_data["employ"]; ?></p>
                <?php endif; ?>

                <?php if (isset($post_data["date"]) && !empty($post_data["date"])) : ?>
                    <p>Date: <?php echo $post_data["date"]; ?></p>
                <?php endif; ?>

            </div>
        </aside>
    </container>
</section>

