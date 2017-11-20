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


	if($('.select1').hasClass('changing') && $('.select2').hasClass('changing') && $('.select3').hasClass('changing') && $('.select4').hasClass('changing') && $('form').find('input[name="company"]').val() != ""){
		$('.send-data').addClass('active').css({'background':'#2698d6'});
		clearInterval();
	}else{
		$('.send-data').css({'background':'#9d9d9d'});
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


});
