<?php use Roots\Sage\Titles; ?>
<?php use NR\Youtube; ?>
<?php while (have_posts()) : the_post(); ?>
<div class="nr_series-single">
	<div class="nr_card nr_card--dark">
		<div class="nr_card_content">
			<h1 class="text-white" style="margin:0">
				<?= Titles\title(); ?>
				<?php if (!get_next_post()): ?>
					<span class="label label-primary">Current Series</span>
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
		</div>
		<?php if(has_post_thumbnail()): ?>
			<img class="nr_series-single_image" src="<?= wp_get_attachment_url( get_post_thumbnail_id() ) ?>">
		<?php endif; ?>
		<div class="nr_card_content">
			<?php the_content(); ?>
		</div>
		<?php if(have_rows('sermons')): ?>
			<?php while(have_rows('sermons')): the_row(); ?>
				<div class="nr_sermon">
					<?php $video = Youtube\getVideo(get_sub_field('youtube_id')); ?>
					<span class="nr_sermon_item"><?= date('m/d', strtotime($video->publishedAt)); ?></span>
					<a class="nr_sermon_item nr_video-box" href="https://www.youtube.com/embed/<?php the_sub_field('youtube_id'); ?>">
						<img src="<?= get_template_directory_uri(); ?>/assets/images/play-small.svg" alt="View Episode">
					</a>
					<?php if (get_sub_field('podcast_link')): ?>
						<a class="nr_sermon_item" href="<?php the_sub_field('podcast_link'); ?>" target="_blank">
							<img src="<?= get_template_directory_uri() . '/assets/images/podcast-small.svg' ?>" alt="Get Podcast">
						</a>
					<?php endif; ?>
					<a class="nr_sermon_item nr_video-box" href="https://www.youtube.com/embed/<?php the_sub_field('youtube_id'); ?>">
						<?= $video ? $video->title : 'Sermon Video'; ?>
					</a>
					<div class="nr_sermon_item nr_sermon_item--right">
						<a target="_blank" href="https://plus.google.com/share?url=https://www.youtube.com/watch?v=<?php the_sub_field('youtube_id'); ?>">
							<img src="<?= get_template_directory_uri();?>/assets/images/social-google-plus.svg">
						</a>
						<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.youtube.com/watch?v=<?php the_sub_field('youtube_id'); ?>">
							<img src="<?= get_template_directory_uri();?>/assets/images/social-facebook.svg">
						</a>
						<a target="_blank" href="https://twitter.com/intent/tweet?url=https://www.youtube.com/watch?v=<?php the_sub_field('youtube_id'); ?>&original_referer=https://www.youtube.com/watch?v=<?php the_sub_field('youtube_id'); ?>">
							<img src="<?= get_template_directory_uri();?>/assets/images/social-twitter.svg">
						</a>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>
<?php endwhile; ?>