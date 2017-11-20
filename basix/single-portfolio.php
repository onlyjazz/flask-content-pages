<?php
	/**
	 * Portfolio Detail Page
	 */
?>
<?php get_header(); ?>
<?php $show_featured_image = get_post_meta($post->ID, 'show_featured_image', TRUE); ?>
<?php $disable_related_items = get_post_meta($post->ID, 'disable_related_portfolio_carousel', TRUE); ?>
<?php
	$terms = get_the_terms($post->ID, 'portfolio_category');
	if ($terms) {
		$termslist = '';
		foreach ($terms as $term) {
			$termslug[] = $term->slug;
			$termname[] = $term->name;
		}
		$termnames = implode(', ', $termname);
	}
?>

<?php if (have_posts()) { ?>
	<?php while (have_posts()) {
		the_post(); ?>

		<div class="main-content">

			<?php if ($basix_options['page_title_style'] == 'accent_color' || $basix_options['page_title_style'] == 'main_color' || $basix_options['page_title_style'] == 'custom_color') { ?>
				<div class="title-container<?php if ($basix_options['page_title_style'] == 'accent_color') { ?> accent<?php } ?><?php if ($basix_options['page_title_style'] == 'main_color') { ?> main<?php } ?><?php if ($basix_options['page_title_style'] == 'custom_color') { ?> custom<?php } ?>">
					<div class="content-width">
						<div class="relative">
							<!-- Page Title -->
							<h1><?php the_title(); ?></h1>
						</div>
					</div>
				</div>
			<?php } ?>

			<div class="main-content-inner content-width<?php if ($basix_options['page_title_style'] == 'accent_color' || $basix_options['page_title_style'] == 'main_color' || $basix_options['page_title_style'] == 'custom_color') { ?> title-block<?php } ?>">

				<div class="relative">
					<?php if ($basix_options['page_title_style'] == 'bordered') { ?>
						<!-- Page Title -->
						<h1 class="bordered"><?php the_title(); ?></h1>
					<?php } ?>
				</div>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ((!isset($show_featured_image)) OR ($show_featured_image == FALSE)) { ?>
						<div class="column-container">
							<div class="column-three-qtr">
								<?php if (has_post_thumbnail()) { ?>
									<!-- Image -->
									<div>
										<?php the_post_thumbnail('medium'); ?>
									</div>
								<?php } ?>
							</div>
							<div class="column-one-fourth portfolio-details">
								<!-- Content -->
								<?php the_content(); ?>
								<?php if ($terms) { ?>
									<div class="portfolio-cats">
										<div class="portfolio-cats-title">Tags:</div>
										<?php echo $termnames; ?>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } else { ?>
						<!-- Content -->
						<?php the_content(); ?>
					<?php } ?>
				</div>

				<?php
					/* ------------------------------------------------------------------- */
					/* Related Portfolio Items */
					/* ------------------------------------------------------------------- */
				?>
				<?php if (!(isset($disable_related_items)) OR $disable_related_items == FALSE) { ?>
					<?php if ($terms) { ?>
						<div class="portfolio-related">
							<?php
								$post_ID = get_the_ID();
								$custom_loop = new WP_Query(array(
									'post_type'      => 'portfolio',
									'posts_per_page' => -1,
									'tax_query'      => array(
										array(
											'taxonomy' => 'portfolio_category',
											'field'    => 'slug',
											'terms'    => $termslug
										)
									)
								)); ?>

							<?php if ($custom_loop->have_posts()) { ?>

								<div class="divider"></div>
								<?php
								/* Generate Random ID */
								$portfolio_carousel_id = 'blog_carousel_' . rand();
								?>
								<div class="carousel-holder portfolio-carousel">
									<script>
										(function ($) {
											$(function () {
												var jcarousel = $('.jcarousel-<?php echo $portfolio_carousel_id ?>');
												jcarousel
													.on('jcarousel:reload jcarousel:create', function () {
														var width = jcarousel.innerWidth();
														var containerwidth = jQuery('.content-width').width();
														if (containerwidth >= 720) {
															width = width / 4;
														}
														jcarousel.jcarousel('items').css('width', width + 'px');
													})
													.jcarousel({
														wrap       : 'circular',
														transitions: {
															transoforms : true,
															transforms3d: true,
															easing      : 'swing'
														}
													});
												/* Auto height */
												var maxHeight = "0";
												jcarousel.jcarousel('visible').each(function () {
													maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
												});
												/* Reset on window resize */
												$(window).resize(function () {
													jcarousel.jcarousel('reload');
												});
												jcarousel.height(maxHeight);
												/* Auto height on animate and reload */
												jcarousel.on('jcarousel:animate jcarousel:reload', function (event, carousel, target, animate) {
													var maxHeight = "0";
													jcarousel.jcarousel('visible').each(function () {
														maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
													});
													jcarousel.animate({height: maxHeight}, 300);
												});
												/* End auto height */
												$('.jcarousel-<?php echo $portfolio_carousel_id ?>-control-prev')
													.jcarouselControl({
														target: '-=1'
													});
												$('.jcarousel-<?php echo $portfolio_carousel_id ?>-control-next')
													.jcarouselControl({
														target: '+=1'
													});
												/* Mobile Pagination */
												$('.jcarousel-<?php echo $portfolio_carousel_id ?>-pagination')
													.on('jcarouselpagination:active', 'li', function () {
														$(this).addClass('active');
													})
													.on('jcarouselpagination:inactive', 'li', function () {
														$(this).removeClass('active');
													})
													.jcarouselPagination({
														'item': function (page, carouselItems) {
															return '<li><a href="#' + page + '"></a></li>';
														}
													});
												/* Swipe */
												jcarousel.swipe({
													excludedElements     : "",
													fallbackToMouseEvents: false,
													swipeLeft            : function (event, direction, distance, duration, fingerCount) {
														jcarousel.jcarousel('scroll', '+=1');
													},
													swipeRight           : function (event, direction, distance, duration, fingerCount) {
														jcarousel.jcarousel('scroll', '-=1');
													},
													tap                  : function (event, target) {
														if ($(target).is('a')) {
															window.location.href = $(target).attr('href');
														}
														if ($(target).is('a *')) {
															window.location.href = $(target).parent().attr('href');
														}
													}
												});
											});
										})(jQuery);
									</script>

									<!-- Desktop Nav -->
									<div class="jcarousel-nav-holder">
										<div class="jcarousel-nav shortcode-title">
											<a href="#" class="jcarousel-<?php echo $portfolio_carousel_id ?>-control-prev jcarousel-prev">&lsaquo;</a>
											<a href="#" class="jcarousel-<?php echo $portfolio_carousel_id ?>-control-next jcarousel-next">&rsaquo;</a>
										</div>
									</div>

									<!-- Title -->
									<div class="carousel-title">
										<h2><?php echo __('Related Work', 'basix-td') ?></h2>
									</div>

									<!-- Carousel -->
									<div class="jcarousel-outer">
										<div class="jcarousel-wrapper">
											<div class="jcarousel-<?php echo $portfolio_carousel_id ?> jcarousel">

												<ul>
													<?php while ($custom_loop->have_posts()) {
														$custom_loop->the_post(); ?>
														<?php if ($post_ID != get_the_ID()) { ?>
															<?php // Get portfolio categories
															$individual_terms = get_the_terms($custom_loop->post->ID, 'portfolio_category');
															?>
															<li class="jcarousel-item vc_span4">
																<!-- Image -->
																<a href="<?php esc_url(the_permalink()); ?>" class="link_image"><?php the_post_thumbnail('thumbnail'); ?></a>
																<!-- Title -->
																<h3>
																	<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
																</h3>
																<!-- Categories -->
																<div class="categories">
																	<?php if ($individual_terms) {
																		foreach ($individual_terms as $individual_term) {
																			print '<div class="category">' . $individual_term->name . '</div>';
																			unset($individual_term);
																		}
																	} else {
																		print __('Uncategorized', 'basix-td');
																	} ?>
																</div>
															</li>
														<?php } ?>
													<?php } // End while ?>
													<?php wp_reset_query(); ?>
												</ul>

											</div>
										</div>
										<!-- Mobile Pager -->
										<div class="jcarousel-<?php echo $portfolio_carousel_id ?>-pagination mobile-pagination"></div>
									</div>

								</div>

							<?php } ?>
						</div>
					<?php } ?>
				<?php } ?>

			</div>
		</div>

	<?php } // End while ?>
<?php } // End if ?>

<?php get_footer(); ?>