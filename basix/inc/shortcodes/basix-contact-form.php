<?php
	/* ------------------------------------------------------------------------------ */
	/* Basix Contact Form
	/* ------------------------------------------------------------------------------ */

	/* Register Scripts ------------------------------------------------------------- */

	function register_basix_contact_form_widget_scripts() {
		wp_register_script('jquery-validate', get_template_directory_uri() . '/inc/js/jquery.validate.min.js', array('jquery'));
		wp_register_script('contactConfig', get_template_directory_uri() . '/inc/shortcodes/js/contactForm.js');
	}

	add_action('wp_enqueue_scripts', 'register_basix_contact_form_widget_scripts');


	/* Ajax Function ---------------------------------------------------------------- */

	add_action('wp_ajax_basix_contact_form', 'basix_contact_send');
	add_action('wp_ajax_nopriv_basix_contact_form', 'basix_contact_send');

	function basix_contact_send() {

		if (($_POST['name']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && ($_POST['message'])) {

			$emailTo         = $_POST['sendto'];
			$subject         = $_POST['subject'];
			$success_message = $_POST['success'];
			$id              = $_POST['id'];
			$name            = trim($_POST['name']);
			$email           = trim($_POST['email']);
			$phone           = trim($_POST['phone']);
			$message         = trim($_POST['message']);
			$subject         = $subject;
			$headers         = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type: text/plain; charset=" . get_bloginfo('charset') . "" . "\r\n";
			$headers .= "From: " . $name . " <" . $email . ">" . "\r\n";
			$headers .= "Reply-To: " . $email . "\r\n";
			$body = "Name: " . $name . "\r\n";
			$body .= "Email: " . $email . "\r\n";
			if ($phone) {
				$body .= "Phone: " . $phone . "\r\n";
			}
			$body .= "\r\n" . $message;

			if (wp_mail($emailTo, $subject, $body, $headers)) {
				echo '<div class="alert main success">' . $success_message . '<span class="close"></span></div>';
			} else {
				echo '<div class="alert red error">' . __('There was a problem sending your message. Please try again soon.', 'basix-td') . '<span class="close"></span></div>';
			}

		} else {
			echo '<div class="alert transparent error"><i class="Basix-exclamation-circle"></i>' . __('Please enter your name, a valid email address and your message.', 'basix-td') . '<span class="close"></span></div>';
		}
		die();
	}


	/* Shortcode -------------------------------------------------------------------- */

	function sc_basix_contact_form($atts, $content = NULL) {

		$wp_admin_to_address = get_bloginfo('admin_email');
		extract(shortcode_atts(array(
				'name_label'      => __('Name', 'basix-td'),
				'email_label'     => __('Email Address', 'basix-td'),
				'phone_label'     => __('Phone', 'basix-td'),
				'message_label'   => __('Message', 'basix-td'),
				'submit_label'    => __('Submit Message', 'basix-td'),
				'to_address'      => $wp_admin_to_address,
				'email_subject'   => __('Contact Form Message', 'basix-td'),
				'success_message' => __('Your message has been sent', 'basix-td'),
				'field_layout' 	=> '',
				'button_align' 	=> '',
				'button_size' 	=> '',
				'uniqid'          => 'contact_' . uniqid()
			),
			$atts
		));

		/* Enqueue Scripts */
		wp_enqueue_script('jquery-validate');
		wp_enqueue_script('contactConfig');

		/* Variables to pass to localize script */
		$contact_form_vars = array(
			'att_name_label'      => $name_label,
			'att_email_label'     => $email_label,
			'att_phone_label'     => $phone_label,
			'att_message_label'   => $message_label,
			'att_submit_label'    => $submit_label,
			'att_to_address'      => $to_address,
			'att_ajax_path'       => admin_url('admin-ajax.php'),
			'att_email_subject'   => $email_subject,
			'att_success_message' => $success_message,
			'att_uniqid'          => $uniqid,

			/* Validation Messages */
			'att_required_msg'    => __('Required !', 'basix-td'),
			'att_name_msg'        => __('Your Name ?', 'basix-td'),
			'att_email_msg'       => __('Email Address ?', 'basix-td'),
			'att_phone_msg'       => __('Phone Number ?', 'basix-td'),
			'att_message_msg'     => __('Your Message ?', 'basix-td')
		);

		/* Localize Script */
		wp_localize_script('contactConfig', 'contactvars' . $uniqid, $contact_form_vars);

		?>
		<?php ob_start(); ?>
		<div class="contactform wpb_content_element" id="<?php echo $uniqid; ?>" data-instance="<?php echo $uniqid ?>">
			<div class="ajax-output" id="contact_ajaxoutput-<?php echo $uniqid; ?>"></div>
			<form action="" method="post" id="basix-contact-form-<?php echo $uniqid; ?>" autocomplete="off"<?php if ($button_align == 'none') { ?> style="text-align: center"<?php } ?>>
				<div class="holder">
					<?php if ($field_layout == 'single') { ?><div class="column-full-width"><?php } else { ?><div class="column-one-third"><?php } ?>
						<input type="text" name="message_name" placeholder="<?php echo $name_label ?> *" value=""></div>
					<?php if ($field_layout == 'single') { ?><div class="column-full-width"><?php } else { ?><div class="column-one-third"><?php } ?>
						<input type="text" name="message_email" placeholder="<?php echo $email_label ?> *" value="">
					</div>
					<?php if ($field_layout == 'single') { ?><div class="column-full-width"><?php } else { ?><div class="column-one-third"><?php } ?>
						<input type="text" name="message_phone" placeholder="<?php echo $phone_label ?>" value=""></div>
					<div class="column-full-width">
						<textarea type="text" name="message_text" placeholder="<?php echo $message_label ?> *"></textarea>
					</div>
				</div>
				<input type="hidden" name="submitted" value="1">
				<input type="submit" class="button accent<?php if ($button_size == 'large') { ?> large<?php } ?>" value="<?php echo $submit_label ?>" style="<?php if ($button_align) { ?>float: <?php echo $button_align ?>;<?php } ?><?php if ($button_size == 'large') { ?> margin-top: 20px !important;<?php } ?>">

				<div style="display: none; float: left; margin-left: 10px; margin-top: 7px;<?php if ($button_align == 'none') { ?> float: none !important; margin-left: 0 !important;<?php } ?>" id="contact-loading-<?php echo $uniqid; ?>">
					<i class="Basix-spinner basix-ajax-loader" style="margin-right: 5px;"></i><?php echo __('Processing','basix-td') ?>
				</div>
			</form>
		</div>
		<?php
		$basix_contact_form_output = ob_get_contents();
		ob_end_clean();
		return $basix_contact_form_output;
		?>
	<?php
	}

	add_shortcode('basix_contact_form', 'sc_basix_contact_form');


	/* Visual Composer Config ------------------------------------------------------- */

	if (function_exists('vc_map')) {
		vc_map(array(
			"name"                    => __("Basix Contact Form", 'basix-td'),
			"description"             => __("", 'basix-td'),
			"base"                    => "basix_contact_form",
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
					"heading"     => __("Email Recipient Address", 'basix-td'),
					"description" => __("This is the address enquires will be sent to.", 'basix-td'),
					"param_name"  => "to_address",
					"value"       => "",
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Email Subject", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "email_subject",
					"value"       => "",
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Name Label", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "name_label",
					"value"       => "",
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Email Label", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "email_label",
					"value"       => "",
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Phone Label", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "phone_label",
					"value"       => "",
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Message Label", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "message_label",
					"value"       => "",
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Submit Button Label", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "submit_label",
					"value"       => "",
				),
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Success Message", 'basix-td'),
					"description" => __("This will be shown once the form has been submitted.", 'basix-td'),
					"param_name"  => "success_message",
					"value"       => "",
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Input Field Layout", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "field_layout",
					"value"       => array(
						__("Multi Column", 'basix-td')  => 'multi',
						__("Single Line", 'basix-td') => 'single',
					),
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Button Alignment", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "button_align",
					"value"       => array(
						__("Left", 'basix-td')  => 'left',
						__("Right", 'basix-td') => 'right',
						__("Center", 'basix-td') => 'none',
					),
				),
				array(
					"type"        => "dropdown",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __("Button Size", 'basix-td'),
					"description" => __("", 'basix-td'),
					"param_name"  => "button_size",
					"value"       => array(
						__("Standard", 'basix-td')  => 'standard',
						__("Large", 'basix-td') => 'large',
					),
				),
			),
		));
	}
?>