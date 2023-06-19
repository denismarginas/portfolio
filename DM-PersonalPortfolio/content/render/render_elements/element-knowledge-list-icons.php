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
                    ]
                   ];

?>

<div class="dm-knowledge-lists-icons">
    <ul>
        <?php $i = 1; foreach ($knowledge_lists as $knowledge_item) : ?>
            <li class="-icon" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.<?php echo 1 + $i; ?>s">
                <a href="<?php echo $knowledge_item['url']; ?>" target="_blank">
                    <?php SVGRenderer::renderSVG($knowledge_item['icon']); ?>
                </a>
            </li>
            <?php $i++; endforeach; ?>
    </ul>
</div>
