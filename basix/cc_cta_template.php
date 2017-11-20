<?php /* Template Name: CTA template */ ?>
<?php
  get_header();
?>

<div id="page_101">

<div class="top_image">
  <?php
  $image = get_field('top_image');
  if( !empty($image) ): ?>
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
  <?php endif; ?>
</div>

<div class="top_section">
  <div class="top_title">
      <?php the_field('page_title'); ?>
  </div>
</div>

<div class="top_content">
  <div class="top_content_title cont_title">
     <?php the_field('top_content_title'); ?>
  </div>

  <div class="top_content_text">
    <?php the_field('top_content_text'); ?>
  </div>
</div>

<?php
    get_footer();
?>

