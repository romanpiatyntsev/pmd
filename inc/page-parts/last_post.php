<?php
/**
 * Section Last Post
 */
$posts = getPosts(3);

foreach( $posts as $post ) {
    setup_postdata($posts);
    get_template_part('template-parts/content-post-archive');
    wp_reset_postdata();
}
