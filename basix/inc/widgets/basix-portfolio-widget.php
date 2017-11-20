<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix portfolio Widget
	/* ------------------------------------------------------------------------------- */

	/* Widget Class ------------------------------------------------------------------ */

	class basix_portfolio_widget extends WP_Widget {


		/* Constructor ---------------------------------------------------------------- */

		function basix_portfolio_widget() {
			parent::WP_Widget(FALSE, $name = __('Basix Portfolio Widget', 'basix-td'), array(
				'description' => __('Display a mini gallery from your portfolio.', 'basix-td')
			));
		}

		/* Widget Output -------------------------------------------------------------- */

		function widget($args, $instance) {
			global $basix_options;
			extract($args);

			/* Get the options into variables */
			$widget_title   = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : "";
			$parent_cat     = isset($instance['parent_cat']) ? $instance['parent_cat'] : "";
			$posts_per_page = empty($instance['posts_per_page']) ? __('8', 'basix-td') : apply_filters('posts_per_page', $instance['posts_per_page']);

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
			if (empty($posts_per_page)) {
				$posts_per_page = '8';
			}
			if ($parent_cat) {
				$custom_loop = new WP_Query(array(
					'post_type'      => 'portfolio',
					'posts_per_page' => $posts_per_page,
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
					'posts_per_page' => $posts_per_page
				));
			}
			?>
			<?php if ($custom_loop->have_posts()) { ?>
				<div class="portfolio-widget-container">
					<?php while ($custom_loop->have_posts()) {
						$custom_loop->the_post(); ?>
						<div class="portfolio-widget-item">
							<a href="<?php esc_url(the_permalink()); ?>" class="link_image mini"><?php the_post_thumbnail('mini'); ?></a>
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
			$widget_title   = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : "";
			$parent_cat     = isset($instance['parent_cat']) ? $instance['parent_cat'] : "";
			$posts_per_page = empty($instance['posts_per_page']) ? __('8', 'basix-td') : apply_filters('posts_per_page', $instance['posts_per_page']);
			?>
			<!-- Widget Title -->
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __("Widget Title:", 'basix-td'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $widget_title; ?>"/>
			</p>
			<!-- Parent Category -->
			<p>
				<label for="<?php echo $this->get_field_id('parent_cat'); ?>"><?php echo __("Parent Category:", 'basix-td'); ?></label>
				<select class="widefat" id="<?php echo $this->get_field_id('parent_cat'); ?>" name="<?php echo $this->get_field_name('parent_cat'); ?>">
					<option value="">All Categories</option>
					<?php
						$portfolio_widget_terms = get_terms('portfolio_category', array(
							'orderby'    => 'name',
							'hide_empty' => TRUE
						));
						foreach ($portfolio_widget_terms as $term) {
							$cats_output = '<option value="' . $term->term_id . '"';
							if ($term->term_id == $parent_cat) {
								$cats_output .= 'selected="selected"';
							}
							$cats_output .= '>' . $term->name . '</option>';
						}
						echo $cats_output;
					?>
				</select>
			</p>
			<!-- Item Count -->
			<p>
				<label for="<?php echo $this->get_field_id('posts_per_page'); ?>"><?php echo __("Number of Items:", 'basix-td'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('posts_per_page'); ?>" name="<?php echo $this->get_field_name('posts_per_page'); ?>" value="<?php echo $posts_per_page; ?>"/>
			</p>

		<?php
		}
	}

	register_widget('basix_portfolio_widget');
?>