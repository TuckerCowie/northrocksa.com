<?php use NR\Vimeo; ?>
<div class="nr_series container-fluid">
	<div class="container text-center">
		<h1>Other Videos</h1>
		<?php if (!have_posts()) : ?>
			<div class="alert alert-danger" style="margin-top:20px">
				<?php _e('Sorry, there are no other videos at this time.', 'sage'); ?>
			</div>
			<?php get_search_form(); ?>
		<?php endif; ?>
		<div class="row">
			<?php while (have_posts()) : the_post();
				$video = Vimeo\getVideo(get_field('vimeo_id')); ?>
				<div class="col-md-4">
					<a class="nr_card nr_card--video text-center na_video-box" href="https://player.vimeo.com/video/<?= get_field('vimeo_id'); ?>?portrait=0&badge=0&byline=0&autoplay=1&portrait=0&color=B23615" style="background-image: url(<?= $video->thumbnail_large; ?>);">
						<div class="nr_card_image nr_card_image--16x9">
							<div class="content">
							</div>
						</div>
						<div class="nr_card--video_tray">
							<div class="nr_card--video_badge">
								<img width="50px" src="<?= get_template_directory_uri() . '/assets/images/play.svg' ?>">
							</div>
	    					<div class="nr_card_content text-primary">
	    						<h4><?= the_title(); ?></h4>
	    						<p class="text-muted">Uploaded <?= date('m/d/y', strtotime($video->upload_date)); ?> • <?= $video->stats_number_of_plays; ?> Plays</p>
    						</div>
						</div>
					</a>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
