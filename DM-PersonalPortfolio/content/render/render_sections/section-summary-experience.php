

<section class="dm-catalog-categories">
    <container>
        <div>
            <h2 data-motion="transition-fade-0" data-delay="0.1s">Summary Work Experience</h2>
            <h6 data-motion="transition-fade-0" data-duration="0.4s" data-delay="0.2s" style="color: var( --dm-color-white ); text-align: center; font-weight: 500;">2019 - 2022</h6>
        </div>
    </container>
    <!-- Ocean Animation Start -->

    <div class="ocean" data-motion="transition-fade-0" data-duration="4s" data-delay="0s" style="--duration: 4s; --delay: 0s;">
        <div class="wave" style="margin-top: 65px;"></div>
        <div class="wave" style="margin-top: 70px;"></div>
        <div class="wave" style="margin-top: 80px;"></div>
    </div>

    <!-- Ocean Animation End -->
</section>
<section class="dm-summary-experience grid-background-animation">
    <div class="dm-experience-header" data-motion="transition-fade-0" data-duration="1s">
        <h2>1. Web Development Projects</h2>
    </div>
    <div class="dm-experience-section" data-motion="transition-fade-0" data-duration="1s">
        <container>
            <ul grid="2/1">
                <li>
                    <h3>PHP/SQL/HTML/JS/CSS FORM - WORDPRESS</h3>
                    <p>Single Form Page made with PHP, HTML, CSS, JavaScript and SQL. The PHP code works in this way: You get the data from form and at the submit button it will create a database if it doesn't exist, will verify the data, all check boxes must be checked, the input fields must be non empty, one radio box must be checked, the code from invoice with the phone number must be unique and used only once in the database (in this example), the data submit must be within the set data range (begin date - end date) and the file upload must be an image in JPG, PNG or GIF format with maximum size of 40 Mb. If the conditions are met, the image file will be compressed and saved in a folder with the name of SQL table name in 'wp-content',  the data will be saved in a SQL table from data base with a URL for image, and in the final, the page will reload and instead of the form content will show a specific banner for success status.</p>
                </li>
                <li>
                    <div class="slider" data-navigation="arrows dots">
                        <div class="slider-container">
                            <div class="slider-element">
                                <div class="number-text">1 / 4</div>
                                <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/promotions-contact-form-web-1.webp", true);?>
                            </div>

                            <div class="slider-element">
                                <div class="number-text">2 / 4</div>
                                <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/promotions-contact-form-web-2.webp", true);?>
                            </div>

                            <div class="slider-element">
                                <div class="number-text">3 / 4</div>
                                <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/promotions-contact-form-web-3.webp", true);?>
                            </div>

                            <div class="slider-element">
                                <div class="number-text">4 / 4</div>
                                <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/promotions-contact-form-web-4.webp", true);?>
                            </div>
                        </div>
                    </div>
                </li>
            </ul >
            <ul grid="1/2">
                <li>
                    <ul class="list-img-flex">
                        <li>
                            <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/promotions-contact-form-web-m-1.webp", true);?>
                        </li>
                        <li>
                            <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/promotions-contact-form-web-m-2.webp", true);?>
                        </li>
                        <li>
                            <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/promotions-contact-form-web-m-3.webp", true);?>
                        </li>
                    </ul>
                </li>
                <li>
                    <p>If the conditions are not met, a specific error message will be displayed below each field, and if the invoice code was previously used in the database, a pop-up message with a specific error message will be displayed or a banner will be displayed. If the campaign has started, the submit button from the form will not appear or a banner will appear instead of the form, if the campaign is over, a banner will appear instead of the form. A button to download CSV data from data base will show if you are an admin or editor of WordPress, or if you have the credentials from code inserted in URL. The form is implemented with PHP Everywhere widget and Elementor page builder.</p>
                </li>
            </ul>
            <hr>
            <ul grid="2/1">
                <li>
                    <h3>UPLOAD PAID ARTICLES - WORDPRESS</h3>
                    <p>This project have a custom PHP code integrated with 2 modules that which allows you uploading files depending on the number of uploads or depending on the subscription. The number of uploads and subscriptions can be purchased with payment by card. The files accepted by the administrator will be displayed on the site and stored in a SQL database. </p>
                    <p><b>Modules used:</b> Elementor, PHP Everywhere, WooCommerce, WooCommerce Points and Rewards, WooCommerce Memberships</p>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/upload-paid-articles-1.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/upload-paid-articles-2.webp", true);?>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/upload-paid-articles-3.webp", true);?>
                </li>
            </ul>
            <hr>
            <ul grid="2/1">
                <li>
                    <h3>AUTOCOMPLET FORM - PRESTASHOP</h3>
                    <p>This is the Contact Form 7 module, but modified (with PHP, TPL and JavaScript), so that it takes over the user's data: name, email, phone and automatically fills them in the form. On the product page is displayed a button to request an offer, and it displays the form form but autocompletes the message field with a text containing the name of the desired product "I want to receive an offer for this product: product-name".</p>
                    <p><b>Modules used:</b> Elementor, Contact Form 7, Boom Custom CSS and Javascript</p>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/prestashop-ctf7-autocomplet-data.webp", true);?>
                </li>
            </ul >
            <hr>
            <ul grid="2/1">
                <li>
                    <h3>WEB DESIGN - STATIC WEB PAGES</h3>
                    <p>For this project, I hosted a local server with Node.js and I recreated the design from image templates provided, in static web pages using HTML, CSS, SASS, Bootstrap, JavaScript, and jQuery.</p>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/webdesign-html-and-scss-1.webp", true);?>
                </li>
            </ul >
            <hr>
            <ul grid="2/1">
                <li>
                    <h3>SEO OPTIMIZATION - PRESTASHOP & WORDPRESS</h3>
                    <p>For some websites, I had to do SEO Optimization, with tools like Google Chrome Lighthouse for fixing errors, adding meta titles, meta descriptions, and keywords for pages, fixing hreflang links, fixing alt images, fixing multiple h1 tags, performance increase where is possible, CSS and JS code inline, adding robots.txt, generate pages map, and indexing on Google Search Console.</p>
                    <p>Projects: <a href="https://agromir.ro/">www.agromir.ro</a>, <a href="https://agramix.ro/">www.agramix.ro</a>, <a href="https://www.revelnail.ro/">www.revelnail.ro</a>.</p>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/seo-optimization-1.webp", true);?>
                </li>
            </ul >
            <hr>
            <ul grid="2/1">
                <li>
                    <h3>EXPORT PRODUCTS FEED - PRESTASHOP</h3>
                    <p>With this PHP script you can export all products with name, url, images, price, stock, description, summary, ean13. It is not optimized for products with combinations. Can be use as a feed with a cron job.</p>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/prestashop-feed-export-1.webp", true);?>
                </li>
            </ul >
            <hr>
            <ul grid="2/1">
                <li>
                    <h3>IMPORT PRODUCTS FROM FEED - PRESTASHOP</h3>
                    <p>Add products to the Prestashop 1.7 website from a CSV feed, create products, set stock, create categories, brand, disable if the scripts can't find the products in CSV anymore. This import is made with 2 PHP scripts that are used as cron jobs in cPanel, but can be use with a cron module to.</p>
                    <p>These 2 scripts make stock synchronization possible of 2 stores, in other words it takes the data from feed, feed provided from the <a href="https://globiz.ro/">globiz.ro</a> store and is used at the lavmag.ro store.</p>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/prestashop-custom-import-feed-php-script.webp", true);?>
                </li>
            </ul >
            <hr>
            
        </container>
    </div>
    <div class="dm-experience-header" data-motion="transition-fade-0" data-duration="1s">
        <h2>2. Video Editing Projects</h2>
    </div>
    <div class="dm-experience-section" data-motion="transition-fade-0" data-duration="1s">
        <container>
        <ul grid="3">
                <li>
                    <?php echo renderVideo($GLOBALS['urlPath']."content/vid/projects/casadarius-shop/videos_1/casadarius_3.mp4",$GLOBALS['urlPath']."content/img/projects/casadarius-presentation/logo/logo.png", $GLOBALS['urlPath']."content/img/thumbnails/workpreview-overlay-thumbnail.webp"); ?>
                </li>
                <li>
                    <?php echo renderVideo($GLOBALS['urlPath']."content/vid/projects/agromir/videos_1/agromir_7.webm",$GLOBALS['urlPath']."content/img/projects/agromir/logo/logo.png", $GLOBALS['urlPath']."content/img/thumbnails/workpreview-overlay-thumbnail.webp"); ?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/video-editing-agromir-1.webp", true);?>
                </li>
        </ul>
        <ul grid="3">
                <li>
                    <?php echo renderVideo($GLOBALS['urlPath']."content/vid/projects/busvip/videos_2/busvip_3.mp4",$GLOBALS['urlPath']."content/img/projects/busvip/logo/logo.png", $GLOBALS['urlPath']."content/img/thumbnails/workpreview-overlay-thumbnail.webp"); ?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/video-editing-busvip-1.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/video-editing-busvip-2.webp", true);?>
                </li>
        </ul>
        <ul grid="3">
                <li>
                    <?php echo renderVideo($GLOBALS['urlPath']."content/vid/projects/busvip/videos_3/busvip_2.mp4",$GLOBALS['urlPath']."content/img/projects/busvip/logo/logo.png", $GLOBALS['urlPath']."content/img/thumbnails/workpreview-overlay-thumbnail.webp"); ?>               
                 </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/video-editing-busvip-3.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/video-editing-busvip-4.webp", true);?>
                </li>
        </ul>
        <ul grid="3">
                <li>
                    <?php echo renderVideo($GLOBALS['urlPath']."content/vid/projects/dsautocenter/dsautocenter_1.mp4",$GLOBALS['urlPath']."content/img/projects/dsautocenter/logo/logo.png", $GLOBALS['urlPath']."content/img/thumbnails/workpreview-overlay-thumbnail.webp"); ?>               
                </li>
                <li>
                    <?php echo renderVideo($GLOBALS['urlPath']."content/vid/projects/revelnail-avadores/videos_2/avadores_4.mp4",$GLOBALS['urlPath']."content/img/projects/revelnail-avadores/logo/logo.png", $GLOBALS['urlPath']."content/img/thumbnails/workpreview-overlay-thumbnail.webp"); ?>                
                </li>
                <li>
                    <?php echo renderVideo($GLOBALS['urlPath']."content/vid/projects/agromir/videos_3/agromir_4.webm",$GLOBALS['urlPath']."content/img/projects/agromir/logo/logo.png", $GLOBALS['urlPath']."content/img/thumbnails/workpreview-overlay-thumbnail.webp"); ?>
                </li>
        </ul>
        <ul grid="3">
                <li>
                    <?php echo renderVideo($GLOBALS['urlPath']."content/vid/projects/strikerproduction/csgo/NoMercy_CSGO.webm",$GLOBALS['urlPath']."content/img/projects/strikerproduction/logo/logo.png", $GLOBALS['urlPath']."content/img/thumbnails/workpreview-overlay-thumbnail.webp"); ?>               
                </li>
                <li>
                    <?php echo renderVideo($GLOBALS['urlPath']."content/vid/projects/strikerproduction/pubg/SleeplessNight_PUBG.webm",$GLOBALS['urlPath']."content/img/projects/strikerproduction/logo/logo.png", $GLOBALS['urlPath']."content/img/thumbnails/workpreview-overlay-thumbnail.webp"); ?>                
                </li>
                <li>
                    <?php echo renderVideo($GLOBALS['urlPath']."content/vid/projects/strikerproduction/rust/CoverYourEyes_Rust.webm",$GLOBALS['urlPath']."content/img/projects/strikerproduction/logo/logo.png", $GLOBALS['urlPath']."content/img/thumbnails/workpreview-overlay-thumbnail.webp"); ?>
                </li>
        </ul>
        </container>
    </div>
    <div class="dm-experience-header" data-motion="transition-fade-0" data-duration="1s">
        <h2>3. Photo Editing Projects</h2>
    </div>
    <div class="dm-experience-section" data-motion="transition-fade-0" data-duration="1s">
        <container>
        <ul grid="3">
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-1.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-2.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-3.webp.webp", true);?>
                </li>
        </ul>
        <ul grid="3">
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-4.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-5.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-6.webp.webp", true);?>
                </li>
        </ul>
        <ul grid="3">
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-7.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-8.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-9.webp.webp", true);?>
                </li>
        </ul>
        <ul grid="3">
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-10.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-11.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-12.webp.webp", true);?>
                </li>
        </ul>
        <ul grid="3">
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-13.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-14.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-15.webp.webp", true);?>
                </li>
        </ul>
        <ul grid="3">
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-16.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-17.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-banner-18.webp.webp", true);?>
                </li>
        </ul>
        <ul grid="4">
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-logo-1.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-logo-2.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-logo-3.webp.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/photo-editing-logo-4.webp.webp", true);?>
                </li>
        </ul>
        </container>
    </div>
    <div class="dm-experience-header" data-motion="transition-fade-0" data-duration="1s">
        <h2>4. 3D EDITING</h2>
    </div>
    <div class="dm-experience-section" data-motion="transition-fade-0" data-duration="1s">
        <container>
        <ul grid="2/1">
                <li>
                    <h3>TIRE ANIMATION - BLENDER</h3>
                    <p>Simple animation made in Blender with free 3d tire objects for a video advertisement.</p>
                </li>
                <li>
                    <?php echo renderVideo($GLOBALS['urlPath']."content/vid/projects/agromir/videos_2/agromir_5.webm",$GLOBALS['urlPath']."content/img/projects/agromir/logo/logo.png", $GLOBALS['urlPath']."content/img/thumbnails/workpreview-overlay-thumbnail.webp"); ?>
                </li>
            </ul>
            <ul grid="3">
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/3d-editing-blender-agromir-1.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/3d-editing-blender-agromir-2.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/3d-editing-blender-agromir-3.webp", true);?>
                </li>
            </ul>
            <ul grid="3">
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/3d-editing-blender-4.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/3d-editing-blender-5.webp", true);?>
                </li>
                <li>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/3d-editing-blender-1.webp", true);?>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/3d-editing-blender-2.webp", true);?>
                    <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/3d-editing-blender-3.webp", true);?>
                </li>
            </ul>
        </container>
    </div>
</section>

