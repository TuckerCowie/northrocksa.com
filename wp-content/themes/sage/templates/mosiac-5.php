<?php $mosiac = get_field('conversion_mosiac'); ?>
<a class="nr_mosiac_flex-tile nr_mosiac_flex-tile--column nr_mosiac_flex-tile--horizontal-half nr_card" href="<?= $mosiac[0]['link'] ?>">
	<div class="nr_card_image nr_card_image--1x1">
		<div class="content" style="background-image: url(<?= $mosiac[0]['image'] ?>);"></div>
	</div>
	<div class="nr_card_link">
		<span class="text-primary"><?= $mosiac[0]['title'] ?></span>
		<i class="glyphicon glyphicon-chevron-right pull-right"></i>
	</div>
</a>
<div class="nr_mosiac_flex-tile nr_mosiac_flex-tile--column nr_mosiac_flex-tile--horizontal-half">
	<div class="nr_mosiac_flex-tile--vertical">
		<a class="nr_mosiac_flex-tile nr_mosiac_flex-tile--column nr_mosiac_flex-tile--horizontal-half nr_card" href="<?= $mosiac[1]['link'] ?>">
			<div class="nr_card_image nr_card_image--flex-grow" style="background-image: url(<?= $mosiac[1]['image'] ?>);">
			</div>
			<div class="nr_card_link">
				<span class="text-primary"><?= $mosiac[1]['title'] ?></span>
				<i class="glyphicon glyphicon-chevron-right pull-right"></i>
			</div>
		</a>
		<a class="nr_mosiac_flex-tile nr_mosiac_flex-tile--column nr_mosiac_flex-tile--horizontal-half nr_card" href="<?= $mosiac[2]['link'] ?>">
			<div class="nr_card_image nr_card_image--flex-grow" style="background-image: url(<?= $mosiac[2]['image'] ?>);">
			</div>
			<div class="nr_card_link">
				<span class="text-primary"><?= $mosiac[2]['title'] ?></span>
				<i class="glyphicon glyphicon-chevron-right pull-right"></i>
			</div>
		</a>
	</div>
	<div class="nr_mosiac_flex-tile--vertical">
		<a class="nr_mosiac_flex-tile nr_mosiac_flex-tile--column nr_mosiac_flex-tile--horizontal-half nr_card" href="<?= $mosiac[3]['link'] ?>">
			<div class="nr_card_image nr_card_image--flex-grow" style="background-image: url(<?= $mosiac[3]['image'] ?>);">
			</div>
			<div class="nr_card_link">
				<span class="text-primary"><?= $mosiac[3]['title'] ?></span>
				<i class="glyphicon glyphicon-chevron-right pull-right"></i>
			</div>
		</a>
		<a class="nr_mosiac_flex-tile nr_mosiac_flex-tile--column nr_mosiac_flex-tile--horizontal-half nr_card" href="<?= $mosiac[4]['link'] ?>">
			<div class="nr_card_image nr_card_image--flex-grow" style="background-image: url(<?= $mosiac[4]['image'] ?>);">
			</div>
			<div class="nr_card_link">
				<span class="text-primary"><?= $mosiac[4]['title'] ?></span>
				<i class="glyphicon glyphicon-chevron-right pull-right"></i>
			</div>
		</a>
	</div>
</div>