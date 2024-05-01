<?php

if(!isset($jsonGlobalData)) {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
}
if(!isset($jsonAboutData)) {
    $jsonAboutData = getDataJson('data-content-personal', 'data')["about"];
}

if(!isset($layout)) {
    $layout = "standard";
}

?>


<section class="dm-about grid-background-animation" data-layout="<?php echo $layout; ?>">
    <container>
        <div data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s">
            <?php echo renderImage($GLOBALS['urlPath']."content/img".$jsonAboutData["img-path"].$jsonAboutData["img"]);?>
            <?php SVGRenderer::renderSVG('background-shape-1'); ?>
            <span data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s" data-delay="0.5s"></span>
        </div>
        <div>
            <h2 data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.5s">
                <?php echo $jsonAboutData["title"]; ?>
            </h2>
            <?php $about_text_list = $jsonAboutData["text"];?>
            <?php $i = 1; foreach ($about_text_list as $about_text_item) : ?>
                <p data-motion="transition-fade-0 transition-slideInLeft-0">
                    <?php echo $about_text_item; ?>
                </p>
                <?php if( $layout == "compress" ) : ?>
                    <a data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.4s" href="<?php echo $jsonAboutData["buttons"][0]["button_page_redirect_slug"].$jsonGlobalData["page-slug-extension"]; ?>" data-button="primary">
                        <?php echo $jsonAboutData["buttons"][0]["button_text"]; ?>
                    </a>
                    <?php break;?>
                <?php endif; ?>
            <?php $i++; endforeach; ?>
            <?php if( $layout == "standard" ) :
                //$renderer = new RendererElements();
                //$renderer->renderElement('knowledge-list-icons');
            endif; ?>
        </div>
    </container>
</section>

