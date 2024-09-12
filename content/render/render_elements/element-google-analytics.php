<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

$googleAnalytics = $jsonGlobalData["google-analytics"]["id"];

if(isset($googleAnalytics) && !empty($googleAnalytics)) : ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $googleAnalytics; ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?php echo $googleAnalytics; ?>');
    </script>

<?php endif; ?>

