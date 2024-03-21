<?php

$jsonBlogData = getDataJson('data-blog-activity', 'data');

?>
<section class="dm-blog-header blurred-lines-animation">
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
                    <h1 class="dm-blog-user-name">

                        <?php if(isset($jsonBlogData["blog-username"])) :
                            echo $jsonBlogData["blog-username"];
                        endif; ?>

                    </h1>
                    <p class="dm-blog-user-description">

                        <?php if(isset($jsonBlogData["blog-description"])) :
                            echo $jsonBlogData["blog-description"];
                        endif; ?>

                    </p>
                </div>
            </div>
        </div>
    </container>
</section>

