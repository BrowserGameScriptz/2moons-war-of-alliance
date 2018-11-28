<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="{$lang}" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="{$lang}" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="{$lang}" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="{$lang}" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="{$lang}" class="no-js"> <!--<![endif]-->
<head>
	<title>{block name="title"} - {$uni_name} - {$game_name}{/block}</title>
	
	{if !empty($goto)}
	<meta http-equiv="refresh" content="{$gotoinsec};URL={$goto}">
	{/if}
	
	<title>{block name="title"} - {$uni_name} - {$game_name}{/block}</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
	
	<link rel="stylesheet" type="text/css" href="./styles/css/chat/jquery.css?{$REV}">
    <link rel="stylesheet" type="text/css" href="./styles/css/chat/style.css?{$REV}">
	<link rel="stylesheet" type="text/css" href="./styles/css/chat/chat.css?{$REV}">
	
	
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
	var tdformat	= "{$LNG.js_tdformat}";
	var queryString	= "{$queryString|escape:'javascript'}";

	setInterval(function() {
			serverTime.setSeconds(serverTime.getSeconds()+1);
		}, 1000);
	</script>
	
	<script type="text/javascript" src="./scripts/base/jquery.js?{$REV}"></script>
	<script type="text/javascript" src="./scripts/base/jquery.cookie.js?{$REV}"></script>
	
	<script type="text/javascript"> 
		var DOM			= {}; // массив для дерева DOM
		$(function(){ DOM['body'] = $('body:first')});
	</script>
	
	<script type="text/javascript" src="./scripts/base/tooltip.js?{$REV}"></script>
	<script type="text/javascript" src="./scripts/chat/base.js?{$REV}"></script>
	<script type="text/javascript" src="./scripts/chat/global.js?{$REV}"></script>	
		

	<script type="text/javascript">
	$(function() {
		DOM['body'].prepend(tooltip);
		setTooltip(DOM['body']);
		
	});
	</script>

	{foreach item=scriptname from=$scripts}
	<script type="text/javascript" src="./scripts/game/{$scriptname}.js?{$REV}"></script>
	{/foreach}
	{block name="script"}{/block}
	<script type="text/javascript">
	$(function() {
		{$execscript}
	});
	</script>
	
</head>
<body id="chat" class="popup">
	