<?php
$layouts = ["standard", "compress"];
$experience_text = [
  "I have knowledge and skills in these categories:",
];
$experience_list = [
        "● Web Platforms: WordPress, Prestashop, Google Site",
        "● Page builders: Elementor, WpBakery, Gutenberg",
        "● Operating systems: Windows, Linux",
        "● Languages: PHP, TPL, SQL, JS, HTML, CSS, SASS/SCSS, Python, C/C++",
        "● Libraries: jQuery 3, Bootstrap 5, Font Awesome 4, MaterialDesignWebfront",
        "● Web development programs: cPanel, HeidiSQL, phpMyAdmin, XAMPP, GitLab, GitHub, Visual Studio Code, PhpStorm, PyCharm, Node.js, Prepros, Figma",
        "● Photo editing programs: Photopea, Photoshop, Paint.net, Xara Photo, Topaz Gigapixel",
        "● Video editing programs: Adobe After Effects, Sony Vegas Pro, Topaz Enhance, BCC, RSMB, Sapphire, Ignite Pro, Optical Flares, Plexus, Particular, Element 3d, 3D Camera Tracking",
        "● 3D Programs: Blender",
        "● Streaming programs: OBS, Google Meet, Zoom",
        "● Other programs: Microsoft Excel, Microsoft Word, Microsoft PowerPoint, Google Sheet, Google Docs, Google Slides",
];
?>


<section class="dm-about dm-experience-knowledge grid-background-animation">
  <container>
    <div data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s">
      <img data-motion="transition-fade-0" data-duration="1s" data-delay="0.4s" src="<?php echo $GLOBALS['urlPath']; ?>content/img/personal-images/dm-personal-image-0.webp" width="357px" height="570px" alt="DM - Personal Image">
      <?php SVGRenderer::renderSVG('background-shape-1'); ?>
    </div>
    <div>
      <h2 data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.5s">Experience</h2>
      <?php $i = 1; foreach ($experience_text as $experience_text_item) : ?>
        <p data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.6s" data-delay="<?php echo $i*0.7; ?>s">
          <?php echo $experience_text_item; ?>
        </p>
        <?php $i++; endforeach; ?>
      <ul>
        <?php $i = 1; foreach ($experience_list as $experience_list_item) : ?>
          <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.6s" data-delay="<?php echo $i*0.11; ?>s">
            <?php echo $experience_list_item; ?>
          </li>
          <?php $i++; endforeach; ?>
      </ul>
      <?php
        $renderer = new RendererElements();
        $renderer->renderElement('knowledge-list-icons');
      ?>
        <?php if( isset($layout) && ( $layout == "standard" )) : ?>
            <div class="buttons">
                <a data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.4s" href="summary-experience.html" data-button="primary">
                    <?php SVGRenderer::renderSVG('projects'); ?>
                    <span>Summary Experience</span>
                </a>
                <a data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.4s" href="catalog.html" data-button="primary">
                    <?php SVGRenderer::renderSVG('about-me'); ?>
                    <span>Projects Catalog</span>
                </a>
                <a data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.4s" href="employ.html" data-button="primary">
                    <?php SVGRenderer::renderSVG('employ'); ?>
                    <span>Employ Experience</span>
                </a>
            </div>
        <?php endif; ?>
    </div>
  </container>
</section>

