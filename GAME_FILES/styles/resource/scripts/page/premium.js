var ActivTab = '';

$(document).ready(function()
{		
	PremiumContent = $('#prem-content'); 					// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ ÐºÐ¾Ð½Ñ‚ÐµÐ½Ñ‚Ð°
	DOM['pvp'] 		= PremiumContent.find('#b-pvp'); 		// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ pvp
	DOM['pve'] 		= PremiumContent.find('#b-pve'); 		// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ pve
	DOM['extra'] 	= PremiumContent.find('#b-extra'); 		// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ extra
	DOM['dm'] 		= PremiumContent.find('#b-dm'); 		// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ pve
	DOM['am'] 		= PremiumContent.find('#b-am'); 		// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ pve
	DOM['res'] 		= PremiumContent.find('#b-res'); 		// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ pve
	SwitchTabs		= parent.$('.title-tabs:first'); 		// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ Ð¡Ð²Ð¸Ñ‡

	Container		= $('#prem-container');
	ContainerBox	= $('#prem-elements');
	
	//-- ÐžÑ‚ÐºÑ€Ñ‹Ð²Ð°ÐµÐ¼ Ñ‚Ð°Ð±
	OpenTab();
});

//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ Ð°Ð½Ñ‚Ð¸Ð²Ð½ÑƒÑŽ Ð²ÐºÐ»Ð°Ð´ÐºÑƒ
function OpenTab(Tab)
{	
	if(ActivTab == '')
	{
		if(Tab === undefined)
			if($.cookie('tab_prem') !== undefined)
				Tab = $.cookie('tab_prem');
			else
				Tab = 'boost';
	}
		
	if(Tab == ActivTab)
		return;
			
	ActivTab = Tab;
	
	$.cookie('tab_prem', Tab);
	//-- Ð¢Ð°Ð±Ñ‹
	SwitchTabs.find('.title-tab').removeClass('title-tab-active');
	SwitchTabs.find('#tab-'+Tab).addClass('title-tab-active');
	//-- Ð¡ÐºÑ€Ñ‹Ð²Ð°ÐµÐ¼
	DOM['pvp'].hide();
	DOM['pve'].hide();
	DOM['extra'].hide();
	DOM['dm'].hide();
	DOM['am'].hide();
	DOM['res'].hide();
	//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ
	if(Tab == 'boost')
	{
		DOM['pvp'].show();
		DOM['pve'].show();
		DOM['extra'].show();
	}
	else if(Tab == 'dm')
	{
		DOM['dm'].show();
		DOM['res'].show();
	}
	else
	{
		DOM[Tab].show();
	}
}

//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ Ð¸ÑÑÐ»ÐµÐ´Ð¾Ð²Ð°Ð½Ð¸Ðµ
function OpenPrem(id)
{	
	ContainerBox.find('.prem-active').removeClass('prem-active');
	ContainerBox.find('#b'+id).addClass('prem-active');
	
	Container.find('.prem-box-active').removeClass('prem-box-active');
	Container.find('#c'+id).addClass('prem-box-active');
}