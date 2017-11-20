<?php
	/* ------------------------------------------------------------------------------- */
	/* Basix Newsletter Widget
	/* ------------------------------------------------------------------------------- */

	/* Widget Class ------------------------------------------------------------------ */

	class basix_newsletter_widget extends WP_Widget {


		/* Constructor ---------------------------------------------------------------- */

		function basix_newsletter_widget() {
			parent::WP_Widget(FALSE, $name = __('Basix Newsletter Widget', 'basix-td'), array(
				'description' => __('Received visitor email address by email.', 'basix-td')
			));

			/* Register Scripts -------------------------------------------------------- */

			function register_newsletter_widget_scripts() {
				wp_register_script('jquery-validate', get_template_directory_uri() . '/inc/js/jquery.validate.min.js', array('jquery'));
				wp_register_script('newsletterConfig', get_template_directory_uri() . '/inc/widgets/js/newsletterWidget.js', array('jquery'));
			}

			add_action('wp_enqueue_scripts', 'register_newsletter_widget_scripts');


			/* Ajax Function ----------------------------------------------------------- */

			add_action('wp_ajax_basix_newsletter_send', 'basix_newsletter_send');
			add_action('wp_ajax_nopriv_basix_newsletter_send', 'basix_newsletter_send');

			function basix_newsletter_send() {

				/* Get Widget Variables */
				$send_to_address = empty($instance['send_to_address']) ? __('Send To Address', 'basix-td') : apply_filters('send_to_address', $instance['send_to_address']);

				/* Actual Sendmail Function */
				if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

					$emailTo         = $_POST['sendto'];
					$subject         = $_POST['subject'];
					$success_message = $_POST['success'];
					$id              = $_POST['id'];
					$email           = trim($_POST['email']);
					$subject         = $subject;
					$headers         = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type: text/plain; charset=" . get_bloginfo('charset') . "" . "\r\n";
					$headers .= "From: " . $email . " <" . $email . ">" . "\r\n";
					$headers .= "Reply-To: " . $email . "\r\n";
					$body = $email;

					if (wp_mail($emailTo, $subject, $body, $headers)) {
						echo '<div class="alert main success">' . $success_message . '</div>';
					} else {
						echo '<div class="alert red error">' . __('There was a problem sending your message. Please try again soon.', 'basix-td') . '</div>';
					}

				} else {
					echo '<div class="alert main error"><i class="Basix-exclamation-circle"></i>' . __('Please enter a valid email address.', 'basix-td') . '</div>';
				}
				die();
			}

		}


		/* Widget Output -------------------------------------------------------------- */

		function widget($args, $instance) {
			extract($args);

			/* Enqueue Scripts */
			wp_enqueue_script('jquery-validate');
			wp_enqueue_script('newsletterConfig');

			/* Get the options into variables */
			$widget_title    = empty($instance['title']) ? __('Latest Tweets', 'basix-td') : apply_filters('widget_title', $instance['title']);
			$newsletter_text = isset($instance['newsletter_text']) ? $instance['newsletter_text'] : "";
			if ($newsletter_text) {
				$newsletter_text = apply_filters('the_content', $newsletter_text);
			}
			$send_to_address = empty($instance['send_to_address']) ? get_option('admin_email') : apply_filters('send_to_address', $instance['send_to_address']);
			$email_subject   = empty($instance['email_subject']) ? __('Newsletter Subscription', 'basix-td') : apply_filters('email_subject', $instance['email_subject']);
			$email_label     = empty($instance['email_label']) ? __('Email Address', 'basix-td') : apply_filters('email_label', $instance['email_label']);
			$signup_label    = isset($instance['signup_label']) ? $instance['signup_label'] : "";
			$success_message = empty($instance['success_message']) ? __('Congratulations, your email address has been added to our system.', 'basix-td') : apply_filters('success_message', $instance['success_message']);

			/* Unique ID */
			$uniqid = 'newsletter_widget_' . uniqid();

			/* Variables to pass to localize script */
			$newsletter_form_vars = array(
				'att_to_address'      => $send_to_address,
				'att_ajax_path'       => admin_url('admin-ajax.php'),
				'att_email_subject'   => $email_subject,
				'att_success_message' => $success_message,
				'att_uniqid'          => $uniqid,

				/* Validation Messages */
				'att_required_msg'    => __('Required !', 'basix-td'),
				'att_email_msg'       => __('Invalid Email !', 'basix-td')
			);

			/* Localize Script */
			wp_localize_script('newsletterConfig', 'newslettervars' . $uniqid, $newsletter_form_vars);


			echo $before_widget;
			echo $before_title . $widget_title . $after_title;

			/* Actual Output */
			?>
			<?php if ($newsletter_text) { ?>
				<div class="text">
					<?php echo $newsletter_text; ?>
				</div>
			<?php } ?>
			<div class="ajax-output" id="newsletter_ajaxoutput-<?php echo $uniqid; ?>"></div>
			<form id="newsletter-<?php echo $uniqid; ?>" method="post" autocomplete="off" class="newslette-form" data-instance="<?php echo $uniqid ?>">
				<label for="newsletter_email" generated="true" class="error"></label>

				<div class="container">
					<input type="text" name="newsletter_email" class="textbox" placeholder="<?php echo $email_label ?> *" value="">
					<input type="submit" name="submit" id="submit" value="<?php echo $signup_label ?>" class="button accent">
				</div>
			</form>
			<div style="display: none; float: left; margin-top: 6px;" id="newsletter-loading-<?php echo $uniqid; ?>">
				<i class="Basix-spinner basix-ajax-loader" style="margin-right: 5px;"></i><?php echo __('Processing','basix-td') ?>
			</div>
			<?php
			/* END Output ^ */
			?>
			<?php
			echo $after_widget;
		}


		/* Update & Save -------------------------------------------------------------- */

		function update($new_instance, $old_instance) {
			return $new_instance;
		}


		/* Widget Form ---------------------------------------------------------------- */

		function form($instance) {
			/* Get the options into variables */
			$widget_title    = empty($instance['title']) ? __('Newsletter', 'basix-td') : apply_filters('widget_title', $instance['title']);
			$newsletter_text = isset($instance['newsletter_text']) ? $instance['newsletter_text'] : "";
			$send_to_address = empty($instance['send_to_address']) ? get_option('admin_email') : apply_filters('send_to_address', $instance['send_to_address']);
			$email_subject   = empty($instance['email_subject']) ? __('Newsletter Subscription', 'basix-td') : apply_filters('email_subject', $instance['email_subject']);
			$email_label     = empty($instance['email_label']) ? __('Email Address', 'basix-td') : apply_filters('email_label', $instance['email_label']);
			$signup_label    = empty($instance['signup_label']) ? __('Sign Up', 'basix-td') : apply_filters('signup_label', $instance['signup_label']);
			$success_message = empty($instance['success_message']) ? __('Congratulations, your email address has been added to our subscription list.', 'basix-td') : apply_filters('success_message', $instance['success_message']);
			?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo __("Widget Title:", 'basix-td'); ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $widget_title; ?>"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('newsletter_text'); ?>"><?php echo __("Text:", 'basix-td'); ?></label>
				<textarea class="widefat" rows="2" cols="20" id="<?php echo $this->get_field_id('newsletter_text'); ?>" name="<?php echo $this->get_field_name('newsletter_text'); ?>"><?php echo $newsletter_text; ?></textarea>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('send_to_address'); ?>"><?php echo __('Send To Address:', 'basix-td') ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('send_to_address'); ?>" name="<?php echo $this->get_field_name('send_to_address'); ?>" value="<?php echo $send_to_address; ?>"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('email_subject'); ?>"><?php echo __('Email Subject:', 'basix-td') ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('email_subject'); ?>" name="<?php echo $this->get_field_name('email_subject'); ?>" value="<?php echo $email_subject; ?>"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('email_label'); ?>"><?php echo __('Email Label:', 'basix-td') ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('email_label'); ?>" name="<?php echo $this->get_field_name('email_label'); ?>" value="<?php echo $email_label; ?>"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('signup_label'); ?>"><?php echo __('Sign-Up Button Text:', 'basix-td') ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('signup_label'); ?>" name="<?php echo $this->get_field_name('signup_label'); ?>" value="<?php echo $signup_label; ?>"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('signup_label'); ?>"><?php echo __('Success Message:', 'basix-td') ?></label>
				<input class="widefat" type="text" id="<?php echo $this->get_field_id('success_message'); ?>" name="<?php echo $this->get_field_name('success_message'); ?>" value="<?php echo $success_message; ?>"/>
			</p>
		<?php
		}
	}

	register_widget('basix_newsletter_widget');
?>