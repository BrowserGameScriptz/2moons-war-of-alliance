var ActivTab = '';

var tr_out 	= 0;
var	timout	= 0;

function TimeOut() 
{
	if(tr_out <= 0)
		return;
	
	//-- ÐŸÑ€Ð¾ÑˆÐ»Ð° ÑÐµÐºÑƒÐ½Ð´Ð°
	tr_out--		
	//-- Ð’Ñ€ÐµÐ¼Ñ Ð²Ñ‹ÑˆÐ»Ð¾
	if(tr_out <= 0)	
	{
		DOM['tr-out'].text(parent.GetDayRestFullTimeFormat(0));
		return;
	}
	//-- ÐžÐ±Ð½Ð¾Ð²Ð»ÑÐµÐ¼ Ñ‚Ð°Ð¹Ð¼ÐµÑ€
	DOM['tr-out'].text(parent.GetDayRestFullTimeFormat(tr_out));
	timout = window.setTimeout('TimeOut()', 1000);
}


$(document).ready(function()
{	
	
	DOM['tr-out']		= $('#tr-out');	
	tr_out				= DOM['tr-out'].data('time');
	
	timout = window.setTimeout('TimeOut()', 1000);
	
	TrContent 	= $('#tr-contint'); 					// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ ÐºÐ¾Ð½Ñ‚ÐµÐ½Ñ‚Ð°
	SwitchTabs	= parent.$('.title-tabs:first'); 		// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ Ð¡Ð²Ð¸Ñ‡	
	//-- ÐžÑ‚ÐºÑ€Ñ‹Ð²Ð°ÐµÐ¼ Ñ‚Ð°Ð±
	OpenTab();
});

//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ Ð°Ð½Ñ‚Ð¸Ð²Ð½ÑƒÑŽ Ð²ÐºÐ»Ð°Ð´ÐºÑƒ
function OpenTab(Tab)
{	
	if(ActivTab == '')
	{
		if(Tab === undefined)
			if($.cookie('tab_tourney') !== undefined)
				Tab = $.cookie('tab_tourney');
			else
				Tab = '1';
	}
		
	if(Tab == ActivTab)
		return;
			
	ActivTab = Tab;
	
	$.cookie('tab_tourney', Tab);
	//-- Ð¢Ð°Ð±Ñ‹
	SwitchTabs.find('.title-tab').removeClass('title-tab-active');
	SwitchTabs.find('#tab-'+Tab).addClass('title-tab-active');
	//-- Ð¡ÐºÑ€Ñ‹Ð²Ð°ÐµÐ¼
	TrContent.find('.tr-division').hide();
	TrContent.find('.tr-reward').hide();	
	//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ
	TrContent.find('.tr-division-'+Tab).show();
}