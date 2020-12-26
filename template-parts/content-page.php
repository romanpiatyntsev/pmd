<?php

/**
 *  Sinle page-content template
 *
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <?php if ($thumb = get_the_post_thumbnail(get_the_ID(),  'post-header')) : ?>
        <div class="post-thumbnail">
            <?php echo $thumb; ?>
        </div>
    <?php endif; ?>
    <div class="post-content">
        <?php the_content(); ?>
    </div>
</div>