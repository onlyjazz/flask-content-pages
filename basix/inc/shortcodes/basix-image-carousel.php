<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Image Carousel
	/* ------------------------------------------------------------------------------- */

	/* Register Scripts -------------------------------------------------------------- */

	function register_image_carousel_scripts() {
		wp_register_script('jcarousel', get_template_directory_uri() . '/inc/shortcodes/js/jquery.jcarousel.min.js');
		wp_register_script('touchSwipe', get_template_directory_uri() . '/inc/shortcodes/js/jquery.touchSwipe.min.js');
		wp_register_script('image_carouselConfig', get_template_directory_uri() . '/inc/shortcodes/js/image_carouselConfig.js');
	}

	add_action('wp_enqueue_scripts', 'register_image_carousel_scripts');


	/* Shortcode --------------------------------------------------------------------- */

	function sc_image_carousel($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'title'       => '',
				'images'      => '',
				'nav_align'   => '',
				'amount'      => '3',
				'wrap'        => 'circular',
				'link_images' => 'none',
				'uniqid'      => uniqid()
			),
			$atts
		));

		/* Enqueue Scripts */
		wp_enqueue_script('jcarousel');
		wp_enqueue_script('touchSwipe');
		wp_enqueue_script('prettyphoto'); // Already registered with Visual Composer
		wp_enqueue_style('prettyphoto'); // Already registered with Visual Composer
		wp_enqueue_script('image_carouselConfig');

		/* Localize Script */
		wp_localize_script('image_carouselConfig', 'carouselvars' . $uniqid, $atts);
		?>
		<?php ob_start(); ?>
		<?php if ($nav_align == 'standard') { ?>
			<?php if ($title !== '') { ?>
				<!-- Title -->
				<div class="carousel-title">
					<h3><?php echo $title ?></h3>
				</div>
			<?php } ?>
		<?php } ?>
		<div class="carousel-holder image-carousel wpb_content_element">

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
							$args = array(
								'post_type'      => array('attachment'),
								'post_status'    => 'inherit',
								'posts_per_page' => -1,
								'orderby'        => 'post__in',
								'post__in'       => explode(',', $images)
							);
							$custom_loop = new WP_Query($args);
						?>
						<?php if ($custom_loop->have_posts()) { ?>
							<ul>
								<?php while ($custom_loop->have_posts()) {
									$custom_loop->the_post(); ?>
									<?php $bonk = get_the_ID(); ?>
									<li class="jcarousel-item vc_span4">
										<?php if ($link_images == 'none') { ?>
											<!-- Image -->
											<?php echo wp_get_attachment_image(get_the_ID()); ?>
										<?php } ?>
										<?php if ($link_images == 'prettyphoto') { ?>
											<!-- Image -->
											<a href="<?php echo wp_get_attachment_url(get_the_ID()); ?>" class="link_image prettyphoto" rel="prettyPhoto[rel-<?php echo $uniqid; ?>]"><?php echo wp_get_attachment_image(get_the_ID()); ?></a>
										<?php } ?>
										<?php if ($link_images == 'newtab') { ?>
											<!-- Image -->
											<a href="<?php echo wp_get_attachment_url(get_the_ID()); ?>" target="_blank" class="link_image"><?php echo wp_get_attachment_image(get_the_ID()); ?></a>
										<?php } ?>
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
		$image_carousel_output = ob_get_contents();
		ob_end_clean();
		return $image_carousel_output;
		?>
	<?php
	}

	add_shortcode('image_carousel', 'sc_image_carousel');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Image Carousel", 'basix-td'),
			"base"                    => "image_carousel",
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
					"type"        => "attach_images",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Select images", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "images",
					"value"       => "",
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
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Align Navigation to", 'basix-td'),
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
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Image Links", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "link_images",
					"value"       => array(
						__("No Link", 'basix-td')                    => 'none',
						__("Open Image in PrettyPhoto", 'basix-td') => 'prettyphoto',
						__("Link Image in new tab", 'basix-td')     => 'newtab'
					),
				),
			)
		));
	}
?>