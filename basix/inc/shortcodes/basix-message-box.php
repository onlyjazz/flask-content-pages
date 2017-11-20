<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Alert
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_message_box($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'text'              => '',
				'bar_color'         => 'accent',
				'custom_color'      => '',
				'custom_text_color' => '',
			),
			$atts
		));
		?>
		<?php ob_start(); ?>
		<div class="alert <?php echo $bar_color; ?>" style="<?php if ($bar_color == 'custom' && $custom_color !== '') { ?> background-color: <?php echo $custom_color ?>;<?php } ?><?php if ($bar_color == 'custom' && $custom_text_color !== '') { ?> color: <?php echo $custom_text_color ?>;<?php } ?>">
			<?php echo $text; ?>
			<span class="close"></span>
		</div>
		<?php
		$message_box_output = ob_get_contents();
		ob_end_clean();
		return $message_box_output;
		?>
	<?php
	}

	add_shortcode('message_box', 'sc_message_box');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Message Box", 'basix-td'),
			"description"             => __("Alerts etc.", 'basix-td'),
			"base"                    => "message_box",
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
					"heading"     => __("Text", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "text",
					"value"       => "",
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Color", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "bar_color",
					"value"       => array(
						__("Accent Color", 'basix-td') => 'accent',
						__("Main Color", 'basix-td')   => 'main',
						__("Red", 'basix-td')          => 'red',
						__("Amber", 'basix-td')        => 'amber',
						__("Green", 'basix-td')        => 'green',
						__("Transparent", 'basix-td')  => 'transparent',
						__("Custom", 'basix-td')       => 'custom',
					),
				),
				array(
					"type"        => "colorpicker",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Custom Background Color", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "custom_color",
					"value"       => "",
					"dependency"  => array("element" => "bar_color", "value" => array("custom")),
				),
				array(
					"type"        => "colorpicker",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Custom Text Color", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "custom_text_color",
					"value"       => "",
					"dependency"  => array("element" => "bar_color", "value" => array("custom")),
				),
			),
		));
	}
?>