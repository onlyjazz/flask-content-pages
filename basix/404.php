<?php
	/**
	 * 404 Error - Not Found Page
	 */
?>
<?php get_header(); ?>
	<div class="main-content">
		<?php if ($basix_options['page_title_style'] == 'accent_color' || $basix_options['page_title_style'] == 'main_color' || $basix_options['page_title_style'] == 'custom_color') { ?>
			<div class="title-container<?php if ($basix_options['page_title_style'] == 'accent_color') { ?> accent<?php } ?><?php if ($basix_options['page_title_style'] == 'main_color') { ?> main<?php } ?><?php if ($basix_options['page_title_style'] == 'custom_color') { ?> custom<?php } ?>">
				<div class="content-width">
					<h1><?php echo __('Page Not Found', 'basix-td'); ?></h1>
				</div>
			</div>
		<?php } ?>
		<div class="main-content-inner content-width<?php if ($basix_options['page_title_style'] == 'accent_color' || $basix_options['page_title_style'] == 'main_color' || $basix_options['page_title_style'] == 'custom_color') { ?> title-block<?php } ?>">
			<?php if ($basix_options['page_title_style'] == 'bordered') { ?>
				<div class="error-404-container">
					<i class="FontAwesome-exclamation-circle"></i>
					<h1><?php echo __('Page Not Found', 'basix-td'); ?></h1>
					<p><?php echo __('Sorry but the page you have been directed<br> to cannot be found.', 'basix-td'); ?></p>
				</div>
			<?php } ?>
		</div>
	</div>
<?php get_footer(); ?>