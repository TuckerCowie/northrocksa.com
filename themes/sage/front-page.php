<?php use NR\Vimeo; ?>
<?php while (have_posts()) : the_post(); ?>

	<?php if (have_rows('promo')): ?>
		<?php while(have_rows('promo')): the_row(); ?>
		<?php $video = Vimeo\getVideo(get_sub_field('intro_video_id')) ?>
		<div class="jumbotron" style="background-image: url(<?= the_sub_field('background_image'); ?>);">
			<h1><?= the_sub_field('title'); ?></h1>
			<a class="btn btn-play" href="<?= isset($video) ? $video->url : '#'; ?>">Play Video</a>
		</div>
		<?php endwhile; ?>
	<?php endif; ?>

	<div class="container">
		<?php if (have_rows('main_conversion') && have_rows('conversion_mosiac')): ?>
		<div class="row nr_flex-row">
			<?php while(have_rows('main_conversion')): the_row(); ?>
			<div class="col-md-6">
				<a class="nr_card" href="#">
					<img class="nr_card_image" src="http://placehold.it/600">
					<div class="nr_card_content">
						<span class="text-primary">Click Me</span>
						<i class="glyphicon glyphicon-chevron-right pull-right"></i>
					</div>
				</a>
			</div>
			<?php endwhile; ?>
			<div class="col-md-6">
				<div class="row nr_flex-row">
					<?php while(have_rows('conversion_mosiac')): the_row(); ?>
					<div class="col-md-6">
						<a class="nr_card" href="#">
							<img class="nr_card_image" src="http://placehold.it/300">
							<div class="nr_card_content">
								<span class="text-primary">Click Me</span>
								<i class="glyphicon glyphicon-chevron-right pull-right"></i>
							</div>
						</a>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>	
	</div>

	<div class="nr_parallax-bg text-center">
		<img src="<?= get_template_directory_uri() . '/assets/images/logo-mark.png' ?>">
		<h1><?= the_title(); ?></h1>
		<?= the_content(); ?>
	</div>

	<div class="container">
		<div class="row nr_flex-row">
			<?php $cards = get_field('cards');
				if ($cards) {
					$card_count = count($cards);
					$card_classes = 'col-md-' . 12 / $card_count;
					foreach ($cards as $card) { ?>
						<div class="<?= $card_classes ?>">
							<div class="nr_card text-center">
								<img class="nr_card_image" src="<?= $card['image']; ?>">
								<div class="nr_card_content">
									<p><?= $card['content']; ?></p>
									<a class="btn btn-default btn-block" href="<?= $card['button_link']; ?>"><?= $card['button_label']; ?></a>
								</div>
							</div>
						</div>
					<?php }
				} ?>
		</div>
	</div>

<?php endwhile; ?>