<footer class="container-fluid">
  <div class="container">
  	<div class="row" style="margin-bottom: 20px;">
  		<div class="col-md-9">
  			<a href="/">
          <img width="195px" src="<?= get_template_directory_uri() . '/assets/images/logo-horizontal-white.png'; ?>" height="100%">
        </a>
  			<!-- White Logo -->
  		</div>
  		<div class="col-md-3 text-right">
        <a class="nr_social-link" target="_blank" href="https://plus.google.com/108064111584202502836"><img src="<?= get_template_directory_uri() . '/assets/images/social-google-plus.svg'; ?>"></a>
        <a class="nr_social-link" target="_blank" href="https://www.facebook.com/northrocksa"><img src="<?= get_template_directory_uri() . '/assets/images/social-facebook.svg'; ?>"></a>
        <a class="nr_social-link" target="_blank" href="https://twitter.com/northrocksa"><img src="<?= get_template_directory_uri() . '/assets/images/social-twitter.svg'; ?>"></a>
        <a class="nr_social-link" target="_blank" href="https://www.instagram.com/northrocksa/"><img src="<?= get_template_directory_uri() . '/assets/images/social-instagram.svg'; ?>"></a>
        <a class="nr_social-link" target="_blank" href="https://www.youtube.com/channel/UCMADIhuPszlVKwjOF5tJW4Q"><img src="<?= get_template_directory_uri() . '/assets/images/social-youtube.svg'; ?>"></a> 
  		</div>
  	</div>
  	<div class="row">
      <div class="col-md-3">
        <?php
          if (has_nav_menu('left-footer_navigation')) :
            wp_nav_menu([
              'theme_location' => 'left-footer_navigation',
              'menu_class' => 'nr_footer-nav'
              ]);
          endif;
          ?>
      </div>
      <div class="col-md-3">
        <?php
          if (has_nav_menu('center-footer_navigation')) :
            wp_nav_menu([
              'theme_location' => 'center-footer_navigation',
              'menu_class' => 'nr_footer-nav'
              ]);
          endif;
          ?>
      </div>
      <div class="col-md-3">
        <?php
          if (has_nav_menu('right-footer_navigation')) :
            wp_nav_menu([
              'theme_location' => 'right-footer_navigation',
              'menu_class' => 'nr_footer-nav'
              ]);
          endif;
          ?>
      </div>
  		<div class="col-md-3">
        <div class="nr_card nr_card--red">
		      <?php dynamic_sidebar('sidebar-footer'); ?>
        </div>
  		</div>
  	</div>
  </div>
</footer>