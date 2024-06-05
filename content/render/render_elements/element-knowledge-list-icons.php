<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jsonDataKnowledgeItems)) :
    $jsonDataKnowledgeItems = getDataJson('data-content-personal', 'data')["experience"]["knowledge-lists-items"];
endif;

?>


<div class="dm-knowledge-lists-icons">
    <?php if(isset($jsonDataKnowledgeItems) && !empty($jsonDataKnowledgeItems)) : ?>
        <ul>
            <?php $i = 1; foreach ($jsonDataKnowledgeItems as $knowledge_item) : ?>

                <li data-motion="transition-fade-0 transition-slideInRight-0" data-duration="<?php echo 0.04 * $i; ?>s">

                    <?php if(!isset($knowledge_item['url'])) : ?>
                        <a href="#">
                    <?php else: ?>
                        <a href="<?php echo $knowledge_item['url']; ?>" target="_blank">
                     <?php endif; ?>

                    <a href="<?php echo $knowledge_item['url']; ?>" target="_blank">
                        <?php SVGRenderer::renderSVG($knowledge_item['icon']); ?>
                    </a>
                </li>

            <?php $i++; endforeach; ?>
        </ul>
    <?php endif; ?>

</div>
