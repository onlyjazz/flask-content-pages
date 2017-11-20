<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Accent Divider
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_divider($atts, $content = NULL) {
		return '<div class="divider"></div>';
	}

	add_shortcode('divider', 'sc_divider');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Accent Divider", 'js_composer'),
			"description"             => __("Divider line + accent", 'basix-td'),
			"base"                    => "divider",
			"class"                   => "",
			"controls"                => "full",
			"icon"                    => "icon-basix-vc",
			"category"                => __("Basix", 'basix-td'),
			"params"                  => "",
			"show_settings_on_create" => FALSE
		));
	}
?>