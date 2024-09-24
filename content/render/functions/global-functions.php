<?php

function checkEcho($var) {
    if (isset($var) && !empty($var)) {
        echo $var;
    }
}

function addHttps($url) {
    if (!empty($url) && strpos($url, 'https://') !== 0) {
        $url = 'https://' . $url;
    }
    return $url;
}

function removeHttps($url) {
    if (!empty($url) && strpos($url, 'https://') === 0) {
        $url = substr($url, 8);
    }
    return $url;
}

function getImagesInFolder($path) {
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $images = [];

    if (is_dir($path)) {
        $files = scandir($path);

        foreach ($files as $file) {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            if (in_array(strtolower($extension), $imageExtensions)) {
                $images[] = $file;
            }
        }
    } else {
        return $images;
    }

    return $images;
}

function getVideosInFolder($path) {
    $videoExtensions = ['webm', 'mp4', 'avi'];
    $videos = [];

    if (is_dir($path)) {
        $files = scandir($path);

        foreach ($files as $file) {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            if (in_array(strtolower($extension), $videoExtensions)) {
                $videos[] = $file;
            }
        }
    } else {
        return $videos;
    }

    return $videos;
}

function getFilesInFolder($path) {
    $files = [];
    if (is_dir($path)) {
        $items = scandir($path);

        foreach ($items as $item) {
            $item_path = $path . $item;

            if (is_file($item_path)) {
                $files[] = $item;
            }
        }
    } else {
        return $files;
    }

    return $files;
}

function getDirectoriesInFolder($path) {
    $directories = [];
    if (is_dir($path)) {
        $items = scandir($path);

        foreach ($items as $item) {
            $item_path = $path . $item;

            if (is_dir($item_path) && $item !== '.' && $item !== '..') {
                $directories[] = $item;
            }
        }
    } else {
        return $directories;
    }

    return $directories;
}

function countFilesInFolder($folderPath) {
    $fileCount = 0;

    if (is_dir($folderPath)) {
        $files = scandir($folderPath);

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $filePath = $folderPath . '/' . $file;

            if (is_file($filePath)) {
                $fileCount++;
            } elseif (is_dir($filePath)) {
                $fileCount += countFilesInFolder($filePath);
            }
        }
    } else {
        return $fileCount;
    }

    return $fileCount;
}

function listDesign($nr) {
    switch ($nr) {
        case ($nr % 13 === 0):
            return "items-divisible-by-13";
        case ($nr % 7 === 0 && $nr % 3 !== 0):
            return "items-divisible-by-7";
        case ($nr % 6 === 0):
            return "items-divisible-by-6";
        case ($nr % 5 === 0):
            return "items-divisible-by-5";
        case ($nr % 4 === 0):
            return "items-divisible-by-4";
        case ($nr % 3 === 0 && $nr % 7 !== 0):
            return "items-divisible-by-3";
        case ($nr % 2 === 0):
            return "items-divisible-by-2";
        case 1:
            return "items-exactly-1";
        default:
            return "items-default";
    }
}

function renderImage($src, $popup = false, $class = false, $lazyLoad = true, $additionalAttributes = array()) {
    // Server-side path (absolute path for file operations)
    $src_current = __DIR__ . "/../../../" . $src;

    if (!file_exists($src_current)) {
        return '<span> Image file not found: ' . htmlspecialchars($src) . ' </span>';
    }

    $imageInfo = getimagesize($src_current);
    if ($imageInfo === false) {
        return '<span> Failed to get image size for: ' . htmlspecialchars($src) . ' </span>';
    }

    $width = $imageInfo[0];
    $height = $imageInfo[1];
    $alt = '';

    $imagePathParts = pathinfo($src);
    if (isset($imagePathParts['filename'])) {
        $alt = 'Image: ' . $imagePathParts['filename'];
    }

    $add_class = "";
    if (isset($class) and !empty($class)) {
        $add_class = 'class="'.$class.'" ';
    }

    $html = '<img '.$add_class.'src="' . $src . '" width="' . $width . '" height="' . $height . '" alt="' . $alt . '"';

    foreach ($additionalAttributes as $attr => $value) {
        $html .= ' ' . $attr . '="' . $value . '"';
    }

    if ($lazyLoad) {
        $html .= ' loading="lazy"';
    }
    if ($popup) {
        $html .= ' data-popup="true"';
    }
    $html .= '>';

    return $html;
}




function renderVideo($src, $thumbnail = NULL, $thumbnail_bg = NULL) {
    $html = '<div class="video-container paused" data-volume-level="high">';

    if(isset($thumbnail) && !empty($thumbnail)) {
      $html .= '<div class="thumbnail"';

      if(isset($thumbnail_bg) && !empty($thumbnail_bg)) {
        $html .= 'style="background-image: url(\'' . $thumbnail_bg . '\')"';

      }
      $html .= '>';
      $html .= renderImage($thumbnail);
      $html .= '</div>';
      $html .= '<div class="show-play" style="display:flex;">'.SVGRenderer::getSVG('play').'</div>';
      $html .= '<div class="show-pause" style="display:none;">'.SVGRenderer::getSVG('pause').'</div>';
    }

    $html   .= '<div class="video-controls-container">
                  <div class="timeline-container">
                    <div class="timeline">
                        <div class="thumb-indicator"></div>
                    </div>
                  </div>
                  <div class="controls">
                    <button class="play-pause-btn">
                      <svg class="play-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M8,5.14V19.14L19,12.14L8,5.14Z" />
                      </svg>
                      <svg class="pause-icon" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M14,19H18V5H14M6,19H10V5H6V19Z" />
                      </svg>
                    </button>
                    <div class="volume-container">
                      <button class="mute-btn">
                        <svg class="volume-high-icon" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M14,3.23V5.29C16.89,6.15 19,8.83 19,12C19,15.17 16.89,17.84 14,18.7V20.77C18,19.86 21,16.28 21,12C21,7.72 18,4.14 14,3.23M16.5,12C16.5,10.23 15.5,8.71 14,7.97V16C15.5,15.29 16.5,13.76 16.5,12M3,9V15H7L12,20V4L7,9H3Z" />
                        </svg>
                        <svg class="volume-low-icon" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M5,9V15H9L14,20V4L9,9M18.5,12C18.5,10.23 17.5,8.71 16,7.97V16C17.5,15.29 18.5,13.76 18.5,12Z" />
                        </svg>
                        <svg class="volume-muted-icon" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M12,4L9.91,6.09L12,8.18M4.27,3L3,4.27L7.73,9H3V15H7L12,20V13.27L16.25,17.53C15.58,18.04 14.83,18.46 14,18.7V20.77C15.38,20.45 16.63,19.82 17.68,18.96L19.73,21L21,19.73L12,10.73M19,12C19,12.94 18.8,13.82 18.46,14.64L19.97,16.15C20.62,14.91 21,13.5 21,12C21,7.72 18,4.14 14,3.23V5.29C16.89,6.15 19,8.83 19,12M16.5,12C16.5,10.23 15.5,8.71 14,7.97V10.18L16.45,12.63C16.5,12.43 16.5,12.21 16.5,12Z" />
                        </svg>
                      </button>
                      <input class="volume-slider progress" type="range" min="0" max="1" step="any" value="0.5">
                    </div>
                    <div class="duration-container">
                      <div class="current-time">0:00</div>
                      /
                      <div class="total-time"></div>
                    </div>
                    <button class="speed-btn wide-btn">
                      1x
                    </button>
                    <button class="full-screen-btn">
                      <svg class="open" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/>
                      </svg>
                      <svg class="close" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M5 16h3v3h2v-5H5v2zm3-8H5v2h5V5H8v3zm6 11h2v-3h3v-2h-5v5zm2-11V5h-2v5h5V8h-3z"/>
                      </svg>
                    </button>
                  </div>
                </div>
                <video src="'.$src.'">
                </video>
              </div>';
    return $html;
}

function renderSlider($items_content, $show_arrows = true, $show_dots = true, $show_numbers = false) {
    $navigation = ($show_arrows ? 'arrows' : '') . ($show_dots ? ' dots' : '');

    $html = '
        <div class="slider" data-navigation="' . $navigation . '">
            <div class="slider-container">';

    foreach ($items_content as $key => $item_content) {
        $number_text = ($show_numbers ? '<div class="number-text">' . ($key + 1) . ' / ' . count($items_content) . '</div>' : '');
        $html .= '
                <div class="slider-element">' . $number_text . $item_content . '</div>';
    }

    $html .= '
            </div>
        </div>';

    return $html;
}

function extractYearFromDateString($dateString) {
        $formats = [
          'd.m.Y',
          'm.Y',
          'Y',
          'd/m/Y',
          'm/Y',
          'd-m-Y',
          'm-Y',
          'd m Y',
          'm Y'
        ];

        foreach ($formats as $format) {

            $dateTime = DateTime::createFromFormat($format, $dateString);

            if ($dateTime) {
                return $dateTime->format('Y');
            }
        }
        return "Unable to extract year from the date string.";
}

function removeSpaceAndLowercase($string) {
    $string = str_replace(' ', '', $string);
    return strtolower($string);
}

function changeSpaceWithHyphenAndLowercase($string) {
    $string = str_replace(' ', '-', $string);
    return strtolower($string);
}

function getFirstCharacters($string, $n) {
    return substr($string, 0, $n);
}

function seoImplicitFields() {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
    $google_site_verification = $jsonGlobalData["google-site-verification"];

    if( !isset($google_site_verification) && $google_site_verification != "" ) {
        $google_site_verification = "Not set.";
    }
    $url_domain = getURL();
    $seoImplicitFieldsStrucutre = [
        'charset' => '<meta charset="UTF-8">',
        'viewport' => '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
        'title' => '<title>'.$jsonGlobalData["site-identity"].'</title>',
        'description' => '<meta name="description" content="'.$jsonGlobalData["site-description"].'"/>',
        'keywords' => '<meta name="keywords" content="'.$jsonGlobalData["site-identity"].'"/>',
        'slug' => '<meta name="slug" content=""/>',
        'google-site-verification' => '<meta name="google-site-verification" content="'.$google_site_verification.'">',
        'robots' => '<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">',
        'canonical' => '<link rel="canonical" href="'.$url_domain.'">'

    ];
    return $seoImplicitFieldsStrucutre;
}

function seoAddInTag($seo_data) {
    $seo_structure = [
        'title' => '<title>%s</title>',
        'description' => '<meta name="description" content="%s"/>',
        'keywords' => '<meta name="keywords" content="%s"/>',
        'slug' => '<meta name="slug" content="%s"/>',
        'canonical' => '<link rel="canonical" href="%s">',
        'index' => '<meta name="robots" content="index, follow">'
    ];

    $seo_new_structure = [];

    foreach ($seo_data as $seo_field => $value) {
        if (array_key_exists($seo_field, $seo_structure)) {
            $format = $seo_structure[$seo_field];
            $tag = sprintf($format, $value);
            $seo_new_structure[$seo_field] = $tag;
        }
    }

    return $seo_new_structure;
}

function seoAddInContent($seo_data, $existing_content_html) {
    $new_seo_fields_content = seoAddInTag($seo_data);
    $jsonGlobalData = getDataJson('data-global-settings', 'data');

    if (isset($new_seo_fields_content["title"])) {
        $pattern_title = "/<title>.*<\/title>/i";
        $replacement_title = $new_seo_fields_content["title"];
        $existing_content_html = preg_replace($pattern_title, $replacement_title, $existing_content_html);
    }
    if (isset($new_seo_fields_content["description"])) {
        preg_match('/<meta name="description" content="(.*?)"\/>/i', $new_seo_fields_content["description"], $matches);

        if (isset($matches[1])) {
            $description = $matches[1];

            if (strlen($description) > 157) {
                $description = substr($description, 0, 157) . '...';
            }
            $replacement_description = '<meta name="description" content="' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '"/>';
            $pattern_description = '/<meta name="description" content=".*?"\/>/i';
            $existing_content_html = preg_replace($pattern_description, $replacement_description, $existing_content_html);
        }
    }


    if (isset($new_seo_fields_content["keywords"])) {
        $pattern_keywords = "/<meta name=\"keywords\" content=\".*?\"\/>/i";
        $replacement_keywords = $new_seo_fields_content["keywords"];
        $existing_content_html = preg_replace($pattern_keywords, $replacement_keywords, $existing_content_html);
    }
    if (isset($new_seo_fields_content["slug"])) {
        $pattern_slug = "/<meta name=\"slug\" content=\".*?\"\/>/i";
        $replacement_slug = $new_seo_fields_content["slug"];
        $existing_content_html = preg_replace($pattern_slug, $replacement_slug, $existing_content_html);
    }
    if (isset($seo_data["slug"])) {
        $canonical_url = $jsonGlobalData["url"] . $seo_data["slug"] . $jsonGlobalData["page-slug-extension"];
        $replacement_canonical = '<link rel="canonical" href="' . $canonical_url . '" />';

        $pattern_canonical = '/<link\s+rel="canonical"\s+href="[^"]*"\s*\/?>/i';
        $existing_content_html = preg_replace($pattern_canonical, '', $existing_content_html);

        $existing_content_html .= "\n" . $replacement_canonical;
    }
    if (isset($seo_data["index"])) {
        $index_value = "Unset correctly, true/false.";

        if( $seo_data["index"] == "false") {
            $index_value = "noindex, nofollow";
        }
        if( $seo_data["index"] == "true") {
            $index_value = "index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1";
        }
        $pattern_robots = '/<meta\s+name="robots"\s+content=".*?"\s*\/?>/i';
        $existing_content_html = preg_replace($pattern_robots, '', $existing_content_html);

        // Add the new robots meta tag
        $replacement_robots = '<meta name="robots" content="' . $index_value . '"/>';
        $existing_content_html .= "\n" . $replacement_robots;
    }

    return $existing_content_html;
}

function getURL() {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
    $siteUrl = $jsonGlobalData["url"];


    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";
    $url.= $_SERVER['HTTP_HOST'];
    $url.= $_SERVER['REQUEST_URI'];

    if($siteUrl) {
        $url = $siteUrl;
    } else {
        $url = "http://localhost/";
    }

    return $url;
}

function getDataJson($jsonFileName, $jsonFilePathFolder = null, $extractRowNumber = null) {
    if ($jsonFileName !== null) {

        $jsonFolderPath =  '/../../json/';

        if (pathinfo($jsonFileName, PATHINFO_EXTENSION) !== 'json') {
            $jsonFileName .= '.json';
        }

        if ($jsonFilePathFolder !== null) {
            $jsonFolderPath .= rtrim($jsonFilePathFolder, '/') . '/';
        }

        $jsonFilePath = __DIR__ . $jsonFolderPath . $jsonFileName;

        if (!file_exists($jsonFilePath)) {
            throw new RuntimeException("File not found: $jsonFilePath");
        }

        $jsonContent = json_decode(file_get_contents($jsonFilePath), true);

        if ($extractRowNumber != null && is_numeric($extractRowNumber) && array_key_exists($extractRowNumber, $jsonContent)) {
            $jsonData = $jsonContent[$extractRowNumber];
        } else {
            $jsonData = $jsonContent;
        }

        return $jsonData;
    } else {
        return null;
    }
}

function stringSeoSiteName() {
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
    $siteName = $jsonGlobalData["site-identity"];
    $stringSeoSiteName ="";

    if( isset($siteName) && !empty($siteName) ) {
        $stringSeoSiteName = " | ".$siteName;
    }
    return $stringSeoSiteName;
}

function getSeoFromCurrentPageData($filename) {
    $jsonSeoData = getDataJson('data-pages-seo', 'data');
    $jsonGlobalData = getDataJson('data-global-settings', 'data');
    $stringSeoSiteName = stringSeoSiteName();
    $siteName = $jsonGlobalData["site-identity"];

    if ($filename != null) {
        foreach ($jsonSeoData as $pageData) {
            if ($pageData['file'] === $filename) {

                if( str_contains($pageData["seo"]["title"], $siteName)) {
                    $titleSeo = $pageData["seo"]["title"];
                } else {
                    $titleSeo = $pageData["seo"]["title"] . $stringSeoSiteName;
                }

                $seo = [
                  "title" => $titleSeo,
                  "description" => $pageData["seo"]["description"],
                  "keywords" => $pageData["seo"]["keywords"],
                  "slug" => $pageData["seo"]["slug"],
                  "index" => $pageData["seo"]["index"]
                ];
                return $seo;
            }
        }
    }

    return null;
}

function getDataHero($filename) {

    if(!isset($jsonGlobalSeo)) {
        $jsonGlobalSeo = getDataJson('data-pages-seo', 'data');
    }

    $hero_title = "Title";
    $hero_bg_img_path = "placeholder";
    $hero_bg_img = "img-placeholder.webp";
    $hero_description = "";

    if(isset($filename)) {
        foreach ($jsonGlobalSeo as $item) {
            if (isset($item['file']) && $filename == $item['file'] && isset($item['hero'])) {
                $heroData = $item['hero'];

                $hero_title = $heroData['title'];
                $hero_bg_img_path = $heroData['bg_img_path'];
                $hero_bg_img = $heroData['bg_img'];
                if(isset($heroData['description'])) {
                    $hero_description = $heroData['description'];
                }
            }
        }
    }

    return [
      'hero_title' => $hero_title,
      'hero_bg_img_path' => $hero_bg_img_path,
      'hero_bg_img' => $hero_bg_img,
      'hero_description' => $hero_description
    ];
}

function executePhpInString($string, $params = []) {
    // Extract variables from the $params array
    extract($params);

    ob_start();
    eval('?>' . $string . '<?php ');
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

function calculateDaysWorkedInMonth($currentDate, $jobs) {
    $daysWorked = 0;

    foreach ($jobs as $job) {
        if ($job["display"] != "true") {
            continue;
        }

        $jobStartDate = DateTime::createFromFormat('d.m.Y', $job['date_start']);
        $jobEndDate = ($job['date_end'] === 'In progress') ? new DateTime() : DateTime::createFromFormat('d.m.Y', $job['date_end']);

        // Check if there is an overlap between the job and the current month
        if (
            $currentDate >= $jobStartDate &&
            $currentDate <= min($jobEndDate, clone $currentDate->modify('last day of this month'))
        ) {
            $interval = $jobStartDate->diff(min($jobEndDate, clone $currentDate->modify('last day of this month')));
            $daysWorked += $interval->days + 1; // Include the end day
        }
    }

    return $daysWorked;
}

function calculatePersonAge(): int {
    $birthDate = getDataJson('data-content-personal', 'data')["about"]["birth-date"];
    $age = 0;

    if (isset($birthDate) && !empty($birthDate)) {
        $birthDateObj = new DateTime($birthDate);
        $currentDate = new DateTime();
        $ageInterval = $currentDate->diff($birthDateObj);
        $age = $ageInterval->y;
    }

    return $age;
}

function renderContactFormField($contact_form_field) {
    if($contact_form_field["type"] == "text" || $contact_form_field["type"] == "input") : ?>
        <input id="<?php echo $contact_form_field["name"]; ?>" type="text" name="<?php echo $contact_form_field["name"]; ?>" placeholder="<?php echo $contact_form_field["placeholder"]; ?>" value=""
            <?php if(isset($contact_form_field["field-name-extern"]) && !empty($contact_form_field["field-name-extern"])) :
                echo 'field-name-extern="'.$contact_form_field["field-name-extern"].'"';
            endif;?>
            <?php if(isset($contact_form_field["field-name-step"]) ) :
                echo 'field-name-step="'.$contact_form_field["field-name-step"].'"';
            endif;?>
        >
    <?php elseif($contact_form_field["type"] == "message" || $contact_form_field["type"] == "textarea") : ?>
        <textarea id="<?php echo $contact_form_field["name"]; ?>" type="text" name="<?php echo $contact_form_field["name"]; ?>" placeholder="<?php echo $contact_form_field["placeholder"]; ?>" value=""
            <?php if(isset($contact_form_field["field-name-extern"]) && !empty($contact_form_field["field-name-extern"])) :
                echo 'field-name-extern="'.$contact_form_field["field-name-extern"].'"';
            endif;?>
            <?php if(isset($contact_form_field["field-name-step"]) ) :
                echo 'field-name-step="'.$contact_form_field["field-name-step"].'"';
            endif;?>
        ></textarea>
    <?php elseif($contact_form_field["type"] == "radio" || $contact_form_field["type"] == "radiobuttons") : ?>
        <?php $radioOptions = $contact_form_field["values"] ?? [[
                "name" => $contact_form_field["name"],
                "step" => $contact_form_field["step"],
                "value" => $contact_form_field["value"],
                "placeholder" => $contact_form_field["placeholder"]
            ]];

        foreach ($radioOptions as $option) : ?>
            <div class="radio">

                <?php if( isset($option["content"]) && !empty($option["content"])) :
                    echo executePhpInString($option["content"]);
                endif; ?>

                <input type="radio" id="<?php echo $option["name"]; ?>" name="<?php echo $contact_form_field["name"]; ?>" value="<?php echo $option["value"]; ?>"
                    <?php if(isset($option["step"]) ) :
                        echo 'data-step="'.$option["step"].'"';
                    endif;?>
                    <?php if(isset($contact_form_field["field-name-step"]) ) :
                        echo 'field-name-step="'.$contact_form_field["field-name-step"].'"';
                        echo 'placeholder="'.$contact_form_field["placeholder"].'"';
                    endif;?>
                >
                <span class="checkmark"></span>
                <label for="<?php echo $option["name"]; ?>"><?php echo $option["value"]; ?></label>
            </div>
        <?php endforeach; ?>
    <?php elseif($contact_form_field["type"] == "send" || $contact_form_field["type"] == "submit") : ?>
        <div>
            <button class="form-submit" id="<?php echo $contact_form_field["name"]; ?>" data-button="primary" data-callback='onSubmit' data-action='submit' type="submit">
                <?php echo $contact_form_field["value"]; ?>
            </button>

            <?php if(isset($jsonContactForm["external-form-url"])) : ?>
                <a class="external-form-submit" href="<?php echo $jsonContactForm["external-form-url"]; ?>" data-button="primary" target="_blank">
                    <?php echo $contact_form_field["redirect"]; ?>
                </a>
            <?php endif; ?>
        </div>
    <?php elseif($contact_form_field["type"] == "next" || $contact_form_field["type"] == "step") : ?>
        <div>
            <button class="form-next-step" id="<?php echo $contact_form_field["name"]; ?>" data-button="primary" data-action="next-step" data-step="<?php echo $contact_form_field["step"]; ?>" type="button">
                <?php echo $contact_form_field["value"]; ?>
            </button>
        </div>
    <?php elseif($contact_form_field["type"] == "prev" || $contact_form_field["type"] == "step") : ?>
        <div>
            <button class="form-prev-step" id="<?php echo $contact_form_field["name"]; ?>" data-button="primary" data-action="prev-step" data-step="<?php echo $contact_form_field["step"]; ?>" type="button">
                <?php echo $contact_form_field["value"]; ?>
            </button>
        </div>
    <?php elseif($contact_form_field["type"] == "html" || $contact_form_field["type"] == "HTML") : ?>
        <div class="content">
            <?php echo $contact_form_field["content"]; ?>
        </div>
    <?php elseif($contact_form_field["type"] == "code" || $contact_form_field["type"] == "CODE") : ?>
        <div class="content">
            <?php echo executePhpInString($contact_form_field["content"]); ?>
        </div>
    <?php endif;
}


?>