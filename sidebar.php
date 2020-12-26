<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pmd
 */
?>
<div class="col-12 col-lg-3 sidebar-wrapper">
    <div class="row">
        <?php if ( is_active_sidebar('sidebar-1') ): ?>
            <div class="col-12 col-md-4 col-lg-12">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar('sidebar-2') ): ?>
            <div class="col-12 col-md-4 col-lg-12">
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
            </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar('sidebar-3') ): ?>
            <div class="col-12 col-md-4 col-lg-12">
                <?php dynamic_sidebar( 'sidebar-3' ); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
