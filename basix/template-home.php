<?php /* Template Name: Home Page */ ?>
<?php get_header(); ?>

<?php if (have_posts()) { ?>
	<?php while (have_posts()) {
		the_post(); ?>

		<div class="main-content">
			<div class="main-content-inner content-width">
				<?php the_content(); ?>
			</div>
		</div>

	<?php } // End while ?>
<?php } // End if ?>

<?php get_footer(); ?>