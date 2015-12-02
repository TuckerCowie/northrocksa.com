<?php while (have_posts()) : the_post(); ?>
<pre>page-about</pre>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>