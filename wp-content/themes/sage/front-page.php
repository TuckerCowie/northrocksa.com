<?php while (have_posts()) : the_post(); ?>

	<?php if (have_rows('promo')): ?>
		<?php while(have_rows('promo')): the_row(); ?>
		<div class="promo">
			<?php if(get_sub_field('background_video')): ?>
				<div class="promo_video">
					<video muted autoplay loop poster="<?= the_sub_field('background_image'); ?>">
						<source src="<?= the_sub_field('background_video'); ?>">
						<img src="<?= the_sub_field('background_image'); ?>" alt="Your browser does not support HTML 5 Videos">
					</video>
				</div>
			<?php endif; ?>
			<div class="content">
				<div style="display: table; height: 100%; width: 100%;">
					<div class="text-center" style="display:table-cell; vertical-align: middle;">
						<h1><?= the_sub_field('title'); ?></h1>
						<?php if(get_sub_field('intro_video_id')): ?>
							<a class="btn btn-play nr_video-box" href="https://player.vimeo.com/video/<?= get_sub_field('intro_video_id'); ?>?portrait=0&badge=0&byline=0&autoplay=1&portrait=0&color=B23615">
								<img src="<?= get_template_directory_uri() . '/assets/images/play.svg' ?>">
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php if (have_rows('conversion_mosiac')): ?>
		<div class="container nr_mosiac">
			<div class="nr_mosiac_container">
				<?php get_template_part('templates/mosiac', count(get_field('conversion_mosiac'))); ?>
			</div>
		</div>
	<?php endif; ?>	

	<div class="nr_parallax-bg text-center" style="background-image: url(<?= the_field('parallax_background'); ?>);>">
		<div class="container">
			<img width="50px" src="<?= get_template_directory_uri() . '/assets/images/logo-mark.png' ?>">
			<h1><?= the_title(); ?></h1>
			<?= the_content(); ?>
		</div>
	</div>

	<div class="container">
		<div class="row nr_flex-row">
			<?php $cards = get_field('cards');
				if ($cards) {
					$card_count = count($cards);
					$card_classes = 'col-sm-' . 12 / $card_count;
					foreach ($cards as $card) { ?>
						<div class="<?= $card_classes ?>">
							<a class="nr_card text-center" href="<?= $card['button_link']; ?>">
								<?php if ($card['image']): ?><img class="nr_card_image" src="<?= $card['image']; ?>"><?php endif; ?>
								<div class="nr_card_content" style="flex: 1 0 auto; display: flex; flex-direction: column;">
									<p><?= $card['content']; ?></p>
									<?php if ($card['image']): ?><span class="btn btn-default btn-block"><?= $card['button_label']; ?></span><?php endif; ?>
								</div>
							</a>
						</div>
					<?php }
				} ?>
		</div>
	</div>

<?php endwhile; ?>