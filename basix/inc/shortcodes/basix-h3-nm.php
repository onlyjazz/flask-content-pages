<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix H3 - No Margin
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_basix_h3_nm($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'heading_text' => '',
				'heading_align' => ''
			),
			$atts
		));
		?>
		<?php ob_start(); ?>
		<h3 class="nm <?php echo $heading_align; ?>"><?php echo $heading_text; ?></h3>
		<?php
		$basix_h3_nm_output = ob_get_contents();
		ob_end_clean();
		return $basix_h3_nm_output;
		?>
	<?php
	}

	add_shortcode('basix_h3_nm', 'sc_basix_h3_nm');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("H3 - No Margin", 'basix-td'),
			"base"                    => "basix_h3_nm",
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
					"heading"     => __("Heading", 'basix-td'),
					"param_name"  => "heading_text",
					"value"       => "",
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Align", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "heading_align",
					"value"       => array(
						__("Left", 'basix-td') => 'left',
						__("Right", 'basix-td')   => 'right',
						__("Center", 'basix-td')   => 'center',
					),
				),
			),
		));
	}
?>