jQuery(document).ready(function ($) {

	$('.newslette-form').each(function (index) {
		var instance = $(this).attr('data-instance');
		SetNewsletter(instance);
	});

	function SetNewsletter(instance) {

		/* Options Variable */
		var settingObj = window["newslettervars" + instance];


		/* Submit Function */
		function basix_newsletter_submit() {

			$('#newsletter-' + instance).hide();

			var newsletterEmail = $('#newsletter-' + instance + ' input[name="newsletter_email"]').val();
			var newsletterSubject = settingObj.att_email_subject;
			var newsletterTo = settingObj.att_to_address;
			var newsletterSuccess = settingObj.att_success_message;

			/* Loading icon */
			$('#newsletter-loading-' + instance).show();

			/* Ajax Request */
			$.ajax({
				type   : "POST",
				url    : settingObj.att_ajax_path,
				data   : {
					action : "basix_newsletter_send",
					email  : newsletterEmail,
					sendto : newsletterTo,
					subject: newsletterSubject,
					success: newsletterSuccess,
					id     : settingObj.att_uniqid
				},
				success: function (data) {
					$('#newsletter-loading-' + instance).hide();
					$('#newsletter_ajaxoutput-' + instance).html(data);
					$('#newsletter-' + instance)[0].reset();
					$('#newsletter-' + instance).show();
					$('.alert span.close').click(function () {
						$(this).parent('.alert').fadeOut();
					});
					$('#newsletter_ajaxoutput-' + instance + ' .alert').fadeIn();
				},
				error  : function (errorThrown) {
					alert(errorThrown);
				}
			});
			return false;
		}

		/* jQuery Validate */
		$('#newsletter-' + instance).validate({
			rules        : {
				newsletter_email: {
					required : true,
					email    : true,
					minlength: 5
				}
			},
			messages     : {
				required        : settingObj.att_required_msg,
				newsletter_email: settingObj.att_email_msg
			},
			submitHandler: basix_newsletter_submit
		});

	}

});