<?php /* Template Name: Pricing Page */ ?>
<?php
  get_header();
?>


<div id="pricing_page">

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


  <div class="pricing_section">

    <div class="pricing_title_text">
      <?php the_field('pricing_title_text'); ?>
    </div>


    <div class="pricing_rows">

      <div class="pricing_fluid">
        <div class="klor">

        </div>
        <div class="pricing_head">
          <p>
            <?php the_field('pricing_row_1_title'); ?>
          </p>
        </div>
        <div class="pricing_body">
          <?php

          // check if the repeater field has rows of data
          if( have_rows('pricing_row_1_repeater') ):

           	// loop through the rows of data
              while ( have_rows('pricing_row_1_repeater') ) : the_row();

                  // display a sub field value ?>
                  <p>
                  <?php   the_sub_field('pricing_1_text'); ?>
                  </p>
          <?php
              endwhile;

          else :

              // no rows found

          endif;

          ?>
        </div>
        <div class="call_butoni">
          <a href="<?php the_field('pricing_row_1_button_link'); ?>">Call</a>
        </div>
      </div>

      <div class="pricing_fluid sev">
        <div class="klor">

        </div>
        <div class="pricing_head">
          <p>
            <?php the_field('pricing_row_2_title'); ?>
          </p>
        </div>
        <div class="pricing_body">
          <?php

          // check if the repeater field has rows of data
          if( have_rows('pricing_row_2_repeater') ):

            // loop through the rows of data
              while ( have_rows('pricing_row_2_repeater') ) : the_row();

                  // display a sub field value ?>
                  <p>
                  <?php   the_sub_field('pricing_2_text'); ?>
                  </p>
          <?php
              endwhile;

          else :

              // no rows found

          endif;

          ?>
        </div>
        <div class="call_butoni">
          <a href="<?php the_field('pricing_row_2_button_link'); ?>">Call</a>
        </div>
      </div>

      <div class="pricing_fluid">
        <div class="klor">

        </div>
        <div class="pricing_head">
          <p>
            <?php the_field('pricing_row_3_title'); ?>
          </p>
      </div>
        <div class="pricing_body">
          <?php

          // check if the repeater field has rows of data
          if( have_rows('pricing_row_3_repeater') ):

            // loop through the rows of data
              while ( have_rows('pricing_row_3_repeater') ) : the_row();

                  // display a sub field value ?>
                  <p>
                  <?php   the_sub_field('pricing_3_text'); ?>
                  </p>
          <?php
              endwhile;

          else :

              // no rows found

          endif;

          ?>
        </div>
        <div class="call_butoni">
          <a href="<?php the_field('pricing_row_3_button_link'); ?>">Call</a>
        </div>
      </div>

      <div class="pricing_fluid">
        <div class="klor">

        </div>
        <div class="pricing_head">
          <p><?php the_field('pricing_row_3_title'); ?></p>
        </div>
        <div class="pricing_body">
          <?php

          // check if the repeater field has rows of data
          if( have_rows('pricing_row_4_repeater') ):

            // loop through the rows of data
              while ( have_rows('pricing_row_4_repeater') ) : the_row();

                  // display a sub field value ?>
                  <p>
                  <?php   the_sub_field('pricing_4_text'); ?>
                  </p>
          <?php
              endwhile;

          else :

              // no rows found

          endif;

          ?>
        </div>
        <div class="call_butoni">
          <a href="<?php the_field('pricing_row_4_button_link'); ?>">Call</a>
        </div>
      </div>


    </div>




  </div>















</div>

<?php
  get_footer();
?>
