<?php
	/**
	 * Blog Post (Single)
	 */
?>
<?php get_header(); ?>

<?php if (have_posts()) { ?>
	<?php while (have_posts()) {
		the_post();
		basix_setPostViews(get_the_ID());
		$basix_post_category = get_the_category();
		?>

		<div class="main-content">

			<?php if ($basix_options['page_title_style'] == 'accent_color' || $basix_options['page_title_style'] == 'main_color' || $basix_options['page_title_style'] == 'custom_color') { ?>
				<div class="title-container<?php if ($basix_options['page_title_style'] == 'accent_color') { ?> accent<?php } ?><?php if ($basix_options['page_title_style'] == 'main_color') { ?> main<?php } ?><?php if ($basix_options['page_title_style'] == 'custom_color') { ?> custom<?php } ?>">
					<div class="content-width">
						<h1<?php if (has_post_format('quote')) { ?> class="quote"<?php } ?>><?php the_title(); ?></h1>
						<!-- Meta -->
						<div class="blog-meta title-block">
							<div class="meta-item">
								<div class="meta-title published"></div><?php the_time('j F Y'); ?></div>
							<div class="meta-item">
								<div class="meta-title views"></div><?php echo basix_getPostViews(get_the_ID()); ?>
								Views
							</div>
							<div class="meta-item">
								<div class="meta-title comments"></div><?php comments_popup_link('No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?>
							</div>
							<?php if ($basix_post_category) { ?>
								<div class="meta-item">
									<div class="meta-title cats"></div><?php echo the_category(', '); ?>
								</div>
							<?php } ?>
						</div>
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
					<div class="column-three-qtr">

						<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						<!-- Blog Post -->
						<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						<div id="post-<?php the_ID(); ?>" <?php post_class('blog-post actual-post'); ?>>
							<?php if ($basix_options['page_title_style'] == 'bordered') { ?>
								<!-- Title -->
								<h1 class="post-title<?php if (has_post_format('quote')) { ?> quote<?php } ?>"><?php the_title(); ?></h1>
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
									<?php if ($basix_post_category) { ?>
										<div class="meta-item">
											<div class="meta-title cats"></div><?php echo the_category(', '); ?>
										</div>
									<?php } ?>
								</div>
							<?php } ?>
							<?php
								if (!get_post_format()) {
									get_template_part('content', 'standard');
								} else {
									get_template_part('content', get_post_format());
								}
							?>
						</div>
						<?php
							wp_link_pages(array(
									'before'      => '<div class="blog-pagination">',
									'after'       => '</div>',
									'link_before' => '<div class="page">',
									'link_after'  => '</div>',
								)
							);
						?>
						<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						<!-- END Blog Post -->
						<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

						<?php
							/* Post Tags --------------------- */
							$posttags = get_the_tags();
							if ($posttags) {
								?>
								<div class="post-tags">
									<h4 class="post-tags-title">Tags:</h4>
									<?php foreach ($posttags as $tag) {
										$test = '<a class="post-tag" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
										echo $test;
									} ?>
								</div>
							<?php } ?>

						<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						<!-- Social Sharing -->
						<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						<ul class="post-sharing">
							<li>
								<a href="http://www.facebook.com/sharer.php?s=100&p[title]=<?php echo get_the_title(); ?>&p[summary]=&p[url]=<?php echo urlencode(get_permalink()); ?>&p[images][0]=" target="_blank">
									<i class="Basix-facebook"></i>
									<div class="basix-tooltip">Share on Facebook</div>
								</a></li>
							<li>
								<a href="https://twitter.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank">
									<i class="Basix-twitter"></i>
									<div class="basix-tooltip">Share on Twitter</div>
								</a></li>
							<li>
								<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" target="_blank">
									<i class="Basix-linkedin-square"></i>
									<div class="basix-tooltip">Share on LinkedIn</div>
								</a></li>
							<li>
								<a href="http://pinterest.com/pin/create/link/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank">
									<i class="Basix-pinterest"></i>
									<div class="basix-tooltip">Share on Pinterest</div>
								</a></li>
							<li>
								<a href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank">
									<i class="Basix-google-plus"></i>
									<div class="basix-tooltip">Share on Google+</div>
								</a></li>
						</ul>

						<?php
							/* Post Comments */
							comments_template('', TRUE);
						?>

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