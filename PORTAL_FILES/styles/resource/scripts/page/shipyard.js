var HTMLadd			='',
	ActivTab		='',
	v  				= new Date(), 
	progress		= 
	FlagKey			= 
	interval		= 0,
	ShipCount		= 0,	// ÐšÐ¾Ð»Ð²Ð¾ ÐÐºÑ‚Ð¸Ð²Ð½Ð¾ÐµÐ³Ð¾ ÑŽÐ½Ð¸Ñ‚Ð°
	ShipData		= {},	// Ð˜Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ñ Ð¿Ð¾ Ð°ÐºÑ‚Ð¸Ð²Ð½Ð¾Ð¼Ñƒ ÑŽÐ½Ð¸Ñ‚Ñƒ
	ActivShipDOM	= 		// DOM Ð°ÐºÑ‚Ð¸Ð²Ð½Ð¾Ð³Ð¾ Ð±Ð»Ð¾ÐºÐ°
	BuildingContent = 		// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ ÐºÐ¾Ð½Ñ‚ÐµÐ½Ñ‚Ð°
	FleetContent	=
	DefenseContent 	=
	QueueDOM		=		// DOM Ð¾Ñ‡ÐµÑ€ÐµÐ´Ð¸
	QueueTimerDOM	=		// DOM Ñ‚Ð°Ð¹Ð¼ÐµÑ€Ð° Ð¾Ñ‡ÐµÑ€ÐµÐ´Ð¸
	QueueShipDOM	= 		// DOM ÑÑ‚Ñ€Ð¾ÑÑ‰ÐµÐ³Ð¾ÑÑ Ñ„Ð»Ð¾Ñ‚Ð°
	SwitchTabs 		= $()	// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ Ð¡Ð²Ð¸Ñ‡
	QueueCur		= 0		// ÐÐ¾Ð¼ÐµÑ€ Ð°ÐºÑ‚Ð¸Ð²Ð½Ð¾Ð³Ð¾ ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ð° Ð¾Ñ‡ÐµÑ€ÐµÐ´Ð¸
;

$(document).ready(function()
{		
	BuildingContent = $('#build-elements'); 				// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ ÐºÐ¾Ð½Ñ‚ÐµÐ½Ñ‚Ð°
	DOM['fleet'] 	= BuildingContent.find('#b-fleet'); 	// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ Ñ„Ð»Ð¾Ñ‚Ð°
	DOM['defenses'] 	= BuildingContent.find('#b-defenses'); 	// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ Ð¾Ð±Ð¾Ñ€Ð¾Ð½Ñ‹
	DOM['prime'] 	= BuildingContent.find('#b-prime'); 	// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ ÐŸÑ€Ð°Ð¹Ð¼
	SwitchTabs		= parent.$('.title-tabs:first'); 		// DOM ÑÐ¾Ð´ÐµÑ€Ð¶Ð°Ð½Ð¸Ðµ Ð¡Ð²Ð¸Ñ‡
	
	//-- ÐžÑ‚ÐºÑ€Ñ‹Ð²Ð°ÐµÐ¼ Ñ‚Ð°Ð±
	OpenTab();
	
	if(Queue.Shipyard.length)
	{
		QueueDOM		= $('#queue-build'); 		// DOM Ð¾Ñ‡ÐµÑ€ÐµÐ´Ð¸
		QueueTimerDOM	= $('#queue-all-time'); 	// DOM Ñ‚Ð°Ð¹Ð¼ÐµÑ€Ð° Ð¾Ñ‡ÐµÑ€ÐµÐ´Ð¸
		QueueShipDOM	= QueueDOM.find('#q_1'); 	// DOM ÑÑ‚Ñ€Ð¾ÑÑ‰ÐµÐ³Ð¾ÑÑ Ñ„Ð»Ð¾Ñ‚Ð°
		
		//-- Ð—Ð°Ð¿ÑƒÑÐºÐ°ÐµÐ¼ Ð¾Ñ‡ÐµÑ€ÐµÐ´ÑŒ
		ShipyardInit();
		//-- Ð Ð°Ð·Ð²Ð°Ñ€Ð°Ñ‡Ð¸Ð²Ð°ÐµÐ¼ Ð¿ÐµÑ€Ð²Ñ‹Ð¹ ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚
		openQueueBlock(1);
	}
	
	BuildingContent.find('input[type=text]').keyup(function() {
		countDots();		
	});
	$('form').submit(function() {
		DotsToCount();
	});

});

//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ Ð°Ð½Ñ‚Ð¸Ð²Ð½ÑƒÑŽ Ð²ÐºÐ»Ð°Ð´ÐºÑƒ
function OpenTab(Tab)
{	
	if(ActivTab == '')
	{
		if(Tab === undefined)
			if($.cookie('tab_ship') !== undefined)
				Tab = $.cookie('tab_ship');
			else
				Tab = 'fleet';
	}
		
	if(Tab == ActivTab)
		return;
			
	ActivTab = Tab;
	
	$.cookie('tab_ship', Tab);
	//-- Ð¢Ð°Ð±Ñ‹
	SwitchTabs.find('.title-tab').removeClass('title-tab-active');
	SwitchTabs.find('#tab-'+Tab).addClass('title-tab-active');
	//-- Ð¡ÐºÑ€Ñ‹Ð²Ð°ÐµÐ¼
	DOM['fleet'].hide();
	DOM['defenses'].hide();
	DOM['prime'].hide();
	//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ
	DOM[Tab].show();
}

//-- Ð Ð°Ð±Ð¾Ñ‚Ð° Ñ Ð¾Ñ‡ÐµÑ€ÐµÐ´ÑŒÑŽ
function ShipyardInit() 
{
	Ship				= Queue['Shipyard'][0];
	Amount				= Number(Ship[1]);
	HangarTime			= Queue['Hangar'];
	FullTime			= Queue['Time'] + 1;

	BuildlistShipyard();
	
	interval			= window.setInterval(BuildlistShipyard, 1000);
}

function BuildlistShipyard() 
{
	FullTime--;	
	HangarTime++;
		
	if(HangarTime >= Ship[2]) //-- 1-Ñ†Ð° Ð¿Ð¾ÑÑ‚Ñ€Ð¾ÐµÐ½Ð°
	{
		HangarTime = 0;
		
		var count = 1;
		if(Ship[2] < 1)
			count = 1 / Ship[2];
			
		$('#val_'+Ship[3]).text(function(i, old){
			return parent.NumberGetHumanReadable(Number(old.replace(/[ ]/g, ''))+Number(count));
		})	
	
		if(Ship[1] > count) //-- ÐÐ°Ñ‡Ð°Ñ‚ÑŒ Ð½Ð¾Ð²ÑƒÑŽ
		{				
			Ship[1] -= count;
			QueueShipDOM.find('.queue-count:first').text(parent.NumberGetHumanReadable(Ship[1]));					
		}
		else //-- ÐŸÐ°Ñ‡ÐºÐ° Ð¿Ð¾ÑÑ‚Ñ€Ð¾ÐµÐ½Ð° Ð¾Ð±Ð½Ð¾Ð²Ð»ÑÐµÐ¼ Ð´Ð°Ð½Ð½Ñ‹Ðµ
		{	
			Ship[1]  = 0;
			QueueShipDOM.find('.queue-count:first').text(0);	
			
			window.clearInterval(interval);
			window.setTimeout(function() {
				window.location.href = 'game.php?page=shipyard';
			}, 1000);
			return false;
		}
	}
	
	if(Ship[2] <= 1)
		i = 1;
	else if ((Ship[2] - HangarTime) <= 1)
		i = Ship[2];
	else
		i = HangarTime;
			
	QueueShipDOM.find('.queue-time:first').text(parent.GetDayRestFullTimeFormat(Math.max(1, Ship[1] * Ship[2] - HangarTime)));	
	QueueShipDOM.find('.queue-p:first').width((Math.min(1, (i / Ship[2])) * 100)+'%');
	
	QueueTimerDOM.text(parent.GetDayRestFullTimeFormat(FullTime));
}
//-- Ð Ð°Ð·Ð²ÐµÑ€Ð½ÑƒÑ‚ÑŒ ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚ Ð¾Ñ‡ÐµÑ€ÐµÐ´Ð¸
function openQueueBlock(id) 
{
	if(QueueCur == id)
		return false;
		
	QueueDOM.find('#q_'+QueueCur).removeClass('queue-block-big-max');
	QueueDOM.find('#q_'+id).addClass('queue-block-big-max');
	
	QueueCur = id;
}
/*------------------------------------------------------------*/
function counting(id)
{
	DotsToCount();
	var Data 			= DatatList[id];
	var Element			= BuildingContent.find('#s_'+(String(id)));
	var	count 			= Math.max(0, Number(Element.find('.build-count-input:first').val()));
	
	if(count > MaxCount)
	{
		count = MaxCount;
		Element.find('.build-count-input:first').val(MaxCount);
	}
	
	var CurRes 			= parent.Frame.ResNav.p;
	var ResDOM 			= $();	
	
	
	if(typeof Data.costRessources[901] !== "undefined")
	{
		CalcRess(901, Number(Data.costRessources[901]) * count, CurRes[901][0], Element)
	}
	if(typeof Data.costRessources[902] !== "undefined")
	{
		CalcRess(902, Number(Data.costRessources[902]) * count, CurRes[902][0], Element)
	}
	if(typeof Data.costRessources[903] !== "undefined")
	{
		CalcRess(903, Number(Data.costRessources[903]) * count, CurRes[903][0], Element)
	}
	
	Element.find(".build-time .build-price-text:first").text(parent.GetDayRestFullTimeFormat(Math.max(1, Data.elementTime * count)));
	countDots();
};

function CalcRess(ResId, ResCost, CurRes, Element)
{
	var ResDOM = Element.find(".c-"+ResId+":first");
	ResDOM.text(parent.NumberGetHumanReadable(ResCost));
	
	if(CurRes < ResCost)	
	{
		 ResDOM.addClass('c-red tooltip').attr('data-tooltip-content', LNGning + ' ' + LNGtech[ResId] + ' ' + parent.NumberGetHumanReadable(ResCost - CurRes)); 
	}	
	else
	{
		 ResDOM.removeClass('c-red tooltip').removeAttr('data-tooltip-content'); 
	}
}


function DotsToCount() {
	BuildingContent.find('input[type=text]').val(function(i, old) {
		return old.replace(/[^[0-9]|\ ]/g, '');
	});
}
function countDots(e) {
	BuildingContent.find('input[type=text]').val(function(i, old) {
		return parent.NumberGetHumanReadable(old.replace(/[^[0-9]|\ ]/g, ''));
	});	
}