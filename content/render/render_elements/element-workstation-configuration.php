<?php if (isset($post_data)) : ?>
    <div id="w-configuration" class="dm-workstation-content dm-workstation-configuration" data-grid="1/2">
        <ul>
            <li class="media-content" data-motion="transition-fade-0 transition-slideInLeft-0">
                <?php
                $workstationDeviceImg = false;
                $imgImgPath = $post_data["path_img"]."/" ?? "";
                $imgMediaPath = $post_data["media_path"]."/" ?? "";
                $imgPath = "content/img/".$imgImgPath.$imgMediaPath;


                if (isset($post_data["images"]["workstation"][0]) && !empty($post_data["images"]["workstation"][0])):
                    $workstationDeviceImg = $post_data["images"]["workstation"][0];
                endif;

                ?>
                <div class="visual">
                    <?php if($workstationDeviceImg) :
                        echo renderImage($imgPath.$workstationDeviceImg, true);
                    else:
                        echo SVGRenderer::renderSVG("workstation");
                    endif; ?>
                </div>
            </li>
            <li class="configuration">
                <ul class="product-list">
                    <?php
                    $products = $post_data["configuration"] ?? [];
                    $renderer = new RendererElements();

                    foreach ($products as $key => $product) :
                        if (isset($product['name'])) :
                            $product['img-path'] = $imgPath;
                            $renderer->renderElement('workstation-product-card', "default", ['product' => $product]);
                        endif;
                    endforeach;
                    ?>
                </ul>

            </li>
        </ul>
    </div>
<?php endif; ?>


