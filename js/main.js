$(function()
{
	$('#search-switcher').on('click', function()
	{
		$('.search__input').focus();
		$('#search').toggleClass('search_active');
	});
	
	
	$('#burger').on('click', function()
	{
		$('#mobile-nav').toggleClass('mobile-nav_active');
	});
	
	
	
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
});