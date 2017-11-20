<?php
	/**
	 * Standard Post Content
	 */
?>
<?php
	/* Metabox Values */
	$show_featured_image = get_post_meta($post->ID, 'show_featured_image', TRUE);
	$show_featured_image_index = get_post_meta($post->ID, 'show_featured_image_index', TRUE);
?>
<!-- Content -->
<div class="blog-content">
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