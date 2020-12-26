<?php

/* Template Name: Telephones Page */

get_header(); ?>

<div class="container">
    <div class="row admin">

        <?php $personal = get_field('personal');
        if ($personal) : ?>
            <?php foreach ($personal as $p) : ?>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="info">
                        <?php $thumb = get_the_post_thumbnail($p->ID,  'personal-zaklad'); ?>
                        <?php if ($thumb) {
                            echo $thumb;
                        } else {
                            if ($thumb = get_field('photo_blank', 'options')) {
                                echo wp_get_attachment_image($thumb, 'personal-zaklad');
                            }
                        } ?>
                        <h3 class="name"><?php echo get_the_title($p->ID); ?></h3>
                        <p><?php the_field('posada', $p->ID); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
</div>
<?php
get_footer();
