<?php
get_header();
?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

	<div class="mm-page container">
		<div class="mm-page-header">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="mm-page-content">
			<?php the_content(); ?>
		</div>
	</div>

	<?php endwhile; ?>
<?php else : ?>

	<div class="mm-page container">
		<div class="mm-page-content">
			<p>Nu există conținut disponibil.</p>
		</div>
	</div>

<?php endif; ?>

<?php get_footer(); ?>
