var acstime = 0;
var data	= {};

//--
$(function()
{	
	DOM['arrival'] 		= $('#arrival');
	DOM['return']		= $('#return');
	DOM['consumption'] 	= $('#consumption');
	//DOM['storage']		= $('#remainingresources');
	DOM['speed']		= $('#speed');
	DOM['staytime']		= $('#staytime');
	DOM['FleetPoints']	= $('#FleetPoints');	
	DOM['fl-fleet'] 	= $('.fl-fleet:first');
		
	DOM['res']			= {
		'901' 		: $('#r901'),
		'902' 		: $('#r902'),
		'903' 		: $('#r903'),		
		'count' 	: $('#r-count'),
		'filling' 	: $('#r-filling'),
		'percent' 	: $('#r-percent'),
	};

	
	//-- Ð’Ð²Ð¾Ð´ ÐºÐ¾Ð»-Ð²Ð° Ñ„Ð»Ð¾Ñ‚Ð°
	DOM['fleet-count'] = DOM['fl-fleet'].find('.fleet-count');
	DOM['fleet-count'].keyup(function(e){		
		upVars();
	});
	
	//-- Ð’Ð²Ð¾Ð´ ÐºÐ¾Ð»-Ð²Ð° Ñ„Ð»Ð¾Ñ‚Ð° Ñ€ÐµÑÑÐ°	
	$('.fl-res-input').keyup(function(e) {	
		calculateTransportCapacity();
	});
	//-- ÐŸÑ€Ð¾Ð±ÐµÐ»Ñ‹ Ð² Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸ÑÑ…	
	$('.countdots').keyup(function(e) {
		$(e.target).val(function(i, old) {
			return parent.NumberGetHumanReadable(old.replace(/[^\d]/g, ''));
		});	
		//calculateTransportCapacity();
	});
		
	//-- Ð“Ñ€ÑƒÐ¿Ð¿Ñ‹ Ñ„Ð»Ð¾Ñ‚Ð¾Ð²
	var key = FlightData.mission * 10 + FlightData.sector;
	if(FlightData.ShipGroop[key] !== undefined){		
		$.each(FlightData.ShipGroop[key], function(id, count)
		{
			setShip(id, count);
		});
	}
	
	upVars();
	FleetTime();
	window.setInterval("FleetTime()", 1000);	
});

//-- Ð£Ð±Ñ€Ð°Ñ‚ÑŒ Ð¿Ñ€Ð¾Ð±ÐµÐ»Ñ‹ Ð¸Ð· Ð¸Ð½Ð¿ÑƒÑ‚Ð¾Ð²
function DotsToCount() 
{
	$('.countdots').val(function(i, old) {
		return old.replace(/[^\d]/g, '');
	});
}
//-- ÐžÐ±Ñ‰Ð¸Ð¹ Ð¿Ñ€Ð¾ÑÑ‡ÐµÑ‚ Ñ€ÐµÐ¹ÑÐ°
function upVars()
{	
	//-- ÐžÐ±Ð½ÑƒÐ»ÑÐµÐ¼ Ð·Ð½Ð°Ñ‡ÐµÐ½Ð¸Ñ
	data['MaxSpeed'] 	= 0; // ÐœÐ°ÐºÑÐ¸Ð¼Ð°Ð»ÑŒÐ½ÑÐ°Ñ ÑÐºÐ¾Ñ€Ð¾ÑÑ‚ÑŒ
	data['FleetPoints'] = 0; // ÐžÑ‡ÐºÐ¸ Ñ„Ð»Ð¾Ñ‚Ð°
	data['FleetRoom'] 	= 0; // Ð Ð°Ð·Ð¼ÐµÑ€ Ñ‚Ñ€ÑŽÐ¼Ð°
	data['Ship']		= [];// Ð¤Ð»Ð¾Ñ‚
	//-- ÐŸÐµÑ€ÐµÐ±ÐµÑ€Ð°ÐµÐ¼ Ð¸Ð¼ÐµÑŽÑ‰Ð¸Ð¹ÑÑ Ñ„Ð»Ð¾Ñ‚
	DOM['fleet-count'].each(function()
	{
		dom		= $(this); 
		Count	= Number(dom.val().replace(/[^\d]/g, ''));
		id		= dom.attr('sid');
		Ship	= FleetData[id];
			
		FleetData[id]['amount'] = Count;
		
		if(Count <= 0)
			return;
			
		data['Ship'].push(id);
			
		data['FleetPoints']	+= Ship.points * Count;
		data['FleetRoom'] 	+= Ship.capacity * Count;
		
		if(data['MaxSpeed'] > Ship.speed || data['MaxSpeed'] == 0)
			data['MaxSpeed'] = Ship.speed;
		
		if(Ship.count < Count)
			dom.addClass('c-red');
		else
			dom.removeClass('c-red');
	});
	
	data['FleetRoom'] *= FlightData.ShipStorage;
	
	//--
	data['FlyTime'] 		= GetDuration();
	data['FlyConsumption'] 	= GetConsumption();
	data['FlyCargoSpace'] 	= GetStorage();
	data['FleetRes'] 		= 0;
	//-- ÐžÐ±Ð½Ð°Ð²Ð»ÑÐµÐ¼ Ð¿Ð¾ÐºÐ°Ð·Ð°Ñ‚ÐµÐ»Ð¸
	refreshFormData();
}
//-- Ð’Ñ€ÐµÐ¼Ñ Ð¿Ð¾Ð»ÐµÑ‚Ð°
function GetDuration() 
{
	if(data['MaxSpeed'] == 0)
		return 0;
		
	sp = Number(DOM['speed'].val());
	return Math.max(Math.round((3500 / (sp * 0.1) * Math.pow(FlightData.distance * 10 / data['MaxSpeed'], 0.5) + 10) / FlightData.gamespeed), FlightData.MinFlyTime);
}
//-- ÐŸÐ¾ÑÑ‚Ñ€ÐµÐ±Ð»ÐµÐ¸Ðµ
function GetConsumption() 
{
	dataFlyConsumption 	= 0;
	basicConsumption 	= 0;
	
	var staytime	= DOM['staytime'].val();
	
	if(staytime == undefined)
		staytime = 0;	
	
	$.each(data['Ship'], function(key,id)
	{
		ship				= FleetData[id];
		spd 				= 35000 / (data['FlyTime'] *  FlightData.gamespeed - 10) * Math.sqrt(FlightData.distance * 10 / ship.speed);
		basicConsumption 	= ship.consumption * ship.amount;
		dataFlyConsumption += basicConsumption * FlightData.distance / 35000 * (spd / 10 + 1) * (spd / 10 + 1);	
	});
	
	dataFlyConsumption = Math.ceil(dataFlyConsumption * FlightData.MotorEconomy);
	
	dataFlyConsumption *= 1 + staytime / 100;
	
	return dataFlyConsumption;
}
//-- Ð’Ð¼ÐµÑÑ‚Ð¸Ð¼Ð¾ÑÑŒ
function GetStorage(){
	return data['FleetRoom'] - data['FlyConsumption'];
}
//-- ÐžÐ±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ðµ Ð´Ð°Ð½Ð½Ñ‹Ñ…
function refreshFormData()
{
	var seconds = data['FlyTime'];
	var hours = Math.floor(seconds / 3600);
	seconds -= hours * 3600;
	var minutes = Math.floor(seconds / 60);
	seconds -= minutes * 60;
	$("#duration").text(hours + (":" + dezInt(minutes, 2) + ":" + dezInt(seconds,2) + " h"));
	$("#maxspeed").text(parent.NumberGetHumanReadable(data['MaxSpeed']));
	
	if(data['FlyCargoSpace'] >= 0) {
		
		if(parent.Frame.ResNav.gR(903) >= data['FlyConsumption'])		
			DOM['consumption'].html("<font class=''>" + parent.NumberGetHumanReadable(data['FlyConsumption']) + "</span>");
		else
			DOM['consumption'].html("<span class='c-red'>" + parent.NumberGetHumanReadable(data['FlyConsumption']) + "</span>");
		//DOM['storage'].html("<span class=''>" + parent.NumberGetHumanReadable(data['FlyCargoSpace']) + "</span>");
	} else {
		DOM['consumption'].html("<span class='c-red'>" + parent.NumberGetHumanReadable(data['FlyConsumption']) + "</span>");
		DOM['res']['count'].html("<span class='c-red'>" + parent.NumberGetHumanReadable(data['FlyCargoSpace']) + "</span>");
	}
	
	//-- Ð Ð°ÑÑ‡ÐµÑ‚ Ð²Ð¼ÐµÑÑ‚Ð¸Ð¼Ð¾ÑÑ‚Ð¸
	calculateTransportCapacity()
	//-- ÐžÑ‡ÐºÐ¸ Ñ„Ð»Ð¾Ñ‚Ð°
	DOM['FleetPoints'].text(parent.NumberGetHumanReadable(Math.floor(data['FleetPoints'])));
}
//-- Ð”Ð°Ñ‚Ð°/Ð²Ñ€ÐµÐ¼Ñ Ð¿Ð¾Ð»ÐµÑ‚Ð°
function FleetTime()
{ 
	if(typeof(data['FlyTime']) === undefined)
		return;
	
	var sekunden 	= serverTime.getSeconds();
	var starttime 	= data['FlyTime'];
	var staytime	= DOM['staytime'].val();
	
	if(staytime == undefined)
		staytime = 0;
		
	var endtime		= starttime + data['FlyTime'] + staytime * 3600;
	
	DOM['arrival'].html(parent.getFormatedDate(serverTime.getTime()+1000*starttime, '[d] [M] [H]:[i]:[s]'));
	DOM['return'].html(parent.getFormatedDate(serverTime.getTime()+1000*endtime, '[d] [M] [H]:[i]:[s]'));
}

//-- Ð£Ñ‚Ð°Ð½Ð¾Ð²ÐºÐ° Ñ€ÐµÑÑƒÑ€ÑÐ¾Ð²
function maxResource(id) 
{
	var thisresource 		= Math.max(0, parent.Frame.ResNav.gR(id));
	var thisresourcechosen 	= parseInt(DOM['res'][id].val().replace(/[^\d]/g, ''));	

	var storCap = data['FlyCargoSpace'];
	
	//-- Ð”ÐµÐ¹Ñ‚ÐµÑ€Ð¸Ð¹
	if(id == '903')
		thisresource -= data['FlyConsumption'];
	
	if(thisresource < 0)
		thisresource = 0;
	
	var r901 = parseInt(DOM['res'][901].val().replace(/[^\d]/g, ''));
	var r902 = parseInt(DOM['res'][902].val().replace(/[^\d]/g, ''));
	var r903 = parseInt(DOM['res'][903].val().replace(/[^\d]/g, ''));
		
	var freeCapacity = Math.max(storCap - r901 - r902 - r903, 0);
	
	DOM['res'][id].val(parent.NumberGetHumanReadable(Math.min(freeCapacity + thisresourcechosen, thisresource)));
	
	calculateTransportCapacity();
}
//-- Min Ñ€ÐµÑÑƒÑ€Ñ
function minResource(id) 
{
	DOM['res'][id].val(0);
	calculateTransportCapacity();
}
//-- Max Ñ€ÐµÑÑƒÑ€ÑÐ¾Ð²
function maxResourceAll() 
{
	maxResource('901');
	maxResource('902');
	maxResource('903');
}
//-- Max Ñ€ÐµÑÑƒÑ€ÑÐ¾Ð²
function minResourceAll() 
{
	DOM['res']['901'].val(0);
	DOM['res']['902'].val(0);
	DOM['res']['903'].val(0);
	calculateTransportCapacity();
}
//-- Ð Ð°ÑÑ‡ÐµÑ‚ Ð—Ð°Ð³Ñ€ÑƒÐ·ÐºÐ¸ Ñ„Ð»Ð¾Ñ‚Ð°
function calculateTransportCapacity() 
{
	if(data['FleetRoom'] == 0 ||  data['FlyCargoSpace'] == 0)
		return;
		
	r901 = Math.abs(parseInt(DOM['res'][901].val().replace(/[^\d]/g, '')));
	r902 = Math.abs(parseInt(DOM['res'][902].val().replace(/[^\d]/g, '')));
	r903 = Math.abs(parseInt(DOM['res'][903].val().replace(/[^\d]/g, '')));
	
	data['FleetRes'] 	=  r901 + r902 + r903;
	transportCapacity 	= data['FlyCargoSpace'] - data['FleetRes'];
	
	if(transportCapacity < 0)
		DOM['res']['count'].html("<span class='c-red'>"+parent.NumberGetHumanReadable(transportCapacity)+"</span>");
	else
		DOM['res']['count'].text(parent.NumberGetHumanReadable(transportCapacity));
	
	//-- ÐŸÑ€Ð¾Ñ†ÐµÐ½Ñ‚ Ð·Ð°Ð³Ñ€ÑƒÐ·ÐºÐ¸
	percent =  Math.max(0, Math.min(100, 100 - Math.round(transportCapacity / data['FleetRoom'] * 100)));
	DOM['res']['percent'].text('[ ' + percent + '% ]');
	DOM['res']['filling'].width( percent + '%');
}

//-- MaxShip
function maxShip(id) 
{
	DOM['fl-fleet'].find('#s'+id).val(parent.NumberGetHumanReadable(FleetData[id]['count']));
	upVars();	
}
//-- minShip
function minShip(id) {
	DOM['fl-fleet'].find('#s'+id).val(0);
	upVars();	
}
//-- Ð£ÑÑ‚Ð°Ð½Ð¾Ð²Ð¸Ñ‚ÑŒ ÐºÐ¾Ð»-Ð²Ð¾
function setShip(id, count) {
	DOM['fl-fleet'].find('#s'+id).val(parent.NumberGetHumanReadable(count));
	upVars();	
}
//--
function maxShipAll() {
	$.each(FleetData, function(id,ship)
	{
		DOM['fl-fleet'].find('#s'+id).val(parent.NumberGetHumanReadable(ship['count']));
	});
	upVars();
}
//--
function minShipAll() {
	$.each(FleetData, function(id,ship)
	{
		DOM['fl-fleet'].find('#s'+id).val(parent.NumberGetHumanReadable(0));
	});
	upVars();
}
//--
function maxGroop(groop) {
	$.each(FleetGroop[groop], function(key,id)
	{
		if(FleetData[id] !== undefined)
			DOM['fl-fleet'].find('#s'+id).val(parent.NumberGetHumanReadable(FleetData[id]['count']));
	});
	upVars();
}
//--
function minGroop(groop) {
	$.each(FleetGroop[groop], function(key,id)
	{	
		if(FleetData[id] !== undefined)
			DOM['fl-fleet'].find('#s'+id).val(0);
	});
	upVars();
}

//-- ÐžÑ‚Ð¿Ñ€Ð°Ð²Ð¸Ñ‚ÑŒ Ñ„Ð»Ð¾Ñ‚
function sendFleet() 
{	
	if(FlagCaptcha){
		Confirm.captcha('FlagCaptcha=false; sendFleet();');
		return;
	}
	
	DotsToCount();
			
	switch(FlightData.mission) 
	{
		//-- ÐœÐ¸ÑÑÐ¸Ñ Ñ‚Ð°Ð½ÑÐ¿Ñ€Ñ‚
		case 3:
		{
			//-- -- Ð‘ÐµÐ· Ñ€ÐµÑÑƒÑ€ÑÐ¾Ð²
			if(data['FleetRes'] == 0)
			{
				NotifyBox(SendError[5], 1200);
				return
			}
			break;
		}
		
		//-- Ð­ÐºÑÐ¿Ð°
		case 15:
		case 17:
		{
			//-- -- ÐŸÑ€Ð¸Ð²Ñ‹ÑˆÐµÐ½ Ð»Ð¸Ð¼Ð¸Ñ‚
			if(FlightData.ExpedSize < Math.floor(data['FleetPoints']))
			{
				NotifyBox(SendError[33], 1200);
				return
			}
			break;
		}
	}
	
	//-- GO
	$('#form-fleet').submit();
}