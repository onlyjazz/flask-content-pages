<?php
	/**
	 * Blog Search
	 */
?>
<?php get_header(); ?>

	<div class="main-content">

		<?php if ($basix_options['page_title_style'] == 'accent_color' || $basix_options['page_title_style'] == 'main_color' || $basix_options['page_title_style'] == 'custom_color') { ?>
			<div class="title-container<?php if ($basix_options['page_title_style'] == 'accent_color') { ?> accent<?php } ?><?php if ($basix_options['page_title_style'] == 'main_color') { ?> main<?php } ?><?php if ($basix_options['page_title_style'] == 'custom_color') { ?> custom<?php } ?>">
				<div class="content-width">
					<h1>Search Results for '<?php echo get_search_query(); ?>'</h1>
				</div>
			</div>
		<?php } ?>

		<div class="main-content-inner content-width<?php if ($basix_options['page_title_style'] == 'accent_color' || $basix_options['page_title_style'] == 'main_color' || $basix_options['page_title_style'] == 'custom_color') { ?> title-block<?php } ?>">

			<?php if (have_posts()) { ?>

				<?php if ($basix_options['page_title_style'] == 'bordered') { ?>
					<h1 class="bordered">Search Results for '<?php echo get_search_query(); ?>'</h1>
				<?php } ?>

				<ol>
					<?php while (have_posts()) {
						the_post(); ?>
						<li class="search-result">
							<!-- Title -->
							<h2>
								<a href="<?php esc_url(the_permalink()); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h2>
							<!-- Meta -->
							<div class="blog-meta">
								<div class="meta-item">
									<div class="meta-title published"></div><?php the_time('j F Y'); ?></div>
								<div class="meta-item">
									<div class="meta-title views"></div><?php echo basix_getPostViews(get_the_ID()); ?> Views
								</div>
								<div class="meta-item">
									<div class="meta-title comments"></div><?php comments_popup_link('No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?>
								</div>
								<div class="meta-item">
									<div class="meta-title cats"></div><?php echo the_category(', '); ?></div>
							</div>
							<!-- Content -->
							<?php the_excerpt(); ?>
							<!-- Read More Button -->
							<a href="<?php esc_url(the_permalink()); ?>" class="button accent"><?php echo __('Continue Reading','basix-td') ?></a>
						</li>
					<?php } // End while ?>
				</ol>

			<?php } else { ?>

				<?php if ($basix_options['page_title_style'] == 'bordered') { ?>
					<h1 class="bordered">No results found for '<?php echo get_search_query(); ?>'</h1>
				<?php } ?>

			<?php } ?>

		</div>
	</div>

<?php get_footer(); ?>