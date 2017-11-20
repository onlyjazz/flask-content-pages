<?php
	/* ------------------------------------------------------------------------------- */
	/* Home Banner CTA Bar
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_cta_bar($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'text'                     => '',
				'text_size'                => '',
				'button_text'              => '',
				'button_link'              => '',
				'bar_color'                => 'accent',
				'custom_color'             => '',
				'custom_text_color'        => '',
				'button_color'             => 'transparent',
				'custom_button_color'      => '',
				'custom_button_text_color' => '',
				'button_size'              => '',
				'include_icon'             => '',
				'button_icon'              => ''
			),
			$atts
		));
		?>
		<?php ob_start(); ?>
		<?php $href = vc_build_link($button_link); ?>
		<div class="wpb_content_element">
			<div class="cta-bar <?php echo $bar_color; ?>" style="<?php if ($text_size !== '') { ?>font-size: <?php echo $text_size ?>px;<?php } ?><?php if ($bar_color == 'custom' && $custom_color !== '') { ?> background-color: <?php echo $custom_color ?>;<?php } ?><?php if ($bar_color == 'custom' && $custom_text_color !== '') { ?> color: <?php echo $custom_text_color ?>;<?php } ?>">
				<div class="cta-bar-text">
					<?php echo $text ?>
				</div>
				<?php if ($button_text) { ?>
					<div class="cta-bar-button">
						<a class="button <?php echo $button_color ?> <?php echo $button_size; ?>" style="<?php if ($button_color == 'custom' && $custom_button_color !== '') { ?> background-color: <?php echo $custom_button_color ?>;<?php } ?><?php if ($button_color == 'custom' && $custom_button_text_color !== '') { ?> color: <?php echo $custom_button_text_color ?>;<?php } ?>" href="<?php if (isset($href['url'])) {
							echo $href['url'];
						} ?>" target="<?php if (isset($href['target'])) {
							echo $href['target'];
						} ?>"><?php if ($include_icon == TRUE && ($button_icon)) { ?>
								<i class="<?php echo $button_icon ?>"></i><?php } ?><?php echo $button_text ?></a>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php
		$cta_bar_output = ob_get_contents();
		ob_end_clean();
		return $cta_bar_output;
		?>
	<?php
	}

	add_shortcode('cta_bar', 'sc_cta_bar');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix CTA Bar", 'basix-td'),
			"description"             => __("Call to action bar", 'basix-td'),
			"base"                    => "cta_bar",
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
					"heading"     => __("Main call to action text", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "text",
					"value"       => "",
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"suffix"      => "px",
					"class"       => "",
					"heading"     => __("Text size", 'basix-td'),
					"description" => __("Leave blank for default", 'basix-td'),
					"param_name"  => "text_size",
					"value"       => ""
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Button text", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "button_text",
					"value"       => "",
				),
				array(
					"type"        => "vc_link",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Button Link", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "button_link",
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
						__("White", 'basix-td')        => 'white',
						__("Grey", 'basix-td')         => 'grey',
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
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Button Color", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "button_color",
					"value"       => array(
						__("Transparent", 'basix-td')  => 'transparent',
						__("Accent Color", 'basix-td') => 'accent',
						__("Main Color", 'basix-td')   => 'main',
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
						__("Small", 'basix-td')    => 'small',
						__("Large", 'basix-td')    => 'large',
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
			),
		));
	}
?>