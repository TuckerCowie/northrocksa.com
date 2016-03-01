<div style="width: 100%; background-color: #ebe8e0">
	<div class="container" style="padding-top: 40px; padding-bottom: 40px;">
		<h1 class="text-center"><?php the_sub_field('section_title') ?></h1>
		<div class="text-center"><?php the_sub_field('section_body') ?></div>
		<div class="row">
			<?php $columns = get_sub_field('columns');
			if (have_rows('text_grid')): $i = 0;
				while(have_rows('text_grid')): the_row(); ?>
					<div class="col-md-<?= 12 / $columns; ?> text-center">
						<h3><?= the_sub_field('title');?></h3>
						<p><?= the_sub_field('text');?></p>
					</div>
					<?php if ($i > 0 && $i % $columns) : ?>
						</div><div class="row">
					<?php endif; ?>
				<?php $i++; endwhile;
			endif; ?>
		</div>
	</div>
</div>