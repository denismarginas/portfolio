<?php

if(!isset($jsonGlobalData)) :
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
endif;

if(!isset($jsonDataExperience)) :
    $jsonDataExperience = getDataJson('data-content-personal', 'data')["experience"];
endif;

?>

<section class="dm-experience-knowledge grid-background-animation">
  <container>
      <?php $images = $jsonDataExperience["images"] ?>
      <?php if(isset($images["portrait"])) : ?>
          <div class="person-image" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s">
              <?php echo renderImage($GLOBALS['urlPath']."content/img".$images["portrait"]["img-path"].$images["portrait"]["img"]);?>
          </div>
      <?php endif; ?>

      <div class="information experience-knowledge">

          <?php if(isset($jsonDataExperience["title"])) : ?>
              <h2 data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.5s">
                  <?php echo $jsonDataExperience["title"]; ?>
              </h2>
          <?php endif; ?>

          <?php if(isset($jsonDataExperience["knowledge-lists-text"]["text-items"])) : ?>
              <?php $experience_text = $jsonDataExperience["knowledge-lists-text"]["text-items"];?>

              <?php $i = 1; foreach ($experience_text as $experience_text_item) : ?>
                  <p data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.6s" data-delay="<?php echo $i*0.03; ?>s">
                      <?php echo $experience_text_item; ?>
                  </p>
                  <?php $i++; endforeach; ?>
          <?php endif; ?>

          <?php if(isset($jsonDataExperience["knowledge-lists-text"]["list-items"])) : ?>
              <?php $experience_list = $jsonDataExperience["knowledge-lists-text"]["list-items"];?>
              <ul>
                  <?php $i = 1; foreach ($experience_list as $experience_list_item) : ?>
                      <li data-motion="transition-fade-0 transition-slideInLeft-0" data-duration="0.6s" data-delay="<?php echo $i*0.06; ?>s">
                          <?php echo $experience_list_item; ?>
                      </li>
                      <?php $i++; endforeach; ?>
              </ul>
          <?php endif; ?>

          <?php if(isset($jsonDataExperience["knowledge-lists-items"])) : ?>
              <?php
              $renderer = new RendererElements();
              $renderer->renderElement('knowledge-list-icons');
              ?>
          <?php endif; ?>

          <?php if( isset($layout) && ( $layout == "standard" )) : ?>
              <?php if(isset($jsonDataExperience["buttons"])) : ?>
                  <div class="buttons">
                      <?php  foreach ($jsonDataExperience["buttons"] as $button) : ?>
                          <a data-motion="transition-fade-0 transition-slideInRight-0" data-duration="0.4s" href="<?php echo $button["button_page_redirect_slug"].$jsonGlobalData["page-slug-extension"]; ?>" data-button="primary">
                              <?php SVGRenderer::renderSVG($button["button-icon-svg"]); ?>
                              <span>
                                <?php echo $button["button_text"];?>
                            </span>
                          </a>
                      <?php endforeach; ?>
                  </div>
              <?php endif; ?>
          <?php endif; ?>

      </div>

      <?php if (isset($jsonDataExperience["text"])) : ?>
          <div class="experience-container">

              <div class="text">
                  <?php if (is_array($jsonDataExperience["text"])) : ?>
                      <?php $i = 1; foreach ($jsonDataExperience["text"] as $textItem) : ?>
                          <p data-motion="transition-fade-0" data-duration="1.2s" data-delay="<?php echo $i*0.06; ?>s">
                              <?php echo htmlspecialchars($textItem); ?>
                          </p>
                          <?php $i++; endforeach; ?>
                  <?php else : ?>
                      <p data-motion="transition-fade-0" data-duration="0.8s" data-delay="0.1s">
                          <?php echo htmlspecialchars($jsonDataExperience["text"]); ?>
                      </p>
                  <?php endif; ?>
              </div>

              <?php if(isset($images["banner"])) : ?>
                  <div class="banner-image" data-motion="transition-fade-0 transition-slideInRight-0" data-duration="1s">
                      <?php echo renderImage($GLOBALS['urlPath']."content/img".$images["banner"]["img-path"].$images["banner"]["img"], true);?>
                  </div>
              <?php endif; ?>
          </div>
      <?php endif; ?>

  </container>
</section>

