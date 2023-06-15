<!doctype html>
<html lang="en">
<?php @include("head.php"); ?>
<body id="body">
<header id="header">
    <section>
        <div class="dm-logo">
            <a href="#" class="dm-logo-img">
                <img data="dm-logo-front" src="<?php echo $GLOBALS['urlPath']; ?>content/img/logo/logo.png" alt="Denis Marginas Personal Icon">
            </a>
            <a href="home.html" class="dm-logo-text">
                <span>Denis</span>
                <span>Marginas</span>
            </a>
        </div>
        <div class="dm-menu">
            <ul>
                <li>
                    <a href="home.html">Home</a>
                </li>
                <li>
                    <a href="experience.html">Experience</a>
                </li>
                <li>
                    <a href="portfolio.html">Portfolio</a>
                </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
            <div class="dm-menu-utility">
                <span class="dm-search">
                    <?php SVGRenderer::renderSVG('search'); ?>
                </span>
                <label class="dm-toggletheme">
                    <input type="checkbox" id="toggleTheme">
                    <span>
                        <?php SVGRenderer::renderSVG('sun'); ?>
                    </span>
                </label>
            </div>
        </div>
        <span class="dm-navbar-toggle">
            <?php SVGRenderer::renderSVG('menu'); ?>
          </span>
    </section>
</header>

<?php
$renderer_sections = new RendererSections();
$renderer_sections->renderSection('debug');
?>

