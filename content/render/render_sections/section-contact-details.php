<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jsonContactForm)) :
    $jsonContactForm = getDataJson('data-content-personal', 'data')["contact"]["form"];
endif;

if(!isset($jsonContactSocials)) :
    $jsonContactSocials = getDataJson('data-content-personal', 'data')["socials"];
endif;

?>

<section class="dm-contact-details grid-background-animation">
    <container>
        <ul>
            <?php if(isset($jsonContactForm)) : ?>
            <li data-motion="transition-fade-0 transition-slideInRight-0">

                    <section class="dm-contact-form">
                        <h3>
                            <?php echo $jsonContactForm["title"]; ?>
                        </h3>

                        <?php if(isset($jsonContactForm["fields"])) : ?>
                            <form id="dm-form" target="_self"
                              <?php if( $jsonContactForm["external-form-url"] ) : ?>
                                data-external-form-url="<?php echo $jsonContactForm["external-form-url"]; ?>"
                                onsubmit="return contact_form_exec();"
                              <?php endif; ?>
                              <?php if( $jsonContactForm["external-form-type"] ) : ?>
                                  data-external-form-type="<?php echo $jsonContactForm["external-form-type"]; ?>"
                              <?php endif; ?>
                                action="" autocomplete="off" crossorigin="anonymous">

                                <?php $contact_form_fields = $jsonContactForm["fields"];?>
                                <?php foreach ($contact_form_fields as $contact_form_field) : ?>

                                    <?php if($contact_form_field["type"] == "text" || $contact_form_field["type"] == "input") : ?>
                                        <input id="<?php echo $contact_form_field["name"]; ?>" type="text" name="<?php echo $contact_form_field["name"]; ?>" placeholder="<?php echo $contact_form_field["placeholder"]; ?>" value=""
                                            <?php if(isset($contact_form_field["field-name-extern"]) && !empty(isset($contact_form_field["field-name-extern"]))) :
                                                echo 'field-name-extern="'.$contact_form_field["field-name-extern"].'"';
                                            endif;?>
                                        >
                                    <?php elseif($contact_form_field["type"] == "message" || $contact_form_field["type"] == "textarea") : ?>
                                        <textarea id="<?php echo $contact_form_field["name"]; ?>" type="text" name="<?php echo $contact_form_field["name"]; ?>" placeholder="<?php echo $contact_form_field["placeholder"]; ?>" value=""
                                            <?php if(isset($contact_form_field["field-name-extern"]) && !empty(isset($contact_form_field["field-name-extern"]))) :
                                                echo 'field-name-extern="'.$contact_form_field["field-name-extern"].'"';
                                            endif;?>
                                        ></textarea>

                                    <?php elseif($contact_form_field["type"] == "send" || $contact_form_field["type"] == "submit") : ?>
                                        <div>
                                            <button class="form-submit" id="<?php echo $contact_form_field["name"]; ?>" data-button="primary" data-callback='onSubmit' data-action='submit' type="submit">
                                                <?php echo $contact_form_field["value"]; ?>
                                            </button>

                                            <?php if( $jsonContactForm["external-form-url"] ) : ?>
                                                <a class="external-form-submit" href="<?php echo $jsonContactForm["external-form-url"]; ?>" data-button="primary" target="_blank">
                                                    Proceed to the form
                                                </a>
                                            <?php endif; ?>

                                        </div>
                                    <?php endif; ?>

                                <?php  endforeach; ?>

                            </form>
                        <?php endif; ?>
                    </section>
            </li>
            <?php endif; ?>

            <?php if(isset($jsonContactSocials)) : ?>

            <li class="dm-socials" data-motion="transition-fade-0 transition-slideInLeft-0">
                <h4>
                    <?php echo $jsonContactSocials["title"]; ?>
                </h4>

                <?php if(isset($jsonContactSocials["visual-list"])) : ?>
                    <?php $socials_list = $jsonContactSocials["visual-list"];?>

                    <div class="dm-socials-list" data-socials="normal-fill">

                        <?php $i = 1; foreach ($socials_list as $social_item) : ?>
                            <a data-socials="<?php echo $social_item["icon-svg"]; ?>" href="<?php echo $social_item["link"]; ?>" target="_blank" data-motion="transition-fade-0 transition-slideInLeft-0" data-delay="<?php echo 0.01 + (0.03 * $i); ?>s">
                                <?php SVGRenderer::renderSVG("socials-".$social_item["icon-svg"]); ?>
                            </a>
                        <?php $i++; endforeach; ?>

                    </div>

                <?php endif; ?>

                <?php if(isset($jsonContactSocials["text-list"])) : ?>
                    <?php $socials_text_list = $jsonContactSocials["text-list"];?>

                    <div class="dm-socials-text" data-motion="transition-fade-0 transition-slideInLeft-0">
                        <?php $i = 1; foreach ($socials_text_list as $social_text_item) : ?>
                            <a target="_blank" href="<?php echo $social_text_item["link"]; ?>" data-motion="transition-fade-0 transition-slideInLeft-0" data-delay="<?php echo 0.02 + (0.1 * $i); ?>s">
                                <span>●</span>

                                <b>
                                    <?php echo $social_text_item["title"]; ?>
                                </b>

                                <span>
                                    <?php echo $social_text_item["text"]; ?>
                                </span>
                            </a>
                        <?php $i++; endforeach; ?>
                    </div>

                <?php endif; ?>

            </li>
            <?php endif; ?>
        </ul>
    </container>
</section>

