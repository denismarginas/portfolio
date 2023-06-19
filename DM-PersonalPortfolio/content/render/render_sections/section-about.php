<?php
$layouts = ["standard", "compress"];
$about_text = [
                "My name is Denis Ionuț Mărginaș, I'm 25-year-old, and I've been working as a full-stack web developer and photo-video editor since 2019. Before entering the web development field, I worked as a freelance video editor, specializing in editing videos for video games. After completing my university studies in Mathematics and Informatics, I shifted my focus to web development and began pursuing a career in that field.",
                "In 2019, I joined Pia Soft Product as a web developer and video-photo editor. During my time there, I worked on various tasks, including creating presentation websites and online shops using platforms like WordPress and Prestashop. I also handled SEO optimization, website and host maintenance, customer communication, and designing banners, logos, and video advertisements. Working independently on my tasks, I took the initiative to learn from scratch, except for my prior experience in video editing. Additionally, I developed web applications using PHP, TPL, SQL, JavaScript, jQuery, HTML, CSS, and more.",
                "Towards the end of 2021, I transitioned to working full time at Netex Romania, where I was hired as a front-end developer. My responsibilities involved maintaining multiple WordPress websites and working on web design projects. The web design aspect was particularly challenging as I received templates and page sections in formats, similar to Figma projects, and had to recreate them as static web pages using HTML, SASS, Node.js, Bootstrap, JavaScript, and jQuery. Initially, I worked independently on my part of the project, but later collaborated with a colleague who joined to assist with the same project. During this time, I gained valuable experience with the GitLab platform, learned Git commands, and improved my teamwork skills.",
              ];
?>


<section class="dm-about grid-background-animation"
        <?php if( !empty($layout) ) : ?>
         data-layout="<?php echo $layout; ?>"
        <?php endif; ?>
    >
    <container>
        <div data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s">
            <img data-motion="transition-fade-0" data-duration="1s" data-delay="0.4s" src="<?php echo $GLOBALS['urlPath']; ?>content/img/personal-images/dm-personal-image-1.png" width="357px" height="570px" alt="DM - Personal Image">
            <?php SVGRenderer::renderSVG('background-shape-1'); ?>
            <span data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s" data-delay="0.5s"></span>
        </div>
        <div>
            <h2 data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.5s">About</h2>
            <?php $i = 1; foreach ($about_text as $about_text_item) : ?>
                <p data-motion="transition-fade-0 transition-slideInLeft-0">
                    <?php echo $about_text_item; ?>
                </p>
                <?php if( $layout == "compress" ) : ?>
                    <a data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.4s" href="about.html" data-button="primary">More Details</a>
                    <?php break;?>
                <?php endif; ?>
            <?php $i++; endforeach; ?>
            <?php if( $layout == "standard" ) :
                $renderer = new RendererElements();
                $renderer->renderElement('knowledge-list-icons');
            endif; ?>
        </div>
    </container>
</section>

