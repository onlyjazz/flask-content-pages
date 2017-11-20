<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Identical Icon List
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_identical_icon_list_container($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'icon'       => '',
				'icon_color' => ''
			),
			$atts
		));

		/* Generate Random ID */
		$identical_list_id = 'identical_list_' . rand();
		?>
		<?php ob_start(); ?>
		<div class="basix_icon_list_container <?php echo $identical_list_id ?> wpb_content_element">
			<?php
				$icon_color_output = '';
				if ($icon_color) {
					$icon_color_output = 'style="color: ' . $icon_color . '"';
				}
				$lookfor = array('<li>', '</li>');
				$replacewith = array('<li class="basix_icon_list_item"><div class="icon"><i class="' . $icon . '"' . $icon_color_output . '></i></div><div class="text">', '</div></li>');
				$basix_list_output = do_shortcode($content);
			?>
			<?php echo str_replace($lookfor, $replacewith, $basix_list_output); ?>
		</div>
		<?php
		$identical_icon_list_container_output = ob_get_contents();
		ob_end_clean();
		return $identical_icon_list_container_output;
		?>
	<?php
	}

	add_shortcode('identical_icon_list_container', 'sc_identical_icon_list_container');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Identical Icon List Container", "basix-td"),
			"base"                    => "identical_icon_list_container",
			"as_parent"               => array('only' => 'identical_icon_list'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element"         => TRUE,
			"icon"                    => "icon-basix-vc",
			"class"                   => "",
			"category"                => __("Basix", 'basix-td'),
			"show_settings_on_create" => TRUE,
			"params"                  => array(
				array(
					"type"        => "icon_manager",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Choose an icon for the list", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "icon",
					"value"       => "",
				),
				array(
					"type"        => "colorpicker",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Icon Color", 'basix-td'),
					"description" => __("Leave blank for default", 'basix-td'),
					"param_name"  => "icon_color",
					"value"       => "",
				),
			),
			"js_view"                 => 'VcColumnView'
		));
	}


	/* ------------------------------------------------------------------------------- */
	/* Basix Identical Icon List */
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_identical_icon_list($atts, $content = NULL) {

		extract(shortcode_atts(array(),
			$atts
		));
		?>
		<?php ob_start(); ?>
		<div class="basix_identical_icon_list">
			<?php echo $content ?>
		</div>
		<?php
		$icon_list_item_output = ob_get_contents();
		ob_end_clean();
		return $icon_list_item_output;
		?>
	<?php
	}

	add_shortcode('identical_icon_list', 'sc_identical_icon_list');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"            => __("Identical Icon List", "basix-td"),
			"base"            => "identical_icon_list",
			"content_element" => TRUE,
			"icon"            => "icon-basix-vc",
			"class"           => "",
			"as_child"        => array('only' => 'identical_icon_list_container'),
			"params"          => array(
				array(
					"type"        => "textarea_html",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Text", 'basix-td'),
					"description" => __("Create or paste your list items here.", 'basix-td'),
					"param_name"  => "content",
					"value"       => "",
				),
			)
		));
	}
	if (class_exists('WPBakeryShortCodesContainer')) {
		class WPBakeryShortCode_identical_icon_list_container extends WPBakeryShortCodesContainer {
		}
	}
	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_identical_icon_list extends WPBakeryShortCode {
		}
	}
?>