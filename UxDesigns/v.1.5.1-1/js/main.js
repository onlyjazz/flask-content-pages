$(function()
{
	$('.input__text').on('change', function()
	{
		var ths = $(this);
		if( ths.val() != '' )
		{
			ths.addClass('input__text_changed');
		}
		else
		{
			ths.removeClass('input__text_changed');
		}
	});
	$('.input__text').each(function()
	{
		var ths = $(this);
		if( ths.val() != '' && ths.val() != null )
		{
			ths.addClass('input__text_changed');
		}
		else
		{
			ths.removeClass('input__text_changed');
		}
	});
	
	
	$('.studies').on('click', '.table__sort', function(event)
	{
		var ths = $(this);
		if( ths.hasClass('table__sort_up') )
		{
			ths.removeClass('table__sort_up').addClass('table__sort_down');
		}
		else if( ths.hasClass('table__sort_down') )
		{
			ths.removeClass('table__sort_down').addClass('table__sort_up');
		}
		else
		{
			ths.closest('.table').find('.table__sort').removeClass('table__sort_up').removeClass('table__sort_down');
			ths.addClass('table__sort_down');
		}
		return false;
	});
	
	
	$('.studies').on('click', 'tr', function(event)
	{
		var ths = $(this);
		if( ths.data('href') && $(event.target).prop('tagName') != 'I' && $(event.target).prop('tagName') != 'INPUT' )
		{
			window.location = ths.data('href');
		}
	});
	
	
	$('.charts__carousel').slick({
		infinite: false,
		slidesToShow: 2,
		slidesToScroll: 1,
		prevArrow: '<button class="charts__prev material-icons">keyboard_arrow_left</button>',
		nextArrow: '<button class="charts__next material-icons">keyboard_arrow_right</button>'
	});
	
	
	$('.input_date input').datepicker({
		prevText: '<i class="material-icons">keyboard_arrow_left</i>',
		nextText: '<i class="material-icons">keyboard_arrow_right</i>'
	});
	
	
	$(document).on('click', '.js-add-variable', function()
	{
		var ths = $(this);
		var tpl = ths.closest('.grid-col').find('.filters:first-child').clone();
		tpl.prepend('<button type="button" class="card__close material-icons js-remove-variable">close</button>');
		tpl.insertBefore(ths);
		return false;
	});
	$(document).on('click', '.js-remove-variable', function()
	{
		var ths = $(this);
		ths.closest('.card').remove();
	});
	
	
	$(document).on('click', '.js-popup-closer', function()
	{
		$('.popup').removeClass('popup_active');
		return false;
	});
	$(document).on('click', '.js-popup-opener', function()
	{
		var ths = $(this);
		var trgt = $(ths.data('ref'));
		trgt.addClass('popup_active').siblings().removeClass('popup_active');
		return false;
	});
});