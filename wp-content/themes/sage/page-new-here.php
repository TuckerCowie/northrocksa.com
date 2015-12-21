<?php use NR\Vimeo; ?>
<?php use Roots\Sage\Titles; ?>
<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/page', 'header'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-4" style="padding-top: 2rem">
				<?php if( have_rows('video') ):
    				while ( have_rows('video') ) : the_row();
    					$video = Vimeo\getVideo(get_sub_field('video_id')); ?>
    					<a class="nr_card nr_card--video text-center" href="<?= $video->url; ?>">
    						<img src="<?= $video->thumbnail_large; ?>">
    						<span class="nr_card--video_badge">
								<img width="50px" src="<?= get_template_directory_uri() . '/assets/images/play.svg' ?>">
    						</span>
        					<div class="nr_card_content text-primary"><h4><?php the_sub_field('title'); ?></h4></div>
    					</a>
    				<?php endwhile; ?>
					<hr>
				<?php endif; ?>
				<?php if (get_field('services')):
					the_field('services');
				endif; ?>
			</div>
			<div class="col-md-8">
  				<h1><?= Titles\title(); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
<?php endwhile; ?>