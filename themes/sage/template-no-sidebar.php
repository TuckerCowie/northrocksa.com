<?php
/**
 * Template Name: No Sidebar
 */
?>
<?php use Roots\Sage\Titles; ?>
<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/page', 'header'); ?>
	<div class="container">
		<h1 class="text-center"><?= Titles\title(); ?></h1>
		<?php the_content(); ?>
	</div>
<?php endwhile; ?>