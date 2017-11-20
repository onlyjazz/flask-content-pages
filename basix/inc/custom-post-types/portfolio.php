<?php
	/* ------------------------------------------------------------------------------- */
	/* Portfolio Custom Post Type
	/* ------------------------------------------------------------------------------- */

	/* Register Custom Post Type ----------------------------------------------------- */

	add_action('init', 'create_portfolio_post_type');

	function create_portfolio_post_type() {
		$args = array(
			'description'         => 'Portfolio Post Type',
			'show_ui'             => TRUE,
			'menu_position'       => 20,
			'exclude_from_search' => TRUE,
			'labels'              => array(
				'name'               => __('Portfolio', 'basix-td'),
				'singular_name'      => __('Portfolio Item', 'basix-td'),
				'add_new'            => __('New Portfolio Item', 'basix-td'),
				'add_new_item'       => __('New Portfolio Item', 'basix-td'),
				'edit'               => 'Edit Portfolios',
				'edit_item'          => __('Edit Portfolio Item', 'basix-td'),
				'new-item'           => __('New Portfolio Item', 'basix-td'),
				'view'               => __('View Portfolio', 'basix-td'),
				'view_item'          => __('View Portfolio Item', 'basix-td'),
				'search_items'       => __('Search Portfolio', 'basix-td'),
				'not_found'          => __('No Portfolio Items Found', 'basix-td'),
				'not_found_in_trash' => __('No Portfolio Items Found in Trash', 'basix-td'),
				'parent'             => 'Parent Portfolio'
			),
			'public'              => TRUE,
			'capability_type'     => 'post',
			'hierarchical'        => FALSE,
			'has_archive'         => FALSE,
			'rewrite'             => array('slug' => 'portfolio'),
			'supports'            => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				/* 'comments', */
				'page-attributes'
			)
		);
		register_post_type('portfolio', $args);
	}

	/* Register Custom Taxonomies ---------------------------------------------------- */

	add_action('init', 'register_portfolio_taxonomy');

	function register_portfolio_taxonomy() {
		register_taxonomy('portfolio_category', 'portfolio',
			array(
				'labels'            => array(
					'name'              => __('Portfolio Categories', 'basix-td'),
					'singular_name'     => __('Portfolio Categories', 'basix-td'),
					'search_items'      => __('Search Portfolio Categories', 'basix-td'),
					'popular_items'     => __('Popular Portfolio Categories', 'basix-td'),
					'all_items'         => __('All Portfolio Categories', 'basix-td'),
					'parent_item'       => __('Parent Portfolio Category', 'basix-td'),
					'parent_item_colon' => __('Parent Portfolio Category:', 'basix-td'),
					'edit_item'         => __('Edit Portfolio Category', 'basix-td'),
					'update_item'       => __('Update Portfolio Category', 'basix-td'),
					'add_new_item'      => __('Add New Portfolio Category', 'basix-td'),
					'new_item_name'     => __('New Portfolio Category', 'basix-td'),
				),
				'hierarchical'      => TRUE,
				'show_ui'           => TRUE,
				'show_tagcloud'     => FALSE,
				'public'            => FALSE,
				'rewrite'           => FALSE,
				'show_in_nav_menus' => FALSE,
				'public'            => TRUE
			)
		);
	}

	/* Column Config ----------------------------------------------------------------- */

	/* Set Columns */
	add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");

	function portfolio_edit_columns($columns) {
		$columns = array(
			"cb"                 => '<input type="checkbox" />',
			"photo"              => __("Image", "basix-td"),
			"title"              => __("Portfolio", "basix-td"),
			"portfolio_category" => __("Portfolio Category", "basix-td"),
			"date"               => __("Date", "basix-td")
		);

		return $columns;
	}

	/* Custom Columns Output */
	add_action("manage_portfolio_posts_custom_column", "portfolio_custom_columns");

	function portfolio_custom_columns($column) {
		global $post;
		switch ($column) {
			case "photo":
				if (has_post_thumbnail()) {
					the_post_thumbnail(array(50, 50));
				}
				break;
			case "portfolio_category":
				echo get_the_term_list($post->ID, 'portfolio_category', '', ', ', '');
				break;
		}
	}


	/* Meta Box - Disable Related Portfolio Carousel --------------------------------- */

	/* Add Meta Box */
	add_action("admin_init", "related_portfolio_options_init");

	function related_portfolio_options_init() {
		add_meta_box("related_portfolio_options", __("Portfolio Item Options", 'basix-td'), "related_portfolio_options_output", "portfolio", "side", "default");
	}

	function related_portfolio_options_output() {
		global $post;

		if (isset($related_portfolio_get_post["disable_related_portfolio_carousel"][0])) {
			$disable_related_portfolio_carousel = $related_portfolio_get_post["disable_related_portfolio_carousel"][0];
		}
		?>

		<?php $disable_related_portfolio_carousel_value = get_post_meta($post->ID, 'disable_related_portfolio_carousel', TRUE);
		if ($disable_related_portfolio_carousel_value == "yes") {
			$disable_related_portfolio_carousel_checked = 'checked="checked"';
		} ?>
		<input type="checkbox" style="float: left; margin-right: 5px !important; margin-top: 1px !important;" name="disable_related_portfolio_carousel" value="yes" <?php if (isset($disable_related_portfolio_carousel_checked)) {
			echo $disable_related_portfolio_carousel_checked;
		} ?> />
		<div><?php echo __('Disable related items carousel on this page?', 'basix-td') ?></div>
	<?php
	}

	/* Save Meta Details */
	add_action('save_post', 'save_related_portfolio_options');

	function save_related_portfolio_options() {
		global $post;

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post->ID;
		}

		if (is_object($post)) {
			update_post_meta($post->ID, "disable_related_portfolio_carousel", $_POST["disable_related_portfolio_carousel"]);
		}
	}
?>