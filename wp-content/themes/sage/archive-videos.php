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
			<?php while (have_posts()) : the_post(); ?>
				<div class="col-md-4">
					<?php $link = get_field('type') == 'vimeo' ? 'https://player.vimeo.com/video/' . get_field('vimeo_id') . '?portrait=0&badge=0&byline=0&autoplay=1&portrait=0&color=B23615' : 'https://www.youtube.com/embed/' . get_field('youtube_id'); ?>
					<a class="nr_card nr_card--video text-center na_video-box" href="<?= $link; ?>" style="background-image: url(<?= wp_get_attachment_url( get_post_thumbnail_id()); ?>);">
						<div class="nr_card_image nr_card_image--16x9">
							<div class="content">
							</div>
						</div>
						<div class="nr_card--video_tray">
							<div class="nr_card--video_badge">
								<img width="50px" src="<?= get_template_directory_uri() . '/assets/images/play.svg' ?>">
							</div>
	    					<div class="nr_card_content text-primary"><h4><?= the_title(); ?></h4></div>
						</div>
					</a>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
