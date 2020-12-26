<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pmd
 */

get_header();

the_post();

?>
<div class="container end">
    <div class="row">
        <div class="col-12 col-lg-9">
            <div id="main" class="content-area">
                <?php get_template_part('template-parts/content-post'); ?>
            </div>
            <div class="entry-meta">
                <?php
                pmd_posted_on();
                pmd_entry_category();
                pmd_entry_tags();
                ?>
            </div><!-- .entry-meta -->
        </div>

        <?php get_sidebar(); ?>
        
    </div>
</div>

<?php

get_template_part('inc/page-parts/online_cabinet');

get_footer();
