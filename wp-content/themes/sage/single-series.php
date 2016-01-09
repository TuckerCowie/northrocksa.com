<?php use Roots\Sage\Titles; ?>
<?php use NR\Youtube; ?>
<?php while (have_posts()) : the_post(); ?>
<div class="nr_series-single">
	<h1 class="text-white">
		<?= Titles\title(); ?>
		<?php if (!get_next_post()): ?>
			<span class="label label-primary">Current Serries</span>
		<?php endif; ?>
		<div class="pull-right">
			<a target="_blank" href="https://plus.google.com/share?url=<?= get_permalink(); ?>">
				<img src="<?= get_template_directory_uri();?>/assets/images/social-google-plus.svg">
			</a>
			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink(); ?>">
				<img src="<?= get_template_directory_uri();?>/assets/images/social-facebook.svg">
			</a>
			<a target="_blank" href="https://twitter.com/intent/tweet?url=<?= get_permalink(); ?>&original_referer=<?= get_permalink(); ?>">
				<img src="<?= get_template_directory_uri();?>/assets/images/social-twitter.svg">
			</a>
		</div>
	</h1>
	<?php if(has_post_thumbnail()): ?>
		<img class="nr_card nr_card--margin nr_series-single_image" src="<?= wp_get_attachment_url( get_post_thumbnail_id() ) ?>">
	<?php endif; ?>
	<?php the_content(); ?>
	<?php if(have_rows('sermons')): ?>
		<table class="nr_sermons-table">
			<?php while(have_rows('sermons')): the_row(); ?>
				<?php $video = Youtube\getVideo(get_sub_field('youtube_id')); ?>
				<tr>
					<td class="nr_sermons-table_date"><?php the_sub_field('date'); ?></td>
					<td class="nr_sermons-table_video">
						<a class="nr_video-box" href="https://www.youtube.com/embed/<?php the_sub_field('youtube_id'); ?>">
							<img src="<?= get_template_directory_uri(); ?>/assets/images/play-small.svg" alt="View Episode">
						</a>
					</td>
					<td class="nr_sermons-table_podcast">
						<?php if (get_sub_field('podcast_link')): ?>
							<a href="<?php the_sub_field('podcast_link'); ?>" target="_blank">
								<img src="<?= get_template_directory_uri() . '/assets/images/podcast-small.svg' ?>" alt="Get Podcast">
							</a>
						<?php endif; ?>
					</td>
					<td class="nr_sermons-table_title">
						<a class="nr_video-box" href="https://www.youtube.com/embed/<?php the_sub_field('youtube_id'); ?>">
							<?= $video ? $video->title : 'Sermon Video'; ?>
						</a>
					</td>
					<td class="nr_sermons-table_social text-right">
						<a target="_blank" href="https://plus.google.com/share?url=https://www.youtube.com/watch?v=<?php the_sub_field('youtube_id'); ?>">
							<img src="<?= get_template_directory_uri();?>/assets/images/social-google-plus.svg">
						</a>
						<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.youtube.com/watch?v=<?php the_sub_field('youtube_id'); ?>">
							<img src="<?= get_template_directory_uri();?>/assets/images/social-facebook.svg">
						</a>
						<a target="_blank" href="https://twitter.com/intent/tweet?url=https://www.youtube.com/watch?v=<?php the_sub_field('youtube_id'); ?>&original_referer=https://www.youtube.com/watch?v=<?php the_sub_field('youtube_id'); ?>">
							<img src="<?= get_template_directory_uri();?>/assets/images/social-twitter.svg">
						</a>
					</td>

				</tr>
			<?php endwhile; ?>
		</table>
	<?php endif; ?>
</div>
<?php endwhile; ?>