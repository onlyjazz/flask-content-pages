<?php
	/**
	 * Comments
	 */
?>
<?php
	/* Check if password protected */
	if (post_password_required()) {
		/* Stop processing page if password protected */
		return;
	}
?>

<div id="comments">
	<?php if (have_comments()) { ?>
		<div class="divider"></div>

		<h3><?php comments_number(); ?></h3>

		<ul class="comment-list">
			<?php
				wp_list_comments(array(
					'style'       => 'ul',
					'short_ping'  => TRUE,
					'avatar_size' => 32,
				));
			?>
		</ul>

		<?php previous_comments_link(); ?>
		<?php next_comments_link(); ?>

		<?php if (!comments_open() && post_type_supports(get_post_type(), 'comments')) { ?>
			<div class="comments-closed">Comments are now closed.</div>
		<?php } ?>
	<?php } ?>

	<?php if (comments_open() && post_type_supports(get_post_type(), 'comments')) { ?>
		<div class="divider"></div>
		<?php comment_form(); ?>
	<?php } ?>

</div>