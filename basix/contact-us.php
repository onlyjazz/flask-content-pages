<?php /* Template Name:Contact Us Page */ ?>
<?php
  get_header();
?>

<div id="contact_page">

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

  <div class="contact_content">
    <div class="contact_row">

    <div class="contact_info">
      <div class="contact_about">
        <p>
          <?php the_field('contact_about'); ?>
        </p>
        <div class="about_text">
          <?php the_field('about_text'); ?>
        </div>
      </div>

      <div class="contact_basic_info">
        <div class="basic_title">
          <p>
            <?php the_field('basic_title'); ?>
          </p>
        </div>

        <div class="basic_text">
          <div class="hu">
              <strong><?php the_field('basic_text_1'); ?></strong><p><?php the_field('basic_phone_1'); ?></p>
          </div>
          <div class="">
              <strong><?php the_field('basic_text_2'); ?></strong><p><?php the_field('basic_address'); ?></p>
          </div>
          <!-- <div class="">
              <strong><?php the_field('basic_text_3'); ?></strong><p><?php the_field('basic_mail'); ?></p>
          </div> -->
        </div>
      </div>
    </div>

    <div class="contact_form">
      <div class="contact_form_row">
        <div class="contact_form_title">
          <?php the_field('form_title'); ?>
        </div>
        <div class="contact_form_text">
          <?php the_field('form_text'); ?>
        </div>
        <div class="contact_form_section">
          <!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({
    portalId: '2198284',
    formId: '42003d7c-d351-4757-98e9-8663cd31bcc3'
  });
</script>

        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="iframe-rwd maps">
    <style media="screen">
    .maps iframe{
      pointer-events: none;
    }
    </style>
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1238811.9645224086!2d35.4491371407243!3d30.949072591712763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1474876169682" width="1366" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <script type="text/javascript">
        $(document).ready(function() {
          console.log('asdad');
          $('.maps').click(function () {
            console.log('aziz');
          $('.maps iframe').css("pointer-events", "auto");
      });
      });

      </script>
      <style media="screen">

      .iframe-rwd  {
  position: relative;
  padding-bottom: 35.25%;
  padding-top: 30px;
  height: 0;
  overflow: hidden;
  }
  .iframe-rwd iframe {
  position: absolute;
  top: 0;
  left: 0;
  max-width: 1366px;
  width: 100%;
  height: 100%;
  }
  </style>











</div>


















<?php
  get_footer();
?>
