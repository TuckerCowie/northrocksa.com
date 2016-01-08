<?php use NR\Vimeo; ?>
<?php while (have_posts()) : the_post(); ?>

	<?php if (have_rows('promo')): ?>
		<?php while(have_rows('promo')): the_row(); ?>
		<?php $video = Vimeo\getVideo(get_sub_field('intro_video_id')); ?>
		<div class="jumbotron" style="position: relative;">
			<?php if(get_sub_field('background_video')): ?>
				<div style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; overflow: hidden;">
					<video autoplay loop poster="<?= the_sub_field('background_image'); ?>" style="position: absolute; width: 100%; left: 0; top: 0; z-index: -1;">
						<source src="<?= the_sub_field('background_video'); ?>">
					</video>
				</div>
			<?php endif; ?>
			<h1><?= the_sub_field('title'); ?></h1>
			<?php if(isset($video)): ?>
				<a class="btn btn-play" href="<?= $video->url; ?>">
					<img src="<?= get_template_directory_uri() . '/assets/images/play.svg' ?>">
				</a>
			<?php else: ?>
				<img width="50px" src="<?= get_template_directory_uri() . '/assets/images/logo-mark.png' ?>">
			<?php endif; ?>
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
								<div class="nr_card_content">
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