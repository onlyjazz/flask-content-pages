<?php
	/**
	 * Footer
	 */
?>
<?php global $basix_options; ?>
<?php
	/* Set a variable if footer widgets exist and aren't disabled in options */
	if ($basix_options['footer_widgets'] != FALSE && (is_active_sidebar('footer-col-1') || is_active_sidebar('footer-col-2') || is_active_sidebar('footer-col-3') || is_active_sidebar('footer-col-4') || is_active_sidebar('footer-col-5') || is_active_sidebar('footer-col-6'))) {
		$widgets_exist = 'yes';
	} else {
		$widgets_exist = '';
	}
?>
<?php
if (get_permalink()=="https://www.clearclinica.com/clear-clinica-overview/" || get_permalink()=="https://www.clearclinica.com/101-2/" || get_permalink()=="https://www.clearclinica.com/pricing/" || get_permalink()=="https://www.clearclinica.com/pricing/"  || get_permalink()=="https://www.clearclinica.com/contact/" || get_permalink()=="https://www.clearclinica.com/our-vision/" || get_permalink()=="https://www.clearclinica.com/" || get_permalink()=="https://www.clearclinica.com/customers-stories/" || get_permalink()=="https://www.clearclinica.com/clear-clinica-partners/" || get_permalink()=="https://www.clearclinica.com/our-team/" || get_permalink()=="https://www.clearclinica.com/pricing-new/"){
get_footer('new');
}
else{
 ?>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<!-- Footer Container -->
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="footer-container <?php echo $basix_options['footer_style'] ?>">

	<?php
		/* Above Footer Page Output */
		if (isset($basix_options['footer_page_output']) && ($basix_options['footer_page_output'])) {
			?>
			<div class="footer-shortcode">
				<div class="content-width">
					<?php
						$footer_query = new WP_Query(array('page_id' => $basix_options['footer_page_output']));
						while ($footer_query->have_posts()) :
							$footer_query->the_post();
							the_content();
						endwhile;
						wp_reset_postdata();
					?>
				</div>
			</div>
		<?php } ?>

	<?php if ($basix_options['footer_infobar_text'] !== '' && $basix_options['footer_infobar'] != FALSE) { ?>
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<!-- Footer Infobar -->
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<div class="footer-infobar <?php echo $basix_options['footer_infobar_color'] ?>" style="<?php if ($basix_options['footer_infobar_color'] == 'custom_color') { ?>background-color: <?php echo $basix_options['footer_infobar_custom_color'] ?>; <?php } ?><?php if ($basix_options['footer_infobar_color'] == 'custom_color') { ?>color: <?php echo $basix_options['footer_infobar_custom_text_color'] ?>; <?php } ?><?php if ($basix_options['footer_infobar_align']) { ?>text-align: <?php echo $basix_options['footer_infobar_align'] ?>; <?php } ?>">
			<div class="content-width">
				<!-- Text -->
				<?php echo $basix_options['footer_infobar_text'] ?>
			</div>
		</div>
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<!-- END Footer Infobar -->
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<?php } ?>

	<?php if ($widgets_exist == 'yes' || $basix_options['footer_lower_bar'] != FALSE) { ?>
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<!-- Footer -->
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<div class="footer <?php echo $basix_options['footer_style'] ?><?php if ($widgets_exist !== 'yes') { ?> no-widgets<?php } ?>">

			<?php if ($widgets_exist == 'yes') { ?>

				<div class="content-width">
					<div class="column-container">
						<?php if ($basix_options['footer_columns'] == '6') { ?>
							<!-- Four Columns -->
							<div class="column-one-sixth">
								<?php dynamic_sidebar('footer-col-1'); ?>
							</div>
							<div class="column-one-sixth">
								<?php dynamic_sidebar('footer-col-2'); ?>
							</div>
							<div class="column-one-sixth">
								<?php dynamic_sidebar('footer-col-3'); ?>
							</div>
							<div class="column-one-sixth">
								<?php dynamic_sidebar('footer-col-4'); ?>
							</div>
							<div class="column-one-sixth">
								<?php dynamic_sidebar('footer-col-5'); ?>
							</div>
							<div class="column-one-sixth">
								<?php dynamic_sidebar('footer-col-6'); ?>
							</div>
						<?php } ?>
						<?php if ($basix_options['footer_columns'] == '5') { ?>
							<!-- Four Columns -->
							<div class="column-one-fifth">
								<?php dynamic_sidebar('footer-col-1'); ?>
							</div>
							<div class="column-one-fifth">
								<?php dynamic_sidebar('footer-col-2'); ?>
							</div>
							<div class="column-one-fifth">
								<?php dynamic_sidebar('footer-col-3'); ?>
							</div>
							<div class="column-one-fifth">
								<?php dynamic_sidebar('footer-col-4'); ?>
							</div>
							<div class="column-one-fifth">
								<?php dynamic_sidebar('footer-col-5'); ?>
							</div>
						<?php } ?>
						<?php if ($basix_options['footer_columns'] == '4') { ?>
							<!-- Four Columns -->
							<div class="column-one-fourth">
								<?php dynamic_sidebar('footer-col-1'); ?>
							</div>
							<div class="column-one-fourth">
								<?php dynamic_sidebar('footer-col-2'); ?>
							</div>
							<div class="column-one-fourth">
								<?php dynamic_sidebar('footer-col-3'); ?>
							</div>
							<div class="column-one-fourth">
								<?php dynamic_sidebar('footer-col-4'); ?>
							</div>
						<?php } ?>
						<?php if ($basix_options['footer_columns'] == '3') { ?>
							<!-- Three Columns -->
							<div class="column-one-third">
								<?php dynamic_sidebar('footer-col-1'); ?>
							</div>
							<div class="column-one-third">
								<?php dynamic_sidebar('footer-col-2'); ?>
							</div>
							<div class="column-one-third">
								<?php dynamic_sidebar('footer-col-3'); ?>
							</div>
						<?php } ?>
						<?php if ($basix_options['footer_columns'] == '2') { ?>
							<!-- Two Columns -->
							<div class="column-one-half">
								<?php dynamic_sidebar('footer-col-1'); ?>
							</div>
							<div class="column-one-half">
								<?php dynamic_sidebar('footer-col-2'); ?>
							</div>
						<?php } ?>
						<?php if ($basix_options['footer_columns'] == '1') { ?>
							<!-- One Column -->
							<?php dynamic_sidebar('footer-col-1'); ?>
						<?php } ?>
					</div>
				</div>

			<?php } ?>

			<?php if ($basix_options['footer_lower_bar'] != FALSE) { ?>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<!-- Footer Navigation -->
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<div class="footer-lower-container center<?php if ($basix_options['footer_menu_style'] == 'solid') { ?> solid<?php } ?><?php if ($widgets_exist !== 'yes') { ?> no-widgets<?php } ?>">
					<div class="content-width footer-lower-inner<?php if ($basix_options['footer_menu_style'] == 'trans' && $widgets_exist == 'yes') { ?> trans<?php } ?>">

						<?php if (has_nav_menu('footer')) { ?>
							<?php wp_nav_menu(array(
								'menu_class'     => 'footer-lower',
								'theme_location' => 'footer'
							));
							?>
						<?php } ?>

						<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						<!-- Copyright -->
						<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						<div class="footer-copyright"<?php if (!(has_nav_menu('footer'))) { ?> style="float: left;"<?php } ?>>
							<?php echo $basix_options['footer_copyright'] ?>
						</div>
						<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						<!-- END Copyright -->
						<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

					</div>
				</div>
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
				<!-- END Footer Navigation -->
				<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<?php } ?>

		</div>
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<!-- END Footer -->
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<?php } ?>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Top of Page Link -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<a class="top-of-page-link" href="#"><i class="Basix-chevron-up"></i></a>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Top of Page Link -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

</div>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<!-- END Footer Container -->
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

</div>
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<!-- END Main Container -->
<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<?php wp_footer(); ?>
<?php if (isset($basix_options['custom_js']) && ($basix_options['custom_js'])) { ?>
<script>
	<?php echo $basix_options['custom_js'] ?>
</script>
<?php } ?>
<script type="text/javascript">
    adroll_adv_id = "5RG5HNC3RNGERKQLRDC4Y2";
    adroll_pix_id = "JHA4RF3E2BG7XG7H5PQGFM";
    (function () {
        var _onload = function(){
            if (document.readyState && !/loaded|complete/.test(document.readyState)){setTimeout(_onload, 10);return}
            if (!window.__adroll_loaded){__adroll_loaded=true;setTimeout(_onload, 50);return}
            var scr = document.createElement("script");
            var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
            scr.setAttribute('async', 'true');
            scr.type = "text/javascript";
            scr.src = host + "/j/roundtrip.js";
            ((document.getElementsByTagName('head') || [null])[0] ||
                document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
        };
        if (window.addEventListener) {window.addEventListener('load', _onload, false);}
        else {window.attachEvent('onload', _onload)}
    }());
</script>

</body>
</html>
<?php } ?>
