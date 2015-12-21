<?php if (has_post_thumbnail()): ?>
	<div class="nr_page-header">
		<div class="nr_page-header_image">
			<div class="content" style="background-image: url(<?= wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>
		</div>
	</div>
<?php endif; ?>
