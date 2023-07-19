<?php
$knowledge_lists = [
                        [
                            'icon' => 'wordpress',
                            'url' => 'https://wordpress.org/',
                            'title' => 'Wordpress'
                        ],
                        [
                            'icon' => 'prestashop',
                            'url' => 'https://prestashop.com/',
                            'title' => 'Prestashop'
                        ],
                        [
                            'icon' => 'html',
                            'url' => 'https://en.wikipedia.org/wiki/HTML',
                            'title' => 'HTML'
                        ],
                        [
                            'icon' => 'css',
                            'url' => 'https://en.wikipedia.org/wiki/CSS',
                            'title' => 'CSSS'
                        ],                        [
                            'icon' => 'js',
                            'url' => 'https://en.wikipedia.org/wiki/JavaScript',
                            'title' => 'Java Script'
                        ],
                        [
                            'icon' => 'bootstrap',
                            'url' => 'https://getbootstrap.com/',
                            'title' => 'Bootstrap'
                        ],
                        [
                            'icon' => 'jquery',
                            'url' => 'https://jquery.com/',
                            'title' => 'jQuery'
                        ],
                        [
                            'icon' => 'nodejs',
                            'url' => 'https://nodejs.org/en',
                            'title' => 'Node JS'
                        ],
                        [
                            'icon' => 'sass',
                            'url' => 'https://sass-lang.com/',
                            'title' => 'SASS'
                        ],
                        [
                            'icon' => 'php',
                            'url' => 'https://www.php.net/',
                            'title' => 'PHP'
                        ],
                        [
                            'icon' => 'tpl',
                            'url' => 'https://www.smarty.net/docs/en/what.is.smarty.tpl',
                            'title' => 'TPL Smarty'
                        ],
                        [
                            'icon' => 'c++',
                            'url' => 'https://en.wikipedia.org/wiki/C%2B%2B',
                            'title' => 'C++'
                        ],
                        [
                            'icon' => 'c',
                            'url' => 'https://en.wikipedia.org/wiki/C_(programming_language)',
                            'title' => 'C'
                        ],
                        [
                            'icon' => 'python',
                            'url' => 'https://www.python.org/',
                            'title' => 'Python'
                        ],
                        [
                            'icon' => 'sql',
                            'url' => 'https://en.wikipedia.org/wiki/SQL',
                            'title' => 'SQL'
                        ],
                        [
                            'icon' => 'xampp',
                            'url' => 'https://www.apachefriends.org/',
                            'title' => 'XAMPP'
                        ],
                        [
                            'icon' => 'phpmyadmin',
                            'url' => 'https://www.phpmyadmin.net/',
                            'title' => 'PHP My Admin'
                        ],
                        [
                            'icon' => 'vscode',
                            'url' => 'https://code.visualstudio.com/',
                            'title' => 'Visual Studio Code'
                        ],
                        [
                            'icon' => 'phpstorm',
                            'url' => 'https://www.jetbrains.com/phpstorm/',
                            'title' => 'PhpStorm'
                        ],
                        [
                            'icon' => 'pycharm',
                            'url' => 'https://www.jetbrains.com/pycharm/',
                            'title' => 'PyCharm'
                        ],
                        [
                            'icon' => 'sv',
                            'url' => 'https://www.vegascreativesoftware.com/us/vegas-pro/',
                            'title' => 'Sony Vegas'
                        ],
                        [
                            'icon' => 'ae',
                            'url' => 'https://www.adobe.com/products/aftereffects.html',
                            'title' => 'Adobe After Effects'
                        ],
                        [
                            'icon' => 'photopea',
                            'url' => 'https://www.photopea.com/',
                            'title' => 'Photopea'
                        ],
                        [
                            'icon' => 'blender',
                            'url' => 'https://www.blender.org/',
                            'title' => 'Blender'
                        ],
                        [
                            'icon' => 'office',
                            'url' => 'https://www.office.com/',
                            'title' => 'Office'
                        ],
                        [
                            'icon' => 'googledrive',
                            'url' => 'https://www.google.com/drive/',
                            'title' => 'Google Drive'
                        ],
                        [
                            'icon' => 'github_colors',
                            'url' => 'https://github.com/',
                            'title' => 'Git Hub'
                        ],
                        [
                            'icon' => 'gitlab',
                            'url' => 'https://about.gitlab.com/',
                            'title' => 'Git Lab'
                        ],

                   ];

?>

<div class="dm-knowledge-lists-icons">
    <ul>
        <?php $i = 1; foreach ($knowledge_lists as $knowledge_item) : ?>
            <li data-motion="transition-fade-0 transition-slideInRight-0" data-duration="<?php echo 0.04 * $i; ?>s">
                <a href="<?php echo $knowledge_item['url']; ?>" target="_blank">
                    <?php SVGRenderer::renderSVG($knowledge_item['icon']); ?>
                </a>
            </li>
            <?php $i++; endforeach; ?>
    </ul>
</div>
