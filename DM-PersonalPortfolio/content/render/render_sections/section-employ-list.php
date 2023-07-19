<?php
$employs = [
                [
                    "name" => "Pia Soft Product",
                    "img" => "content/img/catalog/piasoftproduct/logo/logo.png",
                    "img_bg" => "dark",
                    "url_web" => "https://www.piasoftproduct.com",
                    "date_start" => "16.10.2019",
                    "date_end" => "18.11.2022",
                    "function" => [
                        "Full-Stack Web Developer",
                        "Photo-Video Editor"
                    ],
                    "work_attributes" => [
                            "Developed and maintained web applications, troubleshooting, creating documentation, cPanel management, phpmyAdmin, XAMPP, and hosting with Romarg",
                            "Proficient in utilizing TPL, PHP, SQL, JavaScript, jQuery, CSS, and HTML for application development and usage",
                            "Create presentation sites and online stores in Wordpress and Prestashop, with a focus on optimizing SEO",
                            "Create video-photo content for promotional purposes, including banners, logos, video ads, 2D/3D animation, using tools such as Sony Vegas, Adobe After Effects, Photopea, and Xara Photo",
                            "Skilled in using the Windows operating system and the Office suite"
                    ],
                ],
                [
                    "name" => "Netex Romania",
                    "img" => "content/img/catalog/netexromania/logo/logo.png",
                    "img_bg" => "light",
                    "url_web" => "https://www.netex.ro",
                    "date_start" => "07.12.2021",
                    "date_end" => "05.04.2023",
                    "function"  => ["Front-End Developer"],
                    "work_attributes" => [
                        "Developed and maintained WordPress sites, troubleshooting, creating documentation",
                        "Designed various web applications, including Newsletter Mail",
                        "Translated design from Zeplin into static pages using: Node.js, JavaScript, jQuery, Bootstrap, SASS, CSS and HTML, GitLab",
                        "Attend conferences in English and present completed tasks on Google Meet",
                        "Familiar with Linux commands and interface, as well as working with the LibreOffice package"
                    ]
                ],
                [
                    "name" => "Enlivy",
                    "img" => "content/img/catalog/enlivy/logo/logo.png",
                    "img_bg" => "dark",
                    "url_web" => "https://enlivy.ro",
                    "date_start" => "01.05.2023",
                    "date_end" => "31.05.2023",
                    "function"  => ["Junior Wordpress Developer"],
                    "work_attributes" => [
                        "Developed blocks and pages for a custom WordPress theme using PhpStorm and GitHub",
                        "Translated designs from a Figma project into functional web pages",
                        "Utilized Trello for task management and Slack, along with Zoom, for efficient team communication",
                        "Utilized Prepros 7 to compile the SCSS code for streamlined development"
                    ]
                ]
          ];

?>


<section class="dm-employs grid-background-animation">
    <container>
        <ul>
            <?php foreach ($employs as $employ) : ?>
                <li class="dm-employ" id="<?php echo strtolower(str_replace(" ", "-", $employ["name"])); ?>">
                    <ul>
                        <li class="work-summary"
                            <?php if( $employ["img_bg"] == "dark" ) :
                                    echo "data-layout='dark'";
                            elseif( $employ["img_bg"] == "light" ) :
                                    echo "data-layout='light'";
                            endif; ?>
                        >
                            <div class="work-logo">
                                <?php echo renderImage($GLOBALS['urlPath'].$employ["img"]); ?>
                            </div>
                            <h2 class="company-name">
                                <?php echo $employ["name"]; ?>
                            </h2>
                            <ul class="work-dates">
                                <li><?php echo $employ["date_start"]; ?></li>
                                <li><?php echo $employ["date_end"]; ?></li>
                            </ul>
                        </li>
                        <li class="work-details">
                            <h3 class="work-function">Function:
                                <?php foreach ($employ["function"] as $work_function) : ?>
                                    <?php echo $work_function; ?>
                                <?php endforeach; ?>
                            </h3>
                            <ul class="work-attributes">
                                <?php foreach ($employ["work_attributes"] as $work_attributes) : ?>
                                    <li class="work-attribute">
                                        <?php SVGRenderer::renderSVG('chevron-right'); ?>
                                        <span>
                                            <?php echo $work_attributes; ?>
                                        </span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    </container>
</section>