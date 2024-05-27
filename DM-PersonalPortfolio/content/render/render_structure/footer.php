<?php

$renderer_sections = new RendererSections();
$renderer_sections->renderSection('debug');

?>

<footer id="footer">
    <section>
        <div class="dm-footer-contact" data-motion="transition-fade-0" data-duration="0.5s">
            <h5>Contact</h5>
            <ul>
                <li>
                    <a href="<?php echo $GLOBALS['urlPath']; ?>content/cv/cv-2/dm-cv-2-english-public-compressed.pdf" target="_blank">
                        <?php SVGRenderer::renderSVG('chevron-right'); ?>
                        <?php SVGRenderer::renderSVG('resume'); ?>
                        <span>CV English</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $GLOBALS['urlPath']; ?>content/cv/cv-2/dm-cv-2-romana-public-compressed.pdf" target="_blank">
                        <?php SVGRenderer::renderSVG('chevron-right'); ?>
                        <?php SVGRenderer::renderSVG('resume'); ?>
                        <span>CV Romanian</span>
                    </a>
                </li>
                <li>
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSdkMKYQyLa4H7yxU7RMUK97urwK5LMvbk-dFs9-wKpCRCO_Ng/viewform" target="_blank">
                        <?php SVGRenderer::renderSVG('chevron-right'); ?>
                        <?php SVGRenderer::renderSVG('form'); ?>
                        <span>Contact Form</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="dm-footer-catalog" data-motion="transition-fade-0" data-duration="0.5s">
            <h5>Catalog</h5>
            <ul>
                <li>
                    <a href="web-development-projects.html">
                        <?php SVGRenderer::renderSVG('chevron-right'); ?>
                        <span>Web Development Projects</span>
                    </a>
                </li>
                <li>
                    <a href="visual-media-projects.html">
                        <?php SVGRenderer::renderSVG('chevron-right'); ?>
                        <span>Visual Media Projects</span>
                    </a>
                </li>
                <li>
                    <a href="miscellaneous-projects.html">
                        <?php SVGRenderer::renderSVG('chevron-right'); ?>
                        <span>Miscellaneous Projects</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="dm-socials-footer" data-motion="transition-fade-0" data-duration="0.5s">
            <h5>Socials</h5>
            <div class="dm-socials-list" data-socials="circle-light-2">
                <a href="https://www.youtube.com/channel/UCZGb7hnkyawMgnSO9T-rnnQ" target="_blank">
                    <?php SVGRenderer::renderSVG('socials-youtube'); ?>
                </a>
                <a href="https://www.facebook.com/denismarginas09" target="_blank">
                    <?php SVGRenderer::renderSVG('socials-facebook'); ?>
                </a>
                <a href="https://www.linkedin.com/in/denismarginas09/" target="_blank">
                    <?php SVGRenderer::renderSVG('socials-linkedin'); ?>
                </a>
                <a href="https://twitter.com/DenisMarginas" target="_blank">
                    <?php SVGRenderer::renderSVG('socials-twitter'); ?>
                </a>
                <a href="https://sites.google.com/view/denis-marginas" target="_blank">
                    <?php SVGRenderer::renderSVG('socials-google-site'); ?>
                </a>
                <a href="https://github.com/denismarginas" target="_blank">
                    <?php SVGRenderer::renderSVG('socials-github'); ?>
                </a>
            </div>
        </div>
        <div class="dm-footer-copyrights" data-motion="transition-fade-0" data-duration="0.5s">
            <span>Begining of the webiste: 04.06.2023</span>
            <span>Last update of webiste: <?php echo date("d.m.Y") ?></span>
            <span>©All copyrights reserved by Denis Marginas</span>
        </div>
    </section>
</footer>
</body>
</html>