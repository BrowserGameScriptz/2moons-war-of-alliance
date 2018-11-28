var flagShow = false;
//-- AjaxFleet
function doit(missionID, planetID, sleeve, system, planet, shipData) 
{
	var shipDetail	= decodeURIComponent($.param({"ship": shipData}));
	
	$.getJSON("game.php?page=fleetAjax&ajax=1&mission="+missionID+"&planetID="+planetID+"&sleeve="+sleeve+"&system="+system+"&planet="+planet+"&"+shipDetail, function(data){
		
		$('#slots').text(data.slots);
		$('#probes').text(number_format(data.ship[210]));
		$('#recyclers').text(number_format(data.ship[209]));
		$('#grecyclers').text(number_format(data.ship[219]));
		/*
		var statustable	= $('#fleetstatusrow');
		var messages	= statustable.find("~tr");
		if(messages.length == MaxFleetSetting) {
			console.log(messages.get(MaxFleetSetting - 1));
			messages.filter(':last').remove();
		}
		*/
		//var element	= $('<td />').attr('colspan', 8).attr('class', data.code == 600 ? "success" : "error").text(data.mess).wrap('<tr />').parent();
		
		NotifyBox(data.mess, 2000)
		
		//statustable.removeAttr('style').after(element);
	});
}

function MovimentoGalaxy(moGalaxy)
{
	if(!flagShow)
		return;
		
	moGalaxy = (moGalaxy) ? moGalaxy : ((evento) ? evento : null);
	
	switch(moGalaxy.keyCode) 
	{
		case 13:
	  		ShowRows();
		break;
	 	case 37:
	  		systemLeft();
		break;
		case 39:
	  		systemRight();
		break;
		case 38:
	  		sleeveRight();
		break;
		case 40:
	  		sleeveLeft();
		break;		
	}
}
document.onkeydown = MovimentoGalaxy;
jQuery(document).ready(function()
{
	DOM['container'] 	= $('#gl-container');
	DOM['sleeve'] 		= $('#sleeve');
	DOM['system'] 		= $('#system');
	
	flagShow = true;
});
//-- ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ
function ShowRows() 
{
	//-- Ð’ÐºÐ»ÑŽÑ‡Ð°ÐµÐ¼ Ð¿Ñ€Ð¸Ð»Ð¾Ð°Ð´Ð¸Ð½Ð³
	parent.Frame.IFrame.Plon();
	flagShow = false;
	
	var sleeve 	= Number(DOM['sleeve'].val());	
	var	system	= Number(DOM['system'].val());
	
	if(sleeve > MaxSleeve)
	{
		sleeve = MaxSleeve;
		DOM['sleeve'].val(sleeve)
	}
	
	if(system > MaxSystem)
	{
		system = MaxSystem;
		DOM['sleeve'].val(system)
	}
	
	DOM['container'].load('game.php?page=galaxy&sleeve='+sleeve+'&system='+system+' #gl-rows', 
		function(){
			parent.Frame.IFrame.Ploff();
			setTooltip(DOM['container']);
			flagShow = true;
		});
}
//-- Ð¡Ð¸ÑÑ‚ÐµÐ¼Ð° -
function systemLeft()
{
	var s = Math.max(1, Number(DOM['system'].val()) - 1);
	DOM['system'].val(s);
	ShowRows();
}
//-- Ð¡Ð¸ÑÑ‚ÐµÐ¼Ð° +
function systemRight()
{
	var s = Math.min(MaxSystem, Number(DOM['system'].val()) + 1);	
	DOM['system'].val(s); 
	ShowRows();
}
//-- Ð ÑƒÐºÐ°Ð² -
function sleeveLeft()
{
	var s = Number(DOM['sleeve'].val()) - 1;
	
	if(s < 1)
		s = MaxSleeve;
		
	DOM['sleeve'].val(s);
	ShowRows();
}
//-- Ð ÑƒÐºÐ°Ð² +
function sleeveRight()
{
	var s = Number(DOM['sleeve'].val()) + 1;	
	
	if(s > MaxSleeve)
		s = 1;
		
	DOM['sleeve'].val(s); 
	ShowRows();
}