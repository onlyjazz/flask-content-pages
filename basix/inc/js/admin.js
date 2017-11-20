jQuery(document).ready(function ($) {

	/* Custom Meta Box Upload ------------------------------------------------ */

	$('.basix_meta_upload_button').click(function () {
		var button_id = '#' + $(this).attr("id");
		wp.media.editor.send.attachment = function (props, attachment) {
			var upload_path = attachment.url;
			$(button_id).parent().parent().find('.basix_meta_upload').val(attachment.url);
			$(button_id).parent().parent().find('.basix_meta_upload_path_preview').text(upload_path);
			$(button_id).parent().parent().find('.basix_meta_upload_remove').show();
		};
		wp.media.editor.open(this);
		return false;
	});

	$('.basix_meta_upload_remove').click(function () {
		var remove_button_id = '#' + $(this).attr("id");
		$(remove_button_id).parent().parent().find('.basix_meta_upload').val('');
		$(remove_button_id).parent().parent().find('.basix_meta_upload_path_preview').text('');
		$(this).hide();
	});

});