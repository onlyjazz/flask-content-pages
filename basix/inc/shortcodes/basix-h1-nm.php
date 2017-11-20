<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix H1 - No Margin
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_basix_h1_nm($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'heading_text' => '',
				'heading_align' => ''
			),
			$atts
		));
		?>
		<?php ob_start(); ?>
		<h1 class="nm <?php echo $heading_align; ?>"><?php echo $heading_text; ?></h1>
		<?php
		$basix_h1_nm_output = ob_get_contents();
		ob_end_clean();
		return $basix_h1_nm_output;
		?>
	<?php
	}

	add_shortcode('basix_h1_nm', 'sc_basix_h1_nm');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("H1 - No Margin", 'basix-td'),
			"base"                    => "basix_h1_nm",
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