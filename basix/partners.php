<?php /* Template Name: Partners Page */ ?>
<?php
  get_header();
?>

  <div id="customer_page" class="partners">

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
        <?php the_field('top_1_text'); ?>
      </p>
      <p>
        <?php the_field('top_2_text'); ?>
      </p>
      <p>
        <?php the_field('top_3_text'); ?>
      </p>
    </div>

    <div class="partner_1">

      <div class="s1_top">
        <div class="s1_top_img">
          <a href="<?php the_field('partner_1_link'); ?>" target="_blank">
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
          <a href="<?php the_field('partner_2_link'); ?>" target="_blank">
          <?php

$image2 = get_field('partner_2_img');

if( !empty($image2) ): ?>

<img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />

<?php endif; ?>
        </a>
        </div>

      </div>
    </div>

    <div class="partner_1 aa">

      <div class="s1_top">
        <div class="s1_top_img">
          <a href="<?php the_field('pertner_3_link'); ?>" target="_blank">
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

  </div>

  <?php
    get_footer();
  ?>
