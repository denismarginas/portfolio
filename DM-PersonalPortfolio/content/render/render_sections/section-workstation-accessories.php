<?php
$jsonWorkstationData = getDataJson('data-workstation', 'data');
$path = $jsonWorkstationData["setups"]["setup 1"]["path-img"];
$products = $jsonWorkstationData["setups"]["setup 1"]["accessories"];
?>

<section class="dm-workstation-accessories dm-workstation-products grid-background-animation"
        <?php if( !empty($layout) ) : ?>
         data-layout="<?php echo $layout; ?>"
        <?php endif; ?>
    >
    <svg class="dm-background-wave" data-svg-type="fill" viewBox="0 0 1440 190">
        <path fill-opacity="1" d="M0,160L60,138.7C120,117,240,75,360,69.3C480,64,600,96,720,117.3C840,139,960,149,1080,154.7C1200,160,1320,160,1380,160L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
    </svg>
    <container>
        <ul>
            <li data-motion="transition-fade-0 transition-slideInRight-0">

                <?php
                $renderer = new RendererElements();
                $renderer->renderElement('slider-workstation');
                ?>
            </li>
            <li data-motion="transition-fade-0 transition-slideInLeft-0">
                <h2>PC #1 Accessories</h2>
                <ul>
                    <?php foreach ($products as $key => $product) : ?>
                        <li><?php SVGRenderer::renderSVG('chevron-right'); ?>
                            <a href="#<?php echo $key; ?>">
                                <?php echo $product["name"]; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
        <div class="products">

            <?php foreach ($products as $key => $product): ?>
                <div class="product" id="<?php echo $key; ?>" data-motion="transition-fade-0 transition-slideInRight-0">
                    <div class="product-image">
                        <?php echo renderImage($GLOBALS['urlPath']."content/img/".$path."/".$product["img-src"]); ?>
                    </div>
                    <span><?php echo $product["name"]; ?></span>
                </div>
            <?php endforeach; ?>

        </div>
    </container>

    <svg class="dm-background-wave-01" data-svg-type="fill" viewBox="0 0 1440 290"><path fill-opacity="1" d="M0,160L60,160C120,160,240,160,360,165.3C480,171,600,181,720,154.7C840,128,960,64,1080,53.3C1200,43,1320,85,1380,106.7L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <svg class="dm-background-wave-02" data-svg-type="fill" viewBox="0 0 1440 320"><path fill-opacity="1" d="M0,192L60,165.3C120,139,240,85,360,53.3C480,21,600,11,720,58.7C840,107,960,213,1080,256C1200,299,1320,277,1380,266.7L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>

</section>

