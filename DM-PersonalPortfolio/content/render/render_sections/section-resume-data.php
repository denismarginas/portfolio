<?php
$cv_list = [
            [
                "name" => "Resume #2 English",
                "image" => "content/cv/cv-2/dm-cv-2-english-public-thumbnail.webp",
                "pdf" => "content/cv/cv-2/dm-cv-2-english-public-compressed.pdf",
                "date" => "Jun 3, 2023",
                "description" => "CV - Model 2"
            ],
            [
                "name" => "Resume #2 Romanian",
                "image" => "content/cv/cv-2/dm-cv-2-romana-public-thumbnail.webp",
                "pdf" => "content/cv/cv-2/dm-cv-2-romana-public-compressed.pdf",
                "date" => "Jun 3, 2023",
                "description" => "CV - Model 2"
            ],
            [
                "name" => "Resume #1 English",
                "image" => "content/cv/cv-1/dm-cv-1-english-public-thumbnail.webp",
                "pdf" => "content/cv/cv-1/dm-cv-1-english-public-compressed.pdf",
                "date" => "Jun 3, 2023",
                "description" => "CV - Model 1"
            ],
            [
                "name" => "Resume #1 Romanian",
                "image" => "content/cv/cv-1/dm-cv-1-romana-public-thumbnail.webp",
                "pdf" => "content/cv/cv-1/dm-cv-1-romana-public-compressed.pdf",
                "date" => "Jun 3, 2023",
                "description" => "CV - Model 1"
            ]
           ];

$cv_text = [
            "I am a skilled professional with expertise in web development and programming. With a strong foundation in various web platforms and programming languages, I possess the ability to create dynamic and user-friendly websites. My proficiency extends to page builders and web development programs, enabling me to design and customize web pages effectively.",
            "I have experience working with a range of software and tools, including photo editing and video editing programs. My knowledge extends to streaming programs and other widely used applications, such as Microsoft Office and Google Suite.",
            "With a strong technical aptitude and adaptability, I am confident in my ability to contribute to innovative projects and deliver exceptional results. I am eager to leverage my skills and experiences to make a meaningful impact."
            ];
?>


<section class="dm-resume-data">
    <container>
        <ul>
            <li>
                <ul>
                    <?php $i = 1; foreach ($cv_list as $cv_item) : ?>
                        <li class="resume-card" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.<?php echo 1 + $i; ?>s">
                            <div>
                                <?php if(isset($cv_item['image'])) : ?>
                                    <span>
                                        <img width="100" height="141" src="<?php echo $GLOBALS['urlPath'] . $cv_item['image']; ?>" loading="lazy" data-popup="true" alt="CV Image">
                                        <?php SVGRenderer::renderSVG('resume'); ?>
                                    </span>
                                <?php endif; ?>

                                <div>
                                    <?php if(isset($cv_item['pdf']) && isset($cv_item['name'])) : ?>
                                        <a href="<?php echo $GLOBALS['urlPath'] . $cv_item['pdf']; ?>" target="_blank"><?php echo $cv_item['name']; ?></a>
                                    <?php endif; ?>

                                    <?php if(isset($cv_item['description'])) : ?>
                                        <span><?php echo $cv_item['description']; ?></span>
                                    <?php endif; ?>

                                    <?php if(isset($cv_item['date'])) : ?>
                                        <span><?php echo $cv_item['date']; ?></span>
                                    <?php endif; ?>

                                    <?php if(isset($cv_item['pdf'])) : ?>
                                        <button data-button="success" class="downloadButton" data-url="<?php echo $GLOBALS['urlPath'] . $cv_item['pdf']; ?>">Download</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                    <?php $i++; endforeach; ?>
                </ul>
            </li>
            <li>
                <div>
                    <img data-motion="transition-fade-0 transition-slideInLeft-0" width="500" height="300" src="<?php echo $GLOBALS['urlPath']; ?>content/img/personal-images/dm-desktop-working.webp" alt="DM - Working On Desktop">
                </div>
                <div>
                    <?php $i = 1; foreach ($cv_text as $cv_text_item) : ?>
                        <p data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.<?php echo 1 + $i; ?>s"><?php echo $cv_text_item; ?></p>
                    <?php $i++; endforeach; ?>
                </div>
            </li>
        </ul>
    </container>
</section>
