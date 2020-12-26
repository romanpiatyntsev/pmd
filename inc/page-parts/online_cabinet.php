<?php

/**
 * Layout Online Doctor
 */
?>

<div class="section-online">
    <div id="particles-js" data-color="#d0eeff"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 order-1 order-lg-0 left-section">
                <img src="<?php echo PMD_URL; ?>/assets/images/online.png" alt="online-cabinet">
            </div>
            <div class="col-12 col-lg-6 order-0 order-lg-1 right-section">
                <h2 class="title-color"><?php the_field('title'); ?></h2>
                <a href="<?php the_field('med_link', 'option'); ?>" class="button button-big button-radius button-primary button-icon" data-icon="&#xf0fa;" target="_blank">
                <?php the_field('med_link_title', 'option'); ?>
                </a>
            </div>
        </div>
    </div>
</div>