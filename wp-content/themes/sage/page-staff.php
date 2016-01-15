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
				<?php if (have_rows('staff')): ?>
					<?php while(have_rows('staff')): the_row(); ?>
						<div class="row">
							<div class="col-sm-4">
								<img class="nr_card" style="max-width: 100%" src="<?= the_sub_field('image'); ?>" alt="<?= the_sub_field('name'); ?>">
							</div>
							<div class="col-sm-8">
								<h3><?= the_sub_field('name'); ?></h3>
								<p><strong><?= the_sub_field('role'); ?></strong></p>
								<p><?= the_sub_field('bio'); ?></p>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endwhile; ?>