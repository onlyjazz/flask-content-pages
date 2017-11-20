<?php
	/* ------------------------------------------------------------------------------- */
	/* Home Banner CTA Bar
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_button($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'button_text'              => '',
				'button_link'              => '',
				'button_color'             => 'accent',
				'custom_button_color'      => '',
				'custom_button_text_color' => '',
				'button_size'              => 'standard',
				'align'                    => '',
				'include_icon'             => '',
				'button_icon'              => '',
				'vspace'                   => ''
			),
			$atts
		));
		?>
		<?php ob_start(); ?>
		<?php $href = vc_build_link($button_link); ?>
		<?php if ($align == 'center') { ?>
			<div style="text-align: center;<?php if ($vspace == 'yes') { ?> margin-top: -10px;<?php } ?>">
				<a class="button <?php echo $button_color ?> <?php echo $button_size; ?>" style="<?php if ($button_color == 'custom' && $custom_button_color !== '') { ?> background-color: <?php echo $custom_button_color ?>;<?php } ?><?php if ($button_color == 'custom' && $custom_button_text_color !== '') { ?> color: <?php echo $custom_button_text_color ?>;<?php } ?>" href="<?php if (isset($href['url'])) {
					echo $href['url'];
				} ?>" target="<?php if (isset($href['target'])) {
					echo $href['target'];
				} ?>"><?php if ($include_icon == TRUE && ($button_icon)) { ?>
						<i class="<?php echo $button_icon ?>"></i><?php } ?><?php echo $button_text ?></a></div>
		<?php } else { ?>
			<div style="display: inline;<?php if ($vspace == 'yes') { ?> margin-top: -10px;<?php } ?>">
				<a class="button <?php echo $button_color ?> <?php echo $button_size; ?>" style="<?php if ($button_color == 'custom' && $custom_button_color !== '') { ?> background-color: <?php echo $custom_button_color ?>;<?php } ?><?php if ($button_color == 'custom' && $custom_button_text_color !== '') { ?> color: <?php echo $custom_button_text_color ?>;<?php } ?>" href="<?php if (isset($href['url'])) {
					echo $href['url'];
				} ?>" target="<?php if (isset($href['target'])) {
					echo $href['target'];
				} ?>"><?php if ($include_icon == TRUE && ($button_icon)) { ?>
						<i class="<?php echo $button_icon ?>"></i><?php } ?><?php echo $button_text ?></a></a></div>
		<?php } ?>
		<?php
		$button_output = ob_get_contents();
		ob_end_clean();
		return $button_output;
		?>
	<?php
	}

	add_shortcode('button', 'sc_button');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Button", 'basix-td'),
			"description"             => __("", 'basix-td'),
			"base"                    => "button",
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
					"heading"     => __("Button Text", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "button_text",
					"value"       => ""
				),
				array(
					"type"        => "vc_link",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Button Link", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "button_link",
					"value"       => ""
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Button Color", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "button_color",
					"value"       => array(
						__("Accent Color", 'basix-td') => 'accent',
						__("Main Color", 'basix-td')   => 'main',
						__("Transparent", 'basix-td')  => 'transparent',
						__("White", 'basix-td')        => 'white',
						__("Bordered", 'basix-td')     => 'bordered',
						__("Blue", 'basix-td')         => 'blue',
						__("Green", 'basix-td')        => 'green',
						__("Red", 'basix-td')          => 'red',
						__("Purple", 'basix-td')       => 'purple',
						__("Cyan", 'basix-td')         => 'cyan',
						__("Yellow", 'basix-td')       => 'yellow',
						__("Grey", 'basix-td')         => 'grey',
						__("Custom", 'basix-td')       => 'custom'
					),
				),
				array(
					"type"        => "colorpicker",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Custom Button Color", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "custom_button_color",
					"value"       => "",
					"dependency"  => array("element" => "button_color", "value" => array("custom")),
				),
				array(
					"type"        => "colorpicker",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Custom Button Text Color", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "custom_button_text_color",
					"value"       => "",
					"dependency"  => array("element" => "button_color", "value" => array("custom")),
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Button Size", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "button_size",
					"value"       => array(
						__("Standard", 'basix-td') => 'standard',
						__("Large", 'basix-td')    => 'large',
						__("Small", 'basix-td')    => 'small',
					),
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Align", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "align",
					"value"       => array(
						__("Left", 'basix-td')   => 'left',
						__("Center", 'basix-td') => 'center',
					),
				),
				array(
					"type"        => "checkbox",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Include Icon?", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "include_icon",
					"value"       => array(
						__("Yes", 'basix-td') => TRUE,
					),
				),
				array(
					"type"        => "icon_manager",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Button Icon", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "button_icon",
					"value"       => ""
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Decrease Vertical Space?", 'basix-td'),
					"description" => __("Decreases the gap between the button and the content element above it by 10px.", 'basix-td'),
					"param_name"  => "vspace",
					"value"       => array(
						__("No", 'basix-td')  => 'no',
						__("Yes", 'basix-td') => 'yes',
					),
				),
			),
		));
	}
?>