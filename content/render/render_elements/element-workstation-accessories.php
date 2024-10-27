<?php if (isset($post_data)) :
    ?>
    <div id="w-accessories" class="dm-workstation-content dm-workstation-accessories" data-grid="2/1">
        <?php
        $products = $post_data["accessories"] ?? [];
        $imgList = $post_data["images"]["full-setup"] ?? [];

        $imgImgPath = $post_data["path_img"]."/" ?? "";
        $imgMediaPath = $post_data["media_path"]."/" ?? "";
        $imgPath = "content/img/".$imgImgPath.$imgMediaPath;

        $newImgList = [];
        foreach ($imgList as $imgItem) :
            $newImgList[] = renderImage($imgPath.$imgItem, true);
        endforeach;
        $imgList = $newImgList;

        ?>
        <ul>
            <li class="configuration">
                <ul class="product-list">
                    <?php
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
            <li class="summary" data-motion="transition-fade-0 transition-slideInLeft-0">
                <div class="visual">
                    <?php if ($imgList && count($imgList) > 1):
                        echo renderSlider($imgList, true, false, true);
                    elseif ($imgList && count($imgList) === 1) :
                        echo $imgList[0];
                    else:
                        echo SVGRenderer::renderSVG("workstation");
                    endif; ?>
                </div>
                <div class="text">
                    <ul class="enumeration">
                        <?php foreach ($products as $key => $product) :
                            if (isset($product['name'])) : ?>
                                <li>
                                    <?php echo SVGRenderer::renderSVG("chevron-right"); ?>
                                    <span class="text">
                                        <?php echo $product['name']; ?>
                                    </span>
                                </li>
                            <?php endif;
                        endforeach; ?>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
<?php endif; ?>


