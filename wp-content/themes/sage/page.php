<?php use Roots\Sage\Titles; ?>
<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/page', 'header'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-3" style="padding-top: 2rem;">
				<?php wp_nav_menu(array(
				    'theme_location' => 'top_navigation',
				    'walker' => new wp_bootstrap_sidenavwalker(),
				    'menu_class' => 'nav nav-pills nav-stacked',
				)); ?>
			</div>
			<div class="col-md-9">
  				<h1><?= Titles\title(); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
<?php endwhile; ?>