<?php
$experience_categories = [
                            [
                                "type" => "page",
                                "page" => "workstation.html",
                                "name" => "Personal Workstation",
                                "svg" => "workstation"
                            ],
                            [
                                "type" => "page",
                                "page" => "employ.html",
                                "name" => "Employ Experience",
                                "svg" => "employ"
                            ],
                            [
                                "type" => "page",
                                "page" => "experience.html",
                                "name" => "Summary Experience",
                                "svg" => "projects"
                            ],
                            [
                              "type" => "page",
                              "page" => "catalog.html",
                              "name" => "Projects Experience",
                              "svg" => "about-me"
                            ]

                         ];

?>


<section class="dm-experience-categories">
    <container>
        <ul>
            <?php foreach ($experience_categories as $experience_category) : ?>

                <li class="dm-experience-category">
                    <div>
                        <?php
                        $experience_category_href = "#";
                        if( $experience_category["type"] == "page" ) :
                            $experience_category_href = $experience_category["page"];
                        else :
                            $experience_category_href = $experience_category["section"];
                        endif;
                        $experience_category["name"];

                         ?>
                        <a href="<?php echo $experience_category_href; ?>">
                            <div>
                                <?php SVGRenderer::renderSVG( $experience_category["svg"]); ?>
                            </div>
                            <span><?php echo $experience_category["name"]; ?></span>
                            <img src="<?php echo $GLOBALS['urlPath']; ?>content/img/design-elements/overlay-texture-paper.webp" alt="Background">
                        </a>
                    </div>
                </li>

            <?php endforeach; ?>
        </ul>
    </container>
</section>