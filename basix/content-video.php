<?php
	/**
	 * Video Post Content
	 */
?>
<?php
	/* Metabox Values */
	$show_featured_image = get_post_meta($post->ID, 'show_featured_image', TRUE);
	$show_featured_image_index = get_post_meta($post->ID, 'show_featured_image_index', TRUE);
	$video_url = get_post_meta($post->ID, 'basix_post_video_url', TRUE);
	$video_external_url = get_post_meta($post->ID, 'basix_post_video_external_url', TRUE);

	/* Self-Hosted Video Embed Settings */
	if ($video_url) {
		$video_embed = array(
			'src'      => $video_url,
			'width'    => '1100',
			'loop'     => '',
			'autoplay' => '',
			'preload'  => '' // leave empty for yes, 'none' for no
		);
	}
?>
<!-- Video Post Format Content -->
<div class="blog-content">
	<?php if ($video_url) { ?>
		<!-- Self-Hosted Video -->
		<div class="self-hosted-video-embed">
			<?php echo wp_video_shortcode($video_embed) ?>
		</div>
	<?php } ?>
	<?php if ($video_external_url) {
		global $wp_embed;
		$video_external_embed = $wp_embed->run_shortcode('[embed]' . $video_external_url . '[/embed]'); ?>
		<!-- External Video -->
		<div class="external-video-embed-wrapper">
			<div class="external-video-embed">
				<?php echo $video_external_embed ?>
			</div>
		</div>
	<?php } ?>
	<?php if (is_single()) { ?>
		<?php the_content(); ?>
	<?php } else { ?>
		<?php if ($post->post_excerpt) { ?>
			<?php the_excerpt(); ?>
		<?php } else { ?>
			<?php the_content(); ?>
		<?php } ?>
	<?php } ?>
</div>
<?php if (!is_single()) { ?>
	<!-- Read More Button -->
	<a href="<?php esc_url(the_permalink()); ?>" class="button accent read-more"><?php echo __('Continue Reading','basix-td') ?></a>
<?php } ?>