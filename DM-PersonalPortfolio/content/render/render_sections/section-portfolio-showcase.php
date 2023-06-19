<section class="dm-portfolio-showcase grid-background-animation">
    <container>
        <ul>
            <li>
                <?php
                $videoPath = MediaPath::getUrlPaths()['page'] . 'content/vid/personal-portfolio/personal-portfolio.mp4';
                VideoRenderer::Video($videoPath);
                ?>

            </li>
            <li>
                <h2 data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.7s" data-delay="0s">
                    Portfolio Showcase
                </h2>
                <p data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s" data-delay="0.1s">
                    Experience a captivating journey through my professional work from 2019 to 2023 in this short video. From a captivating intro to web development, photo editing, and video editing, witness my diverse expertise in just under two minutes.
                </p>
                <a class="dm-watch-on-youtube" href="https://www.youtube.com/watch?v=ilz2avyGG_U" target="_blank">
                    <?php SVGRenderer::renderSVG('socials-youtube'); ?>
                    <span>Watch on YouTube</span>
                </a>
                <div>
                    <p>Video Timeline:</p>
                    <ul>
                        <li>
                            <?php SVGRenderer::renderSVG('chevron-right'); ?>
                            <span>00:00 - 00:04 - Intro</span>
                        </li>
                        <li>
                            <?php SVGRenderer::renderSVG('chevron-right'); ?>
                            <span>00:04 - 00:55 - Web Development</span>
                        </li>
                        <li>
                            <?php SVGRenderer::renderSVG('chevron-right'); ?>
                            <span>00:55 - 01:14 - Photo Editing</span>
                        </li>
                        <li>
                            <?php SVGRenderer::renderSVG('chevron-right'); ?>
                            <span>01:14 - 01:52 - Video Editing</span>
                        </li>
                        <li>
                            <?php SVGRenderer::renderSVG('chevron-right'); ?>
                            <span>01:52 - 01:56 - Otro</span>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </container>
</section>