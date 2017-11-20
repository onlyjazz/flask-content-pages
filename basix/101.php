<?php /* Template Name: 101 Page */ ?>
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



<div class="accord_section">

  <div class="accord_1 esi">
    <div class="havayi">


    <div class="user_acc">

      <div class="user_acc_img">
        <?php

        $image1 = get_field('user_acc_img');

        if( !empty($image1) ): ?>

        <img src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>" />

      <?php endif; ?>
      </div>

      <div class="acc_content">
        <div class="user_acc_title acc_title_font">
          <?php the_field('user_acc_title'); ?>
        </div>
        <div class="user_acc_short">
          <?php the_field('user_acc_short_text'); ?>
        </div>
        <div class="user_more myToggle mt0">
          <i class="fa fa-caret-down" aria-hidden="true"></i>
          more
        </div>
      </div>

    </div>

  </div>

    <div class="user_acc_info obshi">

      <?php the_field('user_acc_info'); ?>

    </div>

  </div>

  <div class="accord_2 esi">

    <div class="havayi">

      <div class="clinica_acc">

        <div class="clinica_content">
          <div class="clinica_acc_title acc_title_font">
            <?php the_field('clinica_acc_title'); ?>
          </div>
          <div class="clinica_acc_short">
            <?php the_field('clinica_acc_short_text'); ?>
          </div>
          <div class="clinica_more myToggle mt1">
            <i class="fa fa-caret-down" aria-hidden="true"></i>
            more
          </div>
        </div>

        <div class="clinica_acc_img">
          <?php

          $image2 = get_field('clinica_acc_img');

          if( !empty($image2) ): ?>

          <img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" />

        <?php endif; ?>
        </div>

      </div>

    </div>

    <div class="clinica_acc_info obshi">

      <?php the_field('clinica_acc_info'); ?>

    </div>

  </div>


  <div class="accord_3 esi">
    <div class="havayi">


    <div class="logic_acc">

      <div class="logic_acc_img">
        <?php

        $image3 = get_field('logic_acc_img');

        if( !empty($image3) ): ?>

        <img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>" />

      <?php endif; ?>
      </div>
      <div class="acc_content">
        <div class="logic_acc_title acc_title_font">
          <?php the_field('logic_acc_title'); ?>
        </div>
        <div class="logic_acc_short">
          <?php the_field('logic_acc_short_text'); ?>
        </div>
        <div class="logic_more myToggle mt2">
          <i class="fa fa-caret-down" aria-hidden="true"></i>
          more
        </div>
      </div>

    </div>

  </div>

    <div class="logic_acc_info obshi">

      <?php the_field('logic_acc_info'); ?>

    </div>

  </div>


</div>

</div>

<div class="bot_section">

  <div class="demo_section">
    <?php the_field('demo_section_text'); ?>
  </div>

  <div class="demo_demo">
    <div class="stu_cta">
    <!-- <a href="#">Try  DEMO</a> -->

    <!--HubSpot Call-to-Action Code -->
    <span class="hs-cta-wrapper" id="hs-cta-wrapper-52c2d274-040b-487e-ba4d-2768600c7492">
    <span class="hs-cta-node hs-cta-52c2d274-040b-487e-ba4d-2768600c7492" id="hs-cta-52c2d274-040b-487e-ba4d-2768600c7492">
    <!--[if lte IE 8]><div id="hs-cta-ie-element"></div><![endif]-->
    <a href="http://cta-redirect.hubspot.com/cta/redirect/2198284/52c2d274-040b-487e-ba4d-2768600c7492"  target="_blank" ><img class="hs-cta-img" id="hs-cta-img-52c2d274-040b-487e-ba4d-2768600c7492" style="border-width:0px;" src="https://no-cache.hubspot.com/cta/default/2198284/52c2d274-040b-487e-ba4d-2768600c7492.png"  alt="TRY DEMO"/></a>
    </span>
    <script charset="utf-8" src="https://js.hscta.net/cta/current.js"></script>
    <script type="text/javascript">
    hbspt.cta.load(2198284, '52c2d274-040b-487e-ba4d-2768600c7492', {});
    </script>
    </span>
    <!-- end HubSpot Call-to-Action Code -->
    </div>
  </div>

  <div class="partner_section">
    <div class="partner_title">
      <?php the_field('partner_section_title'); ?>
    </div>
    <div class="partner_text">
      <?php the_field('partner_section_text'); ?>
    </div>
    <div class="partners_logo">
      <div class="">
        <?php

        $image4 = get_field('partner_img_1');

        if( !empty($image4) ): ?>

        <img src="<?php echo $image4['url']; ?>" alt="<?php echo $image4['alt']; ?>" />

      <?php endif; ?>
      </div>
      <div class="">
        <?php

        $image5 = get_field('partner_img_2');

        if( !empty($image5) ): ?>

        <img src="<?php echo $image5['url']; ?>" alt="<?php echo $image5['alt']; ?>" />

      <?php endif; ?>
      </div>
      <div class="">
        <?php

        $image6 = get_field('partner_img_3');

        if( !empty($image6) ): ?>

        <img src="<?php echo $image6['url']; ?>" alt="<?php echo $image6['alt']; ?>" />

      <?php endif; ?>
      </div>
      <div class="">
        <?php

        $image7 = get_field('partner_img_4');

        if( !empty($image7) ): ?>

        <img src="<?php echo $image7['url']; ?>" alt="<?php echo $image7['alt']; ?>" />

      <?php endif; ?>
      </div>
    </div>
  </div>




</div>



</div>
<script type="text/javascript">
toggles=[false,false,false];




$(document).ready(function() {

  // toggle1=false;
  // toggle2=false;
  // toggle3=false;

  $('.obshi').hide();

  // $('.obshi').first().show();
  $('.myToggle').on("click", function(event) {
    $(this).parents('.esi').find('.obshi').toggle();
    var index = ($(this).index(".myToggle")).toString();
    // console.log(index);
    var className = "mt" + index;
    // console.log(setToggles());
    $(".myToggle").each(function(index) {
      var condition = $(this).hasClass(className);
      if (condition) {

        if (toggles[index]) {
          toggles[index] = false;
          // console.log($(this));
          $(this).html("<i class='fa fa-caret-down' aria-hidden='true'></i>more");
        }
        else {
          toggles[index] = true;
          // console.log($(this));
          $(this).html("<i class='fa fa-caret-up' aria-hidden='true'></i>less");
        }
      }
    });
  })

  $('.myToggle').first().trigger("click");

});



</script>

<?php
    get_footer();
?>
