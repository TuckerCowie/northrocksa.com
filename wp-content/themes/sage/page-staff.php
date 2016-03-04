<?php use Roots\Sage\Titles; ?>
<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/page', 'header'); ?>
	<div class="container">
		<h1 class="text-center"><?= Titles\title(); ?></h1>
		<?php the_content(); ?>
		<?php if (have_rows('staff')): ?>
			<div class="row">
				<?php while(have_rows('staff')): the_row(); ?>
					<div class="col-md-<?= get_sub_field('full_width') ? '12' : '6'; ?>">
						<div class="staffer">
							<div class="staffer_image">
								<div class="content" style="background-image: url(<?= the_sub_field('image'); ?>)"></div>
							</div>
							<div class="staffer_info">
								<h3><?= the_sub_field('name'); ?></h3>
								<p><strong><?= the_sub_field('role'); ?></strong></p>
								<?= get_sub_field('full_width') ? the_sub_field('bio') : ''; ?>
							</div>
						</div>
						<?= !get_sub_field('full_width') ? the_sub_field('bio') : ''; ?>
						<?= get_sub_field('full_width') ? '</div><div class="row">' : ''; ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
<?php endwhile; ?>