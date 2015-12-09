<footer class="container-fluid">
  <div class="container">
  	<div class="row">
  		<div class="col-md-9">
  			<a href="/">
          <img src="<?= get_template_directory_uri() . '/assets/images/logo-horizontal-white.png'; ?>" height="100%">
        </a>
  			<!-- White Logo -->
  		</div>
  		<div class="col-md-3">
        <div class="col-xs-2 col-md-offset-2">
          <a href=""><img src="<?= get_template_directory_uri() . '/assets/images/social-google-plus.svg'; ?>"></a>
        </div>
        <div class="col-xs-2">
          <a href=""><img src="<?= get_template_directory_uri() . '/assets/images/social-facebook.svg'; ?>"></a>
        </div>
        <div class="col-xs-2">
          <a href=""><img src="<?= get_template_directory_uri() . '/assets/images/social-twitter.svg'; ?>"></a>
        </div>
        <div class="col-xs-2">
          <a href=""><img src="<?= get_template_directory_uri() . '/assets/images/social-instagram.svg'; ?>"></a>
        </div>
  			<div class="col-xs-2">
       <a href=""><img src="<?= get_template_directory_uri() . '/assets/images/social-youtube.svg'; ?>"></a>   
        </div>
  		</div>
  	</div>
  	<div class="row">
      <div class="col-md-3">
        <?php dynamic_sidebar('sidebar-footer-1'); ?>
      </div>
      <div class="col-md-3">
        <?php dynamic_sidebar('sidebar-footer-2'); ?>
      </div>
      <div class="col-md-3">
        <?php dynamic_sidebar('sidebar-footer-3'); ?>
      </div>
  		<div class="col-md-3">
		    <?php dynamic_sidebar('sidebar-footer-4'); ?>
  		</div>
  	</div>
  </div>
</footer>