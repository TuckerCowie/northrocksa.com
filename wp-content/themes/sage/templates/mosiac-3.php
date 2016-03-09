<?php $mosiac = get_field('conversion_mosiac'); ?>
<div class="nr_mosiac_flex-tile nr_mosiac_flex-tile--column nr_mosiac_flex-tile--horizontal-half">
	<a class="nr_mosiac_flex-tile nr_mosiac_flex-tile--column nr_mosiac_flex-tile--vertical nr_card" href="<?= $mosiac[0]['link'] ?>">
		<div class="nr_card_image nr_card_image--flex-grow" style="background-image: url(<?= $mosiac[0]['image'] ?>);">
		</div>
		<div class="nr_card_link">
			<span class="text-primary"><?= $mosiac[0]['title'] ?></span>
			<i class="glyphicon glyphicon-chevron-right pull-right"></i>
		</div>
	</a>
	<a class="nr_mosiac_flex-tile nr_mosiac_flex-tile--column nr_mosiac_flex-tile--vertical nr_card" href="<?= $mosiac[1]['link'] ?>">
		<div class="nr_card_image nr_card_image--flex-grow" style="background-image: url(<?= $mosiac[1]['image'] ?>);">
		</div>
		<div class="nr_card_link">
			<span class="text-primary"><?= $mosiac[1]['title'] ?></span>
			<i class="glyphicon glyphicon-chevron-right pull-right"></i>
		</div>
	</a>
</div>