<?php

	if (!class_exists("Redux_Framework_Config")) {

		class Redux_Framework_Config {

			public $args = array();
			public $sections = array();
			public $theme;
			public $ReduxFramework;

			public function __construct() {
				// This is needed. Bah WordPress bugs.  ;)
				if (defined('TEMPLATEPATH') && strpos(Redux_Helpers::cleanFilePath(__FILE__), Redux_Helpers::cleanFilePath(TEMPLATEPATH)) !== false) {
					$this->initSettings();
				} else {
					add_action('plugins_loaded', array($this, 'initSettings'), 10);
				}
			}

			public function initSettings() {

				if (!class_exists("ReduxFramework")) {
					return;
				}

				// Just for demo purposes. Not needed per say.
				$this->theme = wp_get_theme();

				// Set the default arguments
				$this->setArguments();

				// Create the sections and fields
				$this->setSections();

				if (!isset($this->args['opt_name'])) { // No errors please
					return;
				}

				// Dynamically add a section. Can be also used to modify sections/fields
				add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

				$this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
			}

			/**
			 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
			 * Simply include this function in the child themes functions.php file.
			 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
			 * so you must use get_template_directory_uri() if you want to use any of the built in icons
			 * */
			function dynamic_section($sections) {
				//$sections = array();

				return $sections;
			}

			/**
			 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
			 * */
			function change_arguments($args) {
				//$args['dev_mode'] = true;

				return $args;
			}

			/**
			 * Filter hook for filtering the default value of any given field. Very useful in development mode.
			 * */
			function change_defaults($defaults) {
				$defaults['str_replace'] = "Testing filter hook!";

				return $defaults;
			}

			// Remove the demo link and the notice of integrated demo from the redux-framework plugin
			function remove_demo() {

				// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
				if (class_exists('ReduxFrameworkPlugin')) {
					remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::get_instance(), 'plugin_meta_demo_mode_link'), null, 2);
				}

				// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
				remove_action('admin_notices', array(ReduxFrameworkPlugin::get_instance(), 'admin_notices'));
			}

			public function setSections() {

				ob_start();

				$ct = wp_get_theme();
				$this->theme = $ct;
				$item_name = $this->theme->get('Name');
				$tags = $this->theme->Tags;
				$screenshot = $this->theme->get_screenshot();
				$class = $screenshot ? 'has-screenshot' : '';

				$customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'basix-td'), $this->theme->display('Name'));
				?>
				<div id="current-theme" class="<?php echo esc_attr($class); ?>">
					<?php if ($screenshot) : ?>
						<?php if (current_user_can('edit_theme_options')) : ?>
							<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
								<img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>"/>
							</a>
						<?php endif; ?>
						<img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>"/>
					<?php endif; ?>

					<h4>
						<?php echo $this->theme->display('Name'); ?>
					</h4>

					<div>
						<ul class="theme-info">
							<li><?php printf(__('By %s', 'basix-td'), $this->theme->display('Author')); ?></li>
							<li><?php printf(__('Version %s', 'basix-td'), $this->theme->display('Version')); ?></li>
							<li><?php echo '<strong>' . __('Tags', 'basix-td') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
						</ul>
						<p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
						<?php
							if ($this->theme->parent()) {
								printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'basix-td'), $this->theme->parent()->display('Name'));
							}
						?>

					</div>

				</div>

				<?php
				$item_info = ob_get_contents();

				ob_end_clean();


				// ACTUAL DECLARATION OF SECTIONS

				/* ------------------------------------------------ */
				// General Options
				/* ------------------------------------------------ */
				$this->sections[] = array(
					'icon'   => 'el-icon-cog',
					'title'  => __('General Options', 'basix-td'),
					'fields' => array(
						array(
							'id'      => 'main_logo_image',
							'type'    => 'media',
							'title'   => __('Main Logo Image', 'basix-td'),
							'default' => '',
						),
						array(
							'id'      => 'logo_image_height',
							'type'    => 'text',
							'desc'    => __('Default is "17px".', 'basix-td'),
							'default' => '17px',
							'title'   => __('Main Logo Image Height', 'basix-td'),
						),
						array(
							'id'      => 'logo_text',
							'type'    => 'text',
							'desc'    => __("If you don't have a logo image, enter some text here instead.", 'basix-td'),
							'default' => 'Basix<span>.</span>',
							'title'   => __('Logo Text', 'basix-td'),
						),
						array(
							'id'      => 'favicon',
							'type'    => 'media',
							'desc'    => __("", 'basix-td'),
							'default' => '',
							'title'   => __('Favicon', 'basix-td'),
						),
					),
				);

				/* ------------------------------------------------ */
				// Appearance
				/* ------------------------------------------------ */
				$this->sections[] = array(
					'icon'   => 'el-icon-tint',
					'title'  => __('Appearance', 'basix-td'),
					'fields' => array(
						array(
							'id'          => 'main_color',
							'type'        => 'color',
							'default'     => '#2f3338',
							'transparent' => false,
							'title'       => __('Main Color', 'basix-td'),
						),
						array(
							'id'          => 'accent_color',
							'type'        => 'color',
							'default'     => '#dd4952',
							'transparent' => false,
							'title'       => __('Accent Color', 'basix-td'),
						),
						array(
							'id'      => 'site_container',
							'type'    => 'radio',
							'title'   => __('Full Width / Boxed', 'basix-td'),
							'default' => '',
							'options' => array(
								''          => __('Full Width', 'basix-td'),
								'contained' => __('Boxed', 'basix-td'),
							),
						),
						array(
							'id'       => 'boxed_bg',
							'required' => array('site_container', '=', 'contained'),
							'type'     => 'background',
							'title'    => __('Boxed Background', 'basix-td'),
							'default'  => array(
								'background-color' => '#45484d',
							)
						),
						array(
							'id'      => 'top_bar_style',
							'type'    => 'radio',
							'title'   => __('Top Bar Style', 'basix-td'),
							'default' => 'dark',
							'options' => array(
								'dark'  => __('Dark', 'basix-td'),
								'white' => __('White', 'basix-td'),
							),
						),
						array(
							'id'      => 'top_bar_custom_color',
							'type'    => 'switch',
							'title'   => __('Custom Color Top Bar?', 'basix-td'),
							'default' => false,
							'on'      => __('Yes', 'basix-td'),
							'off'     => __('No', 'basix-td'),
						),
						array(
							'id'          => 'top_bar_custom_color_value',
							'required'    => array('top_bar_custom_color', '=', '1'),
							'type'        => 'color',
							'default'     => '#dd4952',
							'transparent' => false,
							'title'       => __('Top Bar Color', 'basix-td'),
						),
						array(
							'id'      => 'content_background_style',
							'type'    => 'radio',
							'title'   => __('Content Background Style', 'basix-td'),
							'default' => 'light-bg wh',
							'options' => array(
								'light-bg wh' => __('White', 'basix-td'),
								'light-bg'    => __('Light', 'basix-td'),
								'dark-bg'     => __('Dark', 'basix-td'),
							),
						),
						array(
							'id'          => 'body_color',
							'required'    => array('content_background_style', '!=', 'dark-bg'),
							'type'        => 'color',
							'default'     => '#6f6f6f',
							'transparent' => false,
							'title'       => __('Body Text Color', 'basix-td'),
							'desc'        => __('Applies to Light Content Background only.', 'basix-td'),
						),
						array(
							'id'      => 'footer_style',
							'type'    => 'radio',
							'title'   => __('Footer Style', 'basix-td'),
							'default' => 'dark',
							'options' => array(
								'dark'  => __('Dark', 'basix-td'),
								'white' => __('White', 'basix-td'),
								'light' => __('Light', 'basix-td'),
							),
						),
						array(
							'id'      => 'page_title_style',
							'type'    => 'radio',
							'title'   => __('Page Title Style', 'basix-td'),
							'default' => 'bordered',
							'options' => array(
								'bordered'     => __('Bordered', 'basix-td'),
								'accent_color' => __('Accent Color Bar', 'basix-td'),
								'main_color'   => __('Main Color Bar', 'basix-td'),
								'custom_color' => __('Custom Color Bar', 'basix-td'),
							),
						),
						array(
							'id'          => 'titlebar_custom_color',
							'required'    => array('page_title_style', '=', 'custom_color'),
							'type'        => 'color',
							'default'     => '#e2e2e2',
							'transparent' => false,
							'title'       => __('Custom Title Bar Color', 'basix-td'),
						),
						array(
							'id'          => 'titlebar_custom_text_color',
							'required'    => array('page_title_style', '=', 'custom_color'),
							'type'        => 'color',
							'default'     => '#2f3338',
							'transparent' => false,
							'title'       => __('Custom Title Bar Text Color', 'basix-td'),
						),
						array(
							'id'      => 'form_inputs_color',
							'type'    => 'radio',
							'title'   => __('Form Input Color', 'basix-td'),
							'default' => 'standard-form-inputs',
							'options' => array(
								'standard-form-inputs'  => __('Standard', 'basix-td'),
								'white-form-inputs' => __('White', 'basix-td'),
							),
						),
					),
				);

				/* ------------------------------------------------ */
				// Typography
				/* ------------------------------------------------ */
				$this->sections[] = array(
					'icon'   => 'el-icon-font',
					'title'  => __('Typography', 'basix-td'),
					'fields' => array(
						array(
							'id'          => 'headings_font',
							'type'        => 'typography',
							'title'       => __('Headings Font', 'basix-td'),
							//'compiler'=>true, // Use if you want to hook in your own CSS compiler
							'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
							'font-backup' => false, // Select a backup non-google font in addition to a google font
							//'font-weight'=>true, // Includes font-style and weight. Can use font-style or font-weight to declare
							//'subsets'=>false, // Only appears if google is true and subsets not set to false
							'font-size'   => false,
							'line-height' => false,
							'text-align'  => false,
							//'word-spacing'=>true, // Defaults to false
							//'letter-spacing'=>true, // Defaults to false
							'color'       => false,
							//'preview'=>false, // Disable the previewer
							'all_styles'  => true, // Enable all Google Font style/weight variations to be added to the page
							'output'      => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'th', 'h3.wpb_accordion_header a', '.tp-caption[class*=title]'), // An array of CSS selectors to apply this font style to dynamically
							//'compiler' => array(''), // An array of CSS selectors to apply this font style to dynamically
							'units'       => 'px', // Defaults to px
							'subtitle'    => __('This applies to all heading tags e.g. H1.', 'basix-td'),
							'default'     => array(
								'font-weight' => '700',
								'font-family' => 'Lato',
								'google'      => true,
							)
						),
						array(
							'id'          => 'body_font',
							'type'        => 'typography',
							'title'       => __('Body Font', 'basix-td'),
							//'compiler'=>true, // Use if you want to hook in your own CSS compiler
							'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
							'font-backup' => false, // Select a backup non-google font in addition to a google font
							//'font-weight'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
							//'subsets'=>false, // Only appears if google is true and subsets not set to false
							'font-size'   => true,
							'line-height' => false,
							'text-align'  => false,
							//'word-spacing'=>true, // Defaults to false
							//'letter-spacing'=>true, // Defaults to false
							'color'       => false,
							//'preview'=>false, // Disable the previewer
							'all_styles'  => true, // Enable all Google Font style/weight variations to be added to the page
							'output'      => array('body', '.tp-caption'), // An array of CSS selectors to apply this font style to dynamically
							//'compiler' => array(''), // An array of CSS selectors to apply this font style to dynamically
							'units'       => 'px', // Defaults to px
							'subtitle'    => __('This applies to everything else.', 'basix-td'),
							'default'     => array(
								'font-weight' => '400',
								'font-family' => 'Open Sans',
								'font-size'   => '13px',
								'google'      => true,
							)
						),
						array(
							'id'          => 'topnav_font',
							'type'        => 'typography',
							'title'       => __('Navigation Font', 'basix-td'),
							//'compiler'=>true, // Use if you want to hook in your own CSS compiler
							'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
							'font-backup' => false, // Select a backup non-google font in addition to a google font
							//'font-weight'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
							//'subsets'=>false, // Only appears if google is true and subsets not set to false
							'font-size'   => true,
							'line-height' => false,
							'text-align'  => false,
							//'word-spacing'=>true, // Defaults to false
							//'letter-spacing'=>true, // Defaults to false
							'color'       => false,
							//'preview'=>false, // Disable the previewer
							'all_styles'  => true, // Enable all Google Font style/weight variations to be added to the page
							'output'      => array('.topnav li'), // An array of CSS selectors to apply this font style to dynamically
							//'compiler' => array(''), // An array of CSS selectors to apply this font style to dynamically
							'units'       => 'px', // Defaults to px
							'default'     => array(
								'font-weight' => '400',
								'font-family' => 'Open Sans',
								'font-size'   => '13px',
								'google'      => true,
							)
						),
						array(
							'id'          => 'logo_font',
							'type'        => 'typography',
							'title'       => __('Logo Font', 'basix-td'),
							//'compiler'=>true, // Use if you want to hook in your own CSS compiler
							'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
							'font-backup' => false, // Select a backup non-google font in addition to a google font
							//'font-weight'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
							//'subsets'=>false, // Only appears if google is true and subsets not set to false
							'font-size'   => false,
							'line-height' => false,
							'text-align'  => false,
							//'word-spacing'=>true, // Defaults to false
							//'letter-spacing'=>true, // Defaults to false
							'color'       => false,
							//'preview'=>false, // Disable the previewer
							'all_styles'  => true, // Enable all Google Font style/weight variations to be added to the page
							'output'      => array('.logo'), // An array of CSS selectors to apply this font style to dynamically
							//'compiler' => array(''), // An array of CSS selectors to apply this font style to dynamically
							'units'       => 'px', // Defaults to px
							'default'     => array(
								'font-weight' => '700',
								//'font-style' => 'italic',
								'font-family' => 'Open Sans',
								'google'      => true,
							)
						),
						array(
							'id'          => 'quotes_font',
							'type'        => 'typography',
							'title'       => __('Quotes / Testimonials Font', 'basix-td'),
							//'compiler'=>true, // Use if you want to hook in your own CSS compiler
							'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
							'font-backup' => false, // Select a backup non-google font in addition to a google font
							//'font-weight'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
							//'subsets'=>false, // Only appears if google is true and subsets not set to false
							'font-size'   => false,
							'line-height' => false,
							'text-align'  => false,
							//'word-spacing'=>true, // Defaults to false
							//'letter-spacing'=>true, // Defaults to false
							'color'       => false,
							//'preview'=>false, // Disable the previewer
							'all_styles'  => true, // Enable all Google Font style/weight variations to be added to the page
							'output'      => array('.testimonial-text', 'blockquote'), // An array of CSS selectors to apply this font style to dynamically
							//'compiler' => array(''), // An array of CSS selectors to apply this font style to dynamically
							'units'       => 'px', // Defaults to px
							'default'     => array(
								'font-family' => 'Open Sans',
								'font-weight' => '300',
								'font-style'  => 'italic',
								'google'      => true,
							)
						),
					),
				);

				/* ------------------------------------------------ */
				// Header
				/* ------------------------------------------------ */
				$this->sections[] = array(
					'icon'   => 'el-icon-website',
					'title'  => __('Header', 'basix-td'),
					'fields' => array(
						array(
							'id'      => 'header_height',
							'type'    => 'text',
							'title'   => __('Header Height', 'basix-td'),
							'desc'    => __('Default is "60px".', 'basix-td'),
							'default' => '60px',
						),
						array(
							'id'      => 'fixed_header',
							'type'    => 'switch',
							'title'   => __('Fixed Header', 'basix-td'),
							'desc'    => '',
							'default' => true,
							'on'      => __('On', 'basix-td'),
							'off'     => __('Off', 'basix-td'),
						),
						array(
							'id'      => 'top_nav_highlight',
							'type'    => 'switch',
							'title'   => __('Current Page Highlight', 'basix-td'),
							'default' => true,
							'on'      => __('On', 'basix-td'),
							'off'     => __('Off', 'basix-td'),
						),
						array(
							'id'      => 'header_social',
							'type'    => 'checkbox',
							'title'   => __('Display Social Icons', 'basix-td'),
							'default' => '',
							'options' => array(
								'twitter'   => __('Twitter', 'basix-td'),
								'facebook'  => __('Facebook', 'basix-td'),
								'google'    => __('Google', 'basix-td'),
								'linkedin'  => __('LinkedIn', 'basix-td'),
								'pinterest' => __('Pinterest', 'basix-td'),
								'flickr'    => __('Flickr', 'basix-td'),
								'dribbble'  => __('Dribbble', 'basix-td'),
								'youtube'   => __('YouTube', 'basix-td'),
								'vimeo'     => __('Vimeo', 'basix-td'),
								'github'    => __('Github', 'basix-td'),
								'instagram' => __('Instagram', 'basix-td'),
							),
						),
					),
				);

				/* ------------------------------------------------ */
				// Footer
				/* ------------------------------------------------ */
				$this->sections[] = array(
					'icon'   => 'el-icon-inbox',
					'title'  => __('Footer', 'basix-td'),
					'fields' => array(
						array(
							'id'      => 'footer_columns',
							'type'    => 'radio',
							'title'   => __('Footer Widget Columns', 'basix-td'),
							'default' => '4',
							'options' => array(
								'1' => __('One', 'basix-td'),
								'2' => __('Two', 'basix-td'),
								'3' => __('Three', 'basix-td'),
								'4' => __('Four', 'basix-td'),
								'5' => __('Five', 'basix-td'),
								'6' => __('Six', 'basix-td'),
							),
						),
						array(
							'id'      => 'footer_menu_style',
							'type'    => 'radio',
							'title'   => __('Footer Menu and Copyright Style', 'basix-td'),
							'default' => 'trans',
							'options' => array(
								'trans' => __('Contained', 'basix-td'),
								'solid' => __('Full Width', 'basix-td'),
							),
						),
						array(
							'id'      => 'footer_copyright',
							'type'    => 'text',
							'default' => 'Copyright &copy; 2014 <a href="http://www.artivity.co.uk" target="_blank">Artivity</a>. All rights reserved.',
							'title'   => __('Footer Copyright Notice', 'basix-td'),
						),
						array(
							'id'       => 'footer_link_color',
							'type'     => 'radio',
							'title'    => __('Footer Link Color', 'basix-td'),
							'default'  => 'accent',
							'options'  => array(
								'accent'   => __('Accent', 'basix-td'),
								'standard' => __('Standard', 'basix-td'),
							),
						),
						array(
							'id'      => 'footer_widgets',
							'type'    => 'switch',
							'title'   => __('Footer Widgets', 'basix-td'),
							"default" => true,
							'on'      => __('Enabled', 'basix-td'),
							'off'     => __('Disabled', 'basix-td'),
						),
						array(
							'id'      => 'footer_lower_bar',
							'type'    => 'switch',
							'title'   => __('Footer Menu and Copyright', 'basix-td'),
							"default" => true,
							'on'      => __('Enabled', 'basix-td'),
							'off'     => __('Disabled', 'basix-td'),
						),
						array(
							'id'      => 'footer_infobar',
							'type'    => 'switch',
							'title'   => __('Footer Info Bar', 'basix-td'),
							"default" => false,
							'on'      => __('Enabled', 'basix-td'),
							'off'     => __('Disabled', 'basix-td'),
						),
						array(
							'id'       => 'footer_infobar_text',
							'type'     => 'text',
							'required' => array('footer_infobar', '=', true),
							'title'    => __('Footer Info Bar Text', 'basix-td'),
							'default'  => 'This is the Footer Info Bar. Useful to get an important message across to your audience. Turn on or off in the theme options.',
						),
						array(
							'id'       => 'footer_infobar_align',
							'type'     => 'radio',
							'required' => array('footer_infobar', '=', true),
							'title'    => __('Footer Info Bar Alignment', 'basix-td'),
							'default'  => 'accent',
							'options'  => array(
								'left'   => __('Left', 'basix-td'),
								'right'  => __('Right', 'basix-td'),
								'center' => __('Center', 'basix-td'),
							),
						),
						array(
							'id'       => 'footer_infobar_color',
							'type'     => 'radio',
							'required' => array('footer_infobar', '=', true),
							'title'    => __('Footer Info Bar Color', 'basix-td'),
							'default'  => 'accent',
							'options'  => array(
								'accent'    => __('Accent', 'basix-td'),
								'main'      => __('Main', 'basix-td'),
								'alternate' => __('Alternate', 'basix-td'),
								'custom_color' => __('Custom Color', 'basix-td'),
							),
						),
						array(
							'id'          => 'footer_infobar_custom_color',
							'required'    => array('footer_infobar_color', '=', 'custom_color'),
							'type'        => 'color',
							'default'     => '#43aa92',
							'transparent' => false,
							'title'       => __('Footer Info Bar Background Color', 'basix-td'),
						),
						array(
							'id'          => 'footer_infobar_custom_text_color',
							'required'    => array('footer_infobar_color', '=', 'custom_color'),
							'type'        => 'color',
							'default'     => '#ffffff',
							'transparent' => false,
							'title'       => __('Footer Info Bar Text Color', 'basix-td'),
						),
						array(
							'id'       => 'footer_page_output',
							'type'     => 'select',
							'data'     => 'pages',
							'title'    => __('Above Footer Output', 'basix-td'),
							'subtitle' => __('', 'basix-td'),
							'desc'     => __('Select a page to output above the footer on all pages.', 'basix-td'),
						),
					),
				);

				/* ------------------------------------------------ */
				// Social
				/* ------------------------------------------------ */
				$this->sections[] = array(
					'icon'   => 'el-icon-twitter',
					'title'  => __('Social Profiles', 'basix-td'),
					'desc'   => __('Enter the full URL to each of your Social Profiles including "<strong>http://</strong>"', 'basix-td'),
					'fields' => array(
						array(
							'id'    => 'social_twitter',
							'type'  => 'text',
							'title' => __('Twitter', 'basix-td'),
						),
						array(
							'id'    => 'social_facebook',
							'type'  => 'text',
							'title' => __('Facebook', 'basix-td'),
						),
						array(
							'id'    => 'social_google',
							'type'  => 'text',
							'title' => __('Google+', 'basix-td'),
						),
						array(
							'id'    => 'social_linkedin',
							'type'  => 'text',
							'title' => __('LinkedIn', 'basix-td'),
						),
						array(
							'id'    => 'social_pinterest',
							'type'  => 'text',
							'title' => __('Pinterest', 'basix-td'),
						),
						array(
							'id'    => 'social_flickr',
							'type'  => 'text',
							'title' => __('Flickr', 'basix-td'),
						),
						array(
							'id'    => 'social_dribbble',
							'type'  => 'text',
							'title' => __('Dribbble', 'basix-td'),
						),
						array(
							'id'    => 'social_youtube',
							'type'  => 'text',
							'title' => __('YouTube', 'basix-td'),
						),
						array(
							'id'    => 'social_vimeo',
							'type'  => 'text',
							'title' => __('Vimeo', 'basix-td'),
						),
						array(
							'id'    => 'social_github',
							'type'  => 'text',
							'title' => __('GitHub', 'basix-td'),
						),
						array(
							'id'    => 'social_instagram',
							'type'  => 'text',
							'title' => __('Instagram', 'basix-td'),
						),
					),
				);

				/* ------------------------------------------------ */
				// Custom CSS
				/* ------------------------------------------------ */
				$this->sections[] = array(
					'icon'   => 'el-icon-cog',
					'title'  => __('Custom CSS', 'basix-td'),
					'fields' => array(
						array(
							'id'       => 'custom_css',
							'type'     => 'ace_editor',
							'title'    => __('Enter your CSS code here.', 'basix-td'),
							'subtitle' => __('This will be output inside the HTML head tag of all pages', 'basix-td'),
							'mode'     => 'css',
							'theme'    => '',
							'desc'     => '',
							'default'  => ""
						),
					),
				);

				/* ------------------------------------------------ */
				// Custom JavaScript
				/* ------------------------------------------------ */
				$this->sections[] = array(
					'icon'   => 'el-icon-cog',
					'title'  => __('Custom JavaScript', 'basix-td'),
					'fields' => array(
						array(
							'id'       => 'custom_js',
							'type'     => 'ace_editor',
							'title'    => __('Enter your JavaScript code here.', 'basix-td'),
							'subtitle' => __('This will be output just before the closing body tag of all pages. Do NOT include the script tags in the code here.', 'basix-td'),
							'mode'     => 'javascript',
							'theme'    => '',
							'desc'     => '',
							'default'  => ""
						),
					),
				);
				// End of actual options

			}

			/**
			 * All the possible arguments for Redux.
			 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
			 * */
			public function setArguments() {

				$theme = wp_get_theme(); // For use with some settings. Not necessary.

				$this->args = array(

					// TYPICAL
					'opt_name'           => 'basix_options', // This is where your data is stored in the database and also becomes your global variable name.
					'display_name'       => 'Basix Theme Options', // Name that appears at the top of your panel
					'display_version'    => '', // Version that appears at the top of your panel
					'menu_type'          => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
					'allow_sub_menu'     => false, // Show the sections below the admin menu item or not
					'menu_title'         => __('Theme Options', 'theme-options'),
					'page'               => __('Theme Options', 'theme-options'),
					'google_api_key'     => 'AIzaSyDA3Pd2rLDJ4IqksJI4_19-hXRI63MaLZk', // Must be defined to add google fonts to the typography module
					'admin_bar'          => true, // Show the panel pages on the admin bar
					'global_variable'    => '', // Set a different name for your global variable other than the opt_name
					'dev_mode'           => false, // Show the time the page took to load, etc
					'customizer'         => false, // Enable basic customizer support

					// OPTIONAL -> Give you extra features
					'page_priority'      => 64, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
					'page_parent'        => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
					'page_permissions'   => 'manage_options', // Permissions needed to access the options panel.
					'menu_icon'          => '', // Specify a custom URL to an icon
					'last_tab'           => '', // Force your panel to always open to a specific tab (by id)
					'page_icon'          => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
					'page_slug'          => '_options', // Page slug used to denote the panel
					'save_defaults'      => true, // On load save the defaults to DB before user clicks save or not
					'default_show'       => false, // If true, shows the default value next to each field that is not the default value.
					'default_mark'       => '', // What to print by the field's title if the value shown is default. Suggested: *

					// CAREFUL -> These options are for advanced use only
					'transient_time'     => 60 * MINUTE_IN_SECONDS,
					'output'             => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
					'output_tag'         => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
					//'domain'             	=> 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
					'footer_credit'      => '', // Disable the footer credit of Redux. Please leave if you can help it.

					// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
					'database'           => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
					'show_import_export' => true, // REMOVE
					'system_info'        => false, // REMOVE
					'help_tabs'          => array(),
					'help_sidebar'       => '', // __( '', $this->args['domain'] );
				);

				// Add content after the form.
				$this->args['footer_text'] = __('<p>Basix WordPress Theme by <a href="http://www.artivity.co.uk">Artivity</a>.');
			}

		}

		global $reduxConfig;
		$reduxConfig = new Redux_Framework_Config();
	}