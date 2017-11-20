<?php /* Template Name: Our Team Page */ ?>
<?php
  get_header();
?>

<div id="team_page">

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

  <div class="team_section">

    <div class="team_title">
      <?php the_field('team_title'); ?>
    </div>

    <div class="team_1">

      <div class="member">
        <div class="hover">
          <p class="m_name"><?php the_field('member_1'); ?></p>
          <p class="m_position"><?php the_field('member_1_pos'); ?></p>
        </div>
        <div class="member_pic">
          <?php

$image1 = get_field('member_1_pic');

if( !empty($image1) ): ?>

<img src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>" />

<?php endif; ?>
        </div>
        <div class="member_info">
          <div class="member_about">
            <?php the_field('member_1_info'); ?>
            <p class="about_more">
              <?php the_field('member_1_info_1'); ?>
            </p>
          </div>
          <div class="more_btn">
            see more
          </div>
        </div>
      </div>

      <div class="member">
        <div class="hover">
          <p class="m_name"><?php the_field('member_2'); ?></p>
          <p class="m_position"><?php the_field('member_2_pos'); ?></p>
        </div>
        <div class="member_pic">
          <?php

$image2 = get_field('member_2_pic');

if( !empty($image2) ): ?>

<img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />

<?php endif; ?>
        </div>
        <div class="member_info">
          <div class="member_about">
            <?php the_field('member_2_info'); ?>
            <p class="about_more">
              <?php the_field('member_2_info_2'); ?>
            </p>
          </div>
          <div class="more_btn">
            see more
          </div>
        </div>
      </div>

      <div class="member">
        <div class="hover">
          <p class="m_name"><?php the_field('member_3'); ?></p>
          <p class="m_position"><?php the_field('member_3_pos'); ?></p>
        </div>
        <div class="member_pic">
          <?php

  $image3 = get_field('member_3_img');

  if( !empty($image3) ): ?>

  <img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>" />

  <?php endif; ?>
        </div>
        <div class="member_info">
          <div class="member_about">
            <?php the_field('member_3_info'); ?>
            <p class="about_more">
              <?php the_field('member_3_info_3'); ?>
            </p>
          </div>
          <div class="more_btn">
            see more
          </div>
        </div>
      </div>

    </div>

    <div class="team_2">

      <div class="member_2">
        <div class="hover">
          <p class="m_name"><?php the_field('member_4'); ?></p>
          <p class="m_position"><?php the_field('member_4_pos'); ?></p>
        </div>
      <div class="member_pic">
        <?php

        $image4 = get_field('member_4_img');

        if( !empty($image4) ): ?>

        <img src="<?php echo $image4['url']; ?>" alt="<?php echo $image4['alt']; ?>" />

        <?php endif; ?>
      </div>
      <div class="member_info">
        <div class="member_about">
          <?php the_field('member_4_info'); ?>
          <p class="about_more">
            <?php the_field('member_4_info_4'); ?>
          </p>
        </div>
        <div class="more_btn">
          see more
        </div>
      </div>
      </div>

      <div class="member_2">
        <div class="hover">
          <p class="m_name"><?php the_field('member_5'); ?></p>
          <p class="m_position"><?php the_field('member_5_pos'); ?></p>
        </div>
      <div class="member_pic">
        <?php

        $image5 = get_field('member_5_img');

        if( !empty($image5) ): ?>

        <img src="<?php echo $image5['url']; ?>" alt="<?php echo $image5['alt']; ?>" />

        <?php endif; ?>
      </div>
      <div class="member_info">
        <div class="member_about">
          <?php the_field('member_5_info'); ?>
          <p class="about_more">
            <?php the_field('member_5_info_5'); ?>
          </p>
        </div>
        <div class="more_btn">
          see more
        </div>
      </div>

      </div>

    </div>

  </div>

  <div class="about_content">

    <div class="about_content_1">
      <?php the_field('about_content_1'); ?>
    </div>

    <div class="about_content_2">
      <?php the_field('about_content_2'); ?>
    </div>

  </div>


  <div class="form_section">

    <div class="form_title">
      <?php the_field('form_title'); ?>
    </div>
    <div class="form_content">
      <?php the_field('form_content'); ?>
    </div>

    <div class="asuma_form">


      <!--[if lte IE 8]>
      <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
      <![endif]-->
      <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
      <script>
        hbspt.forms.create({
          css: '',
          portalId: '2198284',
          formId: '938fe192-cc7f-4104-a6a5-46218a5d1112'
        });
      </script>


    </div>

  </div>












</div>

<script type="text/javascript">
  $(document).ready(function() {
    var toggle = false;
    $(".more_btn").click(function () {
      $(this).siblings('.member_about').find('.about_more').toggle();
      if (toggle) {
        $(this).text("see more");
        toggle=false;
      } else {
        $(this).text("see less");
        toggle=true;
      }

    });
  });

</script>


<?php
  get_footer();
?>
