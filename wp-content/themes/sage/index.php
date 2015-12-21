<?php use Roots\Sage\Titles; ?>
<?php get_template_part('templates/page', 'header'); ?>

<h1><?php Titles\title(); ?></h1>
<?php if (!have_posts()) : ?>
	<article>
	  <div class="alert alert-danger">
	    <?php _e('Sorry, no articles were found.', 'sage'); ?>
	  </div>
	</article>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>

