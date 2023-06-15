<?php if (defined('DEBUG') && DEBUG === true) : ?>
    <section class="dm-debug">
        <span>
            <a class="btn-render" href="#" data-href="<?php echo $GLOBALS['urlPath']; ?>content/render/render.php">Render</a>
            <a class="btn-log" href="#">Log</a>
        </span>
        <div class="data-log" style="display: none !important;">
            <span class="log-close">x</span>
            <p class="log-header">Log Data:</p>
            <ul>
                <?php global $log; foreach ($log as $entry) : ?>
                    <li><?php echo $entry; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>




