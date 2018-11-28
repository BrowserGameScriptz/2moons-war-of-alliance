$(function(){	
	DOM['senat'] 		= $('#senat-content');
	
	//-- Ð—Ð°Ð¿ÑƒÑÐºÐ°ÐµÐ¼ Ñ‚Ð°Ð¹Ð¼ÐµÑ€Ñ‹
	$.each(SenatArray, function(id, item)
	{
		senatTimer(id, item.timeLeft)
	});
});

//-- Ð¢Ð°Ð¹Ð¼ÐµÑ€Ñ‹
function senatTimer(Element, Time)
{
	if(Time <= 0)
		return;
	
	DOM['senat'].find('#time'+Element).text(GetDayRestTimeFormat(Time));
	Time--;
	
	if(Time == 0)
		window.setTimeout("location.reload()", 1000);
	else
		window.setTimeout("senatTimer("+Element+", "+Time+")", 1000)
}
//-- Ð¦ÐµÐ½Ð°
function senatPrice(Element, Price)
{
	var Day  		= DOM['senat'].find('#days'+Element).val();
	var curDM 		= Math.max(0, parent.Frame.ResNav.gR(921));
	var needDm		= Number(Price) * Number(Day);
	
	var PriceBtn	= DOM['senat'].find('#p'+Element+'dm');
	
	if(needDm <= curDM)
		PriceBtn.removeClass('btn-danger');
	else
		PriceBtn.addClass('btn-danger');

	PriceBtn.find('.btn-text-cost-c:first').html(NumberGetHumanReadable(needDm));
}
function senatUp(Element)
{
	 DOM['senat'].find('#r'+Element).submit();
}