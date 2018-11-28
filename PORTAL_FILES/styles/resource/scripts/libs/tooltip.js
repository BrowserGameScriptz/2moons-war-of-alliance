var tooltip = $('<div id="tooltip"></div>');
//-- Ð’ÐºÐ»ÑŽÑ‡Ð°ÐµÐ¼ Ð¿Ð¾Ð´ÑÐºÐ°Ð·ÐºÐ¸
function setTooltip(t)
{
	t.find(".tooltip").on({
		mouseleave : function () {
			TooltipHide()
		},
		mouseenter : function (e) 
		{
			tooltip.html($(this).data('tooltipContent'));
			setTooltipCoord(this, e, 'tip');			
		}
	});
}
//-- ÐŸÐ¾ÐºÐ°Ð·Ñ‹Ð²Ð°ÐµÐ¼ Tooltip
function setTooltipCoord(t, e, c)
{
	tooltip.stop(true, true).fadeIn(300);
	
	t = $(t);
	
	var offset		= t.offset();

	var width		= Math.floor(t.innerWidth());
	var height		= Math.floor(t.innerHeight());
	
	var tipWidth 	= Math.floor(tooltip.innerWidth());
	var tipHeight 	= Math.floor(tooltip.innerHeight());
		
	var CoordX		= Math.floor(offset.left) + Math.floor(width / 2) - Math.floor(tipWidth / 2);
	var CoordY		= offset.top + height + 5;
	
	var tipVisX 	= DOM['body'].width() - (CoordX + tipWidth);
	var tipVisY 	= DOM['body'].height() - (CoordY + tipHeight);	
	
	//-- Ð˜Ð·Ð¼ÐµÐ½ÑÐµÐ¼ Ð¿Ð¾Ð»Ð¾Ð¶ÐµÐ½Ð¸Ðµ Ð½Ð° ÑÐ²ÐµÑ€Ñ…Ñƒ
	if (tipVisY < 5) {
		CoordY	= offset.top - tipHeight - 7;
		c	+= ' tip-b';
	};
	
	//-- Ð¡Ð¼ÐµÑ‰ÐµÐ½Ð¸Ðµ Ð² Ð¡Ñ‚Ð¾Ñ€Ð¾Ð½Ñƒ
	if(tipVisX < 30) 
	{	
		CoordX = Math.floor(offset.left) + Math.floor(width / 2) - tipWidth + 6;	
		c	+= ' tip-r';
	}
	else if(CoordX < 0)
	{
		CoordX 	= Math.floor(offset.left) + Math.floor(width / 2) - 6;
		c	+= ' tip-l';
	}

	tooltip.attr('class', c).css({
		top : CoordY,
		left : CoordX
	});
}
//-- Ð¡ÐºÑ€Ñ‹Ñ‚ÑŒ Ð¿Ð¾Ð´ÑÐºÐ°Ð·ÐºÑƒ
function TooltipHide(){
	tooltip.stop(true, true).fadeOut(300);
}
//-- Ð£Ð²ÐµÐ´Ð¾Ð¼Ð»ÐµÐ½Ð¸Ðµ
function NotifyBox(text, time)
{
	if(time === undefined)
		time = 500;
	
	tooltip.stop(true, true).attr('class', 'tip tip-no').html(text).css({
		top : 100,
		left : (DOM['body'].width()/ 2  - tooltip.innerWidth() / 2),
	}).fadeIn(200);
	
	window.setTimeout(function(){tooltip.fadeOut(1000)}, time);
}
