jQuery(document).ready(function ($) {
	/* Disable PrettyPhoto modal window and open image in new tab on mobile devices */
	if ($('.content-width').width() < 769) {
		$('a.prettyphoto').each(function () {
			$(this).attr('target', '_blank');
			$(this).removeClass('prettyphoto');
		});
	}
});