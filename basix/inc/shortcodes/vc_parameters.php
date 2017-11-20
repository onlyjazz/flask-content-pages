<?php
	/* ------------------------------------------------------------------------------- */
	/* VC Parameters
	/* ------------------------------------------------------------------------------- */

	/* Number ------------------------------------------------------------------------ */

	function number_settings_field($settings, $value) {
		$dependency = vc_generate_dependencies_attributes($settings);
		$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
		$type       = isset($settings['type']) ? $settings['type'] : '';
		$min        = isset($settings['min']) ? $settings['min'] : '';
		$max        = isset($settings['max']) ? $settings['max'] : '';
		$suffix     = isset($settings['suffix']) ? $settings['suffix'] : '';
		$class      = isset($settings['class']) ? $settings['class'] : '';
		$output     = '<input type="number" min="' . $min . '" max="' . $max . '" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '" style="max-width:100px; margin-right: 10px;" />' . $suffix;
		return $output;
	}

	if (function_exists('add_shortcode_param')) {
		add_shortcode_param('number', 'number_settings_field');
	}


	/* Portfolio Category Dropdown --------------------------------------------------- */

	function portfolio_cats_settings_field($settings, $value) {

		$dependency  = vc_generate_dependencies_attributes($settings);
		$cats_output = '<div class="portfolio_categories">'
			. '<select name="' . $settings['param_name']
			. '" class="wpb_vc_param_value wpb-select dropdown '
			. $settings['param_name'] . ' ' . $settings['type'] . '_field">'
			. '<option value="">All Categories</option>';
		/* Get categories */
		$terms = get_terms('portfolio_category', array(
			'orderby'    => 'name',
			'hide_empty' => TRUE
		));
		foreach ($terms as $term) {
			$cats_output .= '<option value="' . $term->term_id . '"';
			if ($term->term_id == $value) {
				$cats_output .= 'selected="selected"';
			}
			$cats_output .= '>' . $term->name . '</option>';
		}
		$cats_output .= '</select>'
			. '</div>';
		return $cats_output;
	}

	if (function_exists('add_shortcode_param')) {
		add_shortcode_param('portfolio_cats', 'portfolio_cats_settings_field');
	}


	/* Blog Category Dropdown -------------------------------------------------------- */

	function blog_cats_settings_field($settings, $value) {

		$dependency  = vc_generate_dependencies_attributes($settings);
		$cats_output = '<div class="blog_categories">'
			. '<select name="' . $settings['param_name']
			. '" class="wpb_vc_param_value wpb-select dropdown '
			. $settings['param_name'] . ' ' . $settings['type'] . '_field">'
			. '<option value="">All Categories</option>';
		/* Get categories */
		$terms = get_terms('category', array(
			'orderby'    => 'name',
			'hide_empty' => TRUE
		));
		foreach ($terms as $term) {
			$cats_output .= '<option value="' . $term->term_id . '"';
			if ($term->term_id == $value) {
				$cats_output .= 'selected="selected"';
			}
			$cats_output .= '>' . $term->name . '</option>';
		}
		$cats_output .= '</select>'
			. '</div>';
		return $cats_output;
	}

	if (function_exists('add_shortcode_param')) {
		add_shortcode_param('blog_cats', 'blog_cats_settings_field');
	}
?>