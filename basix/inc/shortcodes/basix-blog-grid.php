<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Blog Grid
	/* ------------------------------------------------------------------------------- */

	/* Shortcode --------------------------------------------------------------------- */

	function sc_blog_grid($atts, $content = NULL) {

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
		$blog_grid_id = 'blog_grid_' . rand();
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
		<div class="grid-holder blog-grid wpb_content_element">
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
							'post_type'      => 'post',
							'posts_per_page' => $max_items,
							'tax_query'      => array(
								array(
									'taxonomy' => 'category',
									'field'    => 'id',
									'terms'    => array($parent_cat)
								)
							)
						));
					} else {
						$custom_loop = new WP_Query(array(
							'post_type'      => 'post',
							'posts_per_page' => $max_items
						));
					}
				?>
				<?php if ($custom_loop->have_posts()) { ?>
					<ul>
						<?php while ($custom_loop->have_posts()) {
							$custom_loop->the_post(); ?>
							<li class="grid-item <?php echo $col_class; ?>">
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php if ($featured_images == 'yes') { ?>
									<!-- Image -->
									<a href="<?php esc_url(the_permalink()); ?>" class="link_image"><?php the_post_thumbnail('thumbnail'); ?></a>
								<?php } ?>
								<!-- Title -->
								<h3 class="inner-title">
									<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark"><?php if (strlen(get_the_title()) > $title_length) {
											echo preg_replace('/\s+?(\S+)?$/', '', substr(get_the_title(), 0, $title_length)) . '...';
										} else {
											the_title();
										} ?></a></h3>
								<!-- Date -->
								<div class="date">
									<?php the_time('j F Y'); ?>
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
							</div>
							</li>
						<?php } // End while ?>
						<?php wp_reset_query(); ?>
					</ul>
				<?php } else { // No posts published ?>
					No data to display.
				<?php } // End if ?>
			</div>
		</div>
		<?php
		$blog_grid_output = ob_get_contents();
		ob_end_clean();
		return $blog_grid_output;
		?>
	<?php
	}

	add_shortcode('blog_grid', 'sc_blog_grid');


	/* Visual Composer Config -------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Blog Grid", 'basix-td'),
			"base"                    => "blog_grid",
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
					"type"        => "blog_cats",
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
					"description" => __("Default is 30. Wraps to last word.", 'basix-td'),
					"param_name"  => "title_length",
					"value"       => "30",
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
					"heading"     => __("Read More Link Text", 'basix-td'),
					"description" => __("Leave blank for none", 'basix-td'),
					"param_name"  => "more_link_text",
					"value"       => __("", 'basix-td'),
				),
			)
		));
	}
?>