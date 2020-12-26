<?php get_header(); ?>

<div class="archive-zaklad">
    <div class="container">
        <div class="row">

            <?php if (have_posts()) :

                while (have_posts()) :  the_post(); ?>

                    <div class="col-sm-6">

                        <a href="<?php the_permalink(); ?>" class="block-item">

                            <?php if ($thumb = get_the_post_thumbnail(get_the_ID(),  'post-thumbnail')) : ?>
                                <span class="post-thumbnail">
                                    <?php echo $thumb; ?>
                                </span>
                            <?php endif; ?>

                            <div class="info">

                                <h4 class="title"><?php the_title(); ?></h4>

                                <div class="info-row">
                                    <div class="icon" data-icon="&#xf007"></div>
                                    <?php $personal = get_field('personal'); ?>
                                    <p class="description"><?php echo get_the_title($personal[0]->ID); ?></p>
                                </div>

                                <div class="info-row">
                                    <div class="icon" data-icon="&#xf095"></div>
                                    <p class="description"><?php the_field('tel', get_the_ID()); ?></p>
                                </div>

                                <div class="info-row">
                                    <div class="icon" data-icon="&#xf041"></div>
                                    <p class="description"><?php the_field('address', get_the_ID()); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

            <?php endwhile;

            endif; ?>

        </div>
    </div>
</div>

<?php
get_footer();
