<?php if (isset($post_data)) : ?>
    <div id="w-home" class="dm-workstation-header">
        <ul>
            <li class="text-content">
                <h2 data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.6s">
                    <?php echo $post_data["title"]; ?>
                </h2>
                <p data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s">
                    <?php echo $post_data["description"]; ?>
                </p>
            </li>
            <li class="media-content" data-motion="transition-fade-0 transition-slideInLeft-0">
                <?php
                $workstationSetupImg = false;
                $imgImgPath = $post_data["path_img"]."/" ?? "";
                $imgMediaPath = $post_data["media_path"]."/" ?? "";
                $imgPath = "content/img/".$imgImgPath.$imgMediaPath;

                if (isset($post_data["images"]["full-setup"][0]) && !empty($post_data["images"]["full-setup"][0])):
                    $workstationSetupImg = $post_data["images"]["full-setup"][0];
                endif;

                ?>
                <div class="visual">
                    <?php if($workstationSetupImg) :
                        echo renderImage($imgPath.$workstationSetupImg, true);
                    else:
                        echo SVGRenderer::renderSVG("workstation");
                    endif; ?>
                </div>
            </li>
        </ul>

        <?php if (isset($post_data["status"]) && !empty($post_data["status"])): ?>
            <div class="status">
                <span class="dot <?php echo $post_data["status"]; ?>"></span>
                <span><?php echo $post_data["status"]; ?></span>
            </div>
        <?php endif; ?>

        <?php if( isset($layout) && !empty($layout) && $layout == "default") : ?>
            <svg class="wave-shape primary" viewBox="0 0 1440 320">
                <path fill="var(--w-color-primary)" fill-opacity="1" d="M0,192L60,192C120,192,240,192,360,213.3C480,235,600,277,720,272C840,267,960,213,1080,208C1200,203,1320,245,1380,266.7L1440,288L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
            </svg>
            <svg class="wave-shape secondary" viewBox="0 0 1440 320">
                <path fill="var(--w-color-secondary)" fill-opacity="1" d="M0,224L80,202.7C160,181,320,139,480,138.7C640,139,800,181,960,176C1120,171,1280,117,1360,90.7L1440,64L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
            </svg>
        <?php endif; ?>

    </div>
<?php endif; ?>



