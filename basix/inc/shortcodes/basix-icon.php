<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Icon
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_basix_icon($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'icon'       => '',
				'icon_color' => '',
				'icon_size'  => '',
				'icon_align' => ''
			),
			$atts
		));
		?>
		<?php ob_start(); ?>
		<div style="<?php if ($icon_align) { ?> text-align: <?php echo $icon_align ?>;<?php } ?> margin-bottom: 20px;">
			<i class="<?php echo $icon ?>" style="<?php if ($icon_size) { ?>font-size: <?php echo $icon_size ?>px;<?php } ?><?php if ($icon_color) { ?> color: <?php echo $icon_color ?><?php } ?>"></i>
		</div>
		<?php
		$basix_icon_output = ob_get_contents();
		ob_end_clean();
		return $basix_icon_output;
		?>
	<?php
	}

	add_shortcode('basix_icon', 'sc_basix_icon');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Icon", 'basix-td'),
			"description"             => __("", 'basix-td'),
			"base"                    => "basix_icon",
			"class"                   => "",
			"controls"                => "full",
			"icon"                    => "icon-basix-vc",
			"category"                => __("Basix", 'basix-td'),
			"show_settings_on_create" => TRUE,
			"params"                  => array(
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
					"description" => __("", 'basix-td'),
					"param_name"  => "icon_color",
					"value"       => ""
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Icon Size", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "icon_size",
					"value"       => 42,
					"min"         => 16,
					"max"         => 512,
					"suffix"      => "px"
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Alignment", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "icon_align",
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