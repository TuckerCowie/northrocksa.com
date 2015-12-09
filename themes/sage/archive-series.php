<div class="nr_series container-fluid">
	<div class="container text-center">
		<h1>Sermon Series</h1>
		<?php if (!have_posts()) : ?>
			<div class="alert alert-danger">
				<?php _e('Sorry, no results were found.', 'sage'); ?>
			</div>
			<?php get_search_form(); ?>
		<?php endif; ?>
		<div class="row">
			<?php while (have_posts()) : the_post(); ?>
				<div class="col-md-4">
					<a href="<?php the_permalink(); ?>" class="nr_series-thumbnail">
						<img src="/<?= wp_get_attachment_url( get_post_thumbnail_id( the_id() ) ) ?>">
						<div class="nr_series-thumbnail_screen">
							<span class="btn btn-default">View Series</a>
						</div>
					</a>
				</div>
			<?php endwhile; ?>
		</div>
		<?php the_posts_navigation(); ?>
	</div>
</div>
