<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pmd
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	<div class="entry-summary">
		<?php echo wp_trim_words( get_the_content(), 25); ; ?>
	</div><!-- .entry-summary -->

    <?php if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
            <?php
            pmd_posted_on();
            pmd_entry_category();
            ?>
        </div><!-- .entry-meta -->
    <?php endif; ?>

</div><!-- #post-<?php the_ID(); ?> -->
