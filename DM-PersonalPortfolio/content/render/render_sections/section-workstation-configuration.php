

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
            <li data-motion="transition-fade-0 transition-slideInRight-0">
                <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/pc-01.webp"); ?>
            </li>
            <li data-motion="transition-fade-0 transition-slideInLeft-0">
                <h2>PC #1 Configuration</h2>
                <ul>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#computer-case">Computer Case AQIRYS Antares ARGB</a></li>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#motherboard">Motherboard ASUS TUF GAMING B650-PLUS AM5</a></li>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#ram">RAM Kingston FURY Beast 32GB DDR5 5200MHz CL40 Dual Channel</a></li>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#cpu">CPU AMD Ryzen™ 5 7600X 38MB 4.7/5.3GHz Boost</a></li>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#cpu-cooler">Cooler ARCTIC Freezer 34 eSports DUO Grey</a></li>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#gpu">GPU GIGABYTE GeForce RTX 3070 OC 8GB GDDR6 256-bit</a></li>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#ssd-sata">SSD GIGABYTE 480GB SATA-III 2.5 inch</a></li>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#ssd-nv2">SSD Kingston NV2 1TB PCI Express 4.0 x4 M.2 2280</a></li>
                    <li><?php SVGRenderer::renderSVG('chevron-right'); ?><a href="#psu">PSU GIGABYTE P850GM 80+ Gold 850W</a></li>
                </ul>
            </li>
        </ul>
        <div class="dm-workstation-components">
            <div class="component" id="cpu" data-motion="transition-fade-0 transition-slideInRight-0">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/cpu_amd_ryzen_5_7600x_38mb_4.7_5.3ghz_boost.webp"); ?>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/cpu_amd_ryzen_5_7600x_38mb_4.7_5.3ghz_boost_box.webp"); ?>
                </div>
                <span>CPU AMD Ryzen™ 5 7600X 38MB 4.7/5.3GHz Boost</span>
            </div>
            <div class="component" id="cpu-cooler" data-motion="transition-fade-0 transition-slideInRight-0">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/cooler_arctic_freezer_34_esports_duo_grey.webp"); ?>
                </div>
                <span>Cooler ARCTIC Freezer 34 eSports DUO Grey</span>
            </div>
            <div class="component" id="gpu" data-motion="transition-fade-0 transition-slideInRight-0">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/gpu_gigabyte_geforce_rtx_3070_gaming_oc_lhr_8gb_gddr6_256_bit.webp"); ?>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/gpu_gigabyte_geforce_rtx_3070_gaming_oc_lhr_8gb_gddr6_256_bit_box.webp"); ?>
                </div>
                <span>GPU GIGABYTE GeForce RTX 3070 OC 8GB GDDR6 256-bit</span>
            </div>
            <div class="component" id="ram" data-motion="transition-fade-0 transition-slideInRight-0">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/ram_kingston_fury_beast_32gb_ddr5_5200mhz_cl40_dual_channel_kit.webp"); ?>
                </div>
                <span>RAM Kingston FURY Beast 32GB DDR5 5200MHz CL40 Dual Channel</span>
            </div>
            <div class="component" id="motherboard" data-motion="transition-fade-0 transition-slideInRight-0">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/motherboard_asus_tuf_gaming_b650_plus_socket_am5.webp"); ?>
                </div>
                <span>Motherboard ASUS TUF GAMING B650-PLUS AM5</span>
            </div>
            <div class="component" id="computer-case" data-motion="transition-fade-0 transition-slideInRight-0">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/computer_case_aqirys_antares_argb.webp"); ?>
                </div>
                <span>Computer Case AQIRYS Antares ARGB</span>
            </div>
            <div class="component" id="ssd-sata" data-motion="transition-fade-0 transition-slideInRight-0">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/ssd_gigabyte_480gb_sata_iii_25_inch.webp"); ?>
                </div>
                <span>SSD GIGABYTE 480GB SATA-III 2.5 inch</span>
            </div>
            <div class="component" id="ssd-nv2" data-motion="transition-fade-0 transition-slideInRight-0">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/ssd_kingston_nv2_1tb_pci_express_40_x4_m2_2280.webp"); ?>
                </div>
                <span>SSD Kingston NV2 1TB PCI Express 4.0 x4 M.2 2280</span>
            </div>
            <div class="component" id="psu" data-motion="transition-fade-0 transition-slideInRight-0">
                <div class="component-image">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/workstation/psu_gigabyte_p850gm_80_plus_gold_850w.webp"); ?>
                </div>
                <span>PSU GIGABYTE P850GM 80+ Gold 850W</span>
            </div>
        </div>
    </container>

    <svg class="dm-background-wave-01" data-svg-type="fill" viewBox="0 0 1440 290"><path fill-opacity="1" d="M0,160L60,160C120,160,240,160,360,165.3C480,171,600,181,720,154.7C840,128,960,64,1080,53.3C1200,43,1320,85,1380,106.7L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <svg class="dm-background-wave-02" data-svg-type="fill" viewBox="0 0 1440 320"><path fill-opacity="1" d="M0,192L60,165.3C120,139,240,85,360,53.3C480,21,600,11,720,58.7C840,107,960,213,1080,256C1200,299,1320,277,1380,266.7L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>

</section>

