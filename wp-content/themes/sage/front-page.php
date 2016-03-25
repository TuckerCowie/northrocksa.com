<?php while (have_posts()) : the_post(); ?>

	<?php if (have_rows('promo')): ?>
		<?php while(have_rows('promo')): the_row(); ?>
		<div class="promo">
			<?php if(get_sub_field('background_image') || get_sub_field('video_sources')): ?>
				<div class="promo_video">
					<video muted autoplay loop poster="<?= the_sub_field('background_image'); ?>">
						<?php if (have_rows('video_sources')): while(have_rows('video_sources')): the_row(); ?>
							<source src="<?= the_sub_field('source'); ?>">
						<?php endwhile; endif; ?>
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
				<?php $sermon_series = new WP_Query(['post_type'=>'series', 'posts_per_page'=>1]);
					if(get_field('conversion_mosiac') && $sermon_series->have_posts()):
						while($sermon_series->have_posts()): $sermon_series->the_post(); ?>
						 <a class="nr_mosiac_flex-tile nr_mosiac_flex-tile--column nr_mosiac_flex-tile--horizontal-half nr_card" href="<?= get_permalink(); ?>">
						 	<div class="nr_card_image nr_card_image--1x1">
						 		<div class="content" style="background-image: url(<?= wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]; ?>);"></div>
						 	</div>
						 	<div class="nr_card_link">
						 		<span class="text-primary">Current Series: <?= the_title(); ?></span>
						 		<i class="glyphicon glyphicon-chevron-right pull-right"></i>
						 	</div>
						 </a>
					<?php endwhile; wp_reset_query(); ?>
					<?php get_template_part('templates/mosiac', count(get_field('conversion_mosiac')) + 1); ?>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>	

	<div class="nr_parallax-bg" style="background-image: url(<?= the_field('parallax_background'); ?>);>">
		<div class="container text-center">
			<img width="50px" src="<?= get_template_directory_uri() . '/assets/images/logo-mark.png' ?>">
			<h1><?= the_title(); ?></h1>
			<?= the_content(); ?>
		</div>
	</div>

	<div class="container">
		<div class="flex-row">
			<?php $cards = get_field('cards');
				if ($cards) {
					foreach ($cards as $card) { ?>
						<a class="nr_card nr_card--flex text-center flex-item flex-column" href="<?= $card['button_link']; ?>">
							<?php if ($card['image']): ?><img class="nr_card_image" src="<?= $card['image']; ?>"><?php endif; ?>
							<div class="nr_card_content flex-fill flex-column">
								<p class="flex-fill"><?= $card['content']; ?></p>
								<?php if ($card['image']): ?><span class="btn btn-default btn-block"><?= $card['button_label']; ?></span><?php endif; ?>
							</div>
						</a>
					<?php }
				} ?>
		</div>
	</div>

<?php endwhile; ?>