<footer class="container-fluid">
  <div class="container">
  	<div class="row">
  		<div class="col-md-6">
  			White Logo
  			<!-- White Logo -->
  		</div>
  		<div class="col-md-6 text-right">
  			Social Icons
  		</div>
  	</div>
  	<div class="row">
  		<div class="col-md-9">
			<?php if (has_nav_menu('footer_navigation')) : ?>
				<nav class="nr_footer-nav">
					<?php wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav nav-pills']); ?>
				</nav>
			<?php endif; ?>
  		</div>
  		<div class="col-md-3">
		    <?php dynamic_sidebar('sidebar-footer'); ?>
  		</div>
  	</div>
  </div>
</footer>