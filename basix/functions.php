<?php
	/* ------------------------------------------------------------------------------- */
	/* Theme Specific Settings
	/* ------------------------------------------------------------------------------- */

	/* Post Thumbnails Support */
	add_theme_support('post-thumbnails');

	/* Main Navigation Menu */
	register_nav_menus(array('primary' => 'Primary Navigation'));

	/* Footer Navigation Menu */
	register_nav_menus(array('footer' => 'Footer Navigation'));

	/* Content Width */
	if (!isset($content_width)) {
		$content_width = 1100;
	}

	add_theme_support( 'automatic-feed-links' );


	/* ------------------------------------------------------------------------------- */
	/* Site Scripts
	/* ------------------------------------------------------------------------------- */

	/* Add scripts via wp_head() */
	function basix_script_enqueuer() {
		wp_enqueue_script('jquery-ui-core', '', true);
		wp_enqueue_script('jquery-ui-position', '', true);
		wp_enqueue_script('sticky', get_template_directory_uri() . '/inc/js/jquery.sticky.js', array('jquery'), '', true);
		wp_enqueue_script('fastclick', get_template_directory_uri() . '/inc/js/fastclick.js', array('jquery'), '', true);
		wp_enqueue_script('modernizr', get_template_directory_uri() . '/inc/js/modernizr.min.js', array('jquery'), '', true);
		wp_enqueue_script('basix-script', get_template_directory_uri() . '/inc/js/functions.js', array('jquery'), '', '', true);
		wp_enqueue_style('basix-style', get_stylesheet_directory_uri() . '/style.css', '', '', 'screen');
		wp_enqueue_style('basix-font-icons', get_template_directory_uri() . '/inc/css//basix-font-icons/basix-font-icons.css', '', '', 'screen');
		wp_enqueue_style('custom-css', get_template_directory_uri() . '/inc/css/custom-css.php', '', '', 'screen');

		/* Visual Composer CSS - Load now to avoid delay during page load */
		wp_enqueue_style('js_composer_front');

		/* Portfolio Grid Specific */
		if (is_page_template('template-portfolio-4-col.php') || is_page_template('template-portfolio-3-col.php')) {
			wp_enqueue_script('mixitup', get_template_directory_uri() . '/inc/js/jquery.mixitup.min.js', array('jquery'), '', true);
			wp_enqueue_script('portfolio-settings', get_template_directory_uri() . '/inc/js/portfolio-settings.js', array('jquery'), '', true);
		}

		/* Portfolio Single Specific */
		if (is_singular('portfolio')) {
			wp_enqueue_script('jcarousel', get_template_directory_uri() . '/inc/shortcodes/js/jquery.jcarousel.min.js', array('jquery'), '', true);
			wp_enqueue_script('touchSwipe', get_template_directory_uri() . '/inc/shortcodes/js/jquery.touchSwipe.min.js', array('jquery'), '', true);
			wp_enqueue_script('portfolio-single-settings', get_template_directory_uri() . '/inc/js/portfolio-single-settings.js', array('jquery'), '', true);
		}
	}

	add_action('wp_enqueue_scripts', 'basix_script_enqueuer');


	/* ------------------------------------------------------------------------------- */
	/* Admin Scripts
	/* ------------------------------------------------------------------------------- */

	function basix_admin_script_enqueuer() {
		wp_enqueue_script('admin-js', get_template_directory_uri() . '/inc/js/admin.js');
		wp_enqueue_style('admin-css', get_template_directory_uri() . '/inc/css/admin.css');
	}

	add_action('admin_enqueue_scripts', 'basix_admin_script_enqueuer');


	/* Add styles to the WYSIWYG editor */
	add_editor_style('admin-css', get_template_directory_uri() . '/inc/css/admin.css');


	/* ------------------------------------------------------------------------------- */
	/* Image Dimensions
	/* ------------------------------------------------------------------------------- */

	if (function_exists('add_theme_support')) {
		add_theme_support('post-thumbnails');
		update_option('thumbnail_size_w', 815);
		update_option('thumbnail_size_h', 458);
		update_option("thumbnail_crop", "1");
		update_option('medium_size_w', 1100);
		update_option('medium_size_h', 9999);
		update_option("medium_crop", "0");
		update_option('large_size_w', 0);
		update_option('large_size_h', 0);
		add_image_size('mini', 88, 66, TRUE);
	}


	/* ------------------------------------------------------------------------------- */
	/* Setup WordPress Menu
	/* ------------------------------------------------------------------------------- */

	function basix_setup_menu() {
		include_once dirname(__FILE__) . '/setup-menu.php';
	}


	/* ------------------------------------------------------------------------------- */
	/* Post Format Support
	/* ------------------------------------------------------------------------------- */

	if (function_exists('add_theme_support')) {
		add_theme_support('post-formats', array('gallery', 'quote', 'video', 'audio', 'image', 'aside', 'link', 'status', 'chat'));
	}


	/* ------------------------------------------------------------------------------- */
	/* Remove square brackets from the_excerpt
	/* ------------------------------------------------------------------------------- */

	function basix_new_excerpt_more($more) {
		return ' ...'; // Replace with " ..."
	}

	add_filter('excerpt_more', 'basix_new_excerpt_more');


	/* ------------------------------------------------------------------------------- */
	/* Search Widget Modification
	/* ------------------------------------------------------------------------------- */

	/* Adjust the form to suit theme design */
	function basix_new_search_button($text) {
		/* Change submit value to FontAwesome search icon */
		$text = str_replace('value="Search"', 'value="&#xf002;"', $text);
		/* Add placeholder text */
		$text = str_replace('name="s"', 'name="s" placeholder="Type and hit enter"', $text);
		return $text;
	}

	add_filter('get_search_form', 'basix_new_search_button');

	/* Search only blog posts */
	function basix_SearchFilter($query) {
		if (!is_admin()) {
			if ($query->is_search) {
				$query->set('post_type', 'post');
			}
		}
		return $query;
	}

	add_filter('pre_get_posts', 'basix_SearchFilter');


	/* ------------------------------------------------------------------------------- */
	/* Previous and next posts link classes
	/* ------------------------------------------------------------------------------- */

	function basix_posts_link_attributes_next() {
		return 'class="prev-posts"';
	}

	function basix_posts_link_attributes_prev() {
		return 'class="next-posts"';
	}

	add_filter('next_posts_link_attributes', 'basix_posts_link_attributes_next');
	add_filter('previous_posts_link_attributes', 'basix_posts_link_attributes_prev');


	/* ------------------------------------------------------------------------------- */
	/* View Counter
	/* ------------------------------------------------------------------------------- */

	function basix_getPostViews($postID) {
		$count_key = 'basix_post_views_count';
		$count     = get_post_meta($postID, $count_key, TRUE);
		if ($count == '') {
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0";
		}
		return $count;
	}

	function basix_setPostViews($postID) {
		$count_key = 'basix_post_views_count';
		$count     = get_post_meta($postID, $count_key, TRUE);
		if ($count == '') {
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		} else {
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}


	/* ------------------------------------------------------------------------------- */
	/* Comments Form (Use placeholders instead of labels)
	/* ------------------------------------------------------------------------------- */

	/* Author, Email and URL */
	function basix_alter_comment_form_default_fields($fields) {

		if (!isset($commenter['comment_author'])) : $commenter['comment_author'] = ''; endif;
		if (!isset($commenter['comment_author_email'])) : $commenter['comment_author_email'] = ''; endif;
		if (!isset($commenter['comment_author_url'])) : $commenter['comment_author_url'] = ''; endif;
		if (!isset($aria_req)) : $aria_req = ''; endif;

		$fields['author'] = '<input id="author" name="author" placeholder="Name *" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' />';
		$fields['email']  = '<input id="email" name="email" placeholder="Email *" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' />';
		$fields['url']    = '<input id="url" name="url" placeholder="Website" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" />';
		return $fields;
	}

	/* Comment Field */
	function basix_alter_comment_form_defaults($fields) {
		$fields['comment_field'] = '<textarea id="comment" name="comment" placeholder="Comment *" aria-included="true"></textarea>';
		return $fields;
	}

	add_filter('comment_form_default_fields', 'basix_alter_comment_form_default_fields');
	add_filter('comment_form_defaults', 'basix_alter_comment_form_defaults');


	/* ------------------------------------------------------------------------------- */
	/* Default Widget Areas (Blog Sidebar & Footer Area)
	/* ------------------------------------------------------------------------------- */

	if (function_exists('register_sidebar')) {

		/* Blog Sidebar (default) */
		register_sidebar(array(
			'name'          => 'Blog Sidebar',
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

		/* Footer Column One */
		register_sidebar(array(
			'name'          => 'Footer Column #1',
			'id'            => 'footer-col-1',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

		/* Footer Column Two */
		register_sidebar(array(
			'name'          => 'Footer Column #2',
			'id'            => 'footer-col-2',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

		/* Footer Column Three */
		register_sidebar(array(
			'name'          => 'Footer Column #3',
			'id'            => 'footer-col-3',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

		/* Footer Column Four */
		register_sidebar(array(
			'name'          => 'Footer Column #4',
			'id'            => 'footer-col-4',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

		/* Footer Column Five */
		register_sidebar(array(
			'name'          => 'Footer Column #5',
			'id'            => 'footer-col-5',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

		/* Footer Column Six */
		register_sidebar(array(
			'name'          => 'Footer Column #6',
			'id'            => 'footer-col-6',
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
		));

	}


	/* ------------------------------------------------------------------------------- */
	/* Metabox - Hide Featured Image (Single/Index)
	/* ------------------------------------------------------------------------------- */

	/* Add Meta Box */
	add_action("admin_init", "basix_featured_image_options_init");

	function basix_featured_image_options_init() {
		add_meta_box("featured_image_options", __("Featured Image Options", 'basix-td'), "basix_featured_image_options_output", "post", "side", "default");
		add_meta_box("featured_image_options", __("Featured Image Options", 'basix-td'), "basix_featured_image_options_output", "portfolio", "side", "default");
	}

	function basix_featured_image_options_output() {
		global $post;

		if (isset($featured_image_get_post["show_featured_image"][0])) {
			$show_featured_image = $featured_image_get_post["show_featured_image"][0];
		}

		if (isset($featured_image_index_get_post["show_featured_image_index"][0])) {
			$show_featured_image_index = $featured_image_index_get_post["show_featured_image_index"][0];
		}
		?>

		<?php $show_featured_image_value = get_post_meta($post->ID, 'show_featured_image', TRUE);
		if ($show_featured_image_value == "yes") {
			$show_featured_image_checked = 'checked="checked"';
		} ?>
		<input type="checkbox" style="float: left; margin-right: 5px !important; margin-top: 1px !important;" name="show_featured_image" value="yes" <?php if (isset($show_featured_image_checked)) {
			echo $show_featured_image_checked;
		} ?> />
		<div><?php echo __('Hide featured image on actual page?', 'basix-td') ?></div>

		<?php $show_featured_image_index_value = get_post_meta($post->ID, 'show_featured_image_index', TRUE);
		if ($show_featured_image_index_value == "yes") {
			$show_featured_image_index_checked = 'checked="checked"';
		} ?>
		<input type="checkbox" style="float: left; margin-right: 5px !important; margin-top: 1px !important;" name="show_featured_image_index" value="yes" <?php if (isset($show_featured_image_index_checked)) {
			echo $show_featured_image_index_checked;
		} ?> />
		<div><?php echo __('Hide featured image on index?', 'basix-td') ?></div>

	<?php
	}

	/* Save Meta Details */
	add_action('save_post', 'basix_save_featured_image_options');

	function basix_save_featured_image_options() {
		global $post;

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post->ID;
		}

		if (is_object($post)) {
			update_post_meta($post->ID, "show_featured_image", $_POST["show_featured_image"]);
			update_post_meta($post->ID, "show_featured_image_index", $_POST["show_featured_image_index"]);
		}
	}


	/* ------------------------------------------------------------------------------- */
	/* Custom Meta Boxes
	/* ------------------------------------------------------------------------------- */

	/* Post Format Meta Box ---------------------------------------------------------- */

	$bgp_meta_box['post'] = array(
		'id'       => 'post-format-meta',
		'title'    => __('Post Format Meta', 'basix-td'),
		'context'  => 'normal',
		'priority' => 'default', // 'high', 'core', 'default' or 'low'

		/* Post Format Meta Box Fields ------------------------------------------------ */

		'fields'   => array(
			array(
				'name'    => __('Self-Hosted Video', 'basix-td'),
				'desc'    => '',
				'id'      => 'basix_post_video_url',
				'type'    => 'upload',
				'default' => ''
			),
			array(
				'name'    => __('Self-Hosted Audio', 'basix-td'),
				'desc'    => '',
				'id'      => 'basix_post_audio_url',
				'type'    => 'upload',
				'default' => ''
			),
			array(
				'name'    => __('External Video URL', 'basix-td'),
				'desc'    => __('External Video such as YouTube or Vimeo', 'basix-td'),
				'id'      => 'basix_post_video_external_url',
				'type'    => 'text',
				'default' => ''
			)
		)
	);

	add_action('admin_menu', 'basix_custom_metabox_add_box');


	/* ------------------------------------------------------------------------------- */
	/* Custom Meta Box Presets & Saving
	/* ------------------------------------------------------------------------------- */

	/* Add meta boxes to post types */
	function basix_custom_metabox_add_box() {
		global $bgp_meta_box;

		foreach ($bgp_meta_box as $post_type => $value) {
			add_meta_box($value['id'], $value['title'], 'basix_custom_metabox_formatting', $post_type, $value['context'], $value['priority']);
		}
	}


	/* Format meta boxes */
	function basix_custom_metabox_formatting() {
		global $bgp_meta_box, $post;

		/* Use nonce for verification */
		echo '<input type="hidden" name="basix_custom_metabox_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

		echo '<table class="form-table">';

		foreach ($bgp_meta_box[$post->post_type]['fields'] as $field) {
			/* get current post meta data */
			$meta = get_post_meta($post->ID, $field['id'], TRUE);

			echo '<tr>' .
				'<th style="width:25%"><label for="' . $field['id'] . '">' . $field['name'] . '</label></th>' .
				'<td>';
			switch ($field['type']) {
				case 'text':
					echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . ($meta ? $meta : $field['default']) . '" size="30" style="width:100%" />
			<br clear="all" /><span class="description">' . $field['desc'] . '</span>';
					break;
				case 'textarea':
					echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="60" rows="4" style="width:97%">' . ($meta ? $meta : $field['default']) . '</textarea>
			<br clear="all" /><span class="description">' . $field['desc'] . '</span>';
					break;
				case 'select':
					echo '<select name="' . $field['id'] . '" id="' . $field['id'] . '">';
					foreach ($field['options'] as $option) {
						echo '<option ' . ($meta == $option ? ' selected="selected"' : '') . '>' . $option . '</option>';
					}
					echo '</select>';
					break;
				case 'radio':
					foreach ($field['options'] as $option) {
						echo '<input type="radio" name="' . $field['id'] . '" value="' . $option['value'] . '"' . ($meta == $option['value'] ? ' checked="checked"' : '') . ' />' . $option['name'];
					}
					break;
				case 'checkbox':
					echo '<input type="checkbox" name="' . $field['id'] . '" id="' . $field['id'] . '"' . ($meta ? ' checked="checked"' : '') . ' />';
					break;
				case 'upload':
					echo '<div class="basix_admin_table">
			<div class="basix_admin_table_cell"><input class="basix_meta_upload_button button" id="' . $field['id'] . '_button" type="button" value="' . __('Choose File', 'basix-td') . '" /></div>
			<div class="basix_admin_table_cell"><div class="basix_meta_upload_path_preview">' . ($meta ? $meta : $field['default']) . ' </div></div>
			<div class="basix_admin_table_cell"><a href="#!" class="basix_meta_upload_remove"';
					if ($meta) {
						echo 'style="display:block;"';
					}
					echo ' id="' . $field['id'] . '_remove">' . __('Clear', 'basix-td') . '</a></div>
			<input name="' . $field['id'] . '" type="hidden" class="basix_meta_upload" value="' . $meta . '" />
			</div>
			<br clear="all" /><span class="description">' . $field['desc'] . '</span>';
					break;
			}
			echo '<td></tr>';
		}

		echo '</table>';

	}


	/* Save data from meta box */
	function basix_custom_metabox_save_data($post_id) {
		global $bgp_meta_box, $post;

		/* Verify nonce */
		if (!isset($_POST['basix_custom_metabox_nonce']) || !wp_verify_nonce($_POST['basix_custom_metabox_nonce'], basename(__FILE__))) {
			return $post_id;
		}

		/* Check autosave */
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}

		/* Check permissions */
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}

		foreach ($bgp_meta_box[$post->post_type]['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], TRUE);
			$new = $_POST[$field['id']];

			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		}
	}

	add_action('save_post', 'basix_custom_metabox_save_data');


	/* ------------------------------------------------------------------------------- */
	/* Custom Post Types
	/* ------------------------------------------------------------------------------- */

	/* Portfolio */
	include_once dirname(__FILE__) . '/inc/custom-post-types/portfolio.php';


	/* ------------------------------------------------------------------------------- */
	/* Previous and Next Post Link - Add Class
	/* ------------------------------------------------------------------------------- */

	function basix_prev_post_link_attributes($output) {
		$code = 'class="prev"';
		return str_replace('<a href=', '<a ' . $code . ' href=', $output);
	}

	add_filter('previous_post_link', 'basix_prev_post_link_attributes');

	function basix_next_post_link_attributes($output) {
		$code = 'class="next"';
		return str_replace('<a href=', '<a ' . $code . ' href=', $output);
	}

	add_filter('next_post_link', 'basix_next_post_link_attributes');


	/* ------------------------------------------------------------------------------- */
	/* Custom Post Types Menu Item Classes
	/* ------------------------------------------------------------------------------- */

	/* Remove current menu style from blog nav item */

	function basix_custom_fix_blog_tab_on_cpt($classes, $item, $args) {
		if (!is_singular('post') && !is_category() && !is_tag()) {
			$blog_page_id = intval(get_option('page_for_posts'));
			if ($blog_page_id != 0) {
				if ($item->object_id == $blog_page_id) {
					unset($classes[array_search('current_page_parent', $classes)]);
				}
			}
		}
		return $classes;
	}

	add_filter('nav_menu_css_class', 'basix_custom_fix_blog_tab_on_cpt', 10, 3);


	/* ------------------------------------------------------------------------------- */
	/* Theme Options (Redux Framework)
	/* ------------------------------------------------------------------------------- */

	if (!class_exists('ReduxFramework') && file_exists(dirname(__FILE__) . '/inc/redux-framework/ReduxCore/framework.php')) {
		include_once dirname(__FILE__) . '/inc/redux-framework/ReduxCore/framework.php';
	}

	include_once dirname(__FILE__) . '/inc/redux-framework/config/config.php';

	/* Custom Redux CSS */
	function addPanelCSS() {
		wp_register_style('redux-custom-css', get_template_directory_uri() . '/inc/redux-framework/config/custom-css.css', '', '', 'screen');
		wp_enqueue_style('redux-custom-css');
	}

	add_action('admin_enqueue_scripts', 'addPanelCSS');


	/* ------------------------------------------------------------------------------- */
	/* Included Plugins Setup (TGM Activation)
	/* ------------------------------------------------------------------------------- */

	include_once dirname(__FILE__) . '/inc/plugins/plugin-setup.php';


	/* ------------------------------------------------------------------------------- */
	/* Shortcodes
	/* ------------------------------------------------------------------------------- */

	include_once dirname(__FILE__) . '/inc/shortcodes/shortcodes.php';
        // Make a shortcode that returns the referer - DL/JK 18/10/2015
        function getrefer() {
	    return  wp_get_referer();
        }
        add_shortcode('getrefer', 'getrefer');


	/* ------------------------------------------------------------------------------- */
	/* Widgets
	/* ------------------------------------------------------------------------------- */

	include_once dirname(__FILE__) . '/inc/widgets/widgets.php';
?>
