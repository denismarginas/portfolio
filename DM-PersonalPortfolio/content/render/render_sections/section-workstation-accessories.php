

<section class="dm-workstation-configuration grid-background-animation"
        <?php if( !empty($layout) ) : ?>
         data-layout="<?php echo $layout; ?>"
        <?php endif; ?>
    >
    <svg class="dm-background-wave" data-svg-type="fill" viewBox="0 0 1440 190">
        <path fill-opacity="1" d="M0,160L60,138.7C120,117,240,75,360,69.3C480,64,600,96,720,117.3C840,139,960,149,1080,154.7C1200,160,1320,160,1380,160L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
    </svg>
    <container>
        <ul>
            <li>

                <?php
                $renderer = new RendererElements();
                $renderer->renderElement('slider-workstation');
                ?>
            </li>
            <li>
                <h2>PC #1 Accessories</h2>
                <ul>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#headset">Headset wireless HyperX Cloud Stinger Core 7.1</a></li>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#mouse">Mouse LOGITECH G203 LIGHTSYNC RGB, 8.000 dpi</a></li>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#keyboard">Mechanical Keyboard LOGITECH G512 GX Red Linear</a></li>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#mousepad">Mouse Pad GENESIS Carbon 700 Maxi Cordura</a></li>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#speakers">Speakers Trust Arys Compact RGB 2.0 Set</a></li>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#monitor">Monitor IPS SAMSUNG Odyssey G5, 27", WQHD, 165Hz</a></li>
                </ul>
            </li>
        </ul>
        <div class="dm-workstation-components">
            <div class="component" id="headset">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/headset_wireless_hyperx_cloud_stinger_core_71.webp"); ?>
                </div>
                <span>Headset wireless HyperX Cloud Stinger Core 7.1</span>
            </div>
            <div class="component" id="mouse">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/mouse_logitech_g203_lightsync_rgb_8000_dpi.webp"); ?>
                </div>
                <span>Mouse LOGITECH G203 LIGHTSYNC RGB, 8.000 dpi</span>
            </div>
            <div class="component" id="keyboard">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/mechanical_keyboard_logitech_g512_gx_red_linear.webp"); ?>
                </div>
                <span>Mechanical Keyboard LOGITECH G512 GX Red Linear</span>
            </div>
            <div class="component" id="mousepad">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/mouse_pad_genesis_carbon_700_maxi_cordura.webp"); ?>
                </div>
                <span>Mouse Pad GENESIS Carbon 700 Maxi Cordura</span>
            </div>
            <div class="component" id="speakers">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/speakers_trust_arys_compact_rgb_20_set.webp"); ?>
                </div>
                <span>Speakers Trust Arys Compact RGB 2.0 Set</span>
            </div>
            <div class="component" id="monitor">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/monitor_ips_samsung_odyssey_g5_27_wqhd_165hz.webp"); ?>
                </div>
                <span>Monitor IPS SAMSUNG Odyssey G5, 27", WQHD, 165Hz</span>
            </div>
        </div>
    </container>

    <svg class="dm-background-wave-01" data-svg-type="fill" viewBox="0 0 1440 290"><path fill-opacity="1" d="M0,160L60,160C120,160,240,160,360,165.3C480,171,600,181,720,154.7C840,128,960,64,1080,53.3C1200,43,1320,85,1380,106.7L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <svg class="dm-background-wave-02" data-svg-type="fill" viewBox="0 0 1440 320"><path fill-opacity="1" d="M0,192L60,165.3C120,139,240,85,360,53.3C480,21,600,11,720,58.7C840,107,960,213,1080,256C1200,299,1320,277,1380,266.7L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>

</section>

