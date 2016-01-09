<div class="nr_page-header <?= has_post_thumbnail() ? 'nr_page-header--has-image' : 'nr_page-header--has-spacer' ?>">
	<?php if (has_post_thumbnail()): ?>
		<div class="nr_page-header_image">
			<div class="content" style="background-image: url(<?= wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>
		</div>
	<?php endif; ?>
</div>

