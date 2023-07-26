<!doctype html>
<html lang="en">
<?php @include("head.php"); ?>
<body id="body">
<header id="header">
    <section>
        <div class="dm-logo">
            <a href="home.html" class="dm-logo-img">
                <img data="dm-logo-front" width="50" height="50" src="<?php echo $GLOBALS['urlPath']; ?>content/img/logo/logo.webp" alt="Denis Marginas Personal Icon">
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
                  <ul class="dm-submenu">
                    <li>
                      <a href="about.html">About Me</a>
                    </li>
                    <li>
                      <a href="workstation.html">Personal Workstation</a>
                    </li>
                  </ul>
                </li>
                <li>
                    <a href="experience.html">Experience</a>
                    <ul class="dm-submenu">
                      <li>
                        <a href="employ.html">Employ Experience</a>
                      </li>
                      <li>
                        <a href="summary-experience.html">Projects Experience</a>
                      </li>
                    </ul>
                </li>
              <li>
                <a href="catalog.html">Catalog</a>
                <ul class="dm-submenu">
                  <li>
                    <a href="web-development-projects.html">Web Development</a>
                  </li>
                  <li>
                    <a href="visual-media-projects.html">Visual Media</a>
                  </li>
                  <li>
                    <a href="miscellaneous-projects.html">Miscellaneous</a>
                  </li>
                </ul>
              </li>
                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
            <div class="dm-menu-utility">
                <a href="search.html" class="dm-search">
                    <?php SVGRenderer::renderSVG('search'); ?>
                </a>
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

