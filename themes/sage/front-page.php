<?php while (have_posts()) : the_post(); ?>
  <h1>home</h1>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
