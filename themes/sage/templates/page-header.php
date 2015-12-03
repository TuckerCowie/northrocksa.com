<?php use Roots\Sage\Titles; ?>

<div class="nr_page-header">
	<?php if (has_post_thumbnail()): ?>
		<?php the_post_thumbnail('full', [
			'class' => 'attachment-$size nr_page-header_image'
		]); ?>
	<?php endif; ?>
  <h1 class="nr_page-header_title"><?= Titles\title(); ?></h1>
</div>
