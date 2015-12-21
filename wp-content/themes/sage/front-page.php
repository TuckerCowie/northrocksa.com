<?php use NR\Vimeo; ?>
<?php while (have_posts()) : the_post(); ?>

	<?php if (have_rows('promo')): ?>
		<?php while(have_rows('promo')): the_row(); ?>
		<?php $video = Vimeo\getVideo(get_sub_field('intro_video_id')); ?>
		<div class="jumbotron" style="background-image: url(<?= the_sub_field('background_image'); ?>);">
			<h1><?= the_sub_field('title'); ?></h1>
			<?php if(isset($video)): ?>
				<a class="btn btn-play" href="<?= $video->url; ?>">
					<img src="<?= get_template_directory_uri() . '/assets/images/play.svg' ?>">
				</a>
			<?php endif; ?>
		</div>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php if (have_rows('main_conversion') && have_rows('conversion_mosiac')): ?>
	<div class="container nr_mosiac">
		<div class="nr_mosiac_row">
			<?php 
			$sermon_series = new WP_Query(['post_type'=>'series', 'posts_per_page'=>1]);
			if(get_field('current_series') && $sermon_series->have_posts()): 
				while($sermon_series->have_posts()): $sermon_series->the_post(); ?>
					<div class="nr_mosiac_col">
						<a class="nr_card" href="<?= get_permalink(); ?>">
							<div class="nr_card_image nr_card_image--mosiac">
								<div class="content" style="background-image: url(<?= wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>);"></div>
							</div>
							<div class="nr_card_link">
								<span class="text-primary">Current Series: <?= the_title(); ?></span>
								<i class="glyphicon glyphicon-chevron-right pull-right"></i>
							</div>
						</a>
					</div>
				<?php endwhile; wp_reset_query(); ?>
			<?php else: ?>
				<?php while(have_rows('main_conversion')): the_row(); ?>
				<div class="nr_mosiac_col">
					<a class="nr_card" href="<?= the_sub_field('link'); ?>">
						<div class="nr_card_image nr_card_image--mosiac">
							<div class="content" style="background-image: url(<?= the_sub_field('image'); ?>);"></div>
						</div>
						<div class="nr_card_link">
							<span class="text-primary"><?= the_sub_field('title'); ?></span>
							<i class="glyphicon glyphicon-chevron-right pull-right"></i>
						</div>
					</a>
				</div>
				<?php endwhile; ?>
			<?php endif; ?>
			<div class="nr_mosiac_col">
				<div class="nr_mosiac_row">
					<?php while(have_rows('conversion_mosiac')): the_row(); ?>
					<div class="nr_mosiac_col">
						<a class="nr_card" href="<?= the_sub_field('link'); ?>">
							<div class="nr_card_image nr_card_image--mosiac-sm">
								<div class="content" style="background-image: url(<?= the_sub_field('image'); ?>);"></div>
							</div>
							<div class="nr_card_link" >
								<span class="text-primary"><?= the_sub_field('title'); ?></span>
								<i class="glyphicon glyphicon-chevron-right pull-right"></i>
							</div>
						</a>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
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