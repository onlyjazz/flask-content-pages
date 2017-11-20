<?php
	/**
	 * Include the TGM_Plugin_Activation class.
	 */
	require_once dirname(__FILE__) . '/class-tgm-plugin-activation.php';
	add_action('tgmpa_register', 'basix_register_plugins');
	/**
	 * Register the required plugins for this theme.
	 * The variable passed to tgmpa_register_plugins() should be an array of plugin
	 * arrays.
	 * This function is hooked into tgmpa_init, which is fired within the
	 * TGM_Plugin_Activation class constructor.
	 */
	function basix_register_plugins() {
		/**
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		// Visual Composer
		$plugins = array(
			array(
				'name'               => 'WPBakry Visual Composer', // The plugin name
				'slug'               => 'js_composer', // The plugin slug (typically the folder name)
				'source'             => get_stylesheet_directory() . '/inc/plugins/js_composer.zip', // The plugin source
				'required'           => TRUE, // If false, the plugin is only 'recommended' instead of required
				'version'            => '4.3.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => TRUE, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => TRUE, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			// Font Icon Manager
			array(
				'name'               => 'Font Icon Manager for Visual Composer', // The plugin name
				'slug'               => 'Ultimate_Font_Icon_Manager', // The plugin slug (typically the folder name)
				'source'             => get_stylesheet_directory() . '/inc/plugins/Ultimate_Font_Icon_Manager.zip', // The plugin source
				'required'           => TRUE, // If false, the plugin is only 'recommended' instead of required
				'version'            => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => TRUE, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => TRUE, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			// Slider Revolution
			array(
				'name'               => 'Slider Revolution', // The plugin name
				'slug'               => 'revslider', // The plugin slug (typically the folder name)
				'source'             => get_stylesheet_directory() . '/inc/plugins/revslider.zip', // The plugin source
				'required'           => FALSE, // If false, the plugin is only 'recommended' instead of required
				'version'            => '4.5.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => FALSE, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => TRUE, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			// Basix Twitter Feed
			array(
				'name'               => 'Basix Twitter Feed', // The plugin name
				'slug'               => 'basix-twitter', // The plugin slug (typically the folder name)
				'source'             => get_stylesheet_directory() . '/inc/plugins/basix-twitter.zip', // The plugin source
				'required'           => FALSE, // If false, the plugin is only 'recommended' instead of required
				'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => FALSE, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => TRUE, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '', // If set, overrides default API URL and points to an external URL
			),
			// Simple Page Sidebars
			array(
				'name'             => 'Simple Page Sidebars',
				'version'          => '1.1.6',
				'slug'             => 'simple-page-sidebars',
				'force_activation' => FALSE, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'required'         => FALSE,
			),
			// Shortcode Empty Paragraph Fix
			array(
				'name'             => 'Shortcode Empty Paragraph Fix',
				'version'          => '0.2',
				'slug'             => 'shortcode-empty-paragraph-fix',
				'force_activation' => FALSE, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'required'         => FALSE,
			)
		);

		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'           => 'basix-td', // Text domain - likely want to be the same as your theme.
			'default_path'     => '', // Default absolute path to pre-packaged plugins
			'parent_menu_slug' => 'themes.php', // Default parent menu slug
			'parent_url_slug'  => 'themes.php', // Default parent URL slug
			'menu'             => 'install-required-plugins', // Menu slug
			'has_notices'      => TRUE, // Show admin notices or not
			'is_automatic'     => TRUE, // Automatically activate plugins after installation or not
			'message'          => '', // Message to output right before the plugins table
			'strings'          => array(
				'page_title'                      => __('Install Required Plugins', 'basix-td'),
				'menu_title'                      => __('Install Plugins', 'basix-td'),
				'installing'                      => __('Installing Plugin: %s', 'basix-td'), // %1$s = plugin name
				'oops'                            => __('Something went wrong with the plugin API.', 'basix-td'),
				'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.'), // %1$s = plugin name(s)
				'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.'), // %1$s = plugin name(s)
				'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.'), // %1$s = plugin name(s)
				'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
				'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)
				'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.'), // %1$s = plugin name(s)
				'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.'), // %1$s = plugin name(s)
				'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.'), // %1$s = plugin name(s)
				'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins'),
				'activate_link'                   => _n_noop('Activate installed plugin', 'Activate installed plugins'),
				'return'                          => __('Return to Required Plugins Installer', 'basix-td'),
				'plugin_activated'                => __('Plugin activated successfully.', 'basix-td'),
				'complete'                        => __('All plugins installed and activated successfully. %s', 'basix-td') // %1$s = dashboard link
			)
		);
		tgmpa($plugins, $config);
	}


	/* ------------------------------------------------------------------------------- */
	/* Initialize Visual Composer as "built into the theme".
	/* ------------------------------------------------------------------------------- */

	if (function_exists('vc_set_as_theme')) {
		vc_set_as_theme($notifier = FALSE);
	}


	/* ------------------------------------------------------------------------------- */
	/* Visual Composer Modifications
	/* ------------------------------------------------------------------------------- */

	if (function_exists('vc_map')) {

		// Remove Unnecessary Elements
		vc_remove_element('vc_carousel');
		vc_remove_element('vc_images_carousel');
		vc_remove_element('vc_gmaps');
		vc_remove_element("vc_button");
		vc_remove_element("vc_button2");
		vc_remove_element("vc_cta_button");
		vc_remove_element("vc_cta_button2");
		vc_remove_element("vc_posts_slider");
		vc_remove_element("vc_posts_grid");
		vc_remove_element("vc_message");
		vc_remove_element("vc_flickr");
		vc_remove_element("vc_wp_search");
		vc_remove_element("vc_wp_meta");
		vc_remove_element("vc_wp_recentcomments");
		vc_remove_element("vc_wp_calendar");
		vc_remove_element("vc_wp_pages");
		vc_remove_element("vc_wp_text");
		vc_remove_element("vc_wp_posts");
		vc_remove_element("vc_wp_links");
		vc_remove_element("vc_wp_categories");
		vc_remove_element("vc_wp_archives");
		vc_remove_element("vc_wp_rss");

		// Remove default text for text block element
		function modify_vc_textblock_default_text() {
			$vc_textblock_default_text          = WPBMap::getParam('vc_column_text', 'content');
			$vc_textblock_default_text['value'] = '';
			WPBMap::mutateParam('vc_column_text', $vc_textblock_default_text);
		}

		add_action('init', 'modify_vc_textblock_default_text');

		// Remove Teaser Meta Box
		function remove_teaser_metabox() {
			remove_meta_box('vc_teaser', 'post', 'side');
			remove_meta_box('vc_teaser', 'page', 'side');
			remove_meta_box('vc_teaser', 'portfolio', 'side');
		}

		add_action('do_meta_boxes', 'remove_teaser_metabox');


		/* Aditional Params ---------------------------------- */

		// Revolution Slider - White BG
		$rev_slider_attribute_whitebg = array(
			"type"        => "checkbox",
			"heading"     => __("White Background?", 'basix-td'),
			"description" => __("Check this if the slider has a white background. Sets timer line and status bullets accordingly.", 'basix-td'),
			"param_name"  => "white_background",
			"value"       => array(
				__("Yes", 'basix-td') => 'white-bg',
			),
		);
		vc_add_param('rev_slider_vc', $rev_slider_attribute_whitebg);

		// Rows - Background Style
		$row_attribute_bg_style = array(
			"type"        => "dropdown",
			"heading"     => __("Background Style", 'basix-td'),
			"description" => __("", 'basix-td'),
			"param_name"  => "stretched_bg_style",
			"group"		  => __('Stretched Row', 'js_composer'),
			"value"       => array(
				__("Light Background", 'basix-td') => 'light-bg',
				__("Dark Background", 'basix-td') => 'dark-bg',
			),
		);
		vc_add_param('vc_row', $row_attribute_bg_style);

		// Rows - Top/Bottom Padding
		$stretched_bg_padding = array(
			"type"        => "number",
			"heading"     => __("Top/Bottom Padding", 'basix-td'),
			"description" => __("", 'basix-td'),
			"param_name"  => "stretched_bg_padding",
			"group"		  => __('Stretched Row', 'js_composer'),
			"value"       => 65,
			"min"         => 0,
			"max"         => 512,
			"suffix"      => "px"
		);
		vc_add_param('vc_row', $stretched_bg_padding);

		// Rows - Background Color
		$row_attribute_bg_color = array(
			"type"        => "colorpicker",
			"heading"     => __("Background Color", 'basix-td'),
			"description" => __("", 'basix-td'),
			"param_name"  => "stretched_bg_color",
			"group"		  => __('Stretched Row', 'js_composer'),
			"value"       => ""
		);
		vc_add_param('vc_row', $row_attribute_bg_color);

		// Rows - Background Image
		$row_attribute_bg_image = array(
			"type"        => "attach_image",
			"heading"     => __("Background Image", 'basix-td'),
			"description" => __("", 'basix-td'),
			"param_name"  => "stretched_bg_image",
			"group"		  => __('Stretched Row', 'js_composer'),
			"value"       => ""
		);
		vc_add_param('vc_row', $row_attribute_bg_image);

		// Rows - Parallax
		$row_attribute_parallax = array(
			"type"        => "checkbox",
			"heading"     => __("Parallax", 'basix-td'),
			"description" => __("Adds parallax effect to the background image.", 'basix-td'),
			"param_name"  => "stretched_bg_parallax",
			"group"		  => __('Stretched Row', 'js_composer'),
			"value"       => array(
				__("Enable Parallax", 'basix-td') => 'parallax',
			),
		);
		vc_add_param('vc_row', $row_attribute_parallax);

		// Rows - Dark Bottom Border
		$row_attribute_parallax = array(
			"type"        => "checkbox",
			"heading"     => __("Dark Bottom Border", 'basix-td'),
			"description" => __("", 'basix-td'),
			"param_name"  => "stretched_bg_border",
			"group"		  => __('Stretched Row', 'js_composer'),
			"value"       => array(
				__("Enabled", 'basix-td') => 'bordered',
			),
		);
		vc_add_param('vc_row', $row_attribute_parallax);

	}

	// Custom CSS
	function load_custom_vc_wp_admin_style() {
		wp_register_style('custom_vc_wp_admin_css', get_template_directory_uri() . '/inc/plugins/css/vc_custom.css', FALSE, '');
		wp_enqueue_style('custom_vc_wp_admin_css');
	}

	add_action('admin_enqueue_scripts', 'load_custom_vc_wp_admin_style');


	/* ------------------------------------------------------------------------------- */
	/* Revolution Slider Modifications
	/* ------------------------------------------------------------------------------- */

	// Remove Meta Box
	function remove_revslider_metabox() {
		remove_meta_box('mymetabox_revslider_0', 'post', 'normal');
		remove_meta_box('mymetabox_revslider_0', 'page', 'normal');
		remove_meta_box('mymetabox_revslider_0', 'portfolio', 'normal');
	}

	add_action('do_meta_boxes', 'remove_revslider_metabox');
?>