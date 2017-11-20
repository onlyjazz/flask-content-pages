<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Icon & Text
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_basix_icon_text($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'icon'                 => '',
				'custom_image'         => '',
				'icon_color'           => '',
				'icon_size'            => '',
				'icon_position'        => 'left',
				'icon_style'           => '',
				'icon_circular_bg'     => '',
				'icon_bg_color'        => '',
				'icon_circular_border' => '',
				'heading'              => '',
				'heading_spacing'      => '',
				'align'                => 'left'
			),
			$atts
		));
		?>
		<?php ob_start(); ?>

		<?php if ($icon_style == 'circular-background' || $icon_style == 'squared-background') { ?>

			<!-- Styled Icon & Text Element -->

			<?php if ($icon_position == 'left') { ?>
				<div class="basix_icon_text left-icon wpb_content_element"<?php if (!$content) { ?> style="margin-bottom: 0;"<?php } ?> wid>
					<div class="icon">
						<div class="icon-bg" style="background-color: <?php echo $icon_bg_color ?>; width: <?php echo($icon_size + 6) ?>px; height: <?php echo($icon_size + 6) ?>px;">
							<div class="icon-holder" style="width: <?php echo($icon_size + 6) ?>px; height: <?php echo($icon_size + 6) ?>px;">
								<div class="icon-holder-inner">
									<?php if ($custom_image) { ?>
										<img src="<?php echo wp_get_attachment_url($custom_image); ?>" alt="" style="max-width: <?php echo $icon_size ?>px; max-height: <?php echo $icon_size ?>px;">
									<?php } else { ?>
										<i class="<?php echo $icon ?>" style="<?php if ($icon_size) { ?>font-size: <?php echo $icon_size ?>px;<?php } ?><?php if ($icon_color) { ?> color: <?php echo $icon_color ?>;<?php } ?>"></i>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<div class="text">
						<?php if ($heading) { ?>
							<h3<?php if ($heading_spacing) { ?> style="padding-bottom: <?php echo $heading_spacing ?>px;"<?php } ?>><?php echo $heading ?></h3><?php } ?>
						<?php echo $content ?>
					</div>
				</div>
			<?php } ?>

		<?php } else { ?>

			<!-- Standard Icon & Text Element -->

			<?php if ($icon_position == 'left') { ?>
				<div class="basix_icon_text left-icon wpb_content_element"<?php if (!$content) { ?> style="margin-bottom: 0;"<?php } ?>>
					<div class="icon" style="width: <?php if ($icon_size) { ?><?php echo($icon_size + 3) ?>px;<?php } ?>">
						<?php if ($custom_image) { ?>
							<img src="<?php echo wp_get_attachment_url($custom_image); ?>" alt="" style="max-width: <?php echo $icon_size ?>px; max-height: <?php echo $icon_size ?>px;">
						<?php } else { ?>
							<i class="<?php echo $icon ?>" style="<?php if ($icon_size) { ?>font-size: <?php echo $icon_size ?>px;<?php } ?><?php if ($icon_color) { ?> color: <?php echo $icon_color ?><?php } ?>"></i>
						<?php } ?>
					</div>
					<div class="text">
						<?php if ($heading) { ?>
							<h3<?php if ($heading_spacing) { ?> style="padding-bottom: <?php echo $heading_spacing ?>px;"<?php } ?>><?php echo $heading ?></h3><?php } ?>
						<?php echo $content ?>
					</div>
				</div>
			<?php } ?>

		<?php } ?>

		<?php if ($icon_style == 'circular-background' || $icon_style == 'squared-background') { ?>

			<!-- Styled Icon & Text Element -->

			<?php if ($icon_position == 'title-left') { ?>
				<div class="basix_icon_text title-left-icon wpb_content_element<?php if ($align == 'center') { ?> center<?php } ?>"<?php if (!$content) { ?> style="margin-bottom: 0;"<?php } ?>>
					<div class="title-holder"<?php if ($heading_spacing) { ?> style="padding-bottom: <?php echo $heading_spacing ?>px;"<?php } ?>>
						<div class="icon" style="width: <?php if ($icon_size) { ?><?php echo($icon_size + 0) ?>px;<?php } ?>">
							<div class="icon-bg" style="background-color: <?php echo $icon_bg_color ?>; width: <?php echo($icon_size + 6) ?>px; height: <?php echo($icon_size + 6) ?>px;">
								<div class="icon-holder" style="width: <?php echo($icon_size + 6) ?>px; height: <?php echo($icon_size + 6) ?>px;">
									<div class="icon-holder-inner">
										<?php if ($custom_image) { ?>
											<img src="<?php echo wp_get_attachment_url($custom_image); ?>" alt="" style="max-width: <?php echo $icon_size ?>px; max-height: <?php echo $icon_size ?>px;">
										<?php } else { ?>
											<i class="<?php echo $icon ?>" style="<?php if ($icon_size) { ?>font-size: <?php echo $icon_size ?>px;<?php } ?><?php if ($icon_color) { ?> color: <?php echo $icon_color ?>;<?php } ?>"></i>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="title">
							<h3><?php echo $heading ?></h3>
						</div>
					</div>
					<?php if ($content) { ?>
						<div class="text">
							<?php echo $content ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>

		<?php } else { ?>

			<!-- Standard Icon & Text Element -->

			<?php if ($icon_position == 'title-left') { ?>
				<div class="basix_icon_text title-left-icon wpb_content_element<?php if ($align == 'center') { ?> center<?php } ?>"<?php if (!$content) { ?> style="margin-bottom: 0;"<?php } ?>>
					<div class="title-holder"<?php if ($heading_spacing) { ?> style="padding-bottom: <?php echo $heading_spacing ?>px;"<?php } ?>>
						<div class="icon" style="width: <?php if ($icon_size) { ?><?php echo($icon_size + 0) ?>px;<?php } ?>">
							<?php if ($custom_image) { ?>
								<img src="<?php echo wp_get_attachment_url($custom_image); ?>" alt="" style="max-width: <?php echo $icon_size ?>px; max-height: <?php echo $icon_size ?>px;">
							<?php } else { ?>
								<i class="<?php echo $icon ?>" style="<?php if ($icon_size) { ?>font-size: <?php echo $icon_size ?>px;<?php } ?><?php if ($icon_color) { ?> color: <?php echo $icon_color ?><?php } ?>"></i>
							<?php } ?>
						</div>
						<div class="title">
							<h3><?php echo $heading ?></h3>
						</div>
					</div>
					<?php if ($content) { ?>
						<div class="text">
							<?php echo $content ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>

		<?php } ?>

		<?php if ($icon_position == 'top') { ?>

			<?php if ($icon_style == 'circular-background' || $icon_style == 'squared-background') { ?>

				<!-- Styled Icon & Text Element -->

				<div class="basix_icon_text top-icon wpb_content_element<?php if ($align == 'center') { ?> center<?php } ?>">
					<div class="icon">
						<div class="icon-bg" style="background-color: <?php echo $icon_bg_color ?>;">
							<div class="icon-holder" style="width: <?php echo($icon_size + 6) ?>px; height: <?php echo($icon_size + 6) ?>px;">
								<div class="icon-holder-inner">
									<?php if ($custom_image) { ?>
										<img src="<?php echo wp_get_attachment_url($custom_image); ?>" alt="" style="max-width: <?php echo $icon_size ?>px; max-height: <?php echo $icon_size ?>px;">
									<?php } else { ?>
										<i class="<?php echo $icon ?>" style="<?php if ($icon_size) { ?>font-size: <?php echo $icon_size ?>px;<?php } ?><?php if ($icon_color) { ?> color: <?php echo $icon_color ?>;<?php } ?>"></i>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<?php if ($heading) { ?>
						<div class="title"<?php if ($heading_spacing) { ?> style="padding-bottom: <?php echo $heading_spacing ?>px;"<?php } ?>>
							<h3><?php echo $heading ?></h3>
						</div>
					<?php } ?>
					<div class="text">
						<?php echo $content ?>
					</div>
				</div>

			<?php } else { ?>

				<!-- Standard Icon & Text Element -->

				<div class="basix_icon_text top-icon wpb_content_element<?php if ($align == 'center') { ?> center<?php } ?>">
					<div class="icon">
						<?php if ($custom_image) { ?>
							<img src="<?php echo wp_get_attachment_url($custom_image); ?>" alt="" style="max-width: <?php echo $icon_size ?>px; max-height: <?php echo $icon_size ?>px;">
						<?php } else { ?>
							<i class="<?php echo $icon ?>" style="<?php if ($icon_size) { ?>font-size: <?php echo $icon_size ?>px;<?php } ?><?php if ($icon_color) { ?> color: <?php echo $icon_color ?>;<?php } ?>"></i>
						<?php } ?>
					</div>
					<?php if ($heading) { ?>
						<div class="title"<?php if ($heading_spacing) { ?> style="padding-bottom: <?php echo $heading_spacing ?>px;"<?php } ?>>
							<h3><?php echo $heading ?></h3>
						</div>
					<?php } ?>
					<div class="text">
						<?php echo $content ?>
					</div>
				</div>

			<?php } ?>

		<?php } ?>
		<?php
		$basix_icon_text_output = ob_get_contents();
		ob_end_clean();
		return $basix_icon_text_output;
		?>
	<?php
	}

	add_shortcode('basix_icon_text', 'sc_basix_icon_text');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Icon & Text", 'basix-td'),
			"description"             => __("", 'basix-td'),
			"base"                    => "basix_icon_text",
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
					"type"        => "attach_image",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Custom Image", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "custom_image",
					"value"       => "",
				),
				array(
					"type"        => "colorpicker",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Icon Color", 'basix-td'),
					"description" => __("Leave blank for the default (accent) color.", 'basix-td'),
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
					"heading"     => __("Icon Position", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "icon_position",
					"value"       => array(
						__("Left of Text", 'basix-td')  => 'left',
						__("Left of Title", 'basix-td') => 'title-left',
						__("On Top", 'basix-td')        => 'top',
					),
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Icon Style", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "icon_style",
					"value"       => array(
						__("Standard", 'basix-td')            => 'standard',
						__("Circular Background", 'basix-td') => 'circular-background',
					),
				),
				array(
					"type"        => "colorpicker",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Icon Background Color", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "icon_bg_color",
					"value"       => "",
					"dependency"  => array("element" => "icon_style", "value" => array("circular-background")),
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Heading", 'basix-td'),
					"description" => __("This is not required.", 'basix-td'),
					"param_name"  => "heading",
					"value"       => "",
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Additional Title Spacing", 'basix-td'),
					"description" => __("Leave blank for default.", 'basix-td'),
					"param_name"  => "heading_spacing",
					"min"         => 0,
					"max"         => 200,
					"suffix"      => "px"
				),
				array(
					"type"        => "textarea_html",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Text", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "content",
					"value"       => "",
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
						__("Center", 'basix-td') => 'center',
					),
				),
			),
		));
	}
?>