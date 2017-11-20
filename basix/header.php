<?php
	/**
	 * Header
	 */
?>
<?php global $basix_options; ?>
<?php $body_classes = array($basix_options['content_background_style'], $basix_options['site_container'], $basix_options['form_inputs_color']); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69120233-2', 'auto');
  ga('send', 'pageview');

</script>

	<?php
if (get_permalink()=="https://www.clearclinica.com/pricing/")
{
	echo "<meta property='og:title' content='Pricing – Clear Clinica'/>
	<meta property='og:image' content='https://www.clearclinica.com/wp-content/uploads/2016/10/Business.png'/>
	<meta property='og:description' content='Individual pricing for each client, depending on the features you choose.'/>
	<meta property='og:url' content='https://www.clearclinica.com/pricing/'/>";
}else{
	echo '<meta name="description" content="Biomed in Israel">
<meta name="description" content="Clinical Cloud">
<meta name="description" content="clinical research associate Israel">
<meta name="description" content="CRO Israel">
	<meta name="viewport" content="width=device-width, user-scalable=no">';
}
	?>
	<title><?php wp_title('-', TRUE, 'right'); ?><?php bloginfo('name'); ?><?php if (is_front_page()) {
			echo ' - ';
			bloginfo('description');
		} ?></title>
	<?php if (isset($basix_options['favicon']['url']) && $basix_options['favicon']['url'] != '') { ?>
		<link rel="shortcut icon" href="<?php echo $basix_options['favicon']['url'] ?>"/>
	<?php } ?>
	<?php if ($basix_options['custom_css']) { /* Custom CSS Output from Theme Options */ ?>
		<style type="text/css">
			<?php echo $basix_options['custom_css'] ?>
		</style>
	<?php } ?>
<?php
if (get_permalink()=="https://www.clearclinica.com/clear-clinica-overview/" || get_permalink()=="https://www.clearclinica.com/101-2/" || get_permalink()=="https://www.clearclinica.com/pricing/" || get_permalink()=="https://www.clearclinica.com/pricing/" || get_permalink()=="https://www.clearclinica.com/contact/" || get_permalink()=="https://www.clearclinica.com/our-vision/" || get_permalink()=="https://www.clearclinica.com/" || get_permalink()=="https://www.clearclinica.com/customers-stories/" || get_permalink()=="https://www.clearclinica.com/clear-clinica-partners/" || get_permalink()=="https://www.clearclinica.com/our-team/" ||  get_permalink()=="https://www.clearclinica.com/pricing-new/"){
get_header('new');
}
else{
	wp_head(); ?>
</head>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<!-- Body -->
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<body <?php body_class($body_classes); ?>>

<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<!-- Main Container -->
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="main-container">

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Top Bar - Set "white" or "dark" below -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="header <?php echo $basix_options['top_bar_style'] ?><?php if ($basix_options['fixed_header'] != FALSE) { ?> sticky<?php } ?>">
		<div class="topbar content-width">

			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- Logo -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<div class="table fullheight">
				<div class="table-cell fullheight middle">
					<div class="logo">
						<?php if ($basix_options['main_logo_image'] !== '' && $basix_options['main_logo_image']['url'] !== '') { ?>
							<a href="<?php echo esc_url(home_url('/')); ?>"><img alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" src="<?php echo $basix_options['main_logo_image']['url']; ?>" style="height: <?php echo $basix_options['logo_image_height']; ?>;"/></a>
						<?php } else { ?>
							<a href="<?php echo esc_url(home_url('/')); ?>"><?php echo $basix_options['logo_text'] ?></a>
						<?php } ?>
					</div>
				</div>
			</div>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- END Logo -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

			<?php if ($basix_options['header_social']) { ?>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<!-- Social Icons -->
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<ul class="topsocial">
					<?php if (isset($basix_options['header_social']['twitter']) && $basix_options['header_social']['twitter'] == 1 && $basix_options['social_twitter'] !== '') { ?>
						<li>
							<a href="<?php echo $basix_options['social_twitter']; ?>">
								<i class="Basix-twitter"></i>
								<div class="basix-tooltip">Twitter</div>
							</a>
						</li>
					<?php } ?>
					<?php if (isset($basix_options['header_social']['facebook']) && $basix_options['header_social']['facebook'] == 1 && $basix_options['social_facebook'] !== '') { ?>
						<li>
							<a href="<?php echo $basix_options['social_facebook']; ?>">
								<i class="Basix-facebook"></i>
								<div class="basix-tooltip">Facebook</div>
							</a>
						</li>
					<?php } ?>
					<?php if (isset($basix_options['header_social']['google']) && $basix_options['header_social']['google'] == 1 && $basix_options['social_google'] !== '') { ?>
						<li>
							<a href="<?php echo $basix_options['social_google']; ?>">
								<i class="Basix-google-plus"></i>
								<div class="basix-tooltip">Google+</div>
							</a>
						</li>
					<?php } ?>
					<?php if (isset($basix_options['header_social']['linkedin']) && $basix_options['header_social']['linkedin'] == 1 && $basix_options['social_linkedin'] !== '') { ?>
						<li>
							<a href="<?php echo $basix_options['social_linkedin']; ?>">
								<i class="Basix-linkedin-square"></i>
								<div class="basix-tooltip">LinkedIn</div>
							</a>
						</li>
					<?php } ?>
					<?php if (isset($basix_options['header_social']['pinterest']) && $basix_options['header_social']['pinterest'] == 1 && $basix_options['social_pinterest'] !== '') { ?>
						<li>
							<a href="<?php echo $basix_options['social_pinterest']; ?>">
								<i class="Basix-pinterest"></i>
								<div class="basix-tooltip">Pinterest</div>
							</a>
						</li>
					<?php } ?>
					<?php if (isset($basix_options['header_social']['flickr']) && $basix_options['header_social']['flickr'] == 1 && $basix_options['social_flickr'] !== '') { ?>
						<li>
							<a href="<?php echo $basix_options['social_flickr']; ?>">
								<i class="Basix-flickr"></i>
								<div class="basix-tooltip">Flickr</div>
							</a>
						</li>
					<?php } ?>
					<?php if (isset($basix_options['header_social']['dribbble']) && $basix_options['header_social']['dribbble'] == 1 && $basix_options['social_dribbble'] !== '') { ?>
						<li>
							<a href="<?php echo $basix_options['social_dribbble']; ?>">
								<i class="Basix-dribbble"></i>
								<div class="basix-tooltip">Dribbble</div>
							</a>
						</li>
					<?php } ?>
					<?php if (isset($basix_options['header_social']['youtube']) && $basix_options['header_social']['youtube'] == 1 && $basix_options['social_youtube'] !== '') { ?>
						<li>
							<a href="<?php echo $basix_options['social_youtube']; ?>">
								<i class="Basix-youtube"></i>
								<div class="basix-tooltip">YouTube</div>
							</a>
						</li>
					<?php } ?>
					<?php if (isset($basix_options['header_social']['vimeo']) && $basix_options['header_social']['vimeo'] == 1 && $basix_options['social_vimeo'] !== '') { ?>
						<li>
							<a href="<?php echo $basix_options['social_vimeo']; ?>">
								<i class="Basix-vimeo-square"></i>
								<div class="basix-tooltip">Vimeo</div>
							</a>
						</li>
					<?php } ?>
					<?php if (isset($basix_options['header_social']['github']) && $basix_options['header_social']['github'] == 1 && $basix_options['social_github'] !== '') { ?>
						<li>
							<a href="<?php echo $basix_options['social_github']; ?>">
								<i class="Basix-github"></i>
								<div class="basix-tooltip">GitHub</div>
							</a>
						</li>
					<?php } ?>
					<?php if (isset($basix_options['header_social']['instagram']) && $basix_options['header_social']['instagram'] == 1 && $basix_options['social_instagram'] !== '') { ?>
						<li>
							<a href="<?php echo $basix_options['social_github']; ?>">
								<i class="Basix-instagram"></i>
								<div class="basix-tooltip">Instagram</div>
							</a>
						</li>
					<?php } ?>
				</ul>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<!-- END Social Icons -->
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<?php } ?>

			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- Main Navigation -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<?php
				//wp_nav_menu(array(
				//		'menu_class'     => 'topnav',
				//		'theme_location' => 'primary',
				//		'fallback_cb'    => 'basix_setup_menu'
				//	)
				//);
if ( is_user_logged_in() ) {
    wp_nav_menu(array('menu' => 'RiskApps','menu_class'     => 'topnav'));
} else {
    wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'menu','menu_class'     => 'topnav'));
};
			?>
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- END Main Navigation -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- Mobile Navigation -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- Show/Hide Menu Button -->
			<!-- ~~~~~~~~~~~~~~~~~ -->
			<a href="#!" class="mobilenav-click">
				<div class="mobilenav-button-container">
					<div class="mobilenav-button-inner">
						<div class="mobilenav-button"></div>
					</div>
				</div>
			</a>
			<!-- ~~~~~~~~~~~~~~~~~ -->
			<!-- END Show/Hide Menu Button -->
			<!-- ~~~~~~~~~~~~~~~~~ -->

			<!-- ~~~~~~~~~~~~~~~~~ -->
			<!-- Navigation Menu (Populated using jQuery) -->
			<!-- ~~~~~~~~~~~~~~~~~ -->
			<div class="mobilenav-container">
				<ul class="mobilenav"></ul>
			</div>
			<!-- ~~~~~~~~~~~~~~~~~ -->
			<!-- END Navigation Menu -->
			<!-- ~~~~~~~~~~~~~~~~~ -->
			<!-- END Mobile Navigation -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Top Bar -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<?php
}
?>
