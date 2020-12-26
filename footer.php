<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pmd
 */

?>
</div><!-- #content -->

<footer id="site-footer" class="site-footer">
    <div class="container">
        <div class="row justify-content-between">

            <div class="col-12 col-lg-3">
                <div class="site-name"><?php bloginfo('name'); ?></div>
            </div>

            <?php if (is_active_sidebar('footer-1')) : ?>
                <div class="col-12 col-md-4 col-lg-2">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-2')) : ?>
                <div class="col-12 col-md-4 col-lg-2">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-3')) : ?>
                <div class="col-12 col-md-4 col-lg-2">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>