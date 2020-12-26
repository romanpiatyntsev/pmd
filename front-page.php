<?php

/**
 * Front Page template
 */

get_header();
the_post();
?>
<main id="main" class="content-area">

    <div class="section-intro">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="sticker personal">
                        <span class="sticker-title"><?php the_field('personal'); ?></span>
                        <span class="sticker-content"><?php the_field('personal_center'); ?></span>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="sticker lab">
                        <span class="sticker-title"><?php the_field('lab'); ?></span>
                        <span class="sticker-content"><?php the_field('lab_contemt'); ?></span>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="sticker program">
                        <span class="sticker-title"><?php the_field('about_program'); ?></span>
                        <span class="sticker-content"><?php the_field('program_contet'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-about">
        <div class="container">
            <h2 class="section-title"><?php the_field('about_center'); ?></h2>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="about-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="about-servise">
                        <?php the_field('main_servise'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('inc/page-parts/online_cabinet'); ?>

    <div class="section-posts">
        <div class="container">
            <div class="row">
                <h2 class="section-title"><?php the_field('info'); ?></h2>
                <?php renderQueryPosts(3, '<div class="col-12 col-lg-4">', '</div>'); ?>
            </div>
        </div>
    </div>

    <?php $coordinates = get_field('map', 'option'); ?>
    <div id="map" data-zoom="17" data-lat="<?php echo $coordinates['lat']; ?>" data-lng="<?php echo $coordinates['lng']; ?>" data-tex="<?php bloginfo('name'); ?>"></div>
    <div id="popup-content"><?php bloginfo('name'); ?></div>

</main><!-- #main -->

<?php
get_footer();
