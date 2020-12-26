<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pmd
 */

use pmd\MainHelper;

$pageTitle = MainHelper::getTheTitle();
$pageDescription = MainHelper::getPageDescription();
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'pmd'); ?></a>

		<header id="masthead" class="site-header">
			<div class="site-branding">
				<div class="top-wrapper">
					<div class="container">
						<div class="row justify-content-between align-items-top top-line">
							<div class="col-11 col-lg-5">
								<div class="site-name"><?php bloginfo('name'); ?></div>
							</div>
							<div class="col-12 col-md-6 col-lg-3 info">
								<div class="info-item telephone"><?php the_field('tel', 'option'); ?><br>
									<a href="<?php echo MainHelper::getLinkBySlug('zvernennya-gromadyan') ?>" class="text-link">обо напишіть нам</a>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3 info">
								<div class="info-item location"><br><?php the_field('address', 'option'); ?></div>
							</div>
						</div>
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
							<?php
							wp_nav_menu(array(
								'theme_location' => 'header_menu',
								'menu_id'        => 'header-menu',
								'menu_class'     => 'nav-menu',
							));
							?>
						</nav>
					</div>
				</div>

				<?php if (is_front_page()) : ?>
					<div class="header-image front-page" style="background: url('<?php echo get_header_image(); ?>') no-repeat;">
				<?php else : ?>
					<div class="header-solid">
					<div id="particles-js" data-color="#d0eeff"></div>
				<?php endif; ?>
					<div class="container">
						<div class="row">

							<div class="col-12 col-md-11 col-lg-9 col-xl-10">
								<h1 class="title"><?php echo $pageTitle; ?></h1>
								<?php $pageDescription && printf('<div class="subtitle">%s</div>', $pageDescription); ?>
							</div>

							<?php if (is_front_page()) : ?>
								<div class="col-12">
									<a href="<?php the_field('med_link', 'option'); ?>" target="_blank" class="button button-big button-secondary button-icon check-in" data-icon="&#xf2bc;">Записатися до лікаря</a>
								</div>
							<?php endif; ?>

						</div>
					</div>
				</div>

				<?php if (function_exists('yoast_breadcrumb') && !is_front_page()) : ?>
					<div class="container">
						<div class="row">
							<div class="col-12">
								<?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>

			</div><!-- .site-branding -->

		</header>
		<div id="content" class="site-content">