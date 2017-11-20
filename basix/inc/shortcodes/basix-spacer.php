<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Spacer
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_spacer($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'height' => '20px',
			),
			$atts
		));
		?>
		<?php ob_start(); ?>
		<div class="spacer"<?php if ($height) { ?> style="height: <?php echo $height; ?>px<?php } ?>"></div>
		<?php
		$spacer_output = ob_get_contents();
		ob_end_clean();
		return $spacer_output;
		?>
	<?php
	}

	add_shortcode('spacer', 'sc_spacer');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Spacer", 'basix-td'),
			"description"             => __("Add some blank space", 'basix-td'),
			"base"                    => "spacer",
			"class"                   => "",
			"controls"                => "full",
			"icon"                    => "icon-basix-vc",
			"category"                => __("Basix", 'basix-td'),
			"show_settings_on_create" => TRUE,
			"params"                  => array(
				array(
					"type"        => "number",
					"suffix"      => "px",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Height", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "height",
					"value"       => "20"
				),
			),
		));
	}
?>