<?php while(have_rows('conversion_mosiac')): the_row(); ?>
	<div class="nr_mosiac_col">
		<a class="nr_card" href="<?= the_sub_field('link'); ?>">
			<div class="nr_card_image nr_card_image--mosiac">
				<div class="content" style="background-image: url(<?= the_sub_field('image'); ?>);"></div>
			</div>
			<div class="nr_card_link">
				<span class="text-primary"><?= the_sub_field('title'); ?></span>
				<i class="glyphicon glyphicon-chevron-right pull-right"></i>
			</div>
		</a>
	</div>
<?php endwhile; ?>