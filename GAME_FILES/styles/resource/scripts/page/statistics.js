var st_out 	= 0;
var	timout	= 0;

$(document).ready(function() 
{
	DOM['range']		= $('#range');	
	DOM['st-out']		= $('#st-out');	
	st_out				= DOM['st-out'].data('time');
	
	timout = window.setTimeout('TimeOut()', 1000);
});

function goPage(goWho, goType)
{
	if(goWho)
		who = Number(goWho);
		
	if(goType)
		type = Number(goType);
	
	range = Number(DOM['range'].val());
	
	window.clearTimeout(timout);	
	IPost("game.php?page=statistics", {'who': who, 'type': type, 'range': range}, [], [timout]);
}

function TimeOut() 
{
	if(st_out <= 0)
		return;
	
	//-- ÐŸÑ€Ð¾ÑˆÐ»Ð° ÑÐµÐºÑƒÐ½Ð´Ð°
	st_out--		
	//-- Ð’Ñ€ÐµÐ¼Ñ Ð²Ñ‹ÑˆÐ»Ð¾
	if(st_out <= 0)	
	{
		DOM['st-out'].text(parent.GetDayRestFullTimeFormat(0));
		timout = window.setTimeout(function() {
			goPage(0,0);
		}, 1000);
	}
	//-- ÐžÐ±Ð½Ð¾Ð²Ð»ÑÐµÐ¼ Ñ‚Ð°Ð¹Ð¼ÐµÑ€
	else
	{
		DOM['st-out'].text(parent.GetDayRestFullTimeFormat(st_out));
		timout = window.setTimeout('TimeOut()', 1000);
	}
}
