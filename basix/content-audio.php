<?php
	/**
	 * Audio Post Content
	 */
?>
<?php
	/* Metabox Values */
	$show_featured_image = get_post_meta($post->ID, 'show_featured_image', TRUE);
	$show_featured_image_index = get_post_meta($post->ID, 'show_featured_image_index', TRUE);
	$audio_url = get_post_meta($post->ID, 'basix_post_audio_url', TRUE);

	/* Self-Hosted audio Embed Settings */
	if ($audio_url) {
		$audio_embed = array(
			'src'      => $audio_url,
			'width'    => 'auto',
			'loop'     => '',
			'autoplay' => '',
			'preload'  => 'none'
		);
	}
?>
<?php if (is_single()) { ?>
	<?php if ((!isset($show_featured_image)) OR ($show_featured_image == FALSE)) { ?>
		<?php if (has_post_thumbnail()) { ?>
			<!-- Image -->
			<div class="link_image">
				<?php the_post_thumbnail('medium'); ?>
			</div>
		<?php } ?>
	<?php } ?>
<?php } else { ?>
	<?php if ((!isset($show_featured_image_index)) OR ($show_featured_image_index == FALSE)) { ?>
		<?php if (has_post_thumbnail()) { ?>
			<!-- Link Image -->
			<a href="<?php esc_url(the_permalink()); ?>" class="link_image"><?php the_post_thumbnail('thumbnail'); ?></a>
		<?php } ?>
	<?php } ?>
<?php } ?>
<!-- Content -->
<div class="blog-content">
	<?php if ($audio_url) { ?>
		<!-- Self-Hosted audio -->
		<div class="self-hosted-audio-embed">
			<?php echo wp_audio_shortcode($audio_embed) ?>
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