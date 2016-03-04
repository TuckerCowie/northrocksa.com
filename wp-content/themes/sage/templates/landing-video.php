<?php use NR\Youtube; ?>
<?php $video = Youtube\getVideo(get_sub_field('video_id')); ?>
<div class="container" style="padding-top: 40px; padding-bottom: 40px;">
	<div class="row">
		<div class="col-md-6 <?= get_sub_field('section_alignment') != 'left' ? 'col-md-push-6' : ''; ?>">
			<h1><?php the_sub_field('section_title') ?></h1>
			<?php the_sub_field('section_body') ?>
		</div>
		<div class="col-md-6 <?= get_sub_field('section_alignment') != 'left' ? 'col-md-pull-6' : ''; ?>">
			<a class="nr_card nr_card--video text-center na_video-box" href="https://youtube.com/embed/<?= get_sub_field('video_id'); ?>" style="background-image: url(<?= $video->thumbnails->high->url; ?>);">
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
	</div>
</div>
