jQuery(document).ready(function ($) {

	if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
		var enableanimation = false;
	} else {
		var enableanimation = true;
	}

	$('#portfolio').mixItUp({
		animation: {
			enable : enableanimation,
			effects: 'fade stagger'
		},
		selectors: {
			target: 'li.mix',
			filter: '.filter'
		},
		callbacks: {
			onMixStart: function (state) {
				if ($('.content-width').width() < 768) {
					$('#portfolio li.mix:visible').last().css({
						'padding-bottom': ''
					});
				}
			},
			onMixEnd  : function (state) {
				if ($('.content-width').width() < 768) {
					$('#portfolio li.mix:visible').last().css({
						'padding-bottom': '0px'
					});
				}
			}
		}
	});

});