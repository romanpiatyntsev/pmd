<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package pmd
 */

function pmd_posted_on() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf( $time_string,
         esc_attr( get_the_date( DATE_W3C ) ),
         esc_html( get_the_date() )
    );

    $archive_day   = get_the_time('d');
    $archive_month = get_the_time('m');
    $archive_year  = get_the_time('Y');

    $posted_on = sprintf(
        esc_html_x( 'Дата публікації: %s', 'post date', 'pmd' ),
        '<a href="' . esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
}

function pmd_posted_by() {
    $byline = sprintf(
        /* translators: %s: post author. */
        esc_html_x( 'Автор %s', 'post author', 'pmd' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}


function pmd_entry_category() {
    $categories_list = get_the_category_list( ', ');
    if ( $categories_list ) {
        printf( '<span class="cat-links">' . esc_html__( 'Категорія: %1$s', 'pmd' ) . '</span>', $categories_list ); // WPCS: XSS OK.
    }
}

function pmd_entry_tags() {
    $tags_list = get_the_tag_list( '', ', ' );
    if ( $tags_list ) {
        printf( '<span class="tags-links">' . esc_html__( 'Мітки: %1$s', 'pmd' ) . '</span>', $tags_list ); // WPCS: XSS OK.
    }
}

function get_excerpt_by_id( $postId, $count = 50, $more = '...' ) {
    $post = get_post( $postId );
    $excerpt = $post->post_content;
    $excerpt = strip_tags(strip_shortcodes( $excerpt ) );
    return wp_trim_words( $excerpt, $count, $more );
}

function the_filed_format( $field, $before, $after ) {
    echo $before . $field . $after;
}

function the_subtitle_singular() {
    $post_type = get_post_type();
    $content = '';
    $icon = '';

    switch ( $post_type ) {
        case 'zaklad' :
            $content = get_field('address');
            $icon = 'f041';
            break;
        case 'post' :
            $content = '';
            break;
        case 'page' :
            $content = '';
            break;
        default :
            $content = '';
    }

    if ( $content ) {
        $icon && $icon = ' data-icon="&#x'. $icon .'"';
        echo '<div class="subtitle singular"' . $icon . '>' . $content . '</div>';
    }
}

function renderQueryPosts ( $number, $before, $after, $post_type = 'post' ) {
    $posts = get_posts([
        'numberposts' => $number,
        'post_type' => $post_type,
    ]);

    global $post;

    foreach( $posts as $post ) {
        setup_postdata($post);
        echo $before;
        get_template_part('template-parts/content-post-archive');
        echo $after;
        wp_reset_postdata();
    }
}
