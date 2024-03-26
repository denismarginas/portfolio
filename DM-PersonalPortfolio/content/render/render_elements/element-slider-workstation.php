<?php
$jsonWorkstationData = getDataJson('data-workstation', 'data');
$path = $jsonWorkstationData["setups"]["setup 1"]["path-img"];
$gallery = $jsonWorkstationData["setups"]["setup 1"]["images"]["full-setup"];
?>


<div class="slider" data-navigation="arrows">
    <div class="slider-container">
        <?php foreach ($gallery as $key => $img) : ?>
            <div class="slider-element">
                <div class="number-text"><?php echo ($key + 1) . " / " . count($gallery); ?></div>
                <?php echo renderImage($GLOBALS['urlPath']."content/img/".$path."/".$img, true);?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
