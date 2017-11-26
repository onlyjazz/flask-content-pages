<?php /* Template Name:Static content page */ ?>
<?php get_header(); ?>

<div class="grid">
		<div class="grid-row">
			<?php if (have_posts()) { ?>
				<?php while (have_posts()) {
				    the_post();
				?>

			<div class="grid-col grid-col_17 grid-col_md-16 grid-col_sm-24">
				<main class="page-main">
						<div class="post">
							<h1 class="post__title heading heading_1"><?php the_title(); ?></h1>
							    <?php the_content(); ?>
						</div>
					</main>
			</div>
		<?php } // End while ?>
	<?php } // End if ?>
		</div>
	</div>

<?php get_footer(); ?>
