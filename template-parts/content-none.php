<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pmd
 */

?>

<div class="no-results not-found">
    <h2 class="page-title"><?php _e('Нічого не знайдено', 'pmd'); ?></h2>

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

		elseif ( is_search() ) : ?>
			<p><?php _e('На жаль, ніщо не відповідає вашим пошуковим термінам. Повторіть спробу з іншими ключовими словами', 'pmd'); ?></p>
		<?php
			get_search_form();
		endif;
		?>
	</div><!-- .page-content -->
</div><!-- .no-results -->
