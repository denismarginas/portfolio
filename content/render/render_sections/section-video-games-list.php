<?php

if (!isset($jsonGlobalData)):
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if (!isset($jsonVideoGames)):
    $jsonVideoGames = getDataJson('data-items-games', 'data');
endif;

$theme_path = $GLOBALS['urlPath'] . $jsonGlobalData["themes-path"] . "/" . $jsonGlobalData["theme-active"]["dir-name"];

?>

<?php if (!empty($theme_path)): ?>
    <script id="dm-video-games-scripts" src="<?php echo $theme_path; ?>/js/content-data-video-games.js"></script>
    <script id="dm-video-games-data" src="content/json/data/data-items-games.json"></script>
<?php endif; ?>

<section class="dm-video-games-list">
    <container>
        <?php if (isset($jsonVideoGames)): ?>
            <ul id="dm-video-games-list">
                <?php usort($jsonVideoGames, fn($a, $b) => strcasecmp($a['name'], $b['name']));
                foreach ($jsonVideoGames as $item): ?>
                    <li class="dm-vg-item" data-motion="transition-fade-0" data-duration="0.4s" data-delay="0.3s" <?php if (isset($item["display"]) == "false"): ?> display="false" <?php endif; ?>>

                        <div class="banner-box">

                            <?php if (isset($item["banner"])): ?>
                                <img src="<?php echo $item["banner"]; ?>"
                                    alt="<?php echo isset($item["name"]) ? $item["name"] : 'Game Banner'; ?>" class="banner" />
                            <?php endif; ?>

                            <div class="details-box">

                                <?php if (isset($item["rank"])): ?>
                                    <div class="rank" data-motion="transition-fade-0" data-duration="0.3s" data-delay="0.05s"
                                        number="<?php echo round((float) $item['rank']); ?>">
                                        <?php SVGRenderer::renderSVG("star"); ?>
                                        <span><?php echo $item["rank"]; ?></span>
                                    </div>

                                <?php endif; ?>

                                <?php if (isset($item["playtime"])): ?>
                                    <div class="playtime" data-motion="transition-fade-0" data-duration="0.3s" data-delay="0.05s">
                                        <?php SVGRenderer::renderSVG("clock"); ?>
                                        <span><?php echo $item["playtime"]; ?></span>
                                    </div>

                                <?php endif; ?>

                                <?php if (isset($item["tags"])): ?>
                                    <div class="tags-box">
                                        <details>
                                            <summary>
                                                <?php SVGRenderer::renderSVG("tag-plus"); ?>
                                            </summary>

                                            <ul class="tags" data-motion="transition-fade-0" data-duration="0.3s"
                                                data-delay="0.05s">
                                                <?php
                                                $tags = explode(', ', $item["tags"]);
                                                foreach ($tags as $tag) {
                                                    echo '<li>' . htmlspecialchars($tag) . '</li>';
                                                }
                                                ?>
                                            </ul>
                                        </details>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>

                        <?php if (isset($item["name"])): ?>
                            <p class="name inside" data-motion="transition-fade-0" data-duration="0.3s" data-delay="0.05s">
                                <?php echo $item["name"]; ?>
                            </p>
                        <?php endif; ?>

                    </li>
                <?php endforeach; ?>

            </ul>

        <?php endif; ?>

    </container>
</section>