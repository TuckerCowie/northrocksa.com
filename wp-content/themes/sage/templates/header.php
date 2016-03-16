<header class="nr_navbar-container">
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">
            <img src="<?= get_template_directory_uri() . '/assets/images/logo-horizontal.png'; ?>" height="100%">
          </a>
          <?php
            function isSundayMorning() {
              $dateTime = new DateTime('now', new DateTimeZone('America/Chicago'));
              $dateTime->setTimestamp(time());
              $currentHour = $dateTime->format('H');
              return ($dateTime->format('l') == 'sunday') && ($currentHour > 7) && ($currentHour < 13);
            }
            if (isSundayMorning()):
          ?>
            <a href="http://northrocksa.churchonline.org/" target="_blank" class="btn btn-default navbar-btn hidden-xs hidden-sm" style="border-color:#dd2233;color:#dd2233;"> <span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Watch Live</a>
          <?php endif; ?>
        </div>
        <div class="collapse navbar-collapse nr_navbar" id="top-nav">
          <?php if (isSundayMorning()): ?>
            <a href="#" class="btn btn-default navbar-btn btn-block visible-xs-block" style="border-color:#dd2233;color:#dd2233;"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Watch Live</a>
          <?php
          endif;
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
