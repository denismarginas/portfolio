<?php if (isset($post_current_data)) : ?>
    <?php $post_data = $post_current_data; ?>
    <section class="dm-workstation-post grid-background-animation"
        <?php if( !empty($layout) ) : ?>
            data-layout="<?php echo $layout; ?>"
        <?php endif; ?>
    >
        <container>
            <ul class="content"
                <?php if (isset($post_data["style"]) && !empty($post_data["style"])):
                    $styles = '';

                    foreach ($post_data["style"] as $style_key => $style_value) :
                        $styles .= $style_key . ': ' . $style_value . ';';
                    endforeach; ?>

                    style="<?php echo $styles; ?>"

                <?php else: ?>
                    style="--w-color-primary: var( --dm-color-primary );
                           --w-color-secondary: var( --dm-color-secondary );
                           --w-text-color-on-bg: var( --dm-color-white );
                           --w-title-font:  var( --dm-font-family-secondary );
                           --w-text-font: var( --dm-font-family-primary );"
                <?php endif; ?>
            >
                <?php $renderer_elements = new RendererElements(); ?>

                <?php if (isset($post_data["content"]) && is_array($post_data["content"])) :
                    foreach ($post_data["content"] as $post_content_element) : ?>
                        <li class="element">
                            <?php
                            if (is_array($post_content_element)) :
                                foreach ($post_content_element as &$element) :
                                    if ($element === "post_data") :
                                        $element = ['post_data' => $post_data];
                                    endif;
                                endforeach;
                                call_user_func_array([$renderer_elements, 'renderElement'], $post_content_element);
                            else :
                                $renderer_elements->renderElement($post_content_element);
                            endif;
                            ?>
                        </li>
                    <?php endforeach;
                endif; ?>

            </ul>
        </container>
    </section>

<?php endif; ?>



