<?php /* Template Name: Home Page New */ ?>
<?php
  get_header();
?>


<div id="section_1">
<div class="title">
<div class="title_1">
<?php the_field('section_1_title_1'); ?>
</div>
<div class="title_2">
<span><?php the_field('section_1_title_2'); ?></span>
</div>
<div class="process">
<ul>
<li>
<?php the_field('section_1_content_1'); ?>
</li>
<li>
<?php the_field('section_1_content_2'); ?>
</li>
<li>
<?php the_field('section_1_content_3'); ?>
</li>
</ul>
<div class="video">
</div>
<div class="demo">
<!-- <a href="#">try demo</a> -->

<a class="cta_button href="https://www.clearclinica.com/electronic-data-capture-system-free-demo" title="TRY DEMO">TRY DEMO</a>

</div>
</div>
</div>
</div>

<div id="section_2">
<div class="benefits">
<h2><?php the_field('section_2_title'); ?></h2>
</div>
<div class="companies">
<div class="image">
  <?php

  $image1 = get_field('section_2_img_1');

  if( !empty($image1) ): ?>

  <img src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>" />

  <?php endif; ?>
</div>
<div class="text">
<h2><?php the_field('section_2_title_1'); ?></h2>
<p>
<?php the_field('section_2_content_1'); ?>
</p>
</div>
</div>
<div class="cors">
<div class="image">
  <?php

  $image2 = get_field('section_2_img_2');

  if( !empty($image2) ): ?>

  <img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />

  <?php endif; ?>
</div>
<div class="text">
<h2><?php the_field('section_2_title_2'); ?></h2>
<p>
<?php the_field('section_2_content_2'); ?>
</p>
</div>
</div>
<div class="investors">
<div class="image">
  <?php

  $image3 = get_field('section_2_img_3');

  if( !empty($image3) ): ?>

  <img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>" />

  <?php endif; ?>
</div>
<div class="text">
<h2><?php the_field('section_2_title_3'); ?></h2>
<p>
<?php the_field('section_2_content_3'); ?>
</p>
</div>
</div>
</div>

<div id="section_3">
<div class="costomer">
<div class="title_3">
<h2><?php the_field('section_3_title'); ?></h2>
</div>
<div class="partner_logo">
  <div class="logo_customer"> 
   <img src="https://www.clearclinica.com/wp-content/uploads/2016/10/ortho-logo.png" title="Orthospace"> 
  </div>
  <div class="logo_customer"> 
    <img src="https://www.clearclinica.com/wp-content/uploads/2016/10/logo-1.png" title="Vibrant Gastro">
  </div>
  <div class="logo_customer"> 
   <img src="https://www.clearclinica.com/wp-content/uploads/2016/09/11-2.png" title="Elminda">
  </div>
  <div class="logo_customer"> 
   <img src="https://www.clearclinica.com/wp-content/uploads/2016/09/10-3.png" title="Ornim"> 
  </div>
  <div class="logo_customer"> 
   <img src="https://www.clearclinica.com/wp-content/uploads/2016/09/9-3.png" title="Exalenz">
  </div>
  <div class="logo_customer">
   <img src="https://www.clearclinica.com/wp-content/uploads/2016/09/8-3.png" title="Ocon Medical">
  </div>
  <div class="logo_customer">
    <img src="https://www.clearclinica.com/wp-content/uploads/2017/04/logo_nucleix.jpg" title="Nucleix">
  </div>
  <div class="logo_customer">
    <img src="https://www.clearclinica.com/wp-content/uploads/2017/04/theranica_logo.png" title="Theranica Therapeutics">
 </div>

<div class="logo_customer">
  <img src="https://www.clearclinica.com/wp-content/uploads/2017/04/logo_dario.png" title="My Dario">
</div>

</div>

<div class="overview">
<div class="title_4">
<h2><?php the_field('overview_section_title'); ?></h2>
</div>
<div class="accordion-box">
<article class="accordion a1">
<div class="btn-title">
<div class="img_1">
  <?php

  $image8 = get_field('acord_1_img_1');

  if( !empty($image8) ): ?>

  <img src="<?php echo $image8['url']; ?>" alt="<?php echo $image8['alt']; ?>" />

  <?php endif; ?>
</div>
<div class="img_2">
  <?php

  $image9 = get_field('acord_1_img_2');

  if( !empty($image9) ): ?>

  <img src="<?php echo $image9['url']; ?>" alt="<?php echo $image9['alt']; ?>" />

  <?php endif; ?>
</div>
<div class="title_acc t1">
<span><?php the_field('acord_1_title'); ?></span>
</div>
</div>
<div class="text-acc">
<p>
<?php the_field('acord_1_text'); ?>
</p>
</div>
</article>
<article class="accordion a2">
<div class="btn-title">
<div class="img_3">
  <?php

  $image10 = get_field('acord_2_img_1');

  if( !empty($image10) ): ?>

  <img src="<?php echo $image10['url']; ?>" alt="<?php echo $image10['alt']; ?>" />

  <?php endif; ?>
</div>
<div class="img_4">
  <?php

  $image11 = get_field('acord_2_img_2');

  if( !empty($image11) ): ?>

  <img src="<?php echo $image11['url']; ?>" alt="<?php echo $image11['alt']; ?>" />

  <?php endif; ?>
</div>
<div class="title_acc t2">
<span><?php the_field('acord_2_title'); ?></span>
</div>
</div>
<div class="text-acc">
<p>
<?php the_field('acord_2_text'); ?>
</p>
</div>
</article>
<article class="accordion a3">
<div class="btn-title">
<div class="img_5">
  <?php

  $image12 = get_field('acord_3_img_1');

  if( !empty($image12) ): ?>

  <img src="<?php echo $image12['url']; ?>" alt="<?php echo $image12['alt']; ?>" />

  <?php endif; ?>
</div>
<div class="img_6">
  <?php

  $image13 = get_field('acord_3_img_2');

  if( !empty($image13) ): ?>

  <img src="<?php echo $image13['url']; ?>" alt="<?php echo $image13['alt']; ?>" />

  <?php endif; ?>
</div>
<div class="title_acc t3">
<span><?php the_field('acord_3_title'); ?></span>
</div>
</div>
<div class="text-acc">
<p>
<?php the_field('acord_3_text'); ?>
</p>
</div>
</article>
<article class="accordion a4">
<div class="btn-title">
<div class="img_7">
  <?php

  $image14 = get_field('acord_4_img_1');

  if( !empty($image14) ): ?>

  <img src="<?php echo $image14['url']; ?>" alt="<?php echo $image14['alt']; ?>" />

  <?php endif; ?>
</div>
<div class="img_8">
  <?php

  $image15 = get_field('acord_4_img_2');

  if( !empty($image15) ): ?>

  <img src="<?php echo $image15['url']; ?>" alt="<?php echo $image15['alt']; ?>" />

  <?php endif; ?>
</div>
<div class="title_acc t4">
<span><?php the_field('acord_4_title'); ?></span>
</div>
</div>
<div class="text-acc">
<p>
<?php the_field('acord_4_text'); ?>
</p>
</div>
</article>
<article class="accordion a5">
<div class="btn-title">
<div class="img_9">
  <?php

  $image16 = get_field('acord_5_img_1');

  if( !empty($image16) ): ?>

  <img src="<?php echo $image16['url']; ?>" alt="<?php echo $image16['alt']; ?>" />

  <?php endif; ?>
</div>
<div class="img_10">
  <?php

  $image17 = get_field('acord_5_img_2');

  if( !empty($image17) ): ?>

  <img src="<?php echo $image17['url']; ?>" alt="<?php echo $image17['alt']; ?>" />

  <?php endif; ?>
</div>
<div class="title_acc t5">
<span><?php the_field('acord_5_title'); ?></span>
</div>
</div>
<div class="text-acc">
<p>
<?php the_field('acord_5_text'); ?>
</p>
</div>
</article>
</div>
</div>
</div>

<div id="section_4">
<div class="title_5">
<h2><?php the_field('section_4_title'); ?></h2>
</div>
<div class="ebook_text">
<div class="ebook">
<a href="<?php the_field('book_link'); ?>"><?php

$image18 = get_field('book_img');

if( !empty($image18) ): ?>

<img src="<?php echo $image18['url']; ?>" alt="<?php echo $image18['alt']; ?>" />

<?php endif; ?>
</a>
</div>
<div class="textttt">
<span>
<?php the_field('book_title'); ?>
</span>
<?php the_field('book_text'); ?>
<div class="download">
<!-- <a href="#">download</a> -->

<!--Inline form -->
<div class="_form_2"></div><script src="https://clearclinica.activehosted.com/f/embed.php?id=2" type="text/javascript" charset="utf-8"></script>
<!-- end Inline form Code -->





</div>
</div>
</div>
</div>


<?php
  get_footer();
?>
