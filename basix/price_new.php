<?php /* Template Name: Pricing Latest */ ?>
<?php
get_header();
?>

<div class="top_image">
    <?php

    $image = get_field('new_image_pricing');

    if( !empty($image) ): ?>

        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

    <?php endif; ?>
</div>


<div id="pricing-content" style="margin:0 auto;">

	<p class="new-pricing-text">
	    <?php the_field('page_title'); ?>
	</p>

	<!--[if lte IE 8]>
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
	<![endif]-->
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
	<script>
	  hbspt.forms.create({
	    portalId: '2198284',
	    formId: '6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518'
	  });
	</script>



	<div class="edit_top">
	<span class="edit_top_text">Estimate</span>
    <div class="edit_pricing">
			<div class="edit_all"><a href="#" class="edit_forms_pricing"><i class="fa fa-pencil" aria-hidden="true"></i> edit</a></div>
            <span class="edit_firstname"></span>
            <span class="edit_lastname"></span>
            <span class="edit_position"></span>
            <span class="edit_number"></span>
            <span class="edit_study"></span>
            <span class="edit_over"></span>
            <span class="edit_select"></span>
            <span class="edit_company"></span>
            <!-- <span class="edit_industry"></span> -->
    </div>
	</div>



</div>

<div class="select1 selected-radiobutton" name="number_of_unique_crf_forms">
	 <span class="select_dif">Number of unique CRF forms <span class="arrow"> <i class="fa fa-angle-down" aria-hidden="true"></i> </span></span>
	<div class="radio-select radio-select-def" class="sad">
	</div>
</div>



<div class="select2 selected-radiobutton">
<span class="select_dif">Length of study (in months) <span class="arrow"> <i class="fa fa-angle-down" aria-hidden="true"></i> </span></span>
<div class="radio-select-2 radio-select-def"></div>
</div>


<div class="select3 selected-radiobutton">
	<span class="select_dif">Number of studies planned over next 2 years <span class="arrow"> <i class="fa fa-angle-down" aria-hidden="true"></i> </span></span>
	<div class="radio-select-3 radio-select-def"></div>
</div>



<div class="select4 selected-radiobutton">
	<span class="select_dif">Clinical Trial Type <span class="arrow"> <i class="fa fa-angle-down" aria-hidden="true"></i> </span></span>
	<div class="radio-select-4 radio-select-def">
	</div>
</div>


<div class="select5 selected-radiobutton">
	<span class="select_dif">Which one describes you best? <span class="arrow"> <i class="fa fa-angle-down" aria-hidden="true"></i> </span></span>
	<div class="radio-select-5 radio-select-def">
	</div>
</div>

<div id="footer_price">
    <span class="footer_text">
        © Copyright Clear Clinica.
    </span>
</div>

<style>


    @font-face {
        font-family: MyriadPro-Regular;
        src: url("/wp-content/themes/basix/fonts/MyriadPro-Regular.otf");
    }

    @font-face {
        font-family:  OpenSans-Regular;
        src: url("/wp-content/themes/basix/fonts/OpenSans-Regular.ttf");
    }

    body{
          overflow-x: hidden;
    }

    .actions{display:none;}
    input.hs-input{box-shadow: none;}
		.arrow{float:right;}

    label input[type="radio"] {
      position: absolute;
      display: none;
    }
	.selected-option-default { pointer-events: none; }

	.openmenu{
		width:100%;
		position:absolute;
		left:0%;
	}

  .hs-form-radio:hover{
      color:#ffffff !important;
      background:#c7c7c7;
  }

  .hs-form-radio:hover label{
    color:#fff;
  }
  .hs-form .inputs-list{
    padding-left: 0 !important;
  }

	#exprad{
		position:absolute;
		width:76%;
		display:none;
	}

	.select1, .select2, .select3, .select4, .select5{
		display:none;
		width:94%;
		float:left;
		color: #b4b4b4;
		font-size: 14px;
		font-family: MyriadPro-Regular;
	}


	.radio-select-5, .radio-select-4, .radio-select-3, .radio-select-2, .radio-select{
		width:250px;
		height:auto;
		float:none;
	}


	.hs_number_of_unique_crf_forms>.input>select, .hs_length_of_study_in_months_>.input>select,
	.hs_number_of_studies_planned_over_next_2_years>.input>select, .hs_clinical_trial_type>.input>select{
		display:none;
	}




	.select_dif{
		display: block;
		padding: 10px 0;
		border-bottom: 1px solid #cccccc;
	}

	.open{
		display:block;
		width:100%;
		border:1px solid #1b99de;
		padding:0 0 10px 0;
	}

	.option-select:hover{
		background:#1b99de;
		color:#fff;
	}


    #Footer{
      display:none;
    }

	.hs-form>div:nth-child(6) {
		width: 100%;
		float: left;
		margin-top: 0;
	}

    select:focus, input:focus{
       outline-color:transparent!important;
    }

    input:-webkit-autofill{
      background-color: #fff !important;
    }

    .email_label{
      display: block;
      width: 100%;
      position: absolute;
      top: 18px;
      font-size: 14px;
      font-family: MyriadPro-Regular;
      text-align: left;
      color:#aaabac;
      font-weight: 100;
    }

    .emailTitle{
      font-size: 18px;
      font-family: MyriadPro-Regular;
      font-weight: initial;
      color: #3f3f3f;
      position: relative;
      display: block;
      top: 104px;
      width: 43%;
      left: 45.7%;
    }


    #company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder, #industry-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5::-webkit-input-placeholder,  #email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5::-webkit-input-placeholder, #firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder, #lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder{ /* Chrome/Opera/Safari */
      color: #b4b4b4;
      font-size: 14px;
      font-family: MyriadPro-Regular;
    }


    #company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-moz-placeholder, #industry-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5::-moz-placeholder, #email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5::-moz-placeholder, #firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder, #lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder { /* Firefox 19+ */
      color: #b4b4b4;
      font-size: 14px;
      font-family: MyriadPro-Regular;
    }
    #company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518:-ms-input-placeholder, #industry-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5:-ms-input-placeholder, #email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5:-ms-input-placeholder, #firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder, #lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder { /* IE 10+ */
      color: #b4b4b4;
      font-size: 14px;
      font-family: MyriadPro-Regular;
    }
    #company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518:-moz-placeholder, #industry-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5:-moz-placeholder, #email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5:-moz-placeholder, #firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder, #lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder { /* Firefox 18- */
      color: #b4b4b4;
      font-size: 14px;
      font-family: MyriadPro-Regular;
    }


    form+ .default_selected {
        display: none;
    }

    .input{
        font-size: 14px;
        font-family: MyriadPro-Regular;
    }

    .hs-form div:nth-child(9) .default_selected{
        display:none !important;
    }

    .hs-form div:nth-child(6) .input{
        margin-top:0;

    }

    .hs-form div:nth-child(6) .input #email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5{
        border:1px solid #d0d2d3;
        color:#000;
        padding: 6.5px 12px;
    }



    .hs-form div:nth-child(7){
        display: inline;
    }

    .send-data { pointer-events: none; }
    .send-data.active { pointer-events: auto; }
    .hoover_button, .hoover_button1, .hoover_button2, .hoover_button3, .hoover_button4, .hoover_button5{
        color: #fff;
        background: #c7c7c7;
        width: 19px;
        height: 17px;
        font-weight: bold;
        border-radius: 10px;
        text-align: center;
        font-size: 14px;
        position: relative;
        top: 10px;
        left: 15px;
        padding-top:2px;
        display:block;
		float:left;
    }

    .hover_text, .hover_text1, .hover_text2, .hover_text3, .hover_text4, .hover_text5{
      position: absolute;
      width: 90px;
      display: none;
      color: #fff;
      padding: 3px 6px;
      left: -52px;
      border-radius: 5px;
      color: #fff;
      font-weight: 600;
      background: rgba(0, 0, 0, 0.48);
      font-weight: 200;
      font-size: 12px;
      font-family: MyriadPro-Regular;
      text-align: center;
      float: left;
      z-index:9999;
    }
    .hs-error-msgs{
        position: absolute;
        text-align: left;
    }
    .hoover_button:hover .hover_text{
        display:block!important;
    }

    .hoover_button1:hover .hover_text1 {
        display:block!important;
    }

    .hoover_button2:hover .hover_text2 {
        display:block!important;
    }
    .hoover_button3:hover .hover_text3 {
        display:block!important;
    }

    .hoover_button4:hover .hover_text4 {
        display:block!important;
    }
    .hoover_button5:hover .hover_text5 {
        display:block!important;
    }
    .hover_button:hover .hover_text{
        color:red;
    }

    #pricing-content{
        background: #fafafa;
		      padding: 68px 0 74px 0;
    }

    .hs_email{
        display:none;
    }

    .hbspt-form{
        width: 378px;
        -moz-box-shadow:    0 0 4px 1px #cccccc;
        -webkit-box-shadow: 0 0 4px 1px #cccccc;
        box-shadow: 0 0 4px 1px #cccccc;
        margin: auto;
        background: #fff;
        padding:10px 49px 55px 34px;
		position:relative;
		z-index:99999999;
    }

    .edit_pricing{
        width: 397px;
        -moz-box-shadow:    0 0 4px 1px #cccccc;
        -webkit-box-shadow: 0 0 4px 1px #cccccc;
        box-shadow: 0 0 4px 1px #cccccc;
        margin: auto;
        background: #fff;
        padding: 20px 49px 60px 34px;
    }

	.edit_top{
		width: 480px;
		/*margin: auto;*/
		position:relative;
		z-index:999999999;
		left: 10%;
	}

	.edit_top_text{
        background: #2698d6;
        display: block;
        width: 93.3%;
        color: #fff;
        font-size: 20px;
        padding: 13px 0px 13px 34px;
        text-align: left;
        left: -1px;
        position: relative;
	}

    .edit_firstname, .edit_lastname, .edit_position,
     .edit_number, .edit_study, .edit_over, .edit_company, .edit_select{
        display:block;
        width:100%;
        color: #b4b4b4;
        font-size: 14px;
        font-family: MyriadPro-Regular;
        padding: 10px 0;
		margin-top: 25px;
		display: inline-block;
		border: none;
		border-bottom: 1px solid #cccccc;
    }

    .ed_select{
        float:right;
    }

    .ed_difault{
        float:left;
    }

	.edit_all{
		display:block;
        width:100%;
        color: #b4b4b4;
        font-size: 14px;
        font-family: MyriadPro-Regular;
        padding: 10px 0;
	}
	.edit_all a{
		float:right;
		color:#9d9d9d;
	}

    .hbspt-form form{
        width:100%;
        margin: auto;
        padding: 12px 0;
    }

    .hs-form-required{
        display: none;
    }
    .input{
        width:100%;
        margin-top: 25px;
        display: inline-flex;
    }
	<!--
	#length_of_study_in_months_-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5,#clinical_trial_type-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5,
    #number_of_studies_planned_over_next_2_years-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5, #industry-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5{
        width:100%;
        color:#b4b4b4;
        font-size:14px;
        font-family: MyriadPro-Regular;
        border-width: 0 0 1px 0;
        padding: 10px 0;
        border-bottom-color:#cccccc;
    }-->

	#company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518, #firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518, #lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518{
		width:94%;
        color:#b4b4b4;
        font-size:14px;
        font-family: MyriadPro-Regular;
        border-width: 0 0 1px 0;
        padding: 10px 0;
        border-bottom-color:#cccccc;
	}

    .hs_submit{
        width: 100%;
        text-align: right;
        padding: 10px 0;
        margin-top: 25px;
    }

    .actions .large{
        font-size: 18.75px;
        color:#fff;
        border: 0;
        font-family: MyriadPro-Regular;
        background: #2698d6;
        display:none;
        float: right;
        width: auto;
        padding:6.5px 33px;
        position:relative;
        top:-11px;
    }

    .hs-form.stacked .field{
      margin-bottom: 0 !important;
    }


    .top_image img{
        width:100% !important;
    }

    .send-data{
        background: #9d9d9d;
        font-size: 17px;
        color:#fff;
        border: 0;
        font-family: MyriadPro-Regular;
        padding: 5px 30px;
        border-radius: 5px;
		    float:right;
        width: initial !important;
    }


    .new-pricing-text{
        font-size: 18px;
        font-family:  OpenSans-Regular;
        width: 54%;
        margin: auto;
        margin-bottom: 45px;
        color:#626262;
    }

	.mail_edit{
		padding: 20px 38px 50px 25px ;
		position:relative;
		z-index:9999999;

	}

  #email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    font-size: 10.5px;
    font-family: MyriadPro-Regular;
    color:#b2b2b2;
}
#email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5::-moz-placeholder { /* Firefox 19+ */
  font-size: 10.5px;
  font-family: MyriadPro-Regular;
  color:#b2b2b2;
}
#email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5:-ms-input-placeholder { /* IE 10+ */
  font-size: 10.5px;
  font-family: MyriadPro-Regular;
  color:#b2b2b2;
}
#email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5:-moz-placeholder { /* Firefox 18- */
  font-size: 10.5px;
  font-family: MyriadPro-Regular;
  color:#b2b2b2;
}

  }


	#pricing-content{
		position: relative;
		z-index: 999999999999;
	}

    #footer_price {
        background: #203949;
        text-align: center;
        padding: 6px 0;
        width: 100%;
    }

    .footer_text{
        font-size: 16px;
        font-family: MyriadPro-Regular;
        color:#8f949d;
    }

    .top_image{
          margin-bottom: -8px;
    }

    .hs-error-msgs{
        margin-top: 5px;
        color: red;
        font-size: 14px;
        font-family: MyriadPro-Regular;
    }

    @media screen and (max-width: 1300px){
        .edit_top{
            left: 7% !important;
        }

        .mail_edit{
            margin-right: 6% !important;
        }

        .emailTitle{
            left: 48.7% !important;
        }

    }


      @media screen and (max-width: 1210px){
        .edit_top{
            left: 4% !important;
        }

        .mail_edit{
            margin-right: 4% !important;
        }


      }



      @media screen and (max-width: 1164px){
        .edit_top {
            left: 2% !important;
          }
          .mail_edit {
            margin-right: 2% !important;
          }
          .emailTitle {
            left: 21.5% !important;
            width: 100%;
          }
      }

        @media screen and (max-width: 1103px){
          .emailTitle {
            left: 19.5% !important;
            width: 100%;
          }

          .mail_edit{
            float: none !important;
            margin: auto auto 15px auto!important;
            width: 419px !important;
            position: relative !important;
            left: 2% !important;
            display: block;

          }

          .edit_top{
            float: none !important;
            margin: auto auto 10px auto!important;
          }

          .emailTitle {
            left: 19.5% !important;
            width: 100%;
            float: none !important;
            margin: auto auto 10px auto!important;
            text-align: center;
            top: -2px;
            display: inline-flex;
            left: 29% !important;
            font-size: 16px;
          }
        }



      @media screen and (max-width: 1090px){
        .edit_top {
            left: 1% !important;
          }
          .mail_edit {
            margin-right: 1% !important;
          }
          .emailTitle {
            left: 19.5% !important;
            width: 100%;
          }

          .mail_edit{
            float: none !important;
            margin: auto auto 15px auto!important;
            width: 419px !important;
            position: relative !important;
            left: 12px !important;

          }

          .edit_top{
            float: none !important;
            margin: auto auto 10px auto!important;
          }

          .emailTitle{
              float: none !important;
               margin: auto auto 10px auto!important;
              display: block;
              width: 100%;
              text-align: center;
              top: -2px;
              display: inline-flex;
              left: 29% !important;
              font-size: 16px;
          }
      }

      @media screen and (max-width: 1051px){
        .emailTitle {
          left: 27.5% !important;
          width: 100%;
        }

        .mail_edit{
          float: none !important;
          margin: auto auto 15px auto!important;
          width: 419px !important;
          position: relative !important;
          left: 1% !important;
          display: block;
        }
    }

    @media screen and (max-width: 960px){
        .mail_edit{
           float:none !important;
            margin:auto auto 10px auto!important;
            width: 430px !important;
            padding: 26px 25px 38px 25px !important;
        }



    }

    @media screen and (max-width: 890px){
      .emailTitle {
          left: 23.5% !important;
        }

    }



      @media screen and (max-width: 794px){
        .new-pricing-text {
            font-size: 16px;
            width: 82%;}
      }

    @media screen and (max-width: 768px){
        .mail_edit{
          width: 431px !important;
          position: relative !important;
          left: 7px !important;
        }
        .top_image img {
          width: 100% !important;
          height: 270px;
        }
        .new-pricing-text{
          width: 65%;
          text-align: center;
        }
        .emailTitle{
          left:22% !important;
        }
    }

    @media screen and (max-width: 767px){
        .new-pricing-text {
            font-size: 16px;
            width: 82%;
        }
    }
    @media screen and (max-width: 720px){
      .emailTitle {
          left: 17% !important;}
    }
	@media screen and (max-width: 610px){
    .emailTitle{
      left: 12% !important;
    }
  }

  	@media screen and (max-width: 600px){
      .edit_top_text {
          width: 93.4% !important;
          left: 0px !important;
        }
        .edit_pricing {
          width: 83% !important;
    }
    }

    	@media screen and (max-width: 530px){
        .emailTitle {
          left: 5% !important;
      }
      }

  	@media screen and (max-width: 522px){
        .mail_edit{
          left: 0 !important;
        }

        .edit_top{
          left: -3px !important;
          width: 82.3% !important;
        }
        .emailTitle {
          left: 4% !important;
        }

        .hs-form div:nth-child(6) {
          width: 60% !important;
        }

        .actions .large {
            padding: 3.2px 30px;
        }
        .mail_edit {
            width: 370px !important;
          }
          .edit_pricing {
            width: 81.5% !important;
          }

    }

	@media screen and (max-width: 519px){
    .edit_top {
        left: -4px !important;
        width: 82.9% !important;
      }
        .edit_top_text {
          width: 93.3% !important;
          left: 1px !important;
        }

        .edit_pricing {
          width: 81% !important;
          left: 2px;
          position: relative;
        }


  }

  @media screen and (max-width: 510px){
    .edit_top {
        width: 84% !important;
      }

  }

  @media screen and (max-width: 506px){
    .edit_top {
      width: 85% !important;
    }
    .edit_pricing {
        width: 80.9% !important;
      }
  }

    	@media screen and (max-width: 502px){
        .actions .large {
            font-size: 16px;
          }
          .hs-form div:nth-child(6) {
            width: 58% !important;
          }
          .actions .large{
                left: 1px;
                position: relative;
          }
          .edit_top_text{
                width: 94% !important;
                margin: auto;
          }
          .emailTitle {
            left: -1% !important;
          }

          .edit_pricing {
              width: 82% !important;
            }
            .edit_top {
              width: 85% !important;
            }
      }

	@media screen and (max-width: 510px){
		.hs-form div:nth-child(6) {
			width: 60%;}
			.actions .large {
			padding: 5px 25px;}
	}

    @media screen and (max-width: 500px){
        .hbspt-form form {
            width: 290px;
        }

        .hbspt-form {
            width: 70%;
        }

		.edit_pricing{
			width: 70%;
		}

        .edit_pricing {
                width: 81.5% !important;
        }
        .edit_top {
            width: 398px;
            left: -5px !important;
        }

        .mail_edit {
            float: none !important;
            margin: auto auto 10px auto !important;
            width: 83% !important;
            padding: 29px 7px 36px 12px !important;
        }
		.actions .large{
			position: relative;
			right: -23%;
		}
    }

      @media screen and (max-width: 484px){
        .edit_pricing {
            width: 81% !important;
          }
      }

      @media screen and (max-width: 469px){
        .edit_pricing {
            width: 80.7% !important;
          }
      }

      @media screen and (max-width: 461px){
        .edit_pricing {
            width: 80.5% !important;
          }
      }

      @media screen and (max-width: 453px){
        .edit_pricing {
            width: 80.2% !important;
          }
          .mail_edit {
            width: 82.6% !important;
            left: 2px !important;
          }
      }

      @media screen and (max-width: 446px){
        .edit_top {
          width: 84% !important;
        }
        .edit_top_text {
          width: 94.2% !important;
        }
    }

      @media screen and (max-width: 436px){
        .edit_pricing {
            width: 79.6% !important;
          }
      }

    @media screen and (max-width: 430px){
        .hbspt-form {
          width:70% !important;
        }
        .edit_top {
            width: 82% !important;
            margin: 0 0 0 3% !important;
        }
        .edit_top_text {
    width: 100% !important;
  }
		.mail_edit {
      width: 85% !important;
      left: -10px !important;
		}
		.actions .large{
			right: -11% !important;
		}
    .edit_pricing {
      width: 85% !important;
    }
    }

    @media screen and (max-width: 410px){
      .edit_pricing {
          width: 84.3% !important;
        }
    }

    @media screen and (max-width: 410px){

        .hbspt-form form {
            width: 260px;
        }

		<!--
        #number_of_unique_crf_forms-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5, #length_of_study_in_months_-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5,#clinical_trial_type-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5,
        #number_of_studies_planned_over_next_2_years-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5, #company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518, #industry-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5{
            font-size: 12px;

        }-->

		#company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518{
		  font-size: 12px;
		}

        .actions .large {
            font-size: 14px;
        }
        .new-pricing-text {
            width: 91%;
        }

    }

    @media screen and (max-width: 404px){
      .edit_pricing {
          width: 83.8% !important;
        }
    }

  @media screen and (max-width: 390px){
    .edit_pricing {
        width: 83.2% !important;}
        .mail_edit {
        width: 85.8% !important;
        left: -8px !important;}
        .emailTitle {
    left: 0 !important;
    width: 100%;
    text-align: center;

  }

  @media screen and (max-width: 381px){
    .edit_pricing {
          width: 82.7% !important;
      }
      .edit_top {
        width: 82.2% !important;
      }
  }

    @media screen and (max-width: 375px){
        .edit_pricing {
            width: 85% !important;
            padding: 20px 45px 60px 30px !important;
        }
        .edit_top {
            width: 82.5% !important;
        }
		.actions .large {
			right: -1% !important;}

      .edit_top_text {
    width: 99.5% !important;
  }

}

    @media screen and (max-width: 363px){

          .mail_edit {
            padding: 28px 42px 36px 16px !important;}
            .hs-form div:nth-child(6) {
                width: 56% !important;}
                .edit_top {
                  width: 81% !important;
                }

                .mail_edit{
                  width: 73% !important;
                }

        .edit_pricing {
          width: 84% !important;
        }

    }

    @media screen and (max-width: 360px){
        .hbspt-form form {
            width: 240px;
        }

		.hs-form div:nth-child(6) {
			width: 55%;
		}
		.mail_edit{
			width: 73% !important;
		}
        .hbspt-form {
			    padding: 10px 60px 45px 20px;
        }

        .edit_pricing {
            width: 75%;
        }
        .edit_top {
            width: 91%;
        }

        .edit_top_text {
    width: 99.5% !important;}
    }

  @media screen and (max-width: 356px){
    .edit_top {
        left: -3px !important;
      }
      .edit_pricing {
        width: 83.7% !important;
    }
  }

    @media screen and (max-width: 345px){
        .edit_top {
            width: 86%;
        }
        .edit_pricing {
            width: 83.4% !important;
          }
    }

  @media screen and (max-width: 343px){
    .edit_pricing {
        width: 83.5% !important;}
  }

  @media screen and (max-width: 337px){
    .edit_pricing {
        width: 82.8% !important;}
  }

@media screen and (max-width: 330px){
  .edit_pricing {
      width: 82.5% !important;
    }
}

@media screen and (max-width: 326px){
  .edit_pricing {
      width: 82.3% !important;
    }
}
  @media screen and (max-width: 321px){
    .edit_top {
        left: -6px !important;
      }

      .edit_top_text {
        width: 100.2% !important;
      }
      .edit_pricing {
        width: 82.8% !important;
      }

  }
    @media screen and (max-width: 320px){
      .edit_pricing {
          width: 85.3% !important;
        }
      .edit_top {
          left: -3px !important;
        }
      .hoover_button3:hover .hover_text3 {
          display: block!important;
          left: -13px!important;
          position: relative;
        }
      .top_image img {
          height: 155px !important;
        }
      .hs-form div:nth-child(6) {
        width: 57% !important;
      }
.edit_firstname, .edit_lastname, .edit_position,
.edit_number, .edit_study, .edit_over, .edit_company, .edit_select{
  font-size:12px;
}
      .emailTitle{
        width: 100%;
        top: -27px;
        left: 0;
        font-size: 16px;
      }

        .default_selected{
            text-align: left;
        }
        .ed_difault {
            width: 80%;
            text-align: left;
        }
        .new-pricing-text {
            width: 91%;}
		.edit_top_text{
			width: 88%;
		}
		.mail_edit{
			position: relative;
			left: 10px;
		}
		.actions .large {
		padding: 6px 25px;}
		.hbspt-form{
			    width: 70% !important;
				left:0 !important;
				padding: 30px 60px 44px 20px !important;
		}

    .hover_text, .hover_text1, .hover_text2, .hover_text3, .hover_text4, .hover_text5{
      left: -74px !important;
    }
    select{
      font-size:11px !important;
    }

    #company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder, #industry-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5::-webkit-input-placeholder, #firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder, #lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder { /* Chrome/Opera/Safari */
      font-size:11px !important;
      }
    #company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-moz-placeholder, #industry-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5::-moz-placeholder, #firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder, #lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder { /* Firefox 19+ */
      font-size:11px !important;
    }
    #company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518:-ms-input-placeholder, #industry-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5:-ms-input-placeholder, #firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder, #lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder { /* IE 10+ */
      font-size:11px !important;
    }
    #company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518:-moz-placeholder, #industry-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5:-moz-placeholder, #firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder, #lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518::-webkit-input-placeholder { /* Firefox 18- */
      font-size:11px !important;
    }

    .edit_top {
    width: 84.5% !important;
    margin: 0 0 0 6px !important;}
    .edit_top_text {
        width: 102% !important;
      }

      .send-data{
        float: none;
        text-align: center;
        margin: auto;
        display: block;
      }
    }

</style>

<script>
$(window).load(function() {
$('.inputs-list').css('display','none');
$('.radio-select').hide();
$('.select1').css('display','block');
$('.hs_number_of_unique_crf_forms_2').append($(".select1"));
$(".select1").after($('<span class="hoover_button">? <span class="hover_text"> <?php the_field("tooltipe_1"); ?></span></span>'));



$('.radio-select-2').hide();
$('.hs_length_of_study_in_months_2').append($('.select2'));
$('.select2').css('display','block');
$(".select2").after($('<span class="hoover_button1">? <span class="hover_text1"> <?php the_field("tooltipe_2"); ?></span></span>'));


$('.hs_number_of_studies_planned_over_next_2_years_2').append($('.select3'));
$('.select3').css('display','block');
$('.radio-select-3').hide();
$(".select3").after($('<span class="hoover_button2">? <span class="hover_text2"> <?php the_field("tooltipe_3"); ?></span></span>'));


$('.hs_clinical_trial_type_2').append($('.select4'));
$('.select4').css('display','block');
$('.radio-select-4').hide();
$(".select4").after($('<span class="hoover_button4">? <span class="hover_text4"><?php the_field("tooltipe_5"); ?></span></span>'));

/*1/24/2017 gnac*/
$('.hs_title').append($('.select5'));
$('.select5').css('display','block');
$('.radio-select-5').hide();
$(".select5").after($('<span class="hoover_button5">? <span class="hover_text5"><?php the_field("tooltipe_6"); ?></span></span>'));
/*1/24/2017 ekav*/

$('.edit_top').hide();

$('form').after($('<input type="button" value="Get Price" class="send-data" id="send-data">'));

  $('#company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518').after($('<span class="hoover_button3">? <span class="hover_text3"> <?php the_field("tooltipe_4"); ?></span></span>'));


$('.selected-radiobutton').click(function(){
  $(this).find('.radio-select-def').addClass('open');
  $(this).find('.radio-select-def').toggle();
    validate1();
});


$('.option-select').click(function(){
  var r = $(this).find('input[type=radio]');
  r.trigger('click');
});


$('input[type=radio]').click(function(e) {
  e.stopPropagation();
});





$('.selected-radiobutton').click(function(e) {
  var k = $(e.target);
  k.parents().eq(0).find('.radio-select-def').append(k.parents().eq(1).find('.inputs-list'));
  k.parents().eq(0).find('.inputs-list').css('display','block');

  $(this).find('.select_dif').removeClass("adding");
  if (!$(this).hasClass('changing')) {
    $(this).css({"width":"94%", "display":"block"});
    $(this).parent().find('.default_selected').toggle();

  }else{


  }

});






$('input[type=radio]').change(function(e) {
  $('.arrow').hide();
  console.log('changing');
var thisSelect1 = $(e.target);
var n = thisSelect1.parents().eq(4);
n.addClass("changing");
var str = $(this).val();
var str1 = thisSelect1.val();
var def_val = thisSelect1.parents().eq(4).find(".select_dif");
var f = thisSelect1.parents().eq(4).find(".selected-option-default").text();
//console.log(thisSelect1.parents().eq(4).find(".selected-option-default"));
var g =thisSelect1.val();
thisSelect1.parents().eq(3).find('.radio-select').css('width','100%');
console.log(thisSelect1.parents().eq(3).find('.radio-select').css('background','green'));
n.find('.select_dif').css({"display":"block", "text-align":"left"});
n.find('.select_dif').addClass("adding");
n.find('.radio-select').removeClass('open');
if(def_val.text() == thisSelect1.val()){

}else{
}

        if (n.find(".default_selected").length>0) {
                  thisSelect1.parents().eq(4).find(".default_selected").show();
                  thisSelect1.parents().eq(4).find(".default_selected").text(g);
        } else {
          thisSelect1.parents().eq(4).find('.select_dif').before($('<div class="default_selected"></div>'));
          thisSelect1.parents().eq(4).find(".default_selected").text(g);
          validate1();
        }

      $('.default_selected').css({"float":"right", "color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
      $('.select3 .default_selected').css({"float":"right", "color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});

});



$('.selected-radiobutton').removeClass("changing");
$('.select_dif').removeClass("adding");




function  validate1(){


if($('.select1').hasClass('changing') && $('.select2').hasClass('changing') && $('.select3').hasClass('changing') && $('.select4').hasClass('changing') && $('.select5').hasClass('changing') && $('form').find('input[name="firstname"]').val() != "" && $('form').find('input[name="lastname"]').val() != "" && $('form').find('input[name="company"]').val() != ""){
  $('.send-data').addClass('active').css({'background':'#2698d6'});
  clearInterval();
  return 1;
}else{
  $('.send-data').css({'background':'#9d9d9d'});
  return 2;
}

}


$('.selected-option-default').on('click', function() {
  if ( $(this).hasClass('active') ) {
  }
  return false;
});


/*
$('.selected-radiobutton').click(function(e) {
  var k = $(e.target);

  console.log(k);

  console.log(k.parents().eq(1).find('.inputs-list'));
  console.log(k.parents().eq(0).find('.radio-select-def'));

  k.parents().eq(0).find('.radio-select-def').append(k.parents().eq(1).find('.inputs-list'));

  $(this).find('.select_dif').removeClass("adding");
  if (!$(this).hasClass('changing')) {
    $(this).css({"width":"94%", "display":"block"});
    $(this).parent().find('.default_selected').toggle();

  }else{


  }

});*/


    $("input").on("change", function () {
          var interval = setInterval(function () {
              validate1();
          },150);
      });


      $(".input").click(function(){
          validate1();

      });

      $('#email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5').on('click',function () {
        $(':input').removeAttr('placeholder');
        $(this).css('color','#000');
      });


   $('.send-data').click(function(){
     if(validate1()==2){
       return false;
     }
      $('.actions').css('display','block');
      $('.actions .send-data').css({'padding':'6.5px 33px', 'position':'relative', 'top':'-11px'})
      $('.new-pricing-text').css("display","none");
      $('.hbspt-form').before('<h3 class="emailTitle">Submit your details to get a price quote for Clear Clinica Cloud EDC</h3>')
      $('#email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5').before('<h3 class="email_label">Email Address</h3>');

      $('#email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5').off('focusout');
      $( "input" ).off('focusout');
      $('.hs-form-field').hide();
      $('.hs_email').show();

      if (!$('.ed_difault')[0]) {
        appending();
      }

      function appending() {
        console.log($('.select_dif').text());

        $(".edit_firstname").append('<span class="ed_difault">'+$("#firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518").attr('placeholder')+'</span>');
        $(".edit_firstname").append('<span class="ed_select">'+$('#firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518').val()+'</span>');

        $(".edit_lastname").append('<span class="ed_difault">'+$("#lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518").attr('placeholder')+'</span>');
        $(".edit_lastname").append('<span class="ed_select">'+$('#lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518').val()+'</span>');

        $(".edit_position").append('<span class="ed_difault">'+$('.select5').find('.select_dif').text()+'</span>');
        $(".edit_position").append('<span class="ed_select">'+$('.select5').find('.default_selected').text()+'</span>');

        $(".edit_number").append('<span class="ed_difault">'+$('.select1').find('.select_dif').text()+'</span>');
        $(".edit_number").append('<span class="ed_select">'+$('.select1').find('.default_selected').text()+'</span>');



        $(".edit_study").append('<span class="ed_difault">'+$('.select2').find('.select_dif').text()+'</span>');
        $(".edit_study").append('<span class="ed_select">'+$('.select2').find('.default_selected').text()+'</span>');


        $(".edit_over").append('<span class="ed_difault">'+$('.select3').find('.select_dif').text()+'</span>');
        $(".edit_over").append('<span class="ed_select">'+$('.select3').find('.default_selected').text()+'</span>');

        $(".edit_select").append('<span class="ed_difault">'+$('.select4').find('.select_dif').text()+'</span>');
        $(".edit_select").append('<span class="ed_select">'+$('.select4').find('.default_selected').text()+'</span>');

        $(".edit_company").append('<span class="ed_difault">'+$("#company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518").attr('placeholder')+'</span>');
        $(".edit_company").append('<span class="ed_select">'+$('#company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518').val()+'</span>');

      }


      $('.edit_top').show();
      $('.hbspt-form').css({"float":"right", "margin-right":"10%", "margin-top":"130px", "padding":"20px 25px"});
      $('.hbspt-form').addClass("mail_edit");
      $(".mail_edit").css({"width":"495px", "padding":"33px 38px 45px 25px"});
      $('#pricing-content').css({"text-align": "center"});
      $('.large').css({"display": "block", "float":"right", "backgound":"#2698d6"});
      $('.send-data').css({"display": "none"});
      $('#email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5').css({"width":"100%","color":"#000"});

  });
     $(".edit_forms_pricing").click(function () {

        $('html, body').animate({
             scrollTop: $("#pricing-content").offset().top
         }, 500);


        $(".large").click(function(){
            $(this).css({"width":"initial"});
        });
          $('.hbspt-form').css({"float":"none", "margin":"0 auto"});
    $('.radio-select-def').css('text-align','left');
          $('.edit_top').css({"display":"none"});
          $('#email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5').on('focusout');
          $( "input" ).on('focusout');
          $('.default_selected').show();
          $('.new-pricing-text').css({"display":"block"});
          $('.emailTitle').remove();
          $(".mail_edit").css({"width":"397px", "padding":"20px 38px 50px 25px"});

          $('.default_selected').css({"text-align":"left", "color":"#b4b4b4",  "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
          $('.select3 .default_selected').css({"text-align":"left", "color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});

          $('.hs-form-field').show();
          $('.hs_email').hide();
          $('.large').hide();
          $('.send-data').show();


          $( "#company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518" ).on('focusout',  function(e) {
            console.log("focusout");
            if($(e.target).attr('id')!='email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5'){
              setTimeout(function(){
                  var str = "";
                  var n="";
                  var thisSelect = $(e.target);
                  str += thisSelect.find("option:selected").text();
                  n += thisSelect.attr('placeholder');
                  $( ".selected_value" ).text( str );
                  thisSelect.css({"width":"35%", "float":"right"});

                  if(thisSelect.parent().find(".default_selected").length>0){
                      thisSelect.parent().find(".default_selected").text(n);
                      thisSelect.parent().find(".default_selected").show();
                  }
                    else{

                      thisSelect.before($('<div class="default_selected"></div>'));
                      thisSelect.parent().find(".default_selected").text(n);
                  }

                  $('.default_selected').css({"color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
                  $('.select3 .default_selected').css({"color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
              }, 1);

            }else{

            }
          });




      });


      $( "input" ).click(function(){
        if (!$(this).hasClass('large')) {
          $(this).css("width", "100%");
          $(this).parent().find(".default_selected").hide();
        }


      });



  $( "#company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518" ).on('focusout',  function(e) {
    console.log('focuseOUt1');
          if($(e.target).attr('id')!='email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5'){
          setTimeout(function(){
          var str = "";
          var n="";
          var thisSelect = $(e.target);
          str += thisSelect.find("option:selected").text();
          n += thisSelect.attr('placeholder');
          if(str!=n){return false;}
          else{}
          $( ".selected_value" ).text( str );
          thisSelect.css({"width":"35%", "float":"right"});

              if(thisSelect.parent().find(".default_selected").length>0){
                  thisSelect.parent().find(".default_selected").text(n);
                  thisSelect.parent().find(".default_selected").show();
              }else{
                  thisSelect.before($('<div class="default_selected"></div>'));
                  thisSelect.parent().find(".default_selected").text(n);
              }
//"width":"60%",
//"width":"75%",
          $('.default_selected').css({"color":"#b4b4b4",  "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
          $('.select3 .default_selected').css({"color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
        }, 1);

        }
      });


      $( "#company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518" ).on('click',  function(e) {
          $(this).val('');
      });


      $( "#company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518" ).on('change',  function(e) {
          if($(e.target).attr('id')!='email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5'){
          setTimeout(function(){
          var str = "";
          var n="";
          var thisSelect = $(e.target);
          str += thisSelect.find("option:selected").text();
          n += thisSelect.attr('placeholder');
          $( ".selected_value" ).text( str );
          thisSelect.css({"width":"35%", "float":"right"});
          if(thisSelect.attr('id')=='company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518'){
            $('#company-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518').css('text-align-last','right');
          }else{ }

              if(thisSelect.parent().find(".default_selected").length>0){
                  thisSelect.parent().find(".default_selected").text(n);
                  thisSelect.parent().find(".default_selected").show();
              }else{
                  thisSelect.before($('<div class="default_selected" style="width:65%"></div>'));
                  thisSelect.parent().find(".default_selected").text(n);
              }

          $('.default_selected').css({"color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
        //  $('.select3 .default_selected').css({"color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
    $()
        }, 1);

        }
      });


/*nor ban onChange*/
$( "#firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518" ).on('focusout',  function(e) {
  console.log('focuseOUt1');
        if($(e.target).attr('id')!='email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5'){
        setTimeout(function(){
        var str = "";
        var n="";
        var thisSelect = $(e.target);
        str += thisSelect.find("option:selected").text();
        n += thisSelect.attr('placeholder');
        if(str!=n){return false;}
        else{}
        $( ".selected_value" ).text( str );
        thisSelect.css({"width":"35%", "float":"right"});

            if(thisSelect.parent().find(".default_selected").length>0){
                thisSelect.parent().find(".default_selected").text(n);
                thisSelect.parent().find(".default_selected").show();
            }else{
                thisSelect.before($('<div class="default_selected"></div>'));
                thisSelect.parent().find(".default_selected").text(n);
            }
//"width":"60%",
//"width":"75%",
        $('.default_selected').css({"color":"#b4b4b4",  "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
        $('.select3 .default_selected').css({"color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
      }, 1);

      }
    });


    $( "#lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518" ).on('focusout',  function(e) {
      console.log('focuseOUt1');
            if($(e.target).attr('id')!='email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5'){
            setTimeout(function(){
            var str = "";
            var n="";
            var thisSelect = $(e.target);
            str += thisSelect.find("option:selected").text();
            n += thisSelect.attr('placeholder');
            if(str!=n){return false;}
            else{}
            $( ".selected_value" ).text( str );
            thisSelect.css({"width":"35%", "float":"right"});

                if(thisSelect.parent().find(".default_selected").length>0){
                    thisSelect.parent().find(".default_selected").text(n);
                    thisSelect.parent().find(".default_selected").show();
                }else{
                    thisSelect.before($('<div class="default_selected"></div>'));
                    thisSelect.parent().find(".default_selected").text(n);
                }
  //"width":"60%",
  //"width":"75%",
            $('.default_selected').css({"color":"#b4b4b4",  "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
            $('.select3 .default_selected').css({"color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
          }, 1);

          }
        });





$( "#firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518" ).on('change',  function(e) {
    if($(e.target).attr('id')!='email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5'){
    setTimeout(function(){
    var str = "";
    var n="";
    var thisSelect = $(e.target);
    str += thisSelect.find("option:selected").text();
    n += thisSelect.attr('placeholder');
    $( ".selected_value" ).text( str );
    thisSelect.css({"width":"35%", "float":"right"});
    if(thisSelect.attr('id')=='firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518'){
      $('#firstname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518').css('text-align-last','right');
    }else{ }

        if(thisSelect.parent().find(".default_selected").length>0){
            thisSelect.parent().find(".default_selected").text(n);
            thisSelect.parent().find(".default_selected").show();
        }else{
            thisSelect.before($('<div class="default_selected" style="width:65%"></div>'));
            thisSelect.parent().find(".default_selected").text(n);
        }

    $('.default_selected').css({"color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
  //  $('.select3 .default_selected').css({"color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
$()
  }, 1);

  }
});


$( "#lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518" ).on('change',  function(e) {
    if($(e.target).attr('id')!='email-ccc8430d-00ef-4802-b23e-f46d1bdc8ec5'){
    setTimeout(function(){
    var str = "";
    var n="";
    var thisSelect = $(e.target);
    str += thisSelect.find("option:selected").text();
    n += thisSelect.attr('placeholder');
    $( ".selected_value" ).text( str );
    thisSelect.css({"width":"35%", "float":"right"});
    if(thisSelect.attr('id')=='lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518'){
      $('#lastname-6508c5d1-a9c7-4d7b-9ab2-0949bb9c1518').css('text-align-last','right');
    }else{ }

        if(thisSelect.parent().find(".default_selected").length>0){
            thisSelect.parent().find(".default_selected").text(n);
            thisSelect.parent().find(".default_selected").show();
        }else{
            thisSelect.before($('<div class="default_selected" style="width:65%"></div>'));
            thisSelect.parent().find(".default_selected").text(n);
        }

    $('.default_selected').css({"color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
  //  $('.select3 .default_selected').css({"color":"#b4b4b4", "font-size":"14px", "font-family":"MyriadPro-Regular", "border-bottom":"1px solid #cccccc", "padding":"10px 0"});
$()
  }, 1);

  }
});
/*nor ban obshi*/

});

</script>


<?php
get_footer();
?>
