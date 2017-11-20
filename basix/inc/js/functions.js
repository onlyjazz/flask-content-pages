jQuery(document).ready(function ($) {

	/* ---------------------------------------------------------------- */
	/* Sticky Header
	/* ---------------------------------------------------------------- */

	/* Stick it */
	if ($('.content-width').width() > 960) {
		$(".header.sticky").sticky();
	}

	/* AND On Resize */
	$(window).resize(function () {
		$(".header.sticky").unstick();
		if ($('.content-width').width() > 960) {
			$(".header.sticky").sticky();
		} else {
			$(".header.sticky").unstick();
		}
	});

	/* ---------------------------------------------------------------- */
	/* Mobile Navigation - Duplicate standard navigation contents
	/* ---------------------------------------------------------------- */

	var $main_nav = $('.topnav');
	$main_nav.data('navigation', $main_nav.html());

	var newnav = $main_nav.data('navigation');
	$(newnav).appendTo('ul.mobilenav');

	/* ---------------------------------------------------------------- */
	/* Mobile Navigation Show/Hide
	/* ---------------------------------------------------------------- */

	$('.mobilenav-click').click(function () {
		$('.mobilenav').toggle();
	});

	/* ---------------------------------------------------------------- */
	/* Mobile Navigation - Sub Menus
	/* ---------------------------------------------------------------- */

	$('.mobilenav li.menu-item-has-children a').click(function () {
		$(this).next('ul').toggle();
	});

	/* ---------------------------------------------------------------- */
	/* Fastclick - Disbale 300ms delay on mobile
	/* ---------------------------------------------------------------- */

	FastClick.attach(document.body);

	/* ---------------------------------------------------------------- */
	/* Alerts (Hide when close button clicked)
	/* ---------------------------------------------------------------- */

	$(".alert span.close").click(function () {
		$(this).parent().fadeOut();
	});

	/* ---------------------------------------------------------------- */
	/* Top of Page Link
	/* ---------------------------------------------------------------- */

	$(window).scroll(function () {
		if ($(this).scrollTop() > 300) {
			$('.top-of-page-link').show();
		} else {
			$('.top-of-page-link').hide();
		}
	});

	$('.top-of-page-link').click(function () {
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});

	/* ---------------------------------------------------------------- */
	/* Set widths of Visual Composer progress bars on load
	/* ---------------------------------------------------------------- */

	$('.vc_bar').each(function () {
		var $barwidth = $(this).data("value");
		$(this).width($barwidth + '%');
	});

	/* ---------------------------------------------------------------- */
	/* Slider Revolution
	/* ---------------------------------------------------------------- */
	/* Left Aligned Title & Text in Full Width / Full Screen Mode
	/* --------------------------------------------- */

	/* On Doc Ready - Front End */
	$(document).ready(function () {
		$('.forcefullwidth_wrapper_tp_banner div[class*=left_aligned]').wrap('<div class="left-inner-override"></div>');
		$('.left-inner-override').each(function () {
			this.style.setProperty('left', Math.ceil(($('.main-content').width() - $('.content-width').width()) / 2) + 'px', 'important');
			this.style.setProperty('width', $('.content-width').width() + 'px', 'important');
		});
	});

	/* On Load - Visual Composer Front End Edit Mode */
	$(window).load(function () {
		$('body.compose-mode .forcefullwidth_wrapper_tp_banner div[class*=left_aligned]').wrap('<div class="left-inner-override"></div>');
		$('body.compose-mode .left-inner-override').each(function () {
			this.style.setProperty('left', Math.ceil(($('.main-content').width() - $('.content-width').width()) / 2) + 'px', 'important');
			this.style.setProperty('width', $('.content-width').width() + 'px', 'important');
		});
	});

	/* AND On Resize */
	$(window).resize(function () {
		$('.left-inner-override').each(function () {
			this.style.setProperty('left', Math.ceil(($('.main-content').width() - $('.content-width').width()) / 2) + 'px', 'important');
			this.style.setProperty('width', $('.content-width').width() + 'px', 'important');
		});
	});

	/* ---------------------------------------------------------------- */
	/* Sticky Clients Carousel
	/* ---------------------------------------------------------------- */

	/* Adjust footer padding */
	$(".clients-carousel.bottom").each(function () {
		$('.main-content-inner').css({
			"padding-bottom": "0"
		});
	});

	/* Make it stick */
	$(".clients-carousel.bottom").closest('.wpb_row').position({
		"my"       : "bottom",
		"at"       : "top",
		"of"       : $(".footer-container"),
		"collision": "none"
	});

	/* AND On Resize */
	$(window).resize(function () {
		$(".clients-carousel.bottom").closest('.wpb_row').position({
			"my"       : "bottom",
			"at"       : "top",
			"of"       : $(".footer-container"),
			"collision": "none"
		});
	});

	/* ---------------------------------------------------------------- */
	/* Hide Address Bar in Mobile Browsers
	/* ---------------------------------------------------------------- */

	if (Modernizr.touch) {
		window.scrollTo(0, 1);
	}

	/* ---------------------------------------------------------------- */
	/* Equal Height Grid Columns
	/* ---------------------------------------------------------------- */

	function fitRows($container, options) {

		var cols = options.numColumns,
			$els = $container.children(),
			maxH = 0, j,
			doSize;

		doSize = ( $container.width() != $els.outerWidth(true) );

		$els.each(function (i, p) {

			var $p = $(p), h;

			$p.css('min-height', '');
			if (!doSize) return;

			maxH = Math.max($p.outerHeight(true), maxH);
			if (i % cols == cols - 1 || i == cols - 1) {
				for (j = cols; j; j--) {
					$p.css('min-height', maxH);
					$p = $p.prev();
				}
				maxH = 0;
			}

		});
	}

	$('.grid-wrapper ul').each(function () {

		if ($(this).children('li').hasClass("vc_span6")) {
			var columns = 2;
		}
		if ($(this).children('li').hasClass("vc_span4")) {
			var columns = 3;
		}
		if ($(this).children('li').hasClass("vc_span3")) {
			var columns = 4;
		}
		if ($(this).children('li').hasClass("vc_span2")) {
			var columns = 6;
		}

		var opts = {
			numColumns: columns
		};

		fitRows($('.grid-wrapper ul'), opts);

		$(window).on('resize', function () {
			fitRows($('.grid-wrapper ul'), opts);
		});
	});

	/* ---------------------------------------------------------------- */
	/* Animate page content on load
	/* ---------------------------------------------------------------- */

	$(".stretched").animate({ opacity: 1 }, 300);
	$(".content-width").animate({ opacity: 1 }, 300);

	/* ---------------------------------------------------------------- */
	/* Parallax Backgrounds
	/* ---------------------------------------------------------------- */

	var plx_config = {
		animateDuration: 2000,
		animateTarget: "div.parallax"
	};

	$(plx_config.animateTarget).each(function() {
	var prlx = $(this);

		/* On load */
		$(document).ready(function() {
			var yPos = -(($(window).scrollTop() - (prlx.offset().top - 1200)) / 4);
			var coords = '50% ' + yPos + 'px';
			prlx.css({backgroundPosition: coords});
		});

		/* On scroll */
		$(window).scroll(function() {
			var yPos = -(($(window).scrollTop() - (prlx.offset().top - 1200)) / 4);
			var coords = '50% ' + yPos + 'px';
			prlx.css({backgroundPosition: coords});
		});

	});

});