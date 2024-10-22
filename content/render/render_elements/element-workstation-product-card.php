<?php if (isset($product)) : ?>
    <li class="dm-product-card" data-motion="transition-fade-0 transition-slideInRight-0">
        <div class="product"
            <?php if (isset($product["name"])) : ?>
             id="<?php echo $product["name"]; ?>" >
            <?php endif; ?>

            <div class="visual">
                <?php if (isset($product["img-src"]) && !empty($product["img-src"]) && isset($product["img-path"])) :
                    echo renderImage($product["img-path"].$product["img-src"], true, "product-image");
                else:
                    echo renderImage("content/img/placeholder/img-placeholder.webp", false, "product-image");
                endif; ?>

                <?php if (isset($product["tag"]) && !empty($product["tag"])) : ?>
                    <span class="tag">
                        <?php echo $product["tag"]; ?>
                    </span>
                <?php endif; ?>

            </div>
            <div class="text">
                <?php if (isset($product["name"]) && !empty($product["name"])) : ?>
                    <h3 class="title">
                        <?php echo $product["name"]; ?>
                    </h3>
                <?php endif; ?>

                <?php if (isset($product["description"]) && !empty($product["description"])) : ?>
                    <div class="hover">
                        <p class="description">
                            <?php echo nl2br($product["description"]); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </li>
<?php endif; ?>