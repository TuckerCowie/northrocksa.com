<div class="nr_parallax-bg" style="padding: 100px 0; margin: 0; background-image: url(<?= the_sub_field('section_photo'); ?>);>">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 <?= get_sub_field('section_alignment') == 'right' ? 'col-md-offset-6' : ''; ?>">
				<h1><?php the_sub_field('section_title') ?></h1>
				<?php the_sub_field('section_body') ?>
			</div>
		</div>
	</div>
</div>