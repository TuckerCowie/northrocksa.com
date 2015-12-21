<header class="banner">
  <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">
            <img src="<?= get_template_directory_uri() . '/assets/images/logo-horizontal.png'; ?>" height="100%">
          </a>
        </div>
        <div class="collapse navbar-collapse nr_navbar" id="top-nav">
          <?php
          if (has_nav_menu('top_navigation')) :
            wp_nav_menu([
              'theme_location' => 'top_navigation',
              'menu_class' => 'nav navbar-nav nr_navbar_nav navbar-right',
              'walker' => new wp_bootstrap_navwalker()
              ]);
          endif;
          ?>
        </div>
      </div>
    </nav>
  </div>
</header>
