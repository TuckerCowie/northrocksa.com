<?php
/**
 * Template Name: Landing Page
 */
?>
<?php use Roots\Sage\Titles; ?>
<?php while (have_posts()) : the_post(); ?>
	  <div class="nr_page-header <?= has_post_thumbnail() ? 'nr_page-header--has-image' : 'nr_page-header--has-spacer' ?>">
		<?php if (has_post_thumbnail()): ?>
			<div class="nr_page-header_image">
				<div class="content" style="background-image: url(<?= wp_get_attachment_url( get_post_thumbnail_id() ); ?>)"></div>
			</div>
		<?php endif; ?>
	</div>
	<div class="container" style="padding-top: 40px; padding-bottom: 40px;">
		<h1 style="margin-top:0;" class="text-center"><?= Titles\title(); ?></h1>
		<?= the_content(); ?>
	</div>
	<?php if (have_rows('content')):
		while(have_rows('content')):
			the_row();
			get_template_part('templates/landing', get_sub_field('section_type'));
		endwhile;
	endif; ?>
<?php endwhile; ?>