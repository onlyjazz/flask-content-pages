jQuery(document).ready(function ($) {
	$('.jcarousel').each(function (index) {
		var instance = $(this).attr('data-instance');
		SetCarousel(instance);
	});

	function SetCarousel(instance) {

		/* Options Variable */
		var settingObj = window["carouselvars" + instance];

		/* Wrap variable (Continuous or Stop at End) */
		if (settingObj.wrap == 'none') {
			var wrap_setting = '';
		} else {
			var wrap_setting = 'circular';
		}

		/* Main Carousel Variable */
		var jcarousel = $(".jcarousel-" + instance);

		/* Check for Mobile */
		if (Modernizr.touch) {
			var _transforms3d = true;
		} else {
			var _transforms3d = false;
		}

		/* Create Carousel */
		jcarousel
			.on('jcarousel:reload jcarousel:create', function () {
				var width = jcarousel.innerWidth();
				var containerwidth = jQuery('.content-width').width();
				if (containerwidth >= 720) {
					width = width / settingObj.amount;
				}
				jcarousel.jcarousel('items').css('width', width + 'px');
			})
			.jcarousel({
				wrap       : wrap_setting,
				transitions: {
					transoforms : true,
					transforms3d: _transforms3d,
					easing      : 'swing'
				}
			});

		/* Auto height */
		var maxHeight = "0";
		jcarousel.jcarousel('visible').each(function () {
			maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
		});
		jcarousel.height(maxHeight);

		/* Reset on window load for safari */
		$(window).load(function () {
			jcarousel.jcarousel('reload');
		});

		/* Reset on window resize */
		$(window).resize(function () {
			jcarousel.jcarousel('reload');
		});

		/* Auto height on scroll and animate height of container */
		jcarousel.on('jcarousel:animate', function (event, carousel, target, animate) {
			var maxHeight = "0";
			jcarousel.jcarousel('visible').each(function () {
				maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
			});
			jcarousel.animate({height: maxHeight}, 300);
		});

		/* Auto height on reload */
		jcarousel.on('jcarousel:reload', function (event, carousel, target, animate) {
			var maxHeight = "0";
			jcarousel.jcarousel('visible').each(function () {
				maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
			});
			jcarousel.height(maxHeight);
		});

		/* Reset on parent tab navigation click/tap (Vertical & Horizontal Tab Content) */
		jcarousel.closest('.ui-tabs').find('li a').click(function () {
			setTimeout(function () {
				jcarousel.jcarousel('reload');
			}, 100);
		});

		/* Navigation */
		$(".jcarousel-" + instance + '-control-prev')
			.jcarouselControl({
				target: '-=1'
			});
		$(".jcarousel-" + instance + '-control-next')
			.jcarouselControl({
				target: '+=1'
			});

		/* Mobile Pagination */
		$(".jcarousel-" + instance + '-pagination')
			.on('jcarouselpagination:active', 'li', function () {
				$(this).addClass('active');
			})
			.on('jcarouselpagination:inactive', 'li', function () {
				$(this).removeClass('active');
			})
			.jcarouselPagination({
				'item': function (page, carouselItems) {
					return '<li><a href="#' + page + '"></a></li>';
				}
			});

		/* Swipe */
		jcarousel.swipe({
			excludedElements     : "",
			fallbackToMouseEvents: false,
			swipeLeft            : function (event, direction, distance, duration, fingerCount) {
				jcarousel.jcarousel('scroll', '+=1');
			},
			swipeRight           : function (event, direction, distance, duration, fingerCount) {
				jcarousel.jcarousel('scroll', '-=1');
			},
			tap                  : function (event, target) {
				if ($(target).is('a')) {
					window.location.href = $(target).attr('href');
				}
				if ($(target).is('a img')) {
					var href = $(target).parent().attr("href");
					var targetwindow = $(target).parent().attr("target");
					if ($(target).parent().attr("target") == '_blank') {
						window.open(href, targetwindow);
					} else {
						window.location.href = $(target).parent().attr('href');
					}
				}
			}
		});

	}

});