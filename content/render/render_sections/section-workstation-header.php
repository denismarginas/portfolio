<?php

if(!isset($jsonWorkstationData)) :
    $jsonWorkstationData = getDataJson('data-workstation', 'data');
endif;

?>

<section class="dm-workstation-header"
        <?php if( !empty($layout) ) : ?>
         data-layout="<?php echo $layout; ?>"
        <?php endif; ?>
    >
    <container>
        <ul>
            <li>
                <h2 data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.6s">
                    <?php echo strtoupper($jsonWorkstationData["title"]); ?>
                </h2>
                <h3 data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.8s">
                    <?php echo $jsonWorkstationData["setups"]["setup 1"]["title"]; ?> Setup
                </h3>
                <p data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s">
                    <?php echo $jsonWorkstationData["setups"]["setup 1"]["short-description"]; ?>
                </p>
            </li>
            <li data-motion="transition-fade-0 transition-slideInLeft-0" >
                <div class="workstation-img <?php echo $jsonWorkstationData["setups"]["setup 1"]["id"]; ?>">
                    <?php
                    $path = $jsonWorkstationData["setups"]["setup 1"]["path-img"];
                    $img = $jsonWorkstationData["setups"]["setup 1"]["images"]["workstation"][0];
                    $imgWorkstation = $path."/".$img;

                    echo renderImage($GLOBALS['urlPath']."content/img/".$imgWorkstation, false);
                    ?>
                </div>
            </li>
        </ul>
    </container>
    <svg class="dm-background-wave-01" data-svg-type="fill" viewBox="0 0 1440 290">
        <path fill-opacity="1" d="M0,160L60,138.7C120,117,240,75,360,69.3C480,64,600,96,720,117.3C840,139,960,149,1080,154.7C1200,160,1320,160,1380,160L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
    <svg class="dm-background-wave-02" data-svg-type="fill" viewBox="0 0 1440 320">
        <path fill-opacity="1" d="M0,224L60,218.7C120,213,240,203,360,186.7C480,171,600,149,720,133.3C840,117,960,107,1080,133.3C1200,160,1320,224,1380,256L1440,288L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
</section>

