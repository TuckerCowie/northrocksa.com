<?php
if (is_singular('series')) {
	?>
	<div class="nr_card">
		[Login Promo graphic]
		<div class="nr_card_content">
			<p>Login to with Facebook to view photos from this week!</p>
			[Login Button]
		</div>
	</div>
	<?php
	// dynamic_sidebar('sidebar-series');
} else {
	dynamic_sidebar('sidebar-primary');
}

