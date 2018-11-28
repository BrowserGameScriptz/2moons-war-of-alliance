var TimeOuntSearch = 0;

//-- 
$(function() 
{		
	//-- ÐŸÑ€Ð¾Ð±ÐµÐ»Ñ‹ Ð² Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸ÑÑ…	
	$('.countdots').keyup(function(e) {
		$(e.target).val(function(i, old) {
			return parent.NumberGetHumanReadable(old.replace(/[^\d]/g, ''));
		});	
	});
	
	//-- Ð¢Ð°Ð¹Ð¼ÐµÑ€Ñ‹
	DOM['al-timers']	= $('.al-timers');
	if(DOM['al-timers'].length > 0)
		alTimer();
});

//-- Ð¢Ð°Ð¹Ð¼ÐµÑ€Ñ‹
function alTimer()
{
	DOM['al-timers'].each(function(indx, element){
	  	var e = $(element);
	  	var t = e.data('time');
		
		if(t > 0)
		{
			t--;
			e.data('time', t);
			e.text(parent.GetDayRestFullTimeFormat(t));
		}
	});
	
	window.setTimeout("alTimer();", 1000)
}

//-- ÐŸÐ¾Ð¸ÑÐº Ð°Ð»ÑŒÑÐ½ÑÐ°
function searchSend(page) 
{	
	IPost("game.php?page=alliance", {'mode': 'search', 'site': page, 'searchtext': $('#searchtext').val(),}, [], [TimeOuntSearch]);
}
//-- Ð¢Ð°Ð¹Ð¼ÐµÑ€
function AllTimer(time, div) 
{	
	time--;
	
	div.text(parent.GetShortRestTimeFormat(time));
	
	//-- ÐŸÑ€ÐµÐ·Ð°Ð¿ÑƒÑÐº Ñ‚Ð°Ð¹Ð¼ÐµÑ€Ð°
	if(time > 0)
		TimeOuntSearch = window.setTimeout(AllTimer, 1000, time, div);
	else
		searchSend(1);
}
//-- Ð£Ð±Ñ€Ð°Ñ‚ÑŒ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹ Ð¸Ð· Ð¸Ð½Ð¿ÑƒÑ‚Ð¾Ð²
function DotsToCount() 
{
	$('.countdots').val(function(i, old) {
		return old.replace(/[^\d]/g, '');
	});
}
//-- Ð¥Ñ€Ð°Ð½Ð¸Ð»Ð¸Ñ‰Ðµ
//-- -- Ð£Ñ‚Ð°Ð½Ð¾Ð²ÐºÐ° Ñ€ÐµÑÑƒÑ€ÑÐ¾Ð²
function maxResource(id) 
{
	var thisresource 		= Math.max(0, parent.Frame.ResNav.gR(id));
	var thisresourcechosen 	= parseInt(DOM['res'][id].val().replace(/[^\d]/g, ''));	
	
	if(thisresource < 0)
		thisresource = 0;
	
	var r901 = parseInt(DOM['res'][901].val().replace(/[^\d]/g, ''));
	var r902 = parseInt(DOM['res'][902].val().replace(/[^\d]/g, ''));
	var r903 = parseInt(DOM['res'][903].val().replace(/[^\d]/g, ''));
		
	var freeCapacity = Math.max(MaxRes - r901 - r902 - r903, 0);
	
	if(id < 910)
		DOM['res'][id].val(parent.NumberGetHumanReadable(Math.min(freeCapacity + thisresourcechosen, thisresource)));
	else
		DOM['res'][id].val(parent.NumberGetHumanReadable(thisresource));
	
	calculateStorageCapacity();
}
//-- -- Min Ñ€ÐµÑÑƒÑ€Ñ
function minResource(id) 
{
	DOM['res'][id].val(0);
	calculateStorageCapacity();
}

//-- -- Ð Ð°ÑÑ‡ÐµÑ‚ Ð—Ð°Ð³Ñ€ÑƒÐ·ÐºÐ¸
function calculateStorageCapacity() 
{
	if(MaxRes == 0)
		return;
		
	r901 = Math.abs(parseInt(DOM['res'][901].val().replace(/[^\d]/g, '')));
	r902 = Math.abs(parseInt(DOM['res'][902].val().replace(/[^\d]/g, '')));
	r903 = Math.abs(parseInt(DOM['res'][903].val().replace(/[^\d]/g, '')));
	
	var transportCapacity = MaxRes - r901 - r902 - r903;
	
	if(transportCapacity < 0)
		DOM['res']['count'].html("<span class='c-red'>"+parent.NumberGetHumanReadable(transportCapacity)+"</span>");
	else
		DOM['res']['count'].text(parent.NumberGetHumanReadable(transportCapacity));
	
	//-- ÐŸÑ€Ð¾Ñ†ÐµÐ½Ñ‚ Ð·Ð°Ð³Ñ€ÑƒÐ·ÐºÐ¸
	percent =  Math.max(0, Math.min(100, 100 - Math.round(transportCapacity / MaxRes * 100)));
	DOM['res']['percent'].text('[ ' + percent + '% ]');
	DOM['res']['filling'].width( percent + '%');
}
//-- -- ÐžÑ‚Ð¿Ñ€Ð°Ð²ÐºÐ° Ñ€ÐµÑÑƒÑ€ÑÐ¾Ð²
function StoragePutSend()
{	
	DotsToCount();

	$.post("game.php?page=alliance&ajax=1", $('#storage').serialize(), function(data)
	{
		parent.NotifyBox(data[1]);
		
		if(data[0]){
			parent.$.fancybox.close();
			parent.Frame.IFrame.open('alliance');
		}
	}, "json");
}