<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Featured Portfolio Widget
	/* ------------------------------------------------------------------------------- */

	/* Widget Class ------------------------------------------------------------------ */

	class basix_featured_portfolio_widget extends WP_Widget {


		/* Constructor ---------------------------------------------------------------- */

		function basix_featured_portfolio_widget() {
			parent::WP_Widget(FALSE, $name = __('Basix Featured Portfolio Item Widget', 'basix-td'), array(
				'description' => __('Display a featured item from your portfolio.', 'basix-td')
			));
		}

		/* Widget Output -------------------------------------------------------------- */

		function widget($args, $instance) {
			global $basix_options;
			extract($args);

			/* Get the options into variables */
			$widget_title      = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : "";
			$portfolio_item_id = isset($instance['portfolio_item_id']) ? $instance['portfolio_item_id'] : "";

			/* Unique ID */
			$unique_id = $args['widget_id'];

			echo $before_widget;
			if ($widget_title) {
				echo $before_title;
				echo $widget_title;
				echo $after_title;
			}

			/* Front End Output */
			?>
			<?php
			$custom_loop = new WP_Query(array(
				'post_type' => 'portfolio',
				'p'         => $portfolio_item_id
			));
			?>
			<?php
			$terms = get_the_terms($portfolio_item_id, 'portfolio_category');
			if ($terms) {
				$termslist = '';
				foreach ($terms as $term) {
					$termslug[] = $term->slug;
					$termname[] = $term->name;
				}
				$termnames = implode(', ', $termname);
			}
			?>
			<?php if ($custom_loop->have_posts()) { ?>
				<div class="portfolio-featured-widget">
					<?php while ($custom_loop->have_posts()) {
						$custom_loop->the_post(); ?>
							<!-- Image -->
							<a href="<?php esc_url(the_permalink()); ?>" class="link_image"><?php the_post_thumbnail('thumbnail'); ?></a>
							<!-- Title -->
							<h3>
								<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h3>
							<!-- Categories -->
							<div class="categories">
								<?php if ($terms) {
									foreach ($terms as $individual_term) {
										print '<div class="category">' . $individual_term->name . '</div>';
										unset($individual_term);
									}
								} else {
									print __('Uncategorized', 'basix-td');
								} ?>
							</div>
					<?php } // End while ?>
					<?php wp_reset_query(); ?>
				</div>
			<?php } ?>
			<?php
			echo $after_widget;
		}

		/* Update & Save -------------------------------------------------------------- */

		function update($new_instance, $old_instance) {
			return $new_instance;
		}

		/* Widget Form ---------------------------------------------------------------- */

		function form($instance) {
			global $basix_options;

			/* Get the options into variables */
			$widget_title      = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : "";
			$portfolio_item_id = isset($instance['portfolio_item_id']) ? $instance['portfolio_item_id'] : "";
			?>
			<!-- Widget Title -->
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __("Widget Title:", 'basix-td'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $widget_title; ?>"/>
			</p>
			<!-- Portfolio Item -->
			<p>
				<label for="<?php echo $this->get_field_id('portfolio_item_id'); ?>"><?php echo __("Portfolio Item:", 'basix-td'); ?></label>
				<select class="widefat" id="<?php echo $this->get_field_id('portfolio_item_id'); ?>" name="<?php echo $this->get_field_name('portfolio_item_id'); ?>">
					<?php
						$portfolio_widget_items = get_posts(array(
							'post_type'      => 'portfolio',
							'orderby'        => 'name',
							'posts_per_page' => -1,
						));
						foreach ($portfolio_widget_items as $p) {
							$out = '<option value="' . $p->ID . '"';
							if ($portfolio_item_id == $p->ID) {
								$out .= 'selected="selected"';
							}
							$out .= '>' . $p->post_title . '</option>';
							echo $out;
						}
					?>
				</select>
			</p>

		<?php
		}
	}

	register_widget('basix_featured_portfolio_widget');
?>