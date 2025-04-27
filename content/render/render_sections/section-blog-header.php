<?php

if(!isset($jsonBlogData)) :
    $jsonBlogData = getDataJson('data-content-personal', 'data')['posts-socials'];
endif;

?>
<section class="blurred-lines-animation dm-blog-header"
    <?php
        if (isset($jsonBlogData["blog-colors"])
          && isset($jsonBlogData["blog-colors"]["blog-color-primary"])
          && isset($jsonBlogData["blog-colors"]["blog-color-secondary"])) :
            echo ' style="'.
              '--blog-color-primary: '.$jsonBlogData["blog-colors"]["blog-color-primary"].';'.
              '--blog-color-secondary: '.$jsonBlogData["blog-colors"]["blog-color-secondary"].';'.
              '" ';
        endif;
    ?>
    >
    <?php

    ?>
    <container>
        <div class="dm-blog-user">
            <div class="dm-blog-user-wallpaper">

                <?php if(isset($jsonBlogData["blog-img-wallpaper"])) :
                    echo renderImage($GLOBALS['urlPath'].$jsonBlogData["blog-img-wallpaper"]);
                endif; ?>

            </div>
            <div class="dm-blog-user-data">
                <div class="dm-blog-user-logo">

                    <?php if(isset($jsonBlogData["blog-img-logo"])) :
                        echo renderImage($GLOBALS['urlPath'].$jsonBlogData["blog-img-logo"]);
                    endif; ?>

                </div>
                <div class="dm-blog-user-details">
                    <h2 class="dm-blog-user-name">

                        <?php if(isset($jsonBlogData["blog-username"])) :
                            echo $jsonBlogData["blog-username"];
                        endif; ?>

                    </h2>
                    <p class="dm-blog-user-description">

                        <?php if(isset($jsonBlogData["blog-description"])) :
                            echo $jsonBlogData["blog-description"];
                        endif; ?>

                    </p>
                </div>
            </div>
        </div>
    </container>
    <div class="light x1"></div>
    <div class="light x2"></div>
    <div class="light x3"></div>
    <div class="light x4"></div>
    <div class="light x5"></div>
    <div class="light x6"></div>
    <div class="light x7"></div>
    <div class="light x8"></div>
    <div class="light x9"></div>
</section>

