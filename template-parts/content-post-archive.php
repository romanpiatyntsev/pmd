<?php

/**
 * Post archive-content template
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <div class="post-thumbnail">
        <?php if ($thumb = get_the_post_thumbnail(get_the_ID(),  'post-thumbnail')) : ?>
            <?php echo $thumb; ?>
        <?php else : ?>
            <img width="350" height="250" src="<?php echo PMD_URL ?>/assets/images/post_blank.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image no-thumbnail" alt="blank">
        <?php endif; ?>
    </div>
    <h3 class="post-title"><a href="<?php the_permalink(); ?>" class="post-link"><?php the_title(); ?></a></h3>
    <div class="post-info"><span class="date"><?php echo get_the_date(); ?></span>|<?php pmd_entry_category(); ?></div>
    <div class="post-preview"><?php echo get_excerpt_by_id(get_the_ID(), 20); ?></div>
</div>