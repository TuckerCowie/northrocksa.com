<?php use NR\Vimeo; ?>
<?php $video = Vimeo\getVideo(get_sub_field('vimeo_id')); ?>
<div class="container" style="padding-top: 40px; padding-bottom: 40px;">
	<div class="row">
		<?php if (get_sub_field('section_alignment') == 'left'): ?>
			<div class="col-md-6">
				<h1><?php the_sub_field('section_title') ?></h1>
				<?php the_sub_field('section_body') ?>
			</div>
			<div class="col-md-6">
				<a class="nr_card nr_card--video text-center na_video-box" href="https://player.vimeo.com/video/<?= get_sub_field('vimeo_id'); ?>?portrait=0&badge=0&byline=0&autoplay=1&portrait=0&color=B23615" style="background-image: url(<?= $video->thumbnail_large; ?>);">
					<div class="nr_card_image nr_card_image--16x9">
						<div class="content">
						</div>
					</div>
					<div class="nr_card--video_tray">
						<div class="nr_card--video_badge">
							<img width="50px" src="<?= get_template_directory_uri() . '/assets/images/play.svg' ?>">
						</div>
						<div class="nr_card_content text-primary"><h4><?php the_sub_field('video_title'); ?></h4></div>
					</div>
				</a>
			</div>
		<?php else: ?>
			<div class="col-md-6">
				<a class="nr_card nr_card--video text-center na_video-box" href="https://player.vimeo.com/video/<?= get_sub_field('vimeo_id'); ?>?portrait=0&badge=0&byline=0&autoplay=1&portrait=0&color=B23615" style="background-image: url(<?= $video->thumbnail_large; ?>);">
					<div class="nr_card_image nr_card_image--16x9">
						<div class="content">
						</div>
					</div>
					<div class="nr_card--video_tray">
						<div class="nr_card--video_badge">
							<img width="50px" src="<?= get_template_directory_uri() . '/assets/images/play.svg' ?>">
						</div>
						<div class="nr_card_content text-primary"><h4><?php the_sub_field('video_title'); ?></h4></div>
					</div>
				</a>
			</div>
			<div class="col-md-6">
				<h1><?php the_sub_field('section_title') ?></h1>
				<?php the_sub_field('section_body') ?>
			</div>
		<?php endif; ?>
	</div>
</div>
