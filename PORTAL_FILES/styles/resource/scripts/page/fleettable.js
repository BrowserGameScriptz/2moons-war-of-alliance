$(document).ready(function(){	
	DOM['fleets'] = $('#fleets');
	DOM['filter'] = $('#filter');
	DOM['timers'] = DOM['fleets'].find('.timer');		
	FleetTime();
	FilterArr();
});

//-- Ð¢Ð°Ð¹Ð¼ÐµÑ€ Ñ„Ð»Ð¾Ñ‚Ð°
function FleetTime() 
{
	DOM['timers'].each(function() {
		var s = $(this).data('time') - (serverTime.getTime() - startTime) / 1000;
		if(s <= 0) {
			$(this).text('-');
			location.reload();
			return;
		} else {
			$(this).text(GetRestTimeFormat(s));
		}
	});
	window.setTimeout('FleetTime()', 1000);
}

//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ Ñ„Ð¸Ð»ÑŒÑ‚
function FilterArr()
{
	$.each(Filter['o'], function(mis, flag)
	{
		FilterActive('o', mis);
	});
	$.each(Filter['t'], function(mis)
	{
		FilterActive('t', mis);
	});
}
//-- -- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ Ð¼Ð¸ÑÑÐ¸ÑŽ
function FilterActive(key, mis)
{
	flag = !Filter[key][mis];
	Filter[key][mis] = flag;
	
	//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ
	if(flag)
	{
		DOM['filter'].find('.i-mis'+mis+'-'+key+':first').addClass('ft-filter-btn-a btn-primary');
		DOM['fleets'].find('[mis = "'+mis+key+'"]').show();
		$.cookie('_m'+mis+key, 0);
		
		if(mis = 15)		
			DOM['fleets'].find('[mis = "16'+key+'"]').show();

	}
	//-- Ð¡ÐºÑ€Ñ‹Ñ‚ÑŒ
	else
	{
		DOM['filter'].find('.i-mis'+mis+'-'+key+':first').removeClass('ft-filter-btn-a btn-primary');
		DOM['fleets'].find('[mis = "'+mis+key+'"]').hide();
		$.cookie('_m'+mis+key, 1);
		
		if(mis = 15)
			DOM['fleets'].find('[mis = "16'+key+'"]').hide();
	}
}