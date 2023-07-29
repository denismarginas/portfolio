


<section class="dm-summary-experience grid-background-animation">
    <div class="dm-experience-header" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s">
        <h2>Web Development Projects</h2>
    </div>
    <div class="dm-experience-section" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s">
        <container>
            <ul>
                <li>
                    <h3>PHP/SQL/HTML/JS/CSS FORM - WORDPRESS</h3>
                    <p>Single Form Page made with PHP, HTML, CSS, JavaScript and SQL. The PHP code works in this way: You get the data from form and at the submit button it will create a database if it doesn't exist, will verify the data, all check boxes must be checked, the input fields must be non empty, one radio box must be checked, the code from invoice with the phone number must be unique and used only once in the database (in this example), the data submit must be within the set data range (begin date - end date) and the file upload must be an image in JPG, PNG or GIF format with maximum size of 40 Mb. If the conditions are met, the image file will be compressed and saved in a folder with the name of SQL table name in 'wp-content',  the data will be saved in a SQL table from data base with a URL for image, and in the final, the page will reload and instead of the form content will show a specific banner for success status.</p>
                </li>
                <li>
                    <div class="slideshow">
                        <div class="slideshow-container">
                            <div class="mySlides fade">
                                <div class="numbertext">1 / 4</div>
                                <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/promotions-contact-form-web-1.webp", true);?>
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">2 / 4</div>
                                <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/promotions-contact-form-web-2.webp", true);?>
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">3 / 4</div>
                                <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/promotions-contact-form-web-3.webp", true);?>
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">4 / 4</div>
                                <?php echo renderImage($GLOBALS['urlPath']."content/img/summary-experience/promotions-contact-form-web-4.webp", true);?>
                            </div>
                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>
                        </div>
                        <div style="text-align:center">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                            <span class="dot" onclick="currentSlide(4)"></span>
                        </div>
                    </div>

                </li>
            </ul>
            <ul>
                <li>

                </li>
                <li>
                    <p>If the conditions are not met, a specific error message will be displayed below each field, and if the invoice code was previously used in the database, a pop-up message with a specific error message will be displayed or a banner will be displayed. If the campaign has started, the submit button from the form will not appear or a banner will appear instead of the form, if the campaign is over, a banner will appear instead of the form. A button to download CSV data from data base will show if you are an admin or editor of WordPress, or if you have the credentials from code inserted in URL. The form is implemented with PHP Everywhere widget and Elementor page builder.</p>
                </li>
            </ul>
        </container>
    </div>
</section>

