<?php

if(!isset($jsonWorkstationData)) :
    $jsonWorkstationData = getDataJson('data-workstation', 'data');
endif;

$path = $jsonWorkstationData["setups"]["setup 1"]["path-vid"];
$videoData = $jsonWorkstationData["setups"]["setup 1"]["videos"]["full-setup"];

?>

<section class="dm-workstation-header"
        <?php if( !empty($layout) ) : ?>
         data-layout="<?php echo $layout; ?>"
        <?php endif; ?>
    >
    <svg class="dm-background-wave" data-svg-type="fill" viewBox="0 0 1440 190">
        <path fill-opacity="1" d="M0,160L60,138.7C120,117,240,75,360,69.3C480,64,600,96,720,117.3C840,139,960,149,1080,154.7C1200,160,1320,160,1380,160L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
    </svg>
    <container>
        <ul class="video-workstation">
            <li data-motion="transition-fade-0 transition-slideInRight-0">
                <h2><?php echo $videoData["title"]; ?></h2>
                <p></p>
                <?php echo $videoData["description"]; ?>
            </li>
            <li data-motion="transition-fade-0 transition-slideInLeft-0">
                <?php echo renderVideo($GLOBALS['urlPath']."content/vid/".$path."/".$videoData["src"],
                  $GLOBALS['urlPath']."content/img/thumbnails/".$videoData["thumbnail"] ); ?>
            </li>
        </ul>
    </container>
    <svg class="dm-background-wave-01" data-svg-type="fill" viewBox="0 0 1440 320">
        <path fill-opacity="1" d="M0,160L60,138.7C120,117,240,75,360,69.3C480,64,600,96,720,117.3C840,139,960,149,1080,154.7C1200,160,1320,160,1380,160L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
    <svg class="dm-background-wave-02" data-svg-type="fill" viewBox="0 0 1440 310">
        <path fill-opacity="1" d="M0,224L60,218.7C120,213,240,203,360,186.7C480,171,600,149,720,133.3C840,117,960,107,1080,133.3C1200,160,1320,224,1380,256L1440,288L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>
</section>

