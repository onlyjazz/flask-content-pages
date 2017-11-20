<?php /* Template Name: Page with Left Sidebar */ ?>
<?php get_header(); ?>

<?php if (have_posts()) { ?>
	<?php while (have_posts()) {
		the_post(); ?>

		<div class="main-content">

			<?php if ($basix_options['page_title_style'] == 'accent_color' || $basix_options['page_title_style'] == 'main_color' || $basix_options['page_title_style'] == 'custom_color') { ?>
				<div class="title-container<?php if ($basix_options['page_title_style'] == 'accent_color') { ?> accent<?php } ?><?php if ($basix_options['page_title_style'] == 'main_color') { ?> main<?php } ?><?php if ($basix_options['page_title_style'] == 'custom_color') { ?> custom<?php } ?>">
					<div class="content-width">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			<?php } ?>

			<div class="main-content-inner content-width<?php if ($basix_options['page_title_style'] == 'accent_color' || $basix_options['page_title_style'] == 'main_color' || $basix_options['page_title_style'] == 'custom_color') { ?> title-block<?php } ?>">

				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<!-- Main Column / Sidebar -->
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<div class="column-container">

					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- Main Column -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<div class="column-three-qtr main-column right">

						<?php if ($basix_options['page_title_style'] == 'bordered') { ?>
							<h1 class="bordered"><?php the_title(); ?></h1>
						<?php } ?>

						<?php the_content(); ?>

					</div>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- END Main Column -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- Sidebar -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<?php get_sidebar(); ?>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- END Sidebar -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

				</div>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<!-- END Main Column / Sidebar -->
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

			</div>
		</div>

	<?php } // End while ?>
<?php } // End if ?>

<?php get_footer(); ?>