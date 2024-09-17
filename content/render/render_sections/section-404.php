<?php
if(!isset($jsonNotFound)) :
    $jsonNotFound = getDataJson('data-content-personal', 'data')["page-not-found"];
endif;
?>

<section class="dm-404 grid-background-animation">
    <container>
        <div class="title">
            <?php if(isset($jsonNotFound["title"])) :
                echo $jsonNotFound["title"];
            else :
                echo "404";
            endif; ?>
        </div>
        <p class="description">
            <?php if(isset($jsonNotFound["title"])) :
                echo $jsonNotFound["description"];
            else :
                echo "NOT FOUND";
            endif; ?>
        </p>
    </container>
</section>

