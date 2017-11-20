<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Social Widget
	/* ------------------------------------------------------------------------------- */

	/* Widget Class ------------------------------------------------------------------ */

	class basix_social_widget extends WP_Widget {


		/* Constructor ---------------------------------------------------------------- */

		function basix_social_widget() {
			parent::WP_Widget(FALSE, $name = __('Basix Social Widget', 'basix-td'), array(
				'description' => __('Social profile links with icons.', 'basix-td')
			));
		}

		/* Widget Output -------------------------------------------------------------- */

		function widget($args, $instance) {
			global $basix_options;
			extract($args);

			/* Get the options into variables */
			$widget_title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : "";
			$twitter      = isset($instance['twitter']) ? TRUE : FALSE;
			$facebook     = isset($instance['facebook']) ? TRUE : FALSE;
			$google       = isset($instance['google']) ? TRUE : FALSE;
			$linkedin     = isset($instance['linkedin']) ? TRUE : FALSE;
			$pinterest    = isset($instance['pinterest']) ? TRUE : FALSE;
			$flickr       = isset($instance['flickr']) ? TRUE : FALSE;
			$dribbble     = isset($instance['dribbble']) ? TRUE : FALSE;
			$youtube      = isset($instance['youtube']) ? TRUE : FALSE;
			$vimeo        = isset($instance['vimeo']) ? TRUE : FALSE;
			$github       = isset($instance['github']) ? TRUE : FALSE;
			$instagram       = isset($instance['instagram']) ? TRUE : FALSE;

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
			<ul class="footer-social">
				<?php if ($basix_options['social_twitter'] !== '' && $twitter == TRUE) { ?>
					<li>
						<a href="<?php echo $basix_options['social_twitter']; ?>">
							<i class="Basix-twitter"></i>
							<div class="basix-tooltip">Twitter</div>
						</a>
					</li>
				<?php } ?>
				<?php if ($basix_options['social_facebook'] !== '' && $facebook == TRUE) { ?>
					<li>
						<a href="<?php echo $basix_options['social_facebook']; ?>">
							<i class="Basix-facebook"></i>
							<div class="basix-tooltip">Facebook</div>
						</a>
					</li>
				<?php } ?>
				<?php if ($basix_options['social_google'] !== '' && $google == TRUE) { ?>
					<li>
						<a href="<?php echo $basix_options['social_google']; ?>">
							<i class="Basix-google-plus"></i>
							<div class="basix-tooltip">Google+</div>
						</a>
					</li>
				<?php } ?>
				<?php if ($basix_options['social_linkedin'] !== '' && $linkedin == TRUE) { ?>
					<li>
						<a href="<?php echo $basix_options['social_linkedin']; ?>">
							<i class="Basix-linkedin-square"></i>
							<div class="basix-tooltip">LinkedIn</div>
						</a>
					</li>
				<?php } ?>
				<?php if ($basix_options['social_pinterest'] !== '' && $pinterest == TRUE) { ?>
					<li>
						<a href="<?php echo $basix_options['social_pinterest']; ?>">
							<i class="Basix-pinterest"></i>
							<div class="basix-tooltip">Pinterest</div>
						</a>
					</li>
				<?php } ?>
				<?php if ($basix_options['social_flickr'] !== '' && $flickr == TRUE) { ?>
					<li>
						<a href="<?php echo $basix_options['social_flickr']; ?>">
							<i class="Basix-flickr"></i>
							<div class="basix-tooltip">Flickr</div>
						</a>
					</li>
				<?php } ?>
				<?php if ($basix_options['social_dribbble'] !== '' && $dribbble == TRUE) { ?>
					<li>
						<a href="<?php echo $basix_options['social_dribbble']; ?>">
							<i class="Basix-dribbble"></i>
							<div class="basix-tooltip">Dribbble</div>
						</a>
					</li>
				<?php } ?>
				<?php if ($basix_options['social_youtube'] !== '' && $youtube == TRUE) { ?>
					<li>
						<a href="<?php echo $basix_options['social_youtube']; ?>">
							<i class="Basix-youtube"></i>
							<div class="basix-tooltip">YouTube</div>
						</a>
					</li>
				<?php } ?>
				<?php if ($basix_options['social_vimeo'] !== '' && $vimeo == TRUE) { ?>
					<li>
						<a href="<?php echo $basix_options['social_vimeo']; ?>">
							<i class="Basix-vimeo-square"></i>
							<div class="basix-tooltip">Vimeo</div>
						</a>
					</li>
				<?php } ?>
				<?php if ($basix_options['social_github'] !== '' && $github == TRUE) { ?>
					<li>
						<a href="<?php echo $basix_options['social_github']; ?>">
							<i class="Basix-github"></i>
							<div class="basix-tooltip">GitHub</div>
						</a>
					</li>
				<?php } ?>
				<?php if ($basix_options['social_instagram'] !== '' && $instagram == TRUE) { ?>
					<li>
						<a href="<?php echo $basix_options['social_instagram']; ?>">
							<i class="Basix-instagram"></i>
							<div class="basix-tooltip">Instagram</div>
						</a>
					</li>
				<?php } ?>
			</ul>
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
			$widget_title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : "";
			$twitter      = isset($instance['twitter']) ? TRUE : FALSE;
			$facebook     = isset($instance['facebook']) ? TRUE : FALSE;
			$google       = isset($instance['google']) ? TRUE : FALSE;
			$linkedin     = isset($instance['linkedin']) ? TRUE : FALSE;
			$pinterest    = isset($instance['pinterest']) ? TRUE : FALSE;
			$flickr       = isset($instance['flickr']) ? TRUE : FALSE;
			$dribbble     = isset($instance['dribbble']) ? TRUE : FALSE;
			$youtube      = isset($instance['youtube']) ? TRUE : FALSE;
			$vimeo        = isset($instance['vimeo']) ? TRUE : FALSE;
			$github       = isset($instance['github']) ? TRUE : FALSE;
			$instagram    = isset($instance['instagram']) ? TRUE : FALSE;
			?>
			<!-- Widget Title -->
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __("Widget Title:", 'basix-td'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $widget_title; ?>"/>
			</p>
			<p>Select the social profiles you would like to display in this widget:</p>
			<!-- Twitter -->
			<p>
				<input class="checkbox" type="checkbox" <?php checked($twitter, TRUE); ?> id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>"/>
				<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php echo __('Twitter', 'basix-td') ?></label>
			</p>
			<!-- Facebook -->
			<p>
				<input class="checkbox" type="checkbox" <?php checked($facebook, TRUE); ?> id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>"/>
				<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php echo __('Facebook', 'basix-td') ?></label>
			</p>
			<!-- Google+ -->
			<p>
				<input class="checkbox" type="checkbox" <?php checked($google, TRUE); ?> id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>"/>
				<label for="<?php echo $this->get_field_id('google'); ?>"><?php echo __('Google+', 'basix-td') ?></label>
			</p>
			<!-- LinkedIn -->
			<p>
				<input class="checkbox" type="checkbox" <?php checked($linkedin, TRUE); ?> id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>"/>
				<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php echo __('LinkedIn', 'basix-td') ?></label>
			</p>
			<!-- Pinterest -->
			<p>
				<input class="checkbox" type="checkbox" <?php checked($pinterest, TRUE); ?> id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>"/>
				<label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php echo __('Pinterest', 'basix-td') ?></label>
			</p>
			<!-- Flickr -->
			<p>
				<input class="checkbox" type="checkbox" <?php checked($flickr, TRUE); ?> id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>"/>
				<label for="<?php echo $this->get_field_id('flickr'); ?>"><?php echo __('Flickr', 'basix-td') ?></label>
			</p>
			<!-- Dribbble -->
			<p>
				<input class="checkbox" type="checkbox" <?php checked($dribbble, TRUE); ?> id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>"/>
				<label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php echo __('Dribbble', 'basix-td') ?></label>
			</p>
			<!-- YouTube -->
			<p>
				<input class="checkbox" type="checkbox" <?php checked($youtube, TRUE); ?> id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>"/>
				<label for="<?php echo $this->get_field_id('youtube'); ?>"><?php echo __('YouTube', 'basix-td') ?></label>
			</p>
			<!-- Vimeo -->
			<p>
				<input class="checkbox" type="checkbox" <?php checked($vimeo, TRUE); ?> id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>"/>
				<label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php echo __('Vimeo', 'basix-td') ?></label>
			</p>
			<!-- GitHub -->
			<p>
				<input class="checkbox" type="checkbox" <?php checked($github, TRUE); ?> id="<?php echo $this->get_field_id('github'); ?>" name="<?php echo $this->get_field_name('github'); ?>"/>
				<label for="<?php echo $this->get_field_id('github'); ?>"><?php echo __('GitHub', 'basix-td') ?></label>
			</p>
			<!-- Instagram -->
			<p>
				<input class="checkbox" type="checkbox" <?php checked($instagram, TRUE); ?> id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>"/>
				<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php echo __('Instagram', 'basix-td') ?></label>
			</p>

		<?php
		}
	}

	register_widget('basix_social_widget');
?>