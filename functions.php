<?php

$version = include ( TEMPLATEPATH . '/dist/version.php' );

! defined( 'PMD_VERSION' ) && define ( 'PMD_VERSION', $version );
! defined( 'PMD_URL' ) && define ( 'PMD_URL', get_template_directory_uri() );

if ( ! function_exists( 'pmd_setup' ) ) :

	function pmd_setup() {
		load_theme_textdomain( 'pmd', get_template_directory() . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'header_menu' => esc_html__( 'Меню в шапке', 'pmd' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-logo', array(
			'height'      => 45,
			'width'       => 45,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'pmd_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pmd_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'pmd_content_width', 640 );
}
add_action( 'after_setup_theme', 'pmd_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pmd_widgets_init() {
    // page sidebars
	register_sidebar( array(
		'name'          => esc_html__( 'Бокова панель 1', 'pmd' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Додайте віджети тут', 'pmd' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

    register_sidebar( array(
        'name'          => esc_html__( 'Бокова панель 2', 'pmd' ),
        'id'            => 'sidebar-2',
        'description'   => esc_html__( 'Додайте віджети тут', 'pmd' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Бокова панель 3', 'pmd' ),
        'id'            => 'sidebar-3',
        'description'   => esc_html__( 'Додайте віджети тут', 'pmd' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    // footer sidebars
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'pmd' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Додайте віджети тут', 'pmd' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'pmd' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Додайте віджети тут', 'pmd' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'pmd' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Додайте віджети тут', 'pmd' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'pmd_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/add-scripts.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Post-types.
 */
require get_template_directory() . '/inc/post_types.php';

/**
 * Helpers
 */
require get_template_directory() . '/inc/helpers/MainHelper.php';


/**
 * ACF Pro settings
 */

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

function pmd_acf_init() {
    acf_update_setting('google_api_key', get_field('gapi_key', 'option') );
}
add_action('acf/init', 'pmd_acf_init');


/**
 * add defer async to google map script
 */

function add_async_attribute( $tag, $handle ) {
    if ( 'google-map' !== $handle )
        return $tag;
    return str_replace( ' src', ' async defer src', $tag );
}
add_filter('script_loader_tag', 'add_async_attribute', 10, 2);

/**
 *  Short Codes
 */

function pmd_address(){
    return "м. Полтава ". get_field('address', 'option') . ' тел: ' .  get_field('tel', 'option');
}
add_shortcode('address', 'pmd_address');

add_image_size('post-header-slim', 825, 300, true);
add_image_size('post-header', 825, 380, true);
add_image_size('post-inner', 825, 9999);
add_image_size('post-thumbnail', 350, 250, true);

add_image_size('zaklad-header', 730, 480, true);

add_image_size('personal-zaklad', 250, 300, true);
add_image_size('personal-admin', 290, 380, true);

function rw_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'post-inner'       => __( 'Article size' ),
        'post-thumbnail'   => __( 'Post thumbnail' ),
        'post-header'      => __( 'Post header' ),
        'post-header-slim' => __( 'Post header slim' ),
    ) );
}
add_filter( 'image_size_names_choose', 'rw_custom_sizes' );


function zaklad_type_sort_order($query){
    if( is_tax('zaklad-type') ):
        $query->set( 'order', 'ASC' );
        $query->set( 'posts_per_page', -1 );
        $query->set( 'orderby', 'title' );

    endif;
};
add_action( 'pre_get_posts', 'zaklad_type_sort_order');

function pmd_ga(){
    if ( $ga = get_field('ga', 'options') ) {
           echo $ga;
    }
}
add_action( 'wp_head', 'pmd_ga', 99); // add google analytics

