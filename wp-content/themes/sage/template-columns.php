<?php
/**
 * Template Name: Columns
 */
?>
<?php use Roots\Sage\Titles; ?>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  	<div class="container">
		<h1 class="text-center"><?= Titles\title(); ?></h1>
		<div class="row">
			<?php $index = 1; while ( have_rows('steps') ) : the_row(); ?>
				<div class="col-sm-<?= 12/count(get_field('steps')); ?> text-center nr_next-steps">
					<div class="nr_next-steps_window">
						<div class="content" style="background-image:url(<?= the_sub_field('image') ?>);"></div>
					</div>
					<img class="nr_next-steps_stamp" src="<?= get_template_directory_uri() . '/assets/images/stamp-' . $index . '.svg' ?>">
					<h2><?= the_sub_field('title'); ?></h2>
					<p><?php the_sub_field('content'); ?></p>
					<a class="btn btn-default btn-block" href="<?= the_sub_field('button_link'); ?>"><?= the_sub_field('button_text'); ?>&nbsp;<i class="glyphicon glyphicon-chevron-right"></i></a>
				</div>
			<?php $index++; endwhile; ?>
		</div>
		<?= the_content(); ?>
	</div>
<?php endwhile; ?>