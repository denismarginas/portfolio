

<section class="dm-blog-posts grid-background-animation">
    <container>
        <div class="dm-blog-post">
            <div class="dm-blog-post-user-data">
                <div class="dm-blog-post-user-logo">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/catalog/denismarginas/media/logo/logo.webp"); ?>
                </div>
                <div class="dm-blog-post-information">
                    <h5 class="dm-blog-post-user-name">Denis Marginas</h5>
                    <p class="dm-blog-post-date"><?php echo DateTime::createFromFormat('d-m-Y', '06-12-2022')->format('j F, Y'); ?></p>
                </div>
            </div>
            <div class="dm-blog-post-content">
                <div class="dm-blog-post-content-text">
                    <p>My full name is Mărginaș Denis Ionuț, I am 25 years old, and I've been working as a front-end web developer and photo-video editor since 2019. I started the first time to work after I finished the university, Math-Informatics profile, till then, I had some hobbies like video editing with cinematics in video games, and I make even freelancing with this hobby. In 2019 I started to work at Pia Soft Product as a web developer and video-photo editor. There I made presentation websites and online shops on platforms like WordPress and Prestashop, SEO optimization, website, and host maintenance, talks with customers, banners, logos, and video advertisements. At this job I had to work alone on my part, which meant I had to learn everything alone from 0, besides the video editing part. Also, I develop web applications in PHP, TPL, SQL, JavaScript, jQuery, HTML, CSS, and more. From the end of 2021, the first job became part-time, at 4 hours, and I started to work full time this time at Netex Romania. Here I was hired as a front-end developer, and I had to do maintenance on a few websites in WordPress and web design. The web design part was more complex, I got templates of pages in a different format, similar to photo, and page section parts, with few instructions, and I had to recreate them in static web pages using HTML, SASS, Node.js, Bootstrap, JavaScript and jQuery. The project was big, so I started the first time to work alone on my part of it, but also I had meetings with the back-end developers team, and a few months later, a new colleague came to help me on the same part of the project. There I learned for the first time the GitLab platform, git commands, and most importantly teamwork.</p>
                </div>
                <div class="dm-blog-post-content-buttons">
                    <a data-button="primary" target="_blank" href=<?php echo $GLOBALS['urlPath']."content/cv/cv-1/dm-cv-1-english-public-compressed.pdf"; ?>><?php SVGRenderer::renderSVG('pdf'); ?><span>CV English</span></a>
                    <a data-button="primary" target="_blank" href=<?php echo $GLOBALS['urlPath']."content/cv/cv-1/dm-cv-1-romana-public-compressed.pdf"; ?>><?php SVGRenderer::renderSVG('pdf'); ?><span>CV Romanian</span></a>
                </div>
                <div class="dm-blog-post-content-media">
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/catalog/denismarginas/media/backgrounds/wallpaper.webp", true); ?>
                </div>
            </div>
        </div>
        <?php

        // Assume $jsonBlogData is your JSON data
        // Assuming content-blog.js is in the same directory as this PHP file
        $jsonFilePath = __DIR__ . '/../../../themes/dm-theme/assets/js/content-blog-index.json';

        // Read the JSON data from the file
        $jsonData = file_get_contents($jsonFilePath);

        // Convert the JSON data into a PHP variable
        $jsonBlogData = json_decode($jsonData, true);

        // Check if decoding was successful
        var_dump($jsonBlogData);


        ?>
    </container>
</section>