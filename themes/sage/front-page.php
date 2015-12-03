<?php while (have_posts()) : the_post(); ?>

	<div class="jumbotron">
		<h1>We Are Northrock</h1>
		<a class="btn btn-play" href="#">Play Video</a>
	</div>

	<div class="container">
		<div class="row nr_flex-row">
			<div class="col-md-6">
				<a class="nr_card" href="#">
					<img class="nr_card_image" src="http://placehold.it/600">
					<div class="nr_card_content lead">
						<strong class="text-primary">Click Me</strong>
						<i class="glyphicon glyphicon-chevron-right pull-right"></i>
					</div>
				</a>
			</div>
			<div class="col-md-6">
				<div class="row nr_flex-row">
					<div class="col-md-6">
						<a class="nr_card" href="#">
							<img class="nr_card_image" src="http://placehold.it/300">
							<div class="nr_card_content lead">
								<strong class="text-primary">Click Me</strong>
								<i class="glyphicon glyphicon-chevron-right pull-right"></i>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a class="nr_card" href="#">
							<img class="nr_card_image" src="http://placehold.it/300">
							<div class="nr_card_content lead">
								<strong class="text-primary">Click Me</strong>
								<i class="glyphicon glyphicon-chevron-right pull-right"></i>
							</div>
						</a>
					</div>
				</div>
				<div class="row nr_flex-row">
					<div class="col-md-6">
						<a class="nr_card" href="#">
							<img class="nr_card_image" src="http://placehold.it/300">
							<div class="nr_card_content lead">
								<strong class="text-primary">Click Me</strong>
								<i class="glyphicon glyphicon-chevron-right pull-right"></i>
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a class="nr_card" href="#">
							<img class="nr_card_image" src="http://placehold.it/300">
							<div class="nr_card_content lead">
								<strong class="text-primary">Click Me</strong>
								<i class="glyphicon glyphicon-chevron-right pull-right"></i>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>		
	</div>

	<div class="nr_parallax-bg text-center">
		<img src="http://placehold.it/45">
		<h1><?= the_title(); ?></h1>
		<?= the_content(); ?>
	</div>

	<div class="container">
		<div class="row nr_flex-row">
			<!-- Loop through cards -->
			<div class="col-md-4">
				<div class="nr_card text-center">
					<img class="nr_card_image" src="http://placehold.it/350x175">
					<div class="nr_card_content">
						<p>Lorem ipsum</p>
						<a class="btn btn-default btn-block" href="#">Click Me</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="nr_card text-center">
					<img class="nr_card_image" src="http://placehold.it/350x175">
					<div class="nr_card_content">
						<p>Lorem ipsum</p>
						<a class="btn btn-default btn-block" href="#">Click Me</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="nr_card text-center">
					<img class="nr_card_image" src="http://placehold.it/350x175">
					<div class="nr_card_content">
						<p>Lorem ipsum</p>
						<a class="btn btn-default btn-block" href="#">Click Me</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; ?>