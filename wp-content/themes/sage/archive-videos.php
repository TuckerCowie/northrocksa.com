<?php use NR\Youtube; ?>
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
				$video = Youtube\getVideo(get_field('video_id')); ?>
				<div class="col-md-4">
					<a class="nr_card nr_card--video text-center nr_video-box" href="https://www.youtube.com/embed/<?= get_field('video_id'); ?>" style="background-image: url(http://img.youtube.com/vi/<?= get_field('video_id'); ?>/maxresdefault.jpg);">
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
	    						<p class="text-muted">
                    <?= $video->recordingDetails->recordingDate ? 'Recorded ' . date('m/d/y', strtotime($video->recordingDetails->recordingDate)) : 'Uploaded ' . date('m/d/y', strtotime($video->snippet->publishedAt)); ?>
                  </p>
    						</div>
						</div>
					</a>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
