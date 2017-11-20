<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Blog Carousel
	/* ------------------------------------------------------------------------------- */

	/* Register Scripts -------------------------------------------------------------- */

	function register_blog_carousel_scripts() {
		wp_register_script('jcarousel', get_template_directory_uri() . '/inc/shortcodes/js/jquery.jcarousel.min.js');
		wp_register_script('touchSwipe', get_template_directory_uri() . '/inc/shortcodes/js/jquery.touchSwipe.min.js');
		wp_register_script('carouselConfig', get_template_directory_uri() . '/inc/shortcodes/js/carouselConfig.js');
	}

	add_action('wp_enqueue_scripts', 'register_blog_carousel_scripts');


	/* Shortcode --------------------------------------------------------------------- */

	function sc_blog_carousel($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'title'           => '',
				'parent_cat'      => '',
				'nav_align'       => '',
				'amount'          => '3',
				'max_items'       => '8',
				'wrap'            => 'circular',
				'title_length'    => '30',
				'excerpt'         => 'yes',
				'excerpt_length'  => '90',
				'featured_images' => 'yes',
				'uniqid'          => uniqid()
			), $atts
		));

		/* Enqueue Scripts */
		wp_enqueue_script('jcarousel');
		wp_enqueue_script('touchSwipe');
		wp_enqueue_script('carouselConfig');

		/* Localize Script */
		wp_localize_script('carouselConfig', 'carouselvars' . $uniqid, $atts);
		?>
		<?php ob_start(); ?>
		<?php
		$col_class = '';
		if ($amount == '2') {
			$col_class = 'vc_span6';
		}
		if ($amount == '3') {
			$col_class = 'vc_span4';
		}
		if ($amount == '4') {
			$col_class = 'vc_span3';
		}
		if ($amount == '6') {
			$col_class = 'vc_span2';
		}
		?>
		<?php if ($nav_align == 'standard') { ?>
			<?php if ($title !== '') { ?>
				<!-- Title -->
				<div class="carousel-title">
					<h3><?php echo $title ?></h3>
				</div>
			<?php } ?>
		<?php } ?>
		<div class="carousel-holder blog-carousel wpb_content_element">

			<?php if (!($nav_align == '' || $nav_align == 'no-nav' || $nav_align == 'standard')) { ?>
				<!-- Desktop Nav -->
				<div class="jcarousel-nav-holder">
					<div class="jcarousel-nav <?php echo $nav_align ?>">
						<a href="#" class="jcarousel-<?php echo $uniqid ?>-control-prev jcarousel-prev">&lsaquo;</a>
						<a href="#" class="jcarousel-<?php echo $uniqid ?>-control-next jcarousel-next">&rsaquo;</a>
					</div>
				</div>
			<?php } ?>

			<?php if ($nav_align == 'standard') { ?>
				<!-- Standard Nav -->
				<a href="#" class="standard-nav jcarousel-<?php echo $uniqid ?>-control-prev jcarousel-prev">&lsaquo;</a>
				<a href="#" class="standard-nav jcarousel-<?php echo $uniqid ?>-control-next jcarousel-next">&rsaquo;</a>
			<?php } ?>

			<?php if ($nav_align !== 'standard') { ?>
				<?php if ($title !== '') { ?>
					<!-- Title -->
					<div class="carousel-title">
						<h3><?php echo $title ?></h3>
					</div>
				<?php } ?>
			<?php } ?>

			<!-- Carousel -->
			<div class="jcarousel-outer">
				<div class="jcarousel-wrapper">
					<div class="jcarousel-<?php echo $uniqid ?> jcarousel" data-instance="<?php echo $uniqid ?>">
						<?php
							if ($parent_cat) {
								$custom_loop = new WP_Query(array(
									'post_type'      => 'post',
									'posts_per_page' => $max_items,
									'tax_query'      => array(
										array(
											'taxonomy' => 'category',
											'field'    => 'id',
											'terms'    => array($parent_cat)
										)
									)
								));
							} else {
								$custom_loop = new WP_Query(array(
									'post_type'      => 'post',
									'posts_per_page' => $max_items
								));
							}
						?>
						<?php if ($custom_loop->have_posts()) { ?>
							<ul>
								<?php while ($custom_loop->have_posts()) {
									$custom_loop->the_post(); ?>
									<li class="jcarousel-item <?php echo $col_class; ?>">
										<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<?php if ($featured_images == 'yes') { ?>
											<!-- Image -->
											<a href="<?php esc_url(the_permalink()); ?>" class="link_image"><?php the_post_thumbnail('thumbnail'); ?></a>
										<?php } ?>
										<!-- Title -->
										<h3 class="inner-title">
											<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark"><?php if (strlen(get_the_title()) > $title_length) {
													echo preg_replace('/\s+?(\S+)?$/', '', substr(get_the_title(), 0, $title_length)) . '...';
												} else {
													the_title();
												} ?></a></h3>
										<!-- Date -->
										<div class="date">
											<?php the_time('j F Y'); ?>
										</div>
										<?php if ($excerpt == 'yes') { ?>
											<!-- Excerpt -->
											<p><?php if (strlen(get_the_excerpt()) > $excerpt_length) {
													echo preg_replace('/\s+?(\S+)?$/', '', substr(get_the_excerpt(), 0, $excerpt_length)) . '...';
												} else {
													the_excerpt();
												} ?></p>
											<!-- Read More Link -->
											<a href="<?php esc_url(the_permalink()); ?>">Read More</a>
										<?php } ?>
									</div>
									</li>
								<?php } // End while ?>
								<?php wp_reset_query(); ?>
							</ul>
						<?php } else { // No posts published ?>
							No data to display.
						<?php } // End if ?>
					</div>
				</div>
			</div>
			<!-- Mobile Pager -->
			<div class="jcarousel-<?php echo $uniqid ?>-pagination mobile-pagination"></div>
		</div>
		<?php
		$blog_carousel_output = ob_get_contents();
		ob_end_clean();
		return $blog_carousel_output;
		?>
	<?php
	}

	add_shortcode('blog_carousel', 'sc_blog_carousel');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Blog Carousel", 'basix-td'),
			"base"                    => "blog_carousel",
			"class"                   => "",
			"controls"                => "full",
			"icon"                    => "icon-basix-vc",
			"category"                => __("Basix", 'basix-td'),
			"show_settings_on_create" => TRUE,
			"params"                  => array(
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Title", 'basix-td'),
					"description" => __("Leave this field blank for no title", 'basix-td'),
					"param_name"  => "title",
					"value"       => __("", 'basix-td'),
				),
				array(
					"type"        => "blog_cats",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Parent Category", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "parent_cat",
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Items per view", 'basix-td'),
					"description" => __("Default is 3", 'basix-td'),
					"param_name"  => "amount",
					"value"       => __("3", 'basix-td'),
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Maximum Items", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "max_items",
					"value"       => "8",
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Navigation Style", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "nav_align",
					"value"       => array(
						__("No Navigation", "basix-td")                => 'no-nav',
						__("Standard", "basix-td")                     => 'standard',
						__("Align to Shortcode Title", "basix-td")     => 'shortcode-title',
						__("Align to Separator", "basix-td")           => 'separator',
						__("Align to Separator with Text", "basix-td") => 'separator-with-text',
						__("Align to Accent Divider", "basix-td")      => 'accent-divider',
					),
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Carousel Rotation", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "wrap",
					"value"       => array(
						__("Continuous", 'basix-td')   => 'circular',
						__("Stop at end", 'basix-td') => 'none'
					),
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Title Character Length", 'basix-td'),
					"description" => __("Default is 30. Wraps to last word.", 'basix-td'),
					"param_name"  => "title_length",
					"value"       => "30",
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Show Excerpt?", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "excerpt",
					"value"       => array(
						__("Yes", 'basix-td') => 'yes',
						__("No", 'basix-td')  => 'no',
					),
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Excerpt Character Length", 'basix-td'),
					"description" => __("Default is 90. Wraps to last word.", 'basix-td'),
					"param_name"  => "excerpt_length",
					"value"       => "90",
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Show Featured Images?", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "featured_images",
					"value"       => array(
						__("Yes", 'basix-td') => 'yes',
						__("No", 'basix-td')  => 'no',
					),
				),
			)
		));
	}
?>