<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Mini Divider
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_basix_mini_divider($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'align' => '',
				'color' => ''
			),
			$atts
		));
		?>
		<?php ob_start(); ?>
		<div class="wpb_content_element" style="<?php if ($align) { ?> text-align: <?php echo $align ?>;<?php } ?>">
			<div class="mini-divider" style="background-color: <?php if ($color) { ?><?php echo $color; ?><?php } else { ?>#cc0000;<?php } ?>"></div>
		</div>
		<?php
		$basix_mini_divider_output = ob_get_contents();
		ob_end_clean();
		return $basix_mini_divider_output;
		?>
	<?php
	}

	add_shortcode('basix_mini_divider', 'sc_basix_mini_divider');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Mini Divider", 'basix-td'),
			"description"             => __("", 'basix-td'),
			"base"                    => "basix_mini_divider",
			"class"                   => "",
			"controls"                => "full",
			"icon"                    => "icon-basix-vc",
			"category"                => __("Basix", 'basix-td'),
			"show_settings_on_create" => TRUE,
			"params"                  => array(
				array(
					"type"        => "colorpicker",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Color", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "color",
					"value"       => ""
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Alignment", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "align",
					"value"       => array(
						__("Left", 'basix-td')   => 'left',
						__("Right", 'basix-td')   => 'right',
						__("Center", 'basix-td') => 'center',
					),
				),
			),
		));
	}
?>