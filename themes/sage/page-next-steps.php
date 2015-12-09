<?php use Roots\Sage\Titles; ?>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  	<div class="container">
		<h1 class="text-center"><?= Titles\title(); ?></h1>
		<div class="row">
			<?php $index = 1; while ( have_rows('steps') ) : the_row(); ?>
				<div class="col-md-3 text-center">
					<img src="<?= the_sub_field('image') ?>">
					<span class="stamp"><?= $index; ?></span>
					<h2><?= the_sub_field('title'); ?></h2>
					<p><?php the_sub_field('content'); ?></p>
					<a class="btn btn-default btn-block" href="<?= the_sub_field('button_link'); ?>"><?= the_sub_field('button_text'); ?></a>
				</div>
			<?php $index++; endwhile; ?>
		</div>
		<hr>
		<?= the_content(); ?>
	</div>
<?php endwhile; ?>