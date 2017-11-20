<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Portfolio Grid
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_portfolio_grid($atts, $content = NULL) {

		extract(shortcode_atts(array(
				'title'           => '',
				'parent_cat'      => '',
				'cols'            => '4',
				'max_items'       => '8',
				'title_length'    => '30',
				'excerpt'         => 'yes',
				'excerpt_length'  => '90',
				'featured_images' => 'yes',
				'more_link_text'  => ''
			),
			$atts
		));

		/* Generate Random ID */
		$portfolio_grid_id = 'portfolio_grid_' . rand();
		?>
		<?php ob_start(); ?>
		<?php
		$col_class = '';
		if ($cols == '2') {
			$col_class = 'vc_span6';
		}
		if ($cols == '3') {
			$col_class = 'vc_span4';
		}
		if ($cols == '4') {
			$col_class = 'vc_span3';
		}
		if ($cols == '6') {
			$col_class = 'vc_span2';
		}
		?>
		<div class="grid-holder portfolio-grid wpb_content_element">
			<?php if ($title !== '') { ?>
				<!-- Title -->
				<div class="grid-title">
					<h3><?php echo $title ?></h3>
				</div>
			<?php } ?>
			<!-- Grid -->
			<div class="grid-wrapper">
				<?php
					if ($parent_cat) {
						$custom_loop = new WP_Query(array(
							'post_type'      => 'portfolio',
							'posts_per_page' => $max_items,
							'tax_query'      => array(
								array(
									'taxonomy' => 'portfolio_category',
									'field'    => 'id',
									'terms'    => array($parent_cat)
								)
							)
						));
					} else {
						$custom_loop = new WP_Query(array(
							'post_type'      => 'portfolio',
							'posts_per_page' => $max_items
						));
					}
				?>
				<?php if ($custom_loop->have_posts()) { ?>
					<ul>
						<?php while ($custom_loop->have_posts()) {
							$custom_loop->the_post(); ?>
							<?php // Get all portfolio categories
							$individual_terms = get_the_terms($custom_loop->post->ID, 'portfolio_category');
							echo get_query_var('taxonomy');
							?>
							<li class="grid-item <?php echo $col_class; ?>">
								<!-- Image -->
								<a href="<?php esc_url(the_permalink()); ?>" class="link_image"><?php the_post_thumbnail('thumbnail'); ?></a>
								<!-- Title -->
								<h3>
									<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
								</h3>
								<!-- Categories -->
								<div class="categories">
									<?php if ($individual_terms) {
										foreach ($individual_terms as $individual_term) {
											print '<div class="category">' . $individual_term->name . '</div>';
											unset($individual_term);
										}
									} else {
										print __('Uncategorized', 'basix-td');
									} ?>
								</div>
								<?php if ($excerpt == 'yes') { ?>
									<!-- Excerpt -->
									<p><?php if (strlen(get_the_excerpt()) > $excerpt_length) {
											echo preg_replace('/\s+?(\S+)?$/', '', substr(get_the_excerpt(), 0, $excerpt_length)) . '...';
										} else {
											the_excerpt();
										} ?></p>
									<?php if ($more_link_text) { ?>
										<!-- Read More Link -->
										<a href="<?php esc_url(the_permalink()); ?>"><?php echo $more_link_text ?></a>
									<?php } ?>
								<?php } ?>
							</li>
						<?php } // End while ?>
						<?php wp_reset_query(); ?>
					</ul>
				<?php } ?>
			</div>
		</div>
		<?php
		$portfolio_grid_output = ob_get_contents();
		ob_end_clean();
		return $portfolio_grid_output;
		?>
	<?php
	}

	add_shortcode('portfolio_grid', 'sc_portfolio_grid');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Portfolio Grid", 'basix-td'),
			"base"                    => "portfolio_grid",
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
					"heading"     => __("Title", 'basix-td'),
					"description" => __("Leave this field blank for no title", 'basix-td'),
					"param_name"  => "title",
					"value"       => __("", 'basix-td'),
				),
				array(
					"type"        => "portfolio_cats",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Parent Category", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "parent_cat",
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Columns", 'basix-td'),
					"description" => __("Default is 4", 'basix-td'),
					"param_name"  => "cols",
					"value"       => __("4", 'basix-td'),
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Maximum Items", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "max_items",
					"value"       => "8",
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Title Character Length", 'basix-td'),
					"description" => __("Default is 20. Wraps to last word.", 'basix-td'),
					"param_name"  => "title_length",
					"value"       => "20",
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Show Excerpt?", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "excerpt",
					"value"       => array(
						__("Yes", 'basix-td') => 'yes',
						__("No", 'basix-td')  => 'no',
					),
				),
				array(
					"type"        => "number",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Excerpt Character Length", 'basix-td'),
					"description" => __("Default is 90. Wraps to last word.", 'basix-td'),
					"param_name"  => "excerpt_length",
					"value"       => "90",
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Show Featured Images?", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "featured_images",
					"value"       => array(
						__("Yes", 'basix-td') => 'yes',
						__("No", 'basix-td')  => 'no',
					),
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("View Details Link Text", 'basix-td'),
					"description" => __("Leave blank for none", 'basix-td'),
					"param_name"  => "more_link_text",
					"value"       => __("", 'basix-td'),
				),
			)
		));
	}
?>