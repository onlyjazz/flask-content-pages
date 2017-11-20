<?php /* Template Name: Portfolio 4 Column */ ?>
<?php get_header(); ?>

	<div class="main-content">

		<?php if ($basix_options['page_title_style'] == 'accent_color' || $basix_options['page_title_style'] == 'main_color' || $basix_options['page_title_style'] == 'custom_color') { ?>
			<div class="title-container<?php if ($basix_options['page_title_style'] == 'accent_color') { ?> accent<?php } ?><?php if ($basix_options['page_title_style'] == 'main_color') { ?> main<?php } ?><?php if ($basix_options['page_title_style'] == 'custom_color') { ?> custom<?php } ?>">
				<div class="content-width">
					<div class="relative">
						<h1><?php the_title(); ?></h1>
						<?php // Get all portfolio categories
							if (get_terms('portfolio_category')) {
								$sorting_terms = get_terms('portfolio_category');
								?>
								<?php if ($sorting_terms) { ?>
									<!-- Filtering -->
									<div class="portfolio-filtering">
										<ul id="portfolio-filters">
											<li>
												<span class="filter active" data-filter="all">Show all</span>
											</li>
											<?php foreach ($sorting_terms as $sorting_term) { ?>
												<li>
												<span class="filter" data-filter=".<?php echo $sorting_term->slug ?>"><?php echo $sorting_term->name ?></span>
												</li><?php } ?>
										</ul>
									</div>
								<?php } ?>
							<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>

		<div class="main-content-inner content-width<?php if ($basix_options['page_title_style'] == 'accent_color' || $basix_options['page_title_style'] == 'main_color' || $basix_options['page_title_style'] == 'custom_color') { ?> title-block<?php } ?>">

			<?php if ($basix_options['page_title_style'] == 'bordered') { ?>
				<div class="relative">
					<!-- Page Title -->
					<h1 class="bordered"><?php the_title(); ?></h1>
					<?php // Get all portfolio categories
						if (get_terms('portfolio_category')) {
							$sorting_terms = get_terms('portfolio_category', array(
								'orderby'      => 'name',
								'hide_empty'   => TRUE,
								'hierarchical' => FALSE
							));
							if ($sorting_terms) {
								?>
								<!-- Filtering -->
								<div class="portfolio-filtering">
									<ul id="portfolio-filters">
										<li>
											<span class="filter active" data-filter="all">Show all</span>
										</li>
										<?php foreach ($sorting_terms as $sorting_term) { ?>
											<li>
											<span class="filter" data-filter=".<?php echo $sorting_term->slug ?>"><?php echo $sorting_term->name ?></span>
											</li><?php } ?>
									</ul>
								</div>
							<?php
							}
						}
					?>
				</div>
			<?php } ?>

			<!-- Content -->
			<?php the_content(); ?>

			<!-- Portfolio Grid -->
			<ul class="column-container" id="portfolio">
				<?php $loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => -1)); ?>
				<?php while ($loop->have_posts()) {
					$loop->the_post(); ?>
					<?php $item_terms = get_the_terms($post->ID, 'portfolio_category'); ?>

					<li class="column-one-fourth <?php if ($item_terms) {
						foreach ($item_terms as $item_term) {
							print $item_term->slug . ' ';
							unset($item_term);
						}
					} ?> mix">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php if (has_post_thumbnail()) { ?>
								<!-- Image -->
								<div class="item-inner">
									<div class="item-outer">
										<a href="<?php esc_url(the_permalink()); ?>" class="link_image"><?php the_post_thumbnail('thumbnail'); ?></a>
									</div>
								</div>
							<?php } ?>
							<!-- Title -->
							<h3><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h3>
							<!-- Categories -->
							<div class="categories">
								<?php if ($item_terms) {
									foreach ($item_terms as $item_term) {
										print '<div class="category">' . $item_term->name . '</div>';
										unset($item_term);
									}
								} else {
									print __('Uncategorized', 'basix-td');
								} ?>
							</div>
						</div>
					</li>
				<?php
				}
					wp_reset_query(); // End while & reset query
				?>
			</ul>

		</div>
	</div>

<?php get_footer(); ?>