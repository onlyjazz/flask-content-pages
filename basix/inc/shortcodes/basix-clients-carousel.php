<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Clients Carousel
	/* ------------------------------------------------------------------------------- */

	/* Register Scripts -------------------------------------------------------------- */

	function register_clients_carousel_scripts() {
		wp_register_script('jcarousel', get_template_directory_uri() . '/inc/shortcodes/js/jquery.jcarousel.min.js');
		wp_register_script('touchSwipe', get_template_directory_uri() . '/inc/shortcodes/js/jquery.touchSwipe.min.js');
		wp_register_script('carouselConfig', get_template_directory_uri() . '/inc/shortcodes/js/carouselConfig.js');
	}

	add_action('wp_enqueue_scripts', 'register_clients_carousel_scripts');


	/* Shortcode --------------------------------------------------------------------- */

	function sc_clients_carousel($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'title'      => '',
				'amount'     => '4',
				'wrap'       => 'circular',
				'max_width'  => '90',
				'max_height' => '40',
				'bottom'     => '',
				'autoscroll' => '',
				'nonav'      => '',
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

		<style scoped>
			.clients-carousel-<?php echo $uniqid?> .jcarousel-<?php echo $uniqid?> {
				height: <?php echo $max_height ?>px !important;
			}
			.clients-carousel-<?php echo $uniqid?> li {
				height: <?php echo $max_height ?>px;
			}
			.clients-carousel-<?php echo $uniqid?> .jcarousel-item img {
				max-width: <?php echo $max_width ?>px;
				max-height: <?php echo $max_height ?>px;
				width: auto;
				height: auto;
			}
		</style>

		<?php if ($title) { ?>
			<div class="clients-carousel-title">
				<span class="clients-carousel-title-side">
					<span class="clients-carousel-title-line"></span>
				</span>
				<h4><?php echo $title ?></h4>
				<span class="clients-carousel-title-side">
					<span class="clients-carousel-title-line"></span>
				</span>
			</div>
		<?php } ?>
		<div class="carousel-holder clients-carousel clients-carousel-<?php echo $uniqid ?><?php if ($bottom == 'yes') { ?> bottom<?php } ?>">
			<!-- Nav -->
			<a href="#" class="jcarousel-<?php echo $uniqid ?>-control-prev jcarousel-prev"<?php if ($nonav == 'yes') { ?> style="display: none;"<?php } ?>>&lsaquo;</a>
			<a href="#" class="jcarousel-<?php echo $uniqid ?>-control-next jcarousel-next"<?php if ($nonav == 'yes') { ?> style="display: none;"<?php } ?>>&rsaquo;</a>
			<!-- Carousel -->
			<div class="jcarousel-<?php echo $uniqid ?> jcarousel" data-instance="<?php echo $uniqid ?>">
				<ul>
					<?php echo do_shortcode($content); ?>
				</ul>
			</div>
		</div>
		<?php
		$clients_carousel_output = ob_get_contents();
		ob_end_clean();
		return $clients_carousel_output;
		?>
	<?php
	}

	add_shortcode('clients_carousel', 'sc_clients_carousel');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Clients Carousel", "basix-td"),
			"base"                    => "clients_carousel",
			"as_parent"               => array('only' => 'clients_carousel_item'),
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
					"heading"     => __("Heading", 'basix-td'),
					"description" => __("Leave blank for no heading", 'basix-td'),
					"param_name"  => "title",
					"value"       => "",
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Items per view", 'basix-td'),
					"description" => __("Default is 5", 'basix-td'),
					"param_name"  => "amount",
					"value"       => __("5", 'basix-td'),
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
					"suffix"      => "px",
					"class"       => "",
					"heading"     => __("Max Logo Width", 'basix-td'),
					"description" => __("Default is 90", 'basix-td'),
					"param_name"  => "max_width",
					"value"       => __("90", 'basix-td'),
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"suffix"      => "px",
					"class"       => "",
					"heading"     => __("Max Logo Height", 'basix-td'),
					"description" => __("Default is 40", 'basix-td'),
					"param_name"  => "max_height",
					"value"       => __("60", 'basix-td'),
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
				array(
					"type"        => "checkbox",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Bottom of page?", 'basix-td'),
					"description" => __("Do not select this if you intend to use this in the theme options footer output.", 'basix-td'),
					"param_name"  => "bottom",
					"value"       => array(
						__("Yes", 'basix-td') => 'yes',
					),
				),
				array(
					"type"        => "checkbox",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Disable Navigation?", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "nonav",
					"value"       => array(
						__("Yes", 'basix-td') => 'yes',
					),
				),
			),
			"js_view" => 'VcColumnView'
		));
	}


	/* ------------------------------------------------------------------------------- */
	/* Basix Clients Carousel Item */
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_clients_carousel_item($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'url'  => '',
				'logo' => ''
			),
			$atts
		));
		?>
		<?php ob_start(); ?>
		<li class="jcarousel-item">
			<div class="logo-inner"><?php $href = vc_build_link($url); ?>
				<?php if (isset($href['url'])) { ?>
					<a href="<?php if (isset($href['url'])) {
						echo $href['url'];
					} ?>" target="<?php if (isset($href['target'])) {
						echo $href['target'];
					} ?>"><?php echo wp_get_attachment_image($logo); ?></a>
				<?php } else { ?>
					<img src="<?php echo wp_get_attachment_url($logo); ?>" alt="">
				<?php } ?>
			</div>
		</li>
		<?php
		$clients_carousel_item_output = ob_get_contents();
		ob_end_clean();
		return $clients_carousel_item_output;
		?>
	<?php
	}

	add_shortcode('clients_carousel_item', 'sc_clients_carousel_item');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"            => __("Basix Client Carousel Item", "basix-td"),
			"base"            => "clients_carousel_item",
			"content_element" => TRUE,
			"icon"            => "icon-basix-vc",
			"class"           => "",
			"as_child"        => array('only' => 'clients_carousel'),
			"params"          => array(
				array(
					"type"        => "attach_image",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Select logo", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "logo",
					"value"       => "",
				),
				array(
					"type"        => "vc_link",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Client URL", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "url",
					"value"       => ""
				),
			)
		));
	}
	if (class_exists('WPBakeryShortCodesContainer')) {
		class WPBakeryShortCode_clients_carousel extends WPBakeryShortCodesContainer {
		}
	}
	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_clients_carousel_item extends WPBakeryShortCode {
		}
	}
?>