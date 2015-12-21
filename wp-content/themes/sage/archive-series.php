<div class="nr_series container-fluid">
	<div class="container text-center">
		<h1>Sermon Series</h1>
		<?php if (!have_posts()) : ?>
			<div class="alert alert-danger">
				<?php _e('Sorry, there are no series at this time.', 'sage'); ?>
			</div>
			<?php get_search_form(); ?>
		<?php endif; ?>
		<div class="row">
			<?php while (have_posts()) : the_post(); ?>
				<div class="col-md-4">
					<div class="nr_series_thumbnail">
						<a href="<?php the_permalink(); ?>" class="content" style="background-image:url(<?= wp_get_attachment_url( get_post_thumbnail_id() ) ?>);">
							<div class="nr_series_thumbnail_screen">
								<span class="btn btn-default">View Series&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></span>
							</div>
						</a>

					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
