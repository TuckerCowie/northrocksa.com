<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <?php if (!Setup\display_sidebar()) : ?>
      <div role="document">
        <div class="content">
          <main>
            <?php include Wrapper\template_path(); ?>
          </main><!-- /.main -->
          <?php
            do_action('get_footer');
            get_template_part('templates/footer');
            wp_footer();
          ?>
        </div><!-- /.content -->
      </div><!-- /.wrap -->
    <?php else: ?>
      <div role="document" class="container">
        <div class="content row">
          <main class="col-md-8">
            <?php include Wrapper\template_path(); ?>
          </main>
          <aside class="col-sm-4">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        </div><!-- /.content -->
      </div><!-- /.wrap -->
      <?php
        do_action('get_footer');
        get_template_part('templates/footer');
        wp_footer();
      ?>
    <?php endif; ?>
  </body>
</html>
