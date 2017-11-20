<?php
	$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
	$wp_load = $absolute_path[0] . 'wp-load.php';
	require_once($wp_load);
	header("Content-type: text/css; charset: UTF-8");
	header("Cache-Control: public");
?>
<?php global $basix_options; ?>
/* --------------------------------------------------------------------------------- */
/* CSS Table of Contents
/* --------------------------------------------------------------------------------- */
/*
	* Main Color
	* Accent Color
	* Top Navigation
	* Scrollbar
	* Header
	* Mobile Navigation
	* Blockquotes
	* Tooltips
	* Custom Body Text Color
	* Misc
	* Conditional CSS
*/
/* --------------------------------------------------------------------------------- */
/* Main Color
/* --------------------------------------------------------------------------------- */
/* Foreground
/* -------------------------------- */
.light-bg h1, .light-bg h2, .light-bg h3, .light-bg h4, .light-bg h5, .light-bg h6, .light-bg h1 a, .light-bg h2 a, .light-bg h3 a, .light-bg h4 a, .light-bg h5 a, .light-bg h6 a, .light-bg a:hover, .home-banner.light .slider-nav li a:hover, .light-bg #portfolio-filters li span:hover, .light-bg .blog-nav a:hover.back:before, .light-bg .blog-nav > a:hover.next:after, .footer.white a:hover, .footer.light a:hover, .white .logo, .white .logo a, .mobilenav li a, .home-banner.light h1, .home-banner.light .slider-nav li a.active, select option, .light-bg .accordion-header, .header.white .topnav li a, .header.white .topnav li.menu-item-has-children a:after, .tabs li a.active, .arrow-list li:before, .light-bg .arrow-list li:before, .light-bg .table-style-1 th, .client-logos-title span, .light-bg .client-logos-title span, .light-bg .team .social i, .light-bg #portfolio-filters li span.active, .light-bg .portfolio-cats-title, .light-bg .portfolio-cats-title:before, .light-bg .blog-meta .meta-item .meta-title, .light-bg .post-sharing a i, .footer.white h3, .footer.light h3, .footer-newsletter .textbox, .dark-bg .footer-social li i, .error-404-title, .home-cta-bar, .footer-infobar.alternate, .mejs-overlay-play:after, .light-bg .categories_filter li.active a, .light-bg .stats-number, .light-bg .widget_nav_menu li.current-menu-item > a, .cta-bar.grey .cta-bar-text, .light-bg .wpb_tabs_nav li.ui-tabs-active a, a.button.bordered, .light-bg button.bordered, .light-bg input.bordered[type="submit"], .light-bg a.button.bordered:hover, .light-bg button.bordered:hover, .light-bg input.bordered[type="submit"]:hover, .light-bg .contact-form label.error, .tp-caption[class*=dark_title], .tp-caption[class*=dark_icon], .footer.light .footer-social i, .footer.white .footer-social i {
	color: <?php echo $basix_options['main_color'] ?>;
}
.main-color i {
	color: <?php echo $basix_options['main_color'] ?> !important;
}
/* Important */
.main-color i, a.button.white, a.button.white i {
	color: <?php echo $basix_options['main_color'] ?> !important;
}
/* -------------------------------- */
/* Background
/* -------------------------------- */
.main-color-bg, .dark-bg .main-container, .dark-bg .jcarousel-nav, .dark-bg .client-logos-title span, .header.dark, .topnav li > ul, .white .mobilenav-button, .white .mobilenav-button:before, .white .mobilenav-button:after, .home-banner.dark, a.button, a.button.main, button, button.main, input.main[type="submit"], .action-box.main, .footer-container.dark, .main-content .title-container.main, .footer-infobar.main, .home-cta-bar.main, .light-bg .flip-box-wrap .flip_link a:hover, .light-bg .flip-box-wrap .flip_link a:visited:hover, .light-bg .flip-box-wrap .flip_link a:active:hover, .banner-block .bb-top-title, .light-bg .cta-bar.main, .alert.main, .mejs-container, .mejs-embed, .mejs-embed body, .stretched.dark-bg {
	background-color: <?php echo $basix_options['main_color'] ?>;
}
/* Important */
.vc_single_bar.bar_main .vc_bar {
	background-color: <?php echo $basix_options['main_color'] ?> !important;
}
/* --------------------------------------------------------------------------------- */
/* Accent Color
/* --------------------------------------------------------------------------------- */
/* Foreground
/* -------------------------------- */
a, a:after, .white .logo span, .white .logo a span, .dark .logo span, .dark .logo a span, .header.white .topnav li.current-menu-item > a, .header.white .topnav li.current_page_parent > a, .header.white .topnav li.current-menu-parent > a, .header.white .topnav li a:hover, .header.white .topnav li.menu-item-has-children.current_page_parent a:after, .header.white .topnav li.menu-item-has-children.current-menu-parent a:after, .header.white .topnav li.current-menu-item > a:after, .header.white .topnav li a:hover:after, .header.white .topnav li a.drop:hover:after, .mobilenav li.current-menu-item > a, .home-banner h1 span, .light-bg #portfolio-filters li span, .dark-bg #portfolio-filters li span, .light-bg h1 a:hover, .light-bg h2 a:hover, .light-bg h3 a:hover, .light-bg h4 a:hover, .light-bg h5 a:hover, .light-bg h6 a:hover, .mobilenav a:hover, .mobilenav a:hover:after, .home-banner.light .slider-controls a:hover:after, i, a i, #clients-back a:hover:after, #clients-next a:hover:after, .light-bg .team .social i:hover, .light-bg .post-sharing a:hover i, .footer.light .footer-lower li a:hover, .dark-bg .footer-social li i:hover, .mejs-overlay-play:hover:after, .aio-icon, .smile_icon_list.no_bg .icon_list_icon, .light-bg h4.wpb_toggle:hover, .wpb_accordion .wpb_accordion_wrapper .ui-state-default .ui-icon, .footer .widget_nav_menu li.current-menu-item > a, a#cancel-comment-reply-link, .tp-caption[class*=accent_icon], .footer.light .footer-social i:hover, .footer.white .footer-social i:hover, .light-bg .wpb_toggle:before, .light-bg #content h4.wpb_toggle:before {
	color: <?php echo $basix_options['accent_color'] ?>;
}
/* Important */
a.accent-color, i.accent-color, span.accent-color, .header.light .topsocial li a:hover i, .header.white .topsocial li a:hover i, .clients-carousel a.jcarousel-prev:hover:after, .clients-carousel a.jcarousel-next:hover:after, a.standard-nav.jcarousel-prev:hover:after, a.standard-nav.jcarousel-next:hover:after {
	color: <?php echo $basix_options['accent_color'] ?> !important;
}
/* -------------------------------- */
/* Background
/* -------------------------------- */
.main-content h1.bordered:after, .divider:after, .slide-style-2 .icon-backing, .slider-nav li a.active:before, a.button, input[type="submit"], a.button.accent, button.accent, input.accent[type="submit"], .basix-tooltip, .action-box.accent, .blog-meta:after, a.link_image:hover:before, .carousel-nav a:hover, .top-of-page-link:hover, .footer-infobar.accent, .footer-newsletter .button, .widget_tag_cloud a, .main-content .title-container.accent, .home-cta-bar.accent, .flip-box-wrap .flip_link a:visited, .flip-box-wrap .flip_link a:active, a.prev:hover, a.next:hover, a.jcarousel-prev:hover, a.jcarousel-next:hover, .cta-bar.accent, .alert.accent, .carousel-holder .mobile-pagination li.active, .mini-divider {
	background-color: <?php echo $basix_options['accent_color'] ?>;
}
/* Important */
.vc_single_bar.bar_accent .vc_bar, .wpb_revslider_element.white-bg .tp-bannertimer, .wpb_revslider_element.white-bg .tp-bullets.simplebullets.round .bullet.selected, .wpb_revslider_element.white-bg .tp-bullets.simplebullets.round .bullet.selected:hover, input[type="submit"]:focus {
	background-color: <?php echo $basix_options['accent_color'] ?> !important;
}
/* --------------------------------------------------------------------------------- */
/* Top Navigation
/* --------------------------------------------------------------------------------- */
.topnav > li.current-menu-item > a, .topnav > li.current_page_parent > a, .topnav > li.current-menu-parent > a {
	border-top-color: <?php echo $basix_options['accent_color'] ?>;
}
/* --------------------------------------------------------------------------------- */
/* Scrollbar (Webkit Only)
/* --------------------------------------------------------------------------------- */
::-webkit-scrollbar-thumb {
	background-color: <?php echo $basix_options['main_color'] ?> !important;
}
/* --------------------------------------------------------------------------------- */
/* Header
/* --------------------------------------------------------------------------------- */
.header, .topbar, .topnav, .topnav li, .topnav li a, .topsocial, .topsocial li {
	height: <?php echo $basix_options['header_height'] ?>;
}
.topnav li.menu-item-has-children a:after {
	line-height: <?php echo $basix_options['header_height'] ?>;
}
<?php if ($basix_options['top_nav_highlight'] != TRUE) { ?>
	.topnav > li.current-menu-item > a, .topnav > li.current_page_parent > a, .topnav > li.current-menu-parent > a {
		border-top-color: transparent !important;
	}
<?php } ?>
/* --------------------------------------------------------------------------------- */
/* Mobile Navigation
	/* Distance from header (needs to be same as header height above)
/* --------------------------------------------------------------------------------- */
.mobilenav {
	top: <?php echo $basix_options['header_height'] ?>;
}
/* --------------------------------------------------------------------------------- */
/* Blockquotes
/* --------------------------------------------------------------------------------- */
blockquote {
	border-left-color: <?php echo $basix_options['accent_color'] ?>;
}
/* --------------------------------------------------------------------------------- */
/* Tooltips
/* --------------------------------------------------------------------------------- */
.basix-tooltip:after {
	border-color: <?php echo $basix_options['accent_color'] ?> transparent transparent transparent;
}
ul.topsocial .basix-tooltip:after {
	border-color: transparent transparent <?php echo $basix_options['accent_color'] ?> transparent;
}
/* --------------------------------------------------------------------------------- */
/* Custom Body Text Color
/* --------------------------------------------------------------------------------- */
body.light-bg, .footer.light, .footer.white {
	color: <?php echo $basix_options['body_color'] ?>;
}
/* --------------------------------------------------------------------------------- */
/* Misc
/* -------------------------------- */
/* Bordered Button
/* -------------------------------- */
a.button.bordered:hover, button.bordered:hover, input.bordered[type="submit"]:hover {
	background-color: <?php echo $basix_options['main_color'] ?>;
	background-image: none;
	-webkit-box-shadow: inset 0px 0px 0px 1px <?php echo $basix_options['main_color'] ?>;
	-moz-box-shadow: inset 0px 0px 0px 1px <?php echo $basix_options['main_color'] ?>;
	box-shadow: inset 0px 0px 0px 1px <?php echo $basix_options['main_color'] ?>;
	color: #ffffff !important;
}
/* -------------------------------- */
/* MediaElement.js
/* -------------------------------- */
.mejs-controls {
	background: <?php echo $basix_options['main_color'] ?> !important;
}
.mejs-time-current {
	background: <?php echo $basix_options['accent_color'] ?> !important;
}
/* -------------------------------- */
/* Visual Composer
/* -------------------------------- */
.vc_progress_bar.accent .vc_single_bar .vc_bar {
	background-color: <?php echo $basix_options['accent_color'] ?> !important;
}
.light-bg .vc_progress_bar.main .vc_single_bar .vc_bar {
	background-color: <?php echo $basix_options['main_color'] ?> !important;
}
.dark-bg .vc_single_bar.bar_grey .vc_label {
	color: <?php echo $basix_options['main_color'] ?>;
}
.dark-bg .smile_icon_list.no_bg .icon_list_icon {
	background-color: <?php echo $basix_options['main_color'] ?> !important;
}
.wpb_content_element .wpb_tabs_nav li.ui-tabs-active {
	border-top: 1px solid <?php echo $basix_options['accent_color'] ?>;
}
.wpb_accordion .ui-accordion-header-active {
	background-color: <?php echo $basix_options['accent_color'] ?> !important;
}
/* -------------------------------- */
/* WP Widgets
/* -------------------------------- */
.light-bg .main-content .widget_tag_cloud a:hover, .footer.light .widget_tag_cloud a:hover {
	background-color: <?php echo $basix_options['main_color'] ?>;
}
.dark-bg .main-content .widget_tag_cloud a:hover, .footer.dark .widget_tag_cloud a:hover {
	color: <?php echo $basix_options['accent_color'] ?> !important;
}
/* -------------------------------- */
/* Visual Composer / Ultimate VC Addons
/* -------------------------------- */
.light-bg .wpb_tabs_nav li.ui-tabs-active a {
	color: <?php echo $basix_options['main_color'] ?> !important;
}
/* --------------------------------------------------------------------------------- */
/* Conditional CSS
/* --------------------------------------------------------------------------------- */
<?php if ($basix_options['top_bar_custom_color'] == '1' && $basix_options['top_bar_custom_color_value']) { ?>
	/* -------------------------------- */
	/* Custom Top Bar Color
	/* -------------------------------- */
	.header {
		background-color: <?php echo $basix_options['top_bar_custom_color_value'] ?> !important;
		background-image: none !important;
	}
	.topnav .sub-menu li a {
		opacity: 0.7 !important;
	}
	.topnav .sub-menu li a:hover {
		opacity: 1 !important;
	}
	.header.light .topnav li a, .header.light .topnav li.menu-item-has-children a:after, .header.white .topnav li a, .header.white .topnav li.menu-item-has-children a:after {
		opacity: 0.8;
	}
	.header.light .topnav li a:hover, .header.light .topnav li.menu-item-has-children a:hover:after, .header.white .topnav li a:hover, .header.white .topnav li.menu-item-has-children a:hover:after {
		color: <?php echo $basix_options['main_color'] ?>;
		opacity: 1;
	}
	.header.white .topsocial li a i, .header.light .topsocial li a i {
		color: <?php echo $basix_options['main_color'] ?>;
		opacity: 0.5;
	}
	.header.white .topsocial li a:hover i, .header.light .topsocial li a:hover i {
		color: <?php echo $basix_options['main_color'] ?> !important;
		opacity: 1;
	}
	.header.white .topnav > li.current-menu-item > a, .header.white .topnav > li.current_page_parent > a, .header.white .topnav > li.current-menu-parent > a, .header.light .topnav > li.current-menu-item > a, .header.light .topnav > li.current_page_parent > a, .header.light .topnav > li.current-menu-parent > a {
		opacity: 1;
		color: <?php echo $basix_options['main_color'] ?>;
		border-top-color: <?php echo $basix_options['main_color'] ?>;
	}
	.header.white .topnav > li.current-menu-item > a:after, .header.white .topnav > li.current_page_parent > a:after, .header.white .topnav > li.current-menu-parent > a:after, .header.light .topnav > li.current-menu-item > a:after, .header.light .topnav > li.current_page_parent > a:after, .header.light .topnav > li.current-menu-parent > a:after {
		color: <?php echo $basix_options['main_color'] ?> !important;
	}
	.header.dark .topnav li a, .header.dark .topnav li.menu-item-has-children a:after {
		opacity: 0.9;
	}
	.header.dark .topnav > li.current-menu-item > a, .header.dark .topnav > li.current_page_parent > a, .header.dark .topnav > li.current-menu-parent > a {
		border-top-color: #ffffff;
	}
<?php } ?>
<?php if ($basix_options['site_container'] !== '') { ?>
	/* -------------------------------- */
	/* Boxed Background Image
	/* -------------------------------- */
	body {
		background-color: <?php echo $basix_options['boxed_bg']['background-color'] ?> !important;
		background-image: url(<?php echo $basix_options['boxed_bg']['background-image'] ?>);
		background-repeat: <?php echo $basix_options['boxed_bg']['background-repeat'] ?>;
		background-attachment: <?php echo $basix_options['boxed_bg']['background-attachment'] ?>;
		background-position: <?php echo $basix_options['boxed_bg']['background-position'] ?>;
		background-size: <?php echo $basix_options['boxed_bg']['background-size'] ?>;
	}
<?php } ?>
<?php if ($basix_options['site_container'] !== '') { ?>
	/* -------------------------------- */
	/* Boxed Background Image
	/* -------------------------------- */
	body {
		background-color: <?php echo $basix_options['boxed_bg']['background-color'] ?> !important;
		background-image: url(<?php echo $basix_options['boxed_bg']['background-image'] ?>);
		background-repeat: <?php echo $basix_options['boxed_bg']['background-repeat'] ?>;
		background-attachment: <?php echo $basix_options['boxed_bg']['background-attachment'] ?>;
		background-position: <?php echo $basix_options['boxed_bg']['background-position'] ?>;
		background-size: <?php echo $basix_options['boxed_bg']['background-size'] ?>;
	}
<?php } ?>
<?php if ($basix_options['page_title_style'] == 'custom_color') { ?>
	/* -------------------------------- */
	/* Custom Title Bar Color
	/* -------------------------------- */
	.main-content .title-container.custom {
		background-color: <?php echo $basix_options['titlebar_custom_color'] ?>;
	}
	.main-content .title-container.custom h1, .main-content .title-container.custom h2 {
		color: <?php echo $basix_options['titlebar_custom_text_color'] ?>;
	}
	.blog-meta.title-block .meta-item, .blog-meta.title-block .meta-item a, .blog-meta.title-block .meta-item a:hover, .blog-meta.title-block .meta-item .meta-title:before {
		color: <?php echo $basix_options['titlebar_custom_text_color'] ?>;
	}
	.blog-meta.title-block {
		border-top-color: <?php echo $basix_options['titlebar_custom_text_color'] ?>;
	}
	.title-container #portfolio-filters li span {
		color: <?php echo $basix_options['titlebar_custom_text_color'] ?> !important;
	}
<?php } ?>
<?php if ($basix_options['footer_link_color'] == 'standard') { ?>
	/* -------------------------------- */
	/* Standard Color Footer Links
	/* -------------------------------- */
	.footer.dark .column-container a {
		color: rgba(255, 255, 255, 0.7);
	}
	.footer.dark .column-container a:hover {
		color: #ffffff;
	}
	.footer.light .column-container a {
		color: <?php echo $basix_options['main_color'] ?>;
	}
	.footer.light .column-container a:hover {
		color: <?php echo $basix_options['accent_color'] ?>;
	}
	.footer.white .column-container a {
		color: <?php echo $basix_options['main_color'] ?>;
	}
	.footer.white .column-container a:hover {
		color: <?php echo $basix_options['accent_color'] ?>;
	}
	.footer.dark .tweet-time a {
		color: rgba(255, 255, 255, 0.5);
	}
<?php } ?>