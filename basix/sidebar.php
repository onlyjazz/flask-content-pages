<?php
	/**
	 * Sidebar
	 */
?>
<?php if (is_page_template('template-page-left-sidebar.php')) { ?>
	<div class="column-one-fourth sidebar left">
		<?php
			dynamic_sidebar('sidebar-1');
		?>
	</div>
<?php } else { ?>
	<div class="column-one-fourth sidebar">
		<?php
			dynamic_sidebar('sidebar-1');
		?>
	</div>
<?php } ?>