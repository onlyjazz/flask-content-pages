<?php /* Template Name: Customer stories Page */ ?>
<?php
  get_header();
?>

  <div id="customer_page">

    <div class="top_image">
      <?php

$image = get_field('top_background');

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

    <div class="top_content_section">
      <p>
        <?php the_field('top_text_1'); ?>
      </p>
      <p>
        <?php the_field('top_text_2'); ?>
      </p>
    </div>

    <div class="partner_1">

      <div class="s1_top">
        <div class="s1_top_img">
          <a href="http://www.ornim.com/" target="_blank">
          <?php

          $image1 = get_field('partner_1_img');

          if( !empty($image1) ): ?>

          <img src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>" />

        <?php endif; ?>
        </a>
        </div>
        <div class="s1_top_content">
          <p class="cont_title"><?php the_field('partner_1_title'); ?></p>
          <div class="inf_cont">
            <p class="cont_text">
              <?php the_field('partner_1_info'); ?>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="partner_2 bb">
      <div class="s2_bot">

        <div class="s2_bot_content">
          <p class="cont_title"><?php the_field('partner_2_title'); ?></p>
          <div class="inf_cont">
            <p class="cont_text">
            <?php the_field('partner_2_info'); ?>
            </p>
          </div>
        </div>
        <div class="s2_bot_img">
          <a href="http://www.oconmed.com/" target="_blank">
          <?php

$image2 = get_field('partner_2_img');

if( !empty($image2) ): ?>

<img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />

<?php endif; ?>
</a>
          <p>
            Medical Ltd.
          </p>
        </div>

      </div>
    </div>

    <div class="partner_1 aa">

      <div class="s1_top">
        <div class="s1_top_img">
          <a href="http://www.exalenz.com/" target="_blank">
          <?php

$image3 = get_field('partner_3_img');

if( !empty($image3) ): ?>

<img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>" />

<?php endif; ?>
</a>
        </div>
        <div class="s1_top_content">
          <p class="cont_title"><?php the_field('partner_3_title'); ?></p>
          <div class="inf_cont">
            <p class="cont_text">
    <?php the_field('partner_3_info'); ?>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="partner_2">
      <div class="s2_bot">

        <div class="s2_bot_content">
          <p class="cont_title"><?php the_field('partner_4_title'); ?></p>
          <div class="inf_cont">
            <p class="cont_text">
              <?php the_field('partner_4_info'); ?>
            </p>
          </div>
        </div>
        <div class="s2_bot_img">
          <a href="http://elminda.com/" target="_blank">
          <?php

$image4 = get_field('partner_4_img');

if( !empty($image4) ): ?>

<img src="<?php echo $image4['url']; ?>" alt="<?php echo $image4['alt']; ?>" />

<?php endif; ?>
</a>
        </div>

      </div>
    </div>

    <div class="partner_1 cc">

      <div class="s1_top">
        <div class="s1_top_img">
          <a href="http://orthospace.co.il/" target="_blank">
          <?php

          $image5 = get_field('partner_5_img');

          if( !empty($image5) ): ?>

          <img src="<?php echo $image5['url']; ?>" alt="<?php echo $image5['alt']; ?>" />

        <?php endif; ?>
        </a>
        </div>
        <div class="s1_top_content">
          <p class="cont_title"><?php the_field('partner_5_title'); ?></p>
          <div class="inf_cont">
            <p class="cont_text">
              <?php the_field('partner_5_info'); ?>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="partner_2">
      <div class="s2_bot">

        <div class="s2_bot_content">
          <p class="cont_title"><?php the_field('partner_6_title'); ?></p>
          <div class="inf_cont">
            <p class="cont_text">
              <?php the_field('partner_6_info'); ?>
            </p>
          </div>
        </div>
        <div class="s2_bot_img">
          <a href="http://www.vibrantgastro.com/" target="_blank">
          <?php

$image6 = get_field('partner_6_img');

if( !empty($image6) ): ?>

<img src="<?php echo $image6['url']; ?>" alt="<?php echo $image6['alt']; ?>" />

<?php endif; ?>
</a>
        </div>

      </div>
    </div>

  </div>

  <?php
    get_footer();
  ?>
