<?php

use pmd\MainHelper;

get_header();
the_post();

$days = MainHelper::parseWorkingDays(get_field('day'));
$name_days = MainHelper::getDayOfWeek();
const OPEN = 0;
const CLOSE = 1;

$size = 'zaklad-header';
$images = get_field('gallery');
$thumb = get_the_post_thumbnail_url(get_the_ID(), $size);

?>
<div class="container pb-5">
	<div class="row">
		<div class="col-12 col-lg-8 order-1 order-lg-0">

			<?php if ($thumb || $images) : ?>

				<div class="post-thumbnail lazy">
					<?php if ($thumb) : ?>
						<div class="slider-item">
							<img data-lazy="<?php echo $thumb ?>">
						</div>
					<?php endif; ?>

					<?php if ($images) : ?>
						<?php foreach ($images as $image) : ?>
							<div class="slider-item">
								<img data-lazy="<?php echo $image['sizes'][$size]; ?>">
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="post-content">
				<?php the_content(); ?>
			</div>

			<?php $personal = get_field('personal');

			if ($personal) : ?>

				<div class="doctors-list">
					<h2><?php the_field('personal'); ?></h2>

					<div class="row">

						<?php foreach ($personal as $p) : ?>

							<div class="doctor col-sm-4">
								<?php $thumb = get_the_post_thumbnail($p->ID,  'personal-zaklad'); ?>

								<?php if ($thumb) {
									echo $thumb;
								} else {
									$thumb = get_field('photo_blank', 'options');
									if ($thumb) {
										echo wp_get_attachment_image($thumb, 'personal-zaklad');
									}
								} ?>

								<div class="name"><?php echo get_the_title($p->ID); ?></div>

								<ul class="personal-info">
									<?php if ($posada = get_field('posada', $p->ID)) : ?>
										<li class="personal-info-item">
											<b><?php _e('Посада:', 'pmd'); ?></b> <?php echo $posada; ?>
										</li>
									<?php endif; ?>

									<li class="personal-info-item">
										<b><?php _e('Спеціалізація:', 'pmd'); ?></b> <?php the_field('prof', $p->ID); ?>
									</li>

									<?php if ($cat = get_field('category', $p->ID)) : ?>
										<li class="personal-info-item">
											<b><?php echo $cat; ?>
										</li>
									<?php endif; ?>

									<li class="personal-info-item">
										<b><?php _e('Стаж роботи:', 'pmd'); ?></b><?php the_field('job', $p->ID); ?>
									</li>
								</ul>
							</div>
						<?php endforeach; ?>

					</div>
				</div>

			<?php endif; ?>
			
		</div> <!-- left column end -->

		<div class="col-12 col-lg-4 order-0 order-lg-1 working-days">
			<div class="inner">
				<div class="schedule">

					<div class="header">
						<small><?php _e('Коли ми працюємо', 'pmd'); ?></small>
						<h4 class="schedule-header"><?php _e('Розклад роботи закладу', 'am'); ?></h4>
					</div>
					<div class="table">

						<?php foreach ($days as $index => $hours) : ?>
							<div class="day">
								<div class="name"><?php echo $name_days[$index]; ?></div>
								<?php if (count($hours) == 1) {
									$time = 'вихідний';
								} else {
									$time = sprintf('%s - %s', $hours[OPEN], $hours[CLOSE]);
								} ?>
								<div class="time"><?php echo $time; ?></div>
							</div>
						<?php endforeach; ?>

					</div>
				</div>
				<div class="info-box" data-icon="&#xf095">
					<span class="info-text tel"><?php the_field('tel'); ?></span>
				</div>
				<div class="info-box" data-icon="&#xf003">
					<?php $mail = get_field('email'); ?>
					<a href="mailto:<?php echo antispambot($mail, 1); ?>">
						<span class="info-text email"><?php echo antispambot($mail); ?></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_template_part('inc/page-parts/online_cabinet'); ?>
<?php $coordinates = get_field('map'); ?>

<div id="map" data-lat="<?php echo $coordinates['lat']; ?>" data-zoom="14" data-lng="<?php echo $coordinates['lng']; ?>" data-tex="<?php the_title(); ?>"></div>
<div id="popup-content"><?php the_title(); ?></div>

<?php
get_footer();
