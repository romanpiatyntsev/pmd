<?php

/**
 * Enqueue scripts and styles.
 */
function pmd_scripts()
{

	wp_enqueue_style('pmd-style',  PMD_URL . '/dist/main.min.css', [], PMD_VERSION);

	wp_enqueue_style('pmd-google-fonts-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=cyrillic', []);

	wp_enqueue_style('pmd-google-fonts-pt-sans', 'https://fonts.googleapis.com/css?family=PT+Sans+Narrow&amp;subset=cyrillic', []);

	wp_enqueue_style('pmd-awesome-font',  PMD_URL . '/dist/font-awesome/css/font-awesome.min.css', []);

	wp_enqueue_script('pmd-scripts',  PMD_URL . '/dist/bundle.js', [], PMD_VERSION, true);

	if (is_front_page() || ('zaklad' == get_post_type() && !is_tax())) {
		wp_enqueue_script('google-map',  'https://maps.googleapis.com/maps/api/js?key=' . get_field('gapi_key', 'option') . '&callback=initMap', [], '1', true);
	}

	if ('zaklad' == get_post_type() && !is_tax()) {
		wp_enqueue_script('slick-script',  '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], '1', true);
		wp_enqueue_script('slick-init',  PMD_URL . '/assets/js/slick-init.js', ['slick-script'], '1', true);
		wp_enqueue_style('slick-style', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', []);
	}

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'pmd_scripts');
