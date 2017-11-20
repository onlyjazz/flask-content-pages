<?php /* Template Name: Vision Page */ ?>
<?php
  get_header();
?>

<div id="vision_page">

  <div class="top_image">
    <?php

    $image = get_field('top_background_image');

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

  <div class="content_montent">

  <div class="content_top_section">
    <div class="">
      <?php the_field('top_content_1'); ?>
    </div>
    <div class="">
      <?php the_field('top_content_2'); ?>
    </div>
    <div class="">
      <?php the_field('top_content_3'); ?>
    </div>
  </div>




  <div class="mid_section">
    <div class="row1">
      <div class="flex1">
        <?php the_field('content_1_1'); ?>
      </div>
      <div class="flex2">
        <?php the_field('content_1_2'); ?>
      </div>
    </div>

    <div class="row1-mobile">
      <div class="flex2-mobile">
        <?php the_field('content_1_2'); ?>
      </div>
    </div>


    <div class="row2">
      <div class="flex3">
        <?php the_field('content_2'); ?>
      </div>
    </div>

    <div class="row3">
      <div class="flex4">
          <?php the_field('content_3'); ?>
      </div>
    </div>

    <div class="row4">
      <div class="flex5">
          <?php the_field('content_4'); ?>
      </div>
    </div>

    <div class="row5">
      <div class="flex6">
        <?php the_field('content_5'); ?>
      </div>
    </div>

  </div>



  <div class="bot_section">

    <div class="eh">
<div class="hehe">


      <div class="hamar1">

        <div class="no1">
          <div class="hamar_img">
            <?php

            $image1 = get_field('bot_img_1');

            if( !empty($image1) ): ?>

            <img src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>" />

          <?php endif; ?>

          </div>
          <div class="hamar_text">
            <?php the_field('bot_text_1'); ?>
          </div>
        </div>

        <div class="no2">
          <span class="border-image-left"></span>
          <div class="hamar_img">
            <?php

            $image2 = get_field('bot_img_2');

            if( !empty($image2) ): ?>

            <img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />

          <?php endif; ?>

          </div>
          <div class="hamar_text">
            <?php the_field('bot_text_2'); ?>
          </div>
        </div>
      </div>

    <div class="hamar2">

      <div class="no3">
        <span class="border-image-right"></span>
        <div class="hamar_img">
          <?php

          $image3 = get_field('bot_img_3');

          if( !empty($image3) ): ?>

          <img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>" />

        <?php endif; ?>

        </div>
        <div class="hamar_text">
          <?php the_field('bot_text_3'); ?>
        </div>
      </div>

      <div class="no4 nadpis">
        <div class="">
          <?php the_field('bot_title'); ?>
        </div>
      </div>

      <div class="no5">
        <span class="border-image-right"></span>
        <div class="hamar_img">
          <?php

          $image4 = get_field('bot_img_4');

          if( !empty($image4) ): ?>

          <img src="<?php echo $image4['url']; ?>" alt="<?php echo $image4['alt']; ?>" />

        <?php endif; ?>

        </div>
        <div class="hamar_text">
          <?php the_field('bot_text_4'); ?>
        </div>
      </div>

    </div>

    <div class="hamar3">

      <div class="no6">
        <span class="border-image-left"></span>
        <div class="hamar_img">
          <?php

          $image5 = get_field('bot_img_5');

          if( !empty($image5) ): ?>

          <img src="<?php echo $image5['url']; ?>" alt="<?php echo $image5['alt']; ?>" />

        <?php endif; ?>
        </div>
        <div class="hamar_text">
          <?php the_field('bot_text_5'); ?>
        </div>
      </div>

      <div class="no7">
        <span class="border-image-right"></span>
        <div class="hamar_img">
          <?php

          $image6 = get_field('bot_img_6');

          if( !empty($image6) ): ?>

          <img src="<?php echo $image6['url']; ?>" alt="<?php echo $image6['alt']; ?>" />

        <?php endif; ?>

        </div>
        <div class="hamar_text">
          <?php the_field('bot_text_6'); ?>
        </div>
      </div>

      <div class="no8">
        <span class="border-image-left"></span>
        <div class="hamar_img">
          <?php

          $image7 = get_field('bot_img_7');

          if( !empty($image7) ): ?>

          <img src="<?php echo $image7['url']; ?>" alt="<?php echo $image7['alt']; ?>" />

        <?php endif; ?>
        </div>
        <div class="hamar_text">
          <?php the_field('bot_text_7'); ?>
        </div>
      </div>

    </div>

</div>

</div>

  </div>

</div>

</div>

<?php
  get_footer();
?>
