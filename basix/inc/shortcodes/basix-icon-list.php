<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Icon List Container
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_icon_list_container($atts, $content = NULL) {

		extract(shortcode_atts(array(),
			$atts
		));
		?>
		<?php ob_start(); ?>
		<div class="basix_icon_list_container wpb_content_element">
			<?php echo do_shortcode($content); ?>
		</div>
		<?php
		$icon_list_container_output = ob_get_contents();
		ob_end_clean();
		return $icon_list_container_output;
		?>
	<?php
	}

	add_shortcode('icon_list_container', 'sc_icon_list_container');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Unique Icon List Container", "basix-td"),
			"base"                    => "icon_list_container",
			"as_parent"               => array('only' => 'icon_list_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element"         => TRUE,
			"icon"                    => "icon-basix-vc",
			"class"                   => "",
			"category"                => __("Basix", 'basix-td'),
			"show_settings_on_create" => FALSE,
			"params"                  => array(),
			"js_view"                 => 'VcColumnView'
		));
	}


	/* ------------------------------------------------------------------------------- */
	/* Basix Icon Container Item */
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_icon_list_item($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'text'       => '',
				'icon'       => '',
				'icon_color' => ''
			),
			$atts
		));
		?>
		<?php ob_start(); ?>
		<div class="basix_icon_list_item">
			<div class="icon">
				<i class="<?php echo $icon ?>" style="<?php if ($icon_color) { ?> color: <?php echo $icon_color ?><?php } ?>"></i>
			</div>
			<div class="text"><?php echo $text ?></div>
		</div>
		<?php
		$icon_list_item_output = ob_get_contents();
		ob_end_clean();
		return $icon_list_item_output;
		?>
	<?php
	}

	add_shortcode('icon_list_item', 'sc_icon_list_item');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"            => __("Basix Unique Icon List Item", "basix-td"),
			"base"            => "icon_list_item",
			"content_element" => TRUE,
			"icon"            => "icon-basix-vc",
			"class"           => "",
			"as_child"        => array('only' => 'icon_list_container'),
			"params"          => array(
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Item Text", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "text",
					"value"       => "",
				),
				array(
					"type"        => "icon_manager",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Select Icon", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "icon",
					"value"       => ""
				),
				array(
					"type"        => "colorpicker",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Icon Color", 'basix-td'),
					"description" => __("Leave blank for the default (accent) color.", 'basix-td'),
					"param_name"  => "icon_color",
					"value"       => ""
				),
			)
		));
	}
	if (class_exists('WPBakeryShortCodesContainer')) {
		class WPBakeryShortCode_icon_list_container extends WPBakeryShortCodesContainer {
		}
	}
	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_icon_list_item extends WPBakeryShortCode {
		}
	}
?>