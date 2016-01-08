<?php $mosiac = get_field('conversion_mosiac'); ?>
<div class="nr_mosiac_col">
	<a class="nr_card" href="<?= $mosiac[0]['link'] ?>">
		<div class="nr_card_image nr_card_image--mosiac">
			<div class="content" style="background-image: url(<?= $mosiac[0]['image'] ?>);"></div>
		</div>
		<div class="nr_card_link">
			<span class="text-primary"><?= $mosiac[0]['title'] ?></span>
			<i class="glyphicon glyphicon-chevron-right pull-right"></i>
		</div>
	</a>
</div>
<div class="nr_mosiac_col">
	<div class="nr_mosiac_row">
		<a class="nr_card" href="<?= $mosiac[1]['link'] ?>">
			<div class="nr_card_image nr_card_image--mosiac">
				<div class="content" style="background-image: url(<?= $mosiac[1]['image'] ?>);"></div>
			</div>
			<div class="nr_card_link">
				<span class="text-primary"><?= $mosiac[1]['title'] ?></span>
				<i class="glyphicon glyphicon-chevron-right pull-right"></i>
			</div>
		</a>
	</div>
	<div class="nr_mosiac_row">
		<a class="nr_card" href="<?= $mosiac[2]['link'] ?>">
			<div class="nr_card_image nr_card_image--mosiac">
				<div class="content" style="background-image: url(<?= $mosiac[2]['image'] ?>);"></div>
			</div>
			<div class="nr_card_link">
				<span class="text-primary"><?= $mosiac[2]['title'] ?></span>
				<i class="glyphicon glyphicon-chevron-right pull-right"></i>
			</div>
		</a>
	</div>
</div>