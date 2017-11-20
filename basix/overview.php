<?php /* Template Name: Overview Page */ ?>
<?php
  get_header();
?>

<div id="big_one">
  <div class="top_image">
    <?php

    $image = get_field('top_image');

    if( !empty($image) ): ?>

    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

  <?php endif; ?>
  </div>
  <div class="top_section">
    <div class="top_title">
      <p>
        <?php the_field('page_title'); ?>
      </p>
    </div>
  </div>

  <div class="content_section_1">
    <div class="s1_top">
      <div class="s1_top_img">
        <?php

        $image1 = get_field('s1_top_img');

        if( !empty($image1) ): ?>

	      <img src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>" />

       <?php endif; ?>
      </div>
      <div class="s1_top_content">
        <p class="cont_title"><?php the_field('top_content_title'); ?></p>
        <div class="inf_cont">
          <div class="cont_text">
          <?php the_field('top_content_1'); ?>
        </div>
        </div>
      </div>
    </div>
    <div class="s1_bot">
      <div class="cloud_sec">
        <div class="s1_bot_img1">
          <?php

          $image2 = get_field('s1_bot_img1');

          if( !empty($image2) ): ?>

	         <img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />

         <?php endif; ?>
        </div>
        <div class="s1_bot_content">
          <div class='cont_title'>
            <?php the_field('s1_bot_content_title'); ?>
          </div>
          <div class="cont_text">
            <?php the_field('s1_bot_content'); ?>
          </div>
        </div>
        <div class="s1_bot_img2">
          <?php

          $image3 = get_field('s1_bot_img2');

          if( !empty($image3) ): ?>

	         <img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>" />

         <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="content_section_2">

    <div class="s2_top">
      <div class="cloud_sec2">
        <div class="s2_bot_img2">
          <?php

$image4 = get_field('s2_bot_img2');

if( !empty($image4) ): ?>

	<img src="<?php echo $image4['url']; ?>" alt="<?php echo $image4['alt']; ?>" />

<?php endif; ?>
        </div>

        <div class="s2_top_content">
          <div class='cont_title'>
            <?php the_field('s2_top_title'); ?>
          </div>
          <div class="cont_text">
            <?php the_field('s2_top_content'); ?>
          </div>
        </div>
        <div class="s2_bot_img1">
          <?php

          $image5 = get_field('s2_bot_img1');

          if( !empty($image5) ): ?>

	         <img src="<?php echo $image5['url']; ?>" alt="<?php echo $image5['alt']; ?>" />

         <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="s2_bot">

      <div class="s2_bot_content">
        <p class="cont_title"><?php the_field('s2_bot_title'); ?></p>
        <div class="inf_cont">
          <div class="cont_text">
            <?php the_field('s2_bot_content'); ?>
          </div>
          <div class="s2_bot_img">
            <?php

            	   $image6 = get_field('s2_bot_img');

                       if( !empty($image6) ): ?>

            	   <img src="<?php echo $image6['url']; ?>" alt="<?php echo $image6['alt']; ?>" />

                       <?php endif; ?>
          </div>
        </div>

      </div>

    </div>

  </div>

  <div class="content_section_3">

    <div class="s3_top">
      <div class="cloud_sec3">
        <div class="s3_top_img2">
          <?php

          	   $image7 = get_field('s3_top_img2');

                     if( !empty($image7) ): ?>

          	   <img src="<?php echo $image7['url']; ?>" alt="<?php echo $image7['alt']; ?>" />

                     <?php endif; ?>
        </div>

        <div class="s3_top_content">
          <div class='cont_title'>
            <?php the_field('s3_top_title'); ?>
          </div>
          <div class="cont_text">
            <?php the_field('s3_top_content'); ?>
          </div>
        </div>
        <div class="s3_top_img1">
          <?php

          	   $image8 = get_field('s3_top_img1');

                     if( !empty($image8) ): ?>

          	   <img src="<?php echo $image8['url']; ?>" alt="<?php echo $image8['alt']; ?>" />

                     <?php endif; ?>
        </div>
      </div>
    </div>

  </div>

  <div class="content_section_4">

    <div class="s4_top">
      <div class="cloud_sec4">
        <div class="s4_top_img1">
          <?php

          	   $image9 = get_field('s4_top_img1');

                     if( !empty($image9) ): ?>

          	   <img src="<?php echo $image9['url']; ?>" alt="<?php echo $image9['alt']; ?>" />

                     <?php endif; ?>
        </div>
        <div class="s4_top_content">
          <div class='cont_title'>
            <?php the_field('s4_top_title'); ?>
          </div>
          <div class="cont_text">
            <?php the_field('s4_top_content'); ?>
          </div>
        </div>
        <div class="s4_top_img2">
          <?php

          	   $image10 = get_field('s4_top_img2');

                     if( !empty($image10) ): ?>

          	   <img src="<?php echo $image10['url']; ?>" alt="<?php echo $image10['alt']; ?>" />

                     <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="s4_bot">

      <div class="s4_bot_img">
        <?php

        	   $image11 = get_field('s4_bot_img');

                   if( !empty($image11) ): ?>

        	   <img src="<?php echo $image11['url']; ?>" alt="<?php echo $image11['alt']; ?>" />

                   <?php endif; ?>
      </div>
      <div class="s4_bot_content">
        <div class="cont_title"><?php the_field('s4_content_title'); ?></div>
        <div class="inf_cont">
          <div class="cont_text">
            <?php the_field('s4_content'); ?>
<br><!--<a href="<?php// the_field('try_demo_link'); ?>">Try our Demo!</a>-->
          </div>
        </div>
      </div>

    </div>

  </div>


<div class="try_demo">
  <div class="cta1">
  <!--HubSpot Call-to-Action Code -->
<span class="hs-cta-wrapper" id="hs-cta-wrapper-91fb7a6a-7517-4a03-a217-c27039d7eb3e">
    <span class="hs-cta-node hs-cta-91fb7a6a-7517-4a03-a217-c27039d7eb3e" id="hs-cta-91fb7a6a-7517-4a03-a217-c27039d7eb3e">
        <!--[if lte IE 8]><div id="hs-cta-ie-element"></div><![endif]-->
        <a href="http://cta-redirect.hubspot.com/cta/redirect/2198284/91fb7a6a-7517-4a03-a217-c27039d7eb3e" ><img class="hs-cta-img" id="hs-cta-img-91fb7a6a-7517-4a03-a217-c27039d7eb3e" style="border-width:0px;" src="https://no-cache.hubspot.com/cta/default/2198284/91fb7a6a-7517-4a03-a217-c27039d7eb3e.png"  alt="SEE PRICING"/></a>
    </span>
    <script charset="utf-8" src="https://js.hscta.net/cta/current.js"></script>
    <script type="text/javascript">
        hbspt.cta.load(2198284, '91fb7a6a-7517-4a03-a217-c27039d7eb3e', {});
    </script>
</span>
<!-- end HubSpot Call-to-Action Code -->

  </div>
</div>
</div>


<?php
  get_footer();
?>
