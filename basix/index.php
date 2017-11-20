<?php
	/**
	 * Blog Index
	 */
?>
<?php get_header(); ?>

	<div class="main-content">

		<?php if ($basix_options['page_title_style'] == 'accent_color' || $basix_options['page_title_style'] == 'main_color' || $basix_options['page_title_style'] == 'custom_color') { ?>
			<div class="title-container<?php if ($basix_options['page_title_style'] == 'accent_color') { ?> accent<?php } ?><?php if ($basix_options['page_title_style'] == 'main_color') { ?> main<?php } ?><?php if ($basix_options['page_title_style'] == 'custom_color') { ?> custom<?php } ?>">
				<div class="content-width">
					<?php if (get_option('page_for_posts')) { ?>
						<h1><?php $blog_page_id = get_option('page_for_posts');
								echo get_page($blog_page_id)->post_title ?></h1>
					<?php } ?>
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
				<div class="column-three-qtr main-column">

					<?php if (have_posts()) { ?>
						<ul class="blog-list">
							<?php while (have_posts()) {
								the_post(); ?>

								<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
								<!-- Blog Post -->
								<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
								<li class="blog-post">
									<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<!-- Title -->
										<h2 class="inner-title<?php if (has_post_format('quote')) { ?> quote<?php } ?>">
											<a href="<?php esc_url(the_permalink()); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
										</h2>
										<!-- Meta -->
										<div class="blog-meta">
											<div class="meta-item">
												<div class="meta-title published"></div><?php the_time('j F Y'); ?>
											</div>
											<div class="meta-item">
												<div class="meta-title views"></div><?php echo basix_getPostViews(get_the_ID()); ?>
												Views
											</div>
											<div class="meta-item">
												<div class="meta-title comments"></div><?php comments_popup_link('No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?>
											</div>
											<?php if (!is_attachment()) { ?>
												<div class="meta-item">
												<div class="meta-title cats"></div><?php echo the_category(', '); ?>
												</div><?php } ?>
										</div>
										<?php
											if (!get_post_format()) {
												get_template_part('content', 'standard');
											} else {
												get_template_part('content', get_post_format());
											}
										?>
									</div>
								</li>

								<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
								<!-- END Blog Post -->
								<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

							<?php } // End while ?>
						</ul>

					<?php } else { // No posts published ?>
						<?php if ($basix_options['page_title_style'] !== 'accent_color' || $basix_options['page_title_style'] !== 'main_color' || $basix_options['page_title_style'] == 'custom_color') { ?>
							<h1>No posts to display</h1>
						<?php } ?>

					<?php } ?>

					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- Navigation -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<div class="blog-nav">
						<?php if (get_previous_posts_link() && get_next_posts_link()) { ?>
							<div class="old-and-new"><?php next_posts_link('Older Posts'); ?></div>
						<?php } else { ?>
							<?php next_posts_link('Older Posts'); ?>
						<?php } ?>
						<?php previous_posts_link('Newer Posts'); ?>
					</div>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- END Navigation -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

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

<?php get_footer(); ?>