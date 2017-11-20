<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Testimonials Carousel
	/* ------------------------------------------------------------------------------- */

	/* Register Scripts -------------------------------------------------------------- */

	function register_testimonials_carousel_scripts() {
		wp_register_script('jcarousel', get_template_directory_uri() . '/inc/shortcodes/js/jquery.jcarousel.min.js');
		wp_register_script('touchSwipe', get_template_directory_uri() . '/inc/shortcodes/js/jquery.touchSwipe.min.js');
		wp_register_script('carouselConfig', get_template_directory_uri() . '/inc/shortcodes/js/carouselConfig.js');
	}

	add_action('wp_enqueue_scripts', 'register_testimonials_carousel_scripts');


	/* Shortcode --------------------------------------------------------------------- */

	function sc_testimonials_carousel($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'title'      => '',
				'nav_align'  => '',
				'text_align' => '',
				'amount'     => '4',
				'wrap'       => 'circular',
				'font_size'  => '',
				'autoscroll' => '',
				'uniqid'     => uniqid()
			),
			$atts
		));

		/* Enqueue Scripts */
		wp_enqueue_script('jcarousel');
		wp_enqueue_script('touchSwipe');
		wp_enqueue_script('carouselConfig');

		/* Localize Script */
		wp_localize_script('carouselConfig', 'carouselvars' . $uniqid, $atts);
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
		<div class="carousel-holder testimonials-carousel wpb_content_element">

			<?php if ($font_size) { ?>
				<style scoped>
					.jcarousel-<?php echo $uniqid ?> .testimonial-text {
						font-size: <?php echo $font_size; ?>px;
					}
				</style>
			<?php } ?>

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
						<ul<?php if ($nav_align == 'standard') { ?> style="text-align: center;"<?php } ?>>
							<?php echo do_shortcode($content); ?>
						</ul>
					</div>
				</div>
			</div>
			<!-- Mobile Pager -->
			<div class="jcarousel-<?php echo $uniqid ?>-pagination mobile-pagination"></div>
		</div>
		<?php
		$testimonials_carousel_output = ob_get_contents();
		ob_end_clean();
		return $testimonials_carousel_output;
		?>
	<?php
	}

	add_shortcode('testimonials_carousel', 'sc_testimonials_carousel');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Testimonials Carousel", "basix-td"),
			"base"                    => "testimonials_carousel",
			"as_parent"               => array('only' => 'testimonials_carousel_item'),
			"content_element"         => TRUE,
			"icon"                    => "icon-basix-vc",
			"class"                   => "",
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
					"type"        => "number",
					"holder"      => "div",
					"suffix"      => "px",
					"class"       => "",
					"heading"     => __("Font Size", 'basix-td'),
					"description" => __("Leave empty for default", 'basix-td'),
					"param_name"  => "font_size",
					"value"       => __("", 'basix-td'),
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Items per view", 'basix-td'),
					"description" => __("Default is 1", 'basix-td'),
					"param_name"  => "amount",
					"value"       => __("1", 'basix-td'),
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
					"heading"     => __("Text Alignment", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "text_align",
					"value"       => array(
						__("Left", 'basix-td')   => 'left',
						__("Center", 'basix-td') => 'center'
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
					"type"        => "checkbox",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Auto Scroll?", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "autoscroll",
					"value"       => array(
						__("Yes", 'basix-td') => 'yes',
					),
				),
			),
			"js_view"                 => 'VcColumnView'
		));
	}


	/* ------------------------------------------------------------------------------- */
	/* Basix Testimonials Carousel Item */
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_testimonials_carousel_item($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'text'    => '',
				'name'    => '',
				'company' => '',
				'url'     => ''
			),
			$atts
		));
		?>
		<?php ob_start(); ?>
		<li class="jcarousel-item">
			<div class="testimonial-text"><?php echo $text ?>"</div>
			<?php if ($name) { ?>
				<div class="testimonial-name"><?php echo $name ?></div>
			<?php } ?>
			<?php if ($company) { ?><?php $href = vc_build_link($url); ?>
				<?php if (isset($href['url'])) { ?>
					<div class="testimonial-link"><a href="<?php if (isset($href['url'])) {
							echo $href['url'];
						} ?>" target="<?php if (isset($href['target'])) {
							echo $href['target'];
						} ?>"><?php echo $company ?></a></div>
				<?php } else { ?>
					<div class="testimonial-link"><?php echo $company ?></div>
				<?php } ?>
			<?php } ?>

		</li>
		<?php
		$testimonials_carousel_item_output = ob_get_contents();
		ob_end_clean();
		return $testimonials_carousel_item_output;
		?>
	<?php
	}

	add_shortcode('testimonials_carousel_item', 'sc_testimonials_carousel_item');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"            => __("Basix Testimonial Carousel Item", "basix-td"),
			"base"            => "testimonials_carousel_item",
			"content_element" => TRUE,
			"icon"            => "icon-basix-vc",
			"class"           => "",
			"as_child"        => array('only' => 'testimonials_carousel'),
			"params"          => array(
				array(
					"type"        => "textarea",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Testimonial Text", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "text",
					"value"       => __("", 'basix-td'),
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Name", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "name",
					"value"       => __("", 'basix-td'),
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Company", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "company",
					"value"       => __("", 'basix-td'),
				),
				array(
					"type"        => "vc_link",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Company URL", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "url",
					"value"       => ""
				),
			)
		));
	}
	if (class_exists('WPBakeryShortCodesContainer')) {
		class WPBakeryShortCode_testimonials_carousel extends WPBakeryShortCodesContainer {
		}
	}
	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_testimonials_carousel_item extends WPBakeryShortCode {
		}
	}
?>