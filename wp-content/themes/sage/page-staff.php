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
					<div class="row">
						<?php while(have_rows('staff')): the_row(); ?>
							<div class="col-md-6">
								<div class="staffer">
									<div class="staffer_image">
										<div class="content" style="background-image: url(<?= the_sub_field('image'); ?>)"></div>
									</div>
									<div class="staffer_info">
										<h3><?= the_sub_field('name'); ?></h3>
										<p><strong><?= the_sub_field('role'); ?></strong></p>
									</div>
								</div>
								<?= the_sub_field('bio'); ?>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endwhile; ?>