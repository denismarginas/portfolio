<?php

if (!isset($jsonGlobalData)):
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if (!isset($jsonHobbyData)):
    $jsonHobbyData = getDataJson('data-content-personal', 'data')["hobby"];
endif;

?>

<section class="dm-hobby-list">
    <container>

        <?php if (isset($jsonHobbyData["title"])): ?>
            <h4 class="name" data-motion="transition-fade-0" data-duration="0.4s">
                <?php echo $jsonHobbyData["title"]; ?>
            </h4>
        <?php endif; ?>

        <?php if (isset($jsonHobbyData["list"])): ?>
            <ul>
                <?php $i = 1;
                foreach ($jsonHobbyData["list"] as $item): ?>

                    <li class="dm-hobby-item" <?php if (isset($jsonHobbyData["img-path"]) && isset($item["img"])): ?>
                            style="background-image: url('<?php echo $GLOBALS['urlPath'] . "content/img/" . $jsonHobbyData["img-path"] . "/" . $item["img"]; ?>');"
                        <?php endif; ?> data-motion="transition-fade-0" data-duration="0.4s"
                        data-delay="<?php echo $i * 0.05; ?>s">

                        <?php if (isset($item["name"])): ?>
                            <p class="name" data-motion="transition-fade-0" data-duration="0.3s" data-delay="0.05s">
                                <?php echo $item["name"]; ?>
                            </p>
                        <?php endif; ?>

                        <?php if (isset($item["icon-svg"])): ?>
                            <div class="icon" data-motion="transition-fade-0" data-duration="0.4s" data-delay="0.1s">
                                <?php SVGRenderer::renderSVG($item["icon-svg"]); ?>
                            </div>
                        <?php endif; ?>

                    </li>

                    <?php $i++; endforeach; ?>

            </ul>

        <?php endif; ?>

    </container>

    <?php $renderer = new RendererElements();
    $renderer->renderElement("animation-blurred-lines"); ?>

</section>