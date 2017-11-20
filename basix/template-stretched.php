<?php /* Template Name: Stretched */ ?>
<?php get_header(); ?>

<?php if (have_posts()) { ?>
	<?php while (have_posts()) {
		the_post(); ?>

		<div class="main-content">
				<?php the_content(); ?>
		</div>

	<?php } // End while ?>
<?php } // End if ?>

<?php get_footer(); ?>