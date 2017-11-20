<?php
 // Template: Single RiskApp page Stretched 
 //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>

<?php get_header(); ?>

<?php if (have_posts()) { ?>
	<?php while (have_posts()) {
		the_post(); ?>

		<div class="main-content">
<?php 
the_content(); 
?>
		</div>

	<?php } // End while ?>
<?php } // End if ?>
<?php get_footer(); ?>
