<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Google Map
	/* ------------------------------------------------------------------------------- */

	/* Register Scripts -------------------------------------------------------------- */

	function register_google_map_scripts() {
		wp_register_script("googlemapapi", "https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false");
	}

	add_action('wp_enqueue_scripts', 'register_google_map_scripts');


	/* Shortcode --------------------------------------------------------------------- */

	function sc_basix_google_map($atts, $content = NULL) {

		extract(shortcode_atts(array(
				"height"   => "300px",
				"map_type" => "ROADMAP",
				"lat"      => "51.4946416",
				"lng"      => "-0.172699",
				"zoom"     => "12",
				"marker"   => "yes",
			),
			$atts
		));

		/* Enqueue Scripts */
		wp_enqueue_script("googlemapapi");
		?>
		<?php ob_start(); ?>
		<?php $map_id = rand(); ?>
		<script type="text/javascript">
			jQuery(document).ready(function () {
				function initialize() {
					var myLatlng = new google.maps.LatLng(<?php echo $lat ?>, <?php echo $lng ?>);
					var mapOptions = {
						center     : myLatlng,
						scrollwheel: false,
						map        : map,
						mapTypeId  : google.maps.MapTypeId.<?php echo $map_type ?>,
						zoom       : <?php echo $zoom ?>
					};
					var map = new google.maps.Map(document.getElementById("map-canvas-<?php echo $map_id ?>"), mapOptions);
					var marker = new google.maps.Marker({position: myLatlng});
					<?php if ($marker == 'yes') { ?>marker.setMap(map);
					<?php } ?>
				}

				google.maps.event.addDomListener(window, 'load', initialize);
			});
		</script>
		<div class="basix-map wpb_content_element" style="<?php if ($height) { ?>height: <?php echo $height ?><?php } ?>px" id="map-canvas-<?php echo $map_id ?>"></div>
		<?php
		$basix_google_map_output = ob_get_contents();
		ob_end_clean();
		return $basix_google_map_output;
		?>
	<?php
	}

	add_shortcode('basix_google_map', 'sc_basix_google_map');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Google Map", 'basix-td'),
			"description"             => __("", 'basix-td'),
			"base"                    => "basix_google_map",
			"class"                   => "",
			"controls"                => "full",
			"icon"                    => "icon-basix-vc",
			"category"                => __("Basix", 'basix-td'),
			"show_settings_on_create" => TRUE,
			"params"                  => array(
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Map Type", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "map_type",
					"value"       => array(
						__("Road Map", 'basix-td')   => 'ROADMAP',
						__("Satellite", 'basix-td') => 'SATELLITE',
						__("Hybrid", 'basix-td')    => 'HYBRID',
						__("Terrain", 'basix-td')   => 'TERRAIN'
					),
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"suffix"      => "px",
					"class"       => "",
					"heading"     => __("Height", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "height",
					"value"       => "300"
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Latitude", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "lat",
					"value"       => "51.4946416",
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Longitude", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "lng",
					"value"       => "-0.172699",
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Zoom", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "zoom",
					"value"       => "12"
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Show Marker?", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "marker",
					"value"       => array(
						"Yes" => 'yes',
						"No"  => 'no',
					),
				),
			),
		));
	}
?>