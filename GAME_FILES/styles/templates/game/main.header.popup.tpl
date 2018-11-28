<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="{$lang}" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="{$lang}" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="{$lang}" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="{$lang}" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="{$lang}" class="html-iframe"> <!--<![endif]-->

{*<html class="no-js" style="background:#000111;" lang="{$lang}">*}
	<head>
	<title>{block name="title"} - {$uni_name} - {$game_name}{/block}</title>
	
	{if !empty($goto)}
	<meta http-equiv="refresh" content="{$gotoinsec};URL={$goto}">
	{/if}
	
	<link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
    <meta name="viewport" content="width=1000, user-scalable=yes">
    <meta name="MobileOptimized" content="1000">
	<meta name="HandheldFriendly" content="true">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	
	<link rel="stylesheet" type="text/css" href="./styles/css/boilerplate.css?{$REV}">
    <link rel="stylesheet" type="text/css" href="./styles/css/ingame.css?{$REV}">
    <link rel="stylesheet" type="text/css" href="./styles/css/style.css?{$REV}">
	
	<link rel="stylesheet" type="text/css" href="./styles/resource/css/general/include.css?r={$REV}">
	
	<script type="text/javascript">
	document.domain = "warofalliance.eu";
	var ServerTimezoneOffset = {$Offset};
	var serverTime 	= new Date({$date.0}, {$date.1 - 1}, {$date.2}, {$date.3}, {$date.4}, {$date.5});
	var startTime	= serverTime.getTime();
	var localTime 	= serverTime;
	var localTS 	= startTime;
	var Gamename	= document.title;
	var Ready		= "{$LNG.ready}";
	var Lang		= "{$lang}";
	var head_info	= "{$LNG.fcm_info}";
	var auth		= {$authlevel|default:'0'};
	var days 		= {$LNG.week_day|json|default:'[]'} 
	var months 		= {$LNG.months|json|default:'[]'} ;
	var lng_time	= { "d":"{$LNG.short_day}","h":"{$LNG.short_hour}","m":"{$LNG.short_minute}","s":"{$LNG.short_second}","null":"\u041d\u0435\u0442" };
	var tdformat	= "{$LNG.js_tdformat}";
	var queryString	= "{$queryString|escape:'javascript'}";
	var STime		= 0;
	var CurPlanet	= {$current_pid};
	
	//-- Js LNG ----------------------------
	var LNG						= { };
		LNG['loading']			= "{$LNG.sh_loading}";
		LNG['ok']				= "{$LNG.buildings_5}";
		LNG['sys']				= "{$LNG.sys_refferal_from}";
		LNG['lvl']				= "ур.";
		LNG['lm_buildings']		= "{$LNG.frame_24}";
		LNG['lm_shipshard']		= "{$LNG.frame_27}";
		LNG['lm_research']		= "{$LNG.frame_28}";
		LNG['lng_time']			= { "d":"{$LNG.short_day}","h":"{$LNG.short_hour}","m":"{$LNG.short_minute}","s":"{$LNG.short_second}","null":"\u041d\u0435\u0442" };
		LNG['bd_complete_w']	= { "b":"{$LNG.buildings_7}","s":"text_2","r":"text_3" };
		LNG['farme_text']		= ["{$LNG.frame_34}","{$LNG.frame_35}","{$LNG.frame_36}"];
		
	setInterval(function() {
		serverTime.setSeconds(serverTime.getSeconds()+1);
	}, 1000);
	</script>
	<script type="text/javascript" src="./styles/resource/scripts/libs/jquery/jquery.min.js?{$REV}"></script>
	<script type="text/javascript"> 
		var DOM			= {}; // массив для дерева DOM
		$(function(){ DOM['body'] = $('body:first')});
	</script>
	<script type="text/javascript" src="./styles/resource/scripts/libs/jquery/jquery.mousewheel.js?{$REV}"></script>
	<script type="text/javascript" src="./styles/resource/scripts/libs/jquery/jquery.fancybox.js?{$REV}"></script>
	<script type="text/javascript" src="./styles/resource/scripts/libs/jquery/jquery.cookie.js?{$REV}"></script>	
	
	<script type="text/javascript" src="./styles/resource/scripts/classes/class.confirm.js?{$REV}"></script>
	<script type="text/javascript" src="./styles/resource/scripts/libs/tooltip.js?{$REV}"></script>	
	
	<script type="text/javascript" src="./styles/resource/scripts/general/general.js?{$REV}"></script>
	
    <script type="text/javascript"> 		
		var Confirm 	= new classConfirm();
	</script>
	
	{block name="script"}{/block}
		
	<script type="text/javascript">	
		$(function()
		{
			//-- Подключаем к странице			
			Confirm.construct();
			DOM['body'].prepend(tooltip);
			setTooltip(DOM['body']);
		
			//-- fancybox callbacks
			$.fancybox.defaults.beforeLoad 	= IbeforeLoad;
			$.fancybox.defaults.beforeClose	= IbeforeClose;
			
			
			
			DOM['servertime'] = $("#servertime");
			UhrzeitAnzeigen();
			STime = setInterval(UhrzeitAnzeigen, 1000);
		});
				
	</script>
</head>
<body id="{$smarty.get.page|htmlspecialchars|default:'overview'}" class="{$bodyclass}">
	