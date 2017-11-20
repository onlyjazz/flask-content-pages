
var hexNav = document.getElementById('hexNav');

document.getElementById('menuBtn').onclick = function() {
   console.log(12313);
var className = ' ' + hexNav.className + ' ';
if ( ~className.indexOf(' active ') ) {
hexNav.className = className.replace(' active ', ' ');
} else {
hexNav.className += ' active';
}
}


var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();


$(document).ready(function(){
$('.img_1,.title_acc.t1').click(function(e){
e.stopPropagation();
$(".img_1").toggleClass('highlight');
$(".img_2").toggleClass('highlight');
$("article.accordion.a1").toggleClass('highlight');
$(".img_3").removeClass('highlight');
$(".img_4").removeClass('highlight');
$("article.accordion.a2").removeClass('highlight');
$(".img_5").removeClass('highlight');
$(".img_6").removeClass('highlight');
$("article.accordion.a3").removeClass('highlight');
$(".img_7").removeClass('highlight');
$(".img_8").removeClass('highlight');
$("article.accordion.a4").removeClass('highlight');
$(".img_9").removeClass('highlight');
$(".img_10").removeClass('highlight');
$("article.accordion.a5").removeClass('highlight');
});
$('.img_2').click(function(e){
e.stopPropagation();
$(".img_1").removeClass('highlight');
$(".img_2").removeClass('highlight');
$("article.accordion.a1").removeClass('highlight');
});


$('.img_3,.title_acc.t2').click(function(e){
e.stopPropagation();
$(".img_1").removeClass('highlight');
$(".img_2").removeClass('highlight');
$("article.accordion.a1").removeClass('highlight');
$(".img_3").toggleClass('highlight');
$(".img_4").toggleClass('highlight');
$("article.accordion.a2").toggleClass('highlight');
$(".img_5").removeClass('highlight');
$(".img_6").removeClass('highlight');
$("article.accordion.a3").removeClass('highlight');
$(".img_7").removeClass('highlight');
$(".img_8").removeClass('highlight');
$("article.accordion.a4").removeClass('highlight');
$(".img_9").removeClass('highlight');
$(".img_10").removeClass('highlight');
$("article.accordion.a5").removeClass('highlight');
});
$('.img_4').click(function(e){
e.stopPropagation();
$(".img_3").removeClass('highlight');
$(".img_4").removeClass('highlight');
$("article.accordion.a2").removeClass('highlight');
});



$('.img_5,.title_acc.t3').click(function(e){
e.stopPropagation();
$(".img_1").removeClass('highlight');
$(".img_2").removeClass('highlight');
$("article.accordion.a1").removeClass('highlight');
$(".img_3").removeClass('highlight');
$(".img_4").removeClass('highlight');
$("article.accordion.a2").removeClass('highlight');
$(".img_5").toggleClass('highlight');
$(".img_6").toggleClass('highlight');
$("article.accordion.a3").toggleClass('highlight');
$(".img_7").removeClass('highlight');
$(".img_8").removeClass('highlight');
$("article.accordion.a4").removeClass('highlight');
$(".img_9").removeClass('highlight');
$(".img_10").removeClass('highlight');
$("article.accordion.a5").removeClass('highlight');
});
$('.img_6').click(function(e){
e.stopPropagation();
$(".img_5").removeClass('highlight');
$(".img_6").removeClass('highlight');
$("article.accordion.a3").removeClass('highlight');
});


$('.img_7,.title_acc.t4').click(function(e){
e.stopPropagation();
$(".img_1").removeClass('highlight');
$(".img_2").removeClass('highlight');
$("article.accordion.a1").removeClass('highlight');
$(".img_3").removeClass('highlight');
$(".img_4").removeClass('highlight');
$("article.accordion.a2").removeClass('highlight');
$(".img_5").removeClass('highlight');
$(".img_6").removeClass('highlight');
$("article.accordion.a3").removeClass('highlight');
$(".img_7").toggleClass('highlight');
$(".img_8").toggleClass('highlight');
$("article.accordion.a4").toggleClass('highlight');
$(".img_9").removeClass('highlight');
$(".img_10").removeClass('highlight');
$("article.accordion.a5").removeClass('highlight');
});
$('.img_8').click(function(e){
e.stopPropagation();
$(".img_7").removeClass('highlight');
$(".img_8").removeClass('highlight');
$("article.accordion.a4").removeClass('highlight');
});


$('.img_9,.title_acc.t5').click(function(e){
e.stopPropagation();
$(".img_1").removeClass('highlight');
$(".img_2").removeClass('highlight');
$("article.accordion.a1").removeClass('highlight');
$(".img_3").removeClass('highlight');
$(".img_4").removeClass('highlight');
$("article.accordion.a2").removeClass('highlight');
$(".img_5").removeClass('highlight');
$(".img_6").removeClass('highlight');
$("article.accordion.a3").removeClass('highlight');
$(".img_7").removeClass('highlight');
$(".img_8").removeClass('highlight');
$("article.accordion.a4").removeClass('highlight');
$(".img_9").toggleClass('highlight');
$(".img_10").toggleClass('highlight');
$("article.accordion.a5").toggleClass('highlight');
});
$('.img_10').click(function(e){
e.stopPropagation();
$(".img_9").removeClass('highlight');
$(".img_10").removeClass('highlight');
$("article.accordion.a5").removeClass('highlight');
});

$('.img_1').trigger('click');
});
// $( ".t5,.sub_1" ).mouseenter(function() {
// $(".t5 .sub_1").addClass( "hover" );
// console.log(``);
// }).mouseout(function() {
// $(".t5 .sub_1").removeClass( "hover" );
// });
$( ".t1" ).hover(
function() {
$(".active .tr:nth-child(2)").addClass( "hover" );
}, function() {
$(".active .tr:nth-child(2)").removeClass( "hover" );
}
);

$( ".t4" ).hover(
function() {
$(".t1").addClass( "hover" );
}, function() {
$(".t1").removeClass( "hover" );
}
);


$( ".image_1" ).hover(
function() {
$( this).parent().find('.tip').addClass( "hover" );
}, function() {
$( this).parent().find('.tip').removeClass( "hover" );
}
);
